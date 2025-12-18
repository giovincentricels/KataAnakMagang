<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function show()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $request->user()->update([
    'name' => $request->name,
    'university' => $request->university,
    'location' => $request->location,
    'major' => $request->major,
    'bio' => $request->bio,
]);

        return back()->with('success', 'Profile updated successfully');
    }
}
