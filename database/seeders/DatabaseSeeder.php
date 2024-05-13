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
        // \App\Models\User::factory(10)->create();
        // \App\Models\Post::factory(10)->create();
        // \App\Models\Comment::factory(10)->create();
        \App\Models\Reply::factory(10)->create();
        \App\Models\Reply::factory(3)->replyTo(1)->create();
        \App\Models\Like::factory(10)->create();
        // \App\Models\Course::factory(10)->create();
        \App\Models\Assignment::factory(10)->create();
        // \App\Models\Program::factory(10)->create();
        \App\Models\Announcement::factory(10)->create();
        // \App\Models\Announcement::factory(3)->forProgram(1)->create();
        // \App\Models\Announcement::factory(3)->forCourse(1)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
