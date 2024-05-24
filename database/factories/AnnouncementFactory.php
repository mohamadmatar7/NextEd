<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // title in english
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'image' => 'https://source.unsplash.com/random',
            // user_id only if the role is 1,2,3 or 4
            'user_id' => \App\Models\User::whereIn('role', [1, 2, 3, 4])->inRandomOrder()->first(),
            'program_id' => rand(1, 10),
            'course_id' => rand(1, 10),
            'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
