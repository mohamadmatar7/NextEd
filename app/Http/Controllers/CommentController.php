<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        ]);

        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        
        if ($comment->user_id !== auth()->id()) {
            return back();
        }

        return view('comments.edit', compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $comment = Comment::findOrFail($comment->id);

        if ($comment->user_id !== auth()->id()) {
            return back();
        }

        $comment->update([
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);

        if ($comment->user_id !== auth()->id()) {
            return back();
        }

        $comment->delete();

        return back();
    }
}
