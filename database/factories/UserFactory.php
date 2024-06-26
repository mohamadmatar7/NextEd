<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'father_name' => fake()->optional()->name(),
            'mother_name' => fake()->optional()->name(),
            'phone' => fake()->optional()->phoneNumber(),
            'emergency_phone' => fake()->optional()->phoneNumber(),
            'address' => fake()->optional()->address(),
            'email_verified_at' => now(),
            'role' => fake()->numberBetween(0, 4), // 0 = student, 1 = teacher, 2 = instructor, 3 = principal, 4 = admin
            'password' => static::$password ??= Hash::make('password'),
            'avatar' => null,
            'gender' => fake()->randomElement(['Female', 'Male', 'Other']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
