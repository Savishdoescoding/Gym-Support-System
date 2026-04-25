<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()      { return view('webpage'); }
    public function discover()  { return view('discover'); }
   public function progress() {
    $photos = \App\Models\ProgressPhoto::where('user_id', auth()->id())
                ->orderBy('date', 'desc')->get();
    return view('progress', compact('photos'));
}
    public function exercises() { return view('exercises'); }
    public function settings()  { return view('settings'); }
}
