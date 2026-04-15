<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => view('webpage'));

Route::get('/login', function() {
    return view('userlogin');
})->name('login');

Route::get('/register', function() {
    return view('userregister');
})->name('register');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/discover',  [DashboardController::class, 'discover'])->name('discover');
    Route::get('/progress',  [DashboardController::class, 'progress'])->name('progress');
    Route::get('/exercises', [DashboardController::class, 'exercises'])->name('exercises');
    Route::get('/settings',  [DashboardController::class, 'settings'])->name('settings');
});

require __DIR__.'/auth.php';
