<?php

namespace App\Models;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Comment extends Model
{
    protected $fillable = [
        'body',
        'post_id',
        'user_id',
        

        // Add other fillable properties as needed
    ];
    use HasFactory, Likeable;

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function replies() 
    {
        return $this->hasMany(Reply::class);
    }

}
