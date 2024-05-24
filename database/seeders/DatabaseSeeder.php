<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Program;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Reply;
use App\Models\Like;
use App\Models\Announcement;
use App\Models\Assignment;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
                // Categories
        $categories = [
            'Master',
            'Bachelor',
            'Graduate',
            'Postgraduate',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }

        // Programs
        $programs = [
            'Web Development',
            'Mobile Development',
            'Desktop Development',
            'Machine Learning',
            'Data Science',
            'DevOps',
            'Testing',
            'Project Management',
            'Design',
            'Security',
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate([
                'name' => $program,
                'description' => 'This is a description for ' . $program,
                'category_id' => rand(1, 4),
            ]);
        }

        // Courses
        $courses = [
            'Introduction to Web Development',
            'Introduction to Mobile Development',
            'Introduction to Desktop Development',
            'Introduction to Machine Learning',
            'Introduction to Data Science',
            'Introduction to DevOps',
            'Introduction to Testing',
            'Introduction to Project Management',
            'Introduction to Design',
            'Introduction to Security',
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate([
                'name' => $course,
                'description' => 'This is a description for ' . $course,
                'image' => 'https://source.unsplash.com/random',
                'program_id' => rand(1, 10),
            ]);
        }
        // Seed Replies
        Reply::factory(10)->create();
        Reply::factory(3)->replyTo(1)->create();
        
        // Seed Likes
        Like::factory(10)->create();
        
        // Seed Announcements
        Announcement::factory(10)->create();
        
        // Create assignments for each user
        User::all()->each(function ($user) {
            $user->assignments()->saveMany(Assignment::factory(5)->make());
        });

        // Create lessons for each course
        Course::all()->each(function ($course) {
            $course->lessons()->saveMany(Lesson::factory(5)->make());
        });

        // Add users to courses
        Course::all()->each(function ($course) {
            $course->users()->attach(User::all()->random(10));
        });



    }
}
