<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\WorkoutLogController;
use Illuminate\Support\Facades\Mail;

Route::get('/', fn() => view('webpage'));

Route::get('/login', function() {
    return view('userlogin');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/google/calendar/callback', [GoogleCalendarController::class, 'callback'])->name('google.calendar.callback');

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/discover',  [DashboardController::class, 'discover'])->name('discover');
    Route::get('/progress',  [DashboardController::class, 'progress'])->name('progress');
    Route::get('/exercises', [DashboardController::class, 'exercises'])->name('exercises');
    Route::get('/settings',  [DashboardController::class, 'settings'])->name('settings');
    Route::post('/progress/photos', [App\Http\Controllers\ProgressController::class, 'store'])->name('progress.photos.store');
    Route::delete('/progress/photos/{id}', [App\Http\Controllers\ProgressController::class, 'destroy'])->name('progress.photos.destroy');

    //* Google Calendar integration
    Route::get('/google/calendar/create', [GoogleCalendarController::class, 'createEventForm'])->name('google.calendar.create');
    Route::post('/google/calendar/store', [GoogleCalendarController::class, 'store'])->name('google.calendar.store');
    Route::get('/google/calendar/connect', [GoogleCalendarController::class, 'redirect'])->name('google.calendar.connect');
    Route::post('/workout/log', [WorkoutLogController::class, 'store'])->name('workout.log.store');
    Route::get('/workout/logs/today', [WorkoutLogController::class, 'today'])->name('workout.log.today');

});

Route::get('/test-email', function() {
    Mail::raw('Hello! Test from Gym Support System! 💪', function($message) {
        $message->to('labastidamjbryan02@gmail.com')
                ->subject('Test Email 🏋️');
    });
    return 'Email sent!';
});

require __DIR__.'/auth.php';
