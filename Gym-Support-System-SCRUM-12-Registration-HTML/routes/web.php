<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('webpage');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('webpage');
    })->name('home');

    Route::get('/discover', function () {
        return view('discover');
    })->name('discover');

    Route::get('/exercises', function () {
        return view('exercises');
    })->name('exercises');

    Route::get('/progress', function () {
        return view('progress');
    })->name('progress');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});
