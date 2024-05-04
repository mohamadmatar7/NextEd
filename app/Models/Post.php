<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
