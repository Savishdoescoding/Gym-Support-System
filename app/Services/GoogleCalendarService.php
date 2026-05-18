<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class GoogleCalendarService
{
    protected Google_Client $client;
    protected Google_Service_Calendar $service;

    public function __construct()
    {
        $json = config('googlecalendar.service_account_credentials_json');
        $client = new Google_Client();
        $client->setAuthConfig($json);
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $this->client = $client;
        $this->service = new Google_Service_Calendar($client);
    }

    /**
     * Create an event on the configured calendar.
     *
     * @param string $summary
     * @param string $description
     * @param string $startDateTime ISO 8601 datetime (e.g. 2026-05-17T10:00:00)
     * @param string $endDateTime
     * @param array $attendees array of email addresses
     * @param string|null $calendarId
     * @return Google_Service_Calendar_Event
     */
    public function createEvent(string $summary, string $description, string $startDateTime, string $endDateTime, array $attendees = [], ?string $calendarId = null)
    {
        $event = new Google_Service_Calendar_Event([
            'summary' => $summary,
            'description' => $description,
            'start' => ['dateTime' => $startDateTime, 'timeZone' => config('app.timezone')],
            'end' => ['dateTime' => $endDateTime, 'timeZone' => config('app.timezone')],
            'attendees' => array_map(fn($email) => ['email' => $email], $attendees),
        ]);

        $calendarId = $calendarId ?: config('googlecalendar.calendar_id');

        return $this->service->events->insert($calendarId, $event);
    }
}
