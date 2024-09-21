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
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'is_admin' => fake()->boolean(false),
            // ??= null coalescing operator, fungsingnya sama seperti operasi terneri, cek apakah nilai dikiritrue jika iya pake nilai yang ada dikiri kaalau false pakai yang kanan
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'image' => Str::random(10),
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

    // method ini membuat isi dummy yang dibuat memiliki attribute seperti dibawah, cara memakainya App\Models\User::factory()->admin()->create();
    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_admin' => true,
        ]);
    }
}
