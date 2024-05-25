<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Introduction to Web Development',
                                                    'Introduction to Mobile Development',
                                                    'Introduction to Desktop Development',
                                                    'Introduction to Machine Learning',
                                                    'Introduction to Data Science',
                                                    'Introduction to DevOps',
                                                    'Introduction to Testing',
                                                    'Introduction to Project Management',
                                                    'Introduction to Design',
                                                    'Introduction to Security']),
            'description' => $this->faker->paragraph,
            'start_date' => fake()->dateTimeBetween('-3 months', 'now'),
            'end_date' => fake()->dateTimeBetween('now', '+3 months'),
            'image' => 'https://source.unsplash.com/random',
            'program_id' => rand(1, 10),
        ];
    }
}
