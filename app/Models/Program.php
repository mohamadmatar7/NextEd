<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Program extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
