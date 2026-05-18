<?php

return [
    // Path to the service account credentials JSON
    'service_account_credentials_json' => storage_path('app/google-calendar/credentials.json'),

    // Calendar ID to use (use 'primary' or the calendar email)
    'calendar_id' => env('GOOGLE_CALENDAR_ID', 'primary'),
];
