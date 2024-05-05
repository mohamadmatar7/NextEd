<?php

namespace App\Traits;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function like()
    {
        if (!$this->likes()->where('user_id', auth()->id())->exists()) {
            $this->likes()->create(['user_id' => auth()->id()]);
            $this->increment('likes_count');
        }
    }

    public function dislike()
    {
        $this->likes()->where('user_id', auth()->id())->delete();
        $this->decrement('likes_count');
    }
}
