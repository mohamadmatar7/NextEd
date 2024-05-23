<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'program_id',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
