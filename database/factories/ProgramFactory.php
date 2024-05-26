<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Web Development',
                                                    'Mobile Development',
                                                    'Desktop Development',
                                                    'Machine Learning',
                                                    'Data Science',
                                                    'DevOps',
                                                    'Testing',
                                                    'Project Management',
                                                    'Design',
                                                    'Security']),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'category_id' => rand(1, 4),
            'years' => rand(2, 4),
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
