<?php

namespace Database\Seeders;

use App\Enums\Status;
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
use Illuminate\Support\Arr;

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
                'years' => rand(2, 4),
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
            'Introduction to History',
            'Introduction to Geography',
            'Introduction to Mathematics',
            'Introduction to Physics',
            'Introduction to Chemistry',
            'Introduction to Biology',
            'Introduction to Computer Science',
            'Introduction to Software Engineering',
            'Introduction to Information Technology',
            'Introduction to Artificial Intelligence',
            'Introduction to Robotics',
            'Introduction to Cybersecurity',
            'Introduction to Cryptography',
            'Introduction to Blockchain',
            'Introduction to Internet of Things',
            'Introduction to Cloud Computing',
            'Introduction to Big Data',
            'Introduction to Data Analytics',
            'Introduction to Data Visualization',
            'Introduction to Machine Learning',
            'Introduction to Deep Learning',
            'Introduction to Natural Language Processing',
            'Introduction to Computer Vision',
            'Introduction to Speech Recognition',
            'Introduction to Reinforcement Learning',
            'Introduction to Supervised Learning',
            'Introduction to Unsupervised Learning',
            'Introduction to Semi-supervised Learning',
            'Introduction to Transfer Learning',
            'Introduction to Ensemble Learning',
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate([
                'name' => $course,
                'description' => 'This is a description for ' . $course,
                'image' => 'https://source.unsplash.com/random',
                'program_id' => rand(1, 10),
                'year' => rand(1, 4),
                'semester' => rand(1, 2),
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

        // Add users to courses randomly and make the status of the user in the course as random
        Course::all()->each(function ($course) {
            $course->users()->attach(User::all()->random(10), ['status' => Arr::random([Status::enrolled, Status::completed])]);
        });


        // Attendances
        // $users = User::all();
        // $lessons = Lesson::all();
        // foreach ($users as $user) {
        //     foreach ($lessons as $lesson) {
        //         $status = rand(0, 2);
        //         $lesson->attendances()->create([
        //             'user_id' => $user->id,
        //             'status' => $status,
        //             'reason' => ($user->role == 0 && $status == 1) ? 'I am sick' : null,
        //         ]);
        //     }
        // }





    }
}
