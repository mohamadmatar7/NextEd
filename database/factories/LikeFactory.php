<?php

namespace Database\Factories;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Ensure the user_id is valid
            // Define likeable_id and likeable_type using valid data
            'likeable_id' => $this->faker->numberBetween(1, 100), // Adjust the range as needed
            'likeable_type' => $this->faker->randomElement(['App\Models\Post', 'App\Models\Comment', 'App\Models\Reply']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Set a realistic date
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Set a realistic date
        ];
    }
}
