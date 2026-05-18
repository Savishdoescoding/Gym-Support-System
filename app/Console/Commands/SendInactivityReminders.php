<?php

namespace App\Console\Commands;

use App\Mail\InactivityReminder;
use App\Models\ProgressPhoto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendInactivityReminders extends Command
{
    protected $signature = 'app:send-inactivity-reminders';
    protected $description = 'Send reminder emails to users who have not uploaded a photo in 3+ days';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
        $latest = ProgressPhoto::where('user_id', '=', $user->id)
            ->orderBy('date', 'desc')
            ->first();

        $daysSince = $latest
            ? Carbon::parse($latest->date)->diffInDays(Carbon::today())
            : 999;

        $this->info("User: {$user->email}, Days since: {$daysSince}");

        if ($daysSince >= 0) {
            Mail::to($user->email)->send(new InactivityReminder($user->name));
            $this->info("Sent reminder to {$user->email}");
        }
    }

        $this->info('Done!');
    }
}
