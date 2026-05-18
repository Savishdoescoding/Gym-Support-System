# Google Calendar integration (service account)

Steps to enable Google Calendar integration using the included service account credentials:

1. Install the Google API PHP client:

```bash
composer require google/apiclient:^2.0
```

2. Place your service account JSON at `storage/app/google-calendar/credentials.json` (already present in this repo).

3. (Optional) Set `GOOGLE_CALENDAR_ID` in your `.env` to the calendar you want to use. Defaults to `primary`.

4. Publish config (already added): `config/googlecalendar.php` reads the credentials and calendar id.

5. Use the UI at `/google/calendar/create` (requires auth) to create events. The controller uses the `GoogleCalendarService`.

Notes:

- Service accounts act as standalone accounts. To write to a specific user's calendar, you must share the target calendar with the service account email (found in the JSON `client_email`).
- For domain-wide delegation to impersonate users, enable delegation in GCP and use `setSubject()` on the `Google_Client`.

## Mail setup

- Configure `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION`, and `MAIL_FROM_ADDRESS` in your `.env`.
- A scaffolded `App\Mail\CustomNotification` mailable and `resources/views/emails/simple.blade.php` view are included.
