<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\User;

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
        $suffixes = ['Jr.', 'Sr.', null];
        $suffix = $suffixes[array_rand($suffixes)];
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'middle_name' => fake()->name(),
            'qualifier' => $suffix,
            'rank_id' => rand(1, 17),
            'role' => 'user',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'unit_office_id' =>rand(1,6),
            'station_id' =>rand(1,96),
            'isActive' => rand(0,1) == 1,
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

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            // Assign a random role to the user
            $roles = Role::all();
            $role = $roles->random();
            $user->assignRole($role);
        });
    }
}
