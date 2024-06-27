<?php

namespace Database\Factories;

use App\Enums\User\UserAdmin;
use App\Enums\User\UserVerified;
use App\Models\User;
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
        $userVerifiedStatus = [UserVerified::VERIFIED_USER->value, UserVerified::UNVERIFIED_USER->value];
        $verified = $userVerifiedStatus == UserVerified::VERIFIED_USER->value;
        $userAdmin = [UserAdmin::ADMIN_USER->value, UserAdmin::REGULAR_USER->value];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'verified' => fake()->randomElement($userVerifiedStatus),
            'verification_token' => $verified ? null : User::generateVerificationCode(),
            'admin' => fake()->randomElement($userAdmin)
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
