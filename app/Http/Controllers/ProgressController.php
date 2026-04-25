<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressPhoto;

class ProgressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date'  => 'required|date',
            'label' => 'required|string',
            'photo' => 'required|image|max:5048',
        ]);

        $path = $request->file('photo')->store('progress_photos', 'public');

        ProgressPhoto::create([
            'user_id'    => auth()->id(),
            'date'       => $request->date,
            'label'      => $request->label,
            'photo_path' => $path,
        ]);

        return redirect()->route('progress')->with('active_tab', 'photos');
    }
    public function destroy($id)
    {
        $photo = \App\Models\ProgressPhoto::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        \Illuminate\Support\Facades\Storage::disk('public')->delete($photo->photo_path);
        $photo->delete();
        return redirect()->route('progress')->with('active_tab', 'photos');
    }
}
