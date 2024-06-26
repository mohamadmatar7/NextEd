<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph(),
            'comment_id' => \App\Models\Comment::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }

    /**
     * Indicate that the reply is a reply to another reply.
     *
     * @param  int  $id
     * @return \Database\Factories\ReplyFactory
     */
    public function replyTo(int $id): ReplyFactory
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => $id,
        ]);
    }
    
}
