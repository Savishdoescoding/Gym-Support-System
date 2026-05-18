<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleCalendarController extends Controller
{
    protected function getClient()
    {
        $user = Auth::user();

        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        if ($user->google_access_token) {
            $client->setAccessToken(json_decode($user->google_access_token, true));

            if ($client->isAccessTokenExpired()) {
                $token = $client->fetchAccessTokenWithRefreshToken($user->google_refresh_token);
                $user->update(['google_access_token' => json_encode($token)]);
            }
        }

        return $client;
    }

    public function redirect()
    {
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        return redirect($client->createAuthUrl());
    }

    public function callback(Request $request)
    {
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        $token = $client->fetchAccessTokenWithAuthCode($request->code);

        $user = Auth::user();
        $user->update([
            'google_access_token'  => json_encode($token),
            'google_refresh_token' => $token['refresh_token'] ?? $user->google_refresh_token,
        ]);

        return redirect()->route('settings')->with('status', 'Google Calendar connected!');
    }

    public function createEventForm()
    {
        return view('googlecalendar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'summary'    => 'required|string',
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required',
        ]);

        $client  = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $start = $request->date . 'T' . $request->start_time . ':00';
        $end   = $request->date . 'T' . $request->end_time . ':00';

        $event = new Google_Service_Calendar_Event([
            'summary'     => $request->summary,
            'description' => $request->input('description', ''),
            'start'       => ['dateTime' => $start, 'timeZone' => config('app.timezone')],
            'end'         => ['dateTime' => $end,   'timeZone' => config('app.timezone')],
        ]);

        $service->events->insert('primary', $event);

        return redirect()->back()->with('status', 'Event created on Google Calendar!');
    }
}
