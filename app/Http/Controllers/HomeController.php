<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        // obtener aquienes seguimos 
        $ids = Auth::user()->followings->pluck('id')->toArray();
        $post = Post::whereIn('user_id', $ids)->latest()->get();
        return view('home', [
            'posts' => $post
        ]);
    }
}
