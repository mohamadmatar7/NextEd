<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Announcement;
use Illuminate\Http\Request;

class General extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments', 'comments.user', 'comments.replies', 'comments.replies.user', 'comments.user.likes', 'comments.user.media', 'media', 'likes')
            ->latest()
            ->get();
        $announcements = Announcement::with('media', 'user', 'likes', 'program', 'course')
            ->latest()
            ->get();
        $announcementsPrograms = Announcement::with('media', 'user', 'likes', 'program', 'course')
            ->where('program_id', '21')
            ->latest()
            ->get();
        return view('welcome', compact('posts', 'announcements', 'announcementsPrograms'));

    }
}
