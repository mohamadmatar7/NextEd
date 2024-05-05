<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'image' => 'nullable|image|max:4096',
        ]);


        if ($request->hasFile('image')) {
            $post = Post::create([
                'body' => $request->body,
                'user_id' => auth()->id(),
            ]);

            $post->addMediaFromRequest('image')->toMediaCollection('post-images');
            return back();
        }
        Post::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        
        $request->validate([
            'body' => 'required',
            'image' => 'nullable|image|max:4096',
        ]);

        $post = Post::findOrFail($post->id);

        if ($post->user_id !== auth()->id()) {
            return back();
        }

        $post->update([
            'body' => $request->body,
        ]);

        if ($request->hasFile('image')) {
            $post->clearMediaCollection('post-images');
            $post->addMediaFromRequest('image')->toMediaCollection('post-images');
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);

        if ($post->user_id !== auth()->id()) {
            return back();
        }

        $post->delete();

        return back();
    }
}
