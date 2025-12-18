<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityPostController extends Controller
{
    //
    public function index()
    {
        //
        $posts = CommunityPost::with('user')->latest()->paginate(10);

        return view('communities', compact('posts'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'content' => 'required|string|max:5000',
            'title' => 'nullable|string|max:255',
        ]);

        CommunityPost::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Community post created successfully.');
    }

    public function destroy(CommunityPost $post) {
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this post.');
        }


        $post->delete();

        return redirect()->back()->with('success', 'Community post deleted successfully.');
    }
}
