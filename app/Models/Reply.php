<?php

namespace App\Models;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Reply extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'body',
        'comment_id',
        'user_id',
        // Add other fillable properties as needed
    ];

    public function comment() 
    {
        return $this->belongsTo(Comment::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
