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
            'date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'duration' => $this->faker->time(),
            'location' => $this->faker->address,
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
