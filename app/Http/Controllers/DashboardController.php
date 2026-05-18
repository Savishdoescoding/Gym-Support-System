<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()      { return view('webpage'); }
    public function discover()  { return view('discover'); }

    public function progress() {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $photos = \App\Models\ProgressPhoto::where('user_id', $user->id)
                ->orderBy('date', 'desc')->get();

        $notes = \App\Models\Note::where('user_id', $user->id)->get();

        $noteData = $notes->mapWithKeys(function ($note) {
            $date = \Carbon\Carbon::parse($note->created_at)->format('Y-m-d');
            return [$date => $note->title . ': ' . $note->content];
        });

        $photoData = $photos->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('Y-m-d'))->values();

        return view('progress', compact('photos', 'noteData', 'photoData'));
    }

    public function exercises() {
        $exercises = \App\Models\Exercise::all();
        return view('exercises', compact('exercises'));
    }

    public function settings() {
        $user = Auth::user();
        return view('settings', compact('user'));
}
}
