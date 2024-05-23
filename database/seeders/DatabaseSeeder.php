<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Reply::factory(10)->create();
        \App\Models\Reply::factory(3)->replyTo(1)->create();
        \App\Models\Like::factory(10)->create();
        // \App\Models\Assignment::factory(5)->create();
        \App\Models\Announcement::factory(10)->create();

         // Loop through users and assign random courses to each user
        \App\Models\User::all()->each(function ($user) {
            $user->courses()->attach(\App\Models\Course::inRandomOrder()->limit(4)->get());
        });
        // Lessons
        \App\Models\Course::all()->each(function ($course) {
            $course->lessons()->saveMany(\App\Models\Lesson::factory(5)->make());
        });
        // Assignments
        \App\Models\User::all()->each(function ($user) {
            $user->assignments()->saveMany(\App\Models\Assignment::factory(5)->make());
        });
        
    }
}
