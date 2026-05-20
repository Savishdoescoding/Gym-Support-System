<?php

namespace App\Http\Controllers;

use App\Models\WorkoutLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WorkoutLogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'exercise_name' => 'required|string',
            'muscle'        => 'nullable|string',
            'equipment'     => 'nullable|string',
        ]);

        WorkoutLog::create([
            'user_id'       => Auth::id(),
            'exercise_name' => $request->exercise_name,
            'muscle'        => $request->muscle,
            'equipment'     => $request->equipment,
            'date'          => now()->toDateString(),
        ]);

        return response()->json(['success' => true]);
    }

        public function today()
    {
        $logs = WorkoutLog::where('user_id', Auth::id())
            ->where('date', now()->toDateString())
            ->get(['exercise_name', 'muscle', 'equipment']);

        return response()->json($logs);
    }
}
