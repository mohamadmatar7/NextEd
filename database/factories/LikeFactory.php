<?php

namespace Database\Factories;

// use App\Models\Comment;
// use App\Models\Like;
// use App\Models\Post;
// use App\Models\Reply;
// use App\Models\User;
// use Illuminate\Database\Eloquent\Factories\Factory;

// class LikeFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $likableType = $this->faker->randomElement([Post::class, Comment::class, Reply::class]);

//         // Create an instance of the likable model and get its ID
//         $likable = $likableType::factory()->create();
//         $likableId = $likable->id;

//         return [
//             'user_id' => User::factory(),
//             'likable_id' => $likableId,
//             'likable_type' => $likableType, // Should be the class name, not the class itself
//         ];
//     }
// }

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
