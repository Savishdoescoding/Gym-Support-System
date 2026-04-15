<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function discover()  { return view('discover'); }
    public function progress()  { return view('progress'); }
    public function exercises() { return view('exercises'); }
    public function settings()  { return view('settings'); }
}
