<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
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
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'course_id' => rand(1, 10),
            'completed' => false,
            'notes' => $this->faker->paragraph,
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),

        ];
    }
}
