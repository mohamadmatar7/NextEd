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
            ->limit(10)
            ->get();

        $announcements = Announcement::with('media', 'user', 'likes', 'program', 'course')
            ->latest()
            ->get();

        // get announcements for of program that the user is enrolled in
        $announcementsPrograms = auth()->user()->courses->map(function ($course) {
            return $course->program->announcements;
        })->flatten();

        return view('welcome', compact('posts', 'announcements', 'announcementsPrograms'));

    }

    public function test()
    {
        return view('posts.index');
    }
}
