<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class General extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments', 'comments.user', 'comments.replies', 'comments.replies.user', 'comments.user.likes', 'comments.user.media', 'media')
            ->latest()
            ->get();
        return view('welcome', compact('posts'));

    }
}
