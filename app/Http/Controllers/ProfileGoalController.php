<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileGoalController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'weight'        => 'required|numeric|min:1',
            'target_weight' => 'required|numeric|min:1',
            'goal'          => 'required|in:loss,gain,maintain',
        ]);

        Auth::user()->update([
            'weight'        => $request->weight,
            'target_weight' => $request->target_weight,
            'goal'          => $request->goal,
        ]);

        return redirect()->route('settings')->with('status', 'Fitness goal saved!');
    }
}
