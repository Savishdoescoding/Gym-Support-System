<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RecommendationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->goal || !$user->target_weight) {
            return redirect()->route('settings')
                ->with('status', 'Please set your fitness goal first.');
        }

        $exercises = $this->getRecommendedExercises($user->goal);

        return view('recommendations', compact('exercises', 'user'));
    }

    private function getRecommendedExercises(string $goal): array
    {
        // Map goal to exercise categories
        $categoryMap = [
            'loss'     => ['cardio', 'stretching'],
            'gain'     => ['strength', 'powerlifting', 'strongman'],
            'maintain' => ['strength', 'cardio', 'stretching'],
        ];

        $categories = $categoryMap[$goal] ?? ['strength'];

        $exercises = Exercise::whereIn('category', $categories)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return $exercises->toArray();
    }

    public function saveToCalendar(Request $request)
    {
        $request->validate([
            'exercises'  => 'required|array',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required',
        ]);

        $user   = Auth::user();
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope(Google_Service_Calendar::CALENDAR);

        if ($user->google_access_token) {
            $client->setAccessToken(json_decode($user->google_access_token, true));

            if ($client->isAccessTokenExpired()) {
                $token = $client->fetchAccessTokenWithRefreshToken($user->google_refresh_token);
                $user->update(['google_access_token' => json_encode($token)]);
            }
        } else {
            return redirect()->route('google.calendar.connect');
        }

        $service     = new Google_Service_Calendar($client);
        $exerciseList = implode(', ', $request->exercises);
        $start        = $request->start_date . 'T' . $request->start_time . ':00';
        $end          = $request->start_date . 'T' . $request->end_time . ':00';

        $event = new Google_Service_Calendar_Event([
            'summary'     => '💪 Gym Workout — ' . ucfirst(Auth::user()->goal) . ' Plan',
            'description' => "Recommended exercises:\n" . $exerciseList,
            'start'       => ['dateTime' => $start, 'timeZone' => config('app.timezone')],
            'end'         => ['dateTime' => $end,   'timeZone' => config('app.timezone')],
        ]);

        $service->events->insert('primary', $event);

        // Send Gmail reminder
        Mail::raw(
            "Hi {$user->name}! 💪\n\nYour workout has been scheduled.\n\nExercises: {$exerciseList}\n\nDate: {$request->start_date}\nTime: {$request->start_time} - {$request->end_time}\n\nStay consistent. — Gym Rat System",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('🏋️ Your Workout Reminder — Gym Rat');
            }
        );

        return redirect()->route('recommendations')
            ->with('status', 'Workout saved to Google Calendar and reminder sent!');
    }
}
