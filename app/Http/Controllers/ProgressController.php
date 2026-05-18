<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProgressPhoto;
use Cloudinary\Cloudinary;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class ProgressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date'  => 'required|date',
            'label' => 'required|string',
            'photo' => 'required|image|max:5048',
        ]);

        $cloudinary = new Cloudinary("cloudinary://931971853636191:8ek6mW6CMdC-ZgJbIE1WB7bnFzE@dr74efwgc");
        $result = $cloudinary->uploadApi()->upload($request->file('photo')->getRealPath());
        $path = $result['secure_url'];

        ProgressPhoto::create([
            'user_id'    => Auth::id(),
            'date'       => $request->date,
            'label'      => $request->label,
            'photo_path' => $path,
        ]);

        // 👇 Add Google Calendar event
        $user = Auth::user();
        if ($user->google_access_token) {
            try {
                $client = new Google_Client();
                $client->setClientId(config('services.google.client_id'));
                $client->setClientSecret(config('services.google.client_secret'));
                $token = json_decode($user->google_access_token, true);
                $client->setAccessToken($token);

                $service = new Google_Service_Calendar($client);

                $event = new Google_Service_Calendar_Event([
                    'summary'     => 'Progress Photo: ' . $request->label,
                    'description' => 'Progress photo uploaded on this day!',
                    'start'       => ['date' => $request->date],
                    'end'         => ['date' => $request->date],
                ]);

                $service->events->insert('primary', $event);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        return redirect()->route('progress')->with('active_tab', 'photos');
    }

    public function destroy(int $id)
    {
        $photo = ProgressPhoto::whereId($id)->where('user_id', Auth::id())->firstOrFail();
        $photo->delete();
        return redirect()->route('progress')->with('active_tab', 'photos');
    }
}
