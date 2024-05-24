<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            \App\Models\Program::create([
                'name' => $program,
                'description' => 'This is a description for ' . $program,
                'category_id' => rand(1, 4),
            ]);
        }
    }
}
