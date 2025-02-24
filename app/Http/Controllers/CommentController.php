<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment
        ]);

        return back()->with('message', 'Comment was posted');
    }
}
