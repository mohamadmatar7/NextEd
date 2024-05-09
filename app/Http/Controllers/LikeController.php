<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;

class LikeController extends Controller
{
    
    public function likeComment(Request $request)
    {
        $comment = Comment::findOrFail($request->comment_id);
        $like = Like::where('likeable_id', $comment->id)
                    ->where('likeable_type', Comment::class)
                    ->where('user_id', auth()->id())
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            $like = new Like();
            $like->user_id = auth()->id();
            $comment->likes()->save($like);
        }

        $likeCount = $comment->likes()->count();
        return response()->json(['success' => true, 'likeCount' => $likeCount]);
    }

    public function likePost(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $like = Like::where('likeable_id', $post->id)
                    ->where('likeable_type', Post::class)
                    ->where('user_id', auth()->id())
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            $like = new Like();
            $like->user_id = auth()->id();
            $post->likes()->save($like);
        }

        $likeCount = $post->likes()->count();
        return response()->json(['success' => true, 'likeCount' => $likeCount]);
    }

    public function likeReply(Request $request)
    {
        $reply = Reply::findOrFail($request->reply_id);
        $like = Like::where('likeable_id', $reply->id)
                    ->where('likeable_type', Reply::class)
                    ->where('user_id', auth()->id())
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            $like = new Like();
            $like->user_id = auth()->id();
            $reply->likes()->save($like);
        }

        $likeCount = $reply->likes()->count();
        return response()->json(['success' => true, 'likeCount' => $likeCount]);
    }


}
