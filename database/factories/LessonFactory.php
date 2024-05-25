<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'video' => 'https://www.youtube.com/watch?v=6g8GpR7kT7w',
            'course_id' => rand(1, 10),
            'start_time' => fake()->dateTimeBetween('-3 hours', 'now'),
            'end_time' => fake()->dateTimeBetween('now', '+3 hours'),
            'location' => $this->faker->address,
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
