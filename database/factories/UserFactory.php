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
            'uuid' => fake()->uuid(),

            'name' => fake()->name(),
            'middle_name' => fake()->name(),
            'last_name' => fake()->name(),
            'username' => fake()->name(),

            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),

            'country' => fake()->country(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'zip_code' => fake()->postcode(),

            'dob' => fake()->dateTimeBetween('-18 years', 'now'),

            'gender' => fake()->randomElement(config('setting.genders')),

            'marital_status' => fake()->randomElement(config('setting.maritalStatus')),

            'employment' => fake()->randomElement(config('setting.employments')),

            'currency' => 'United State Dollar-USD-$',

            'account_type' => fake()->randomElement(config('setting.accountTypes')),

            'transaction_pin' => fake()->numberBetween(1000, 9999),
            'account_number' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'account_balance' => fake()->randomFloat(2, 0, 10000),

            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
