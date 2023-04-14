<?php

namespace Database\Factories;

use App\Http\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'ssn' => $this->faker->unique()->numberBetween(),
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
            'country' => 'Jordan',
            'city' => Cities::$cities[$this->faker->numberBetween(0, count(Cities::$cities)-1)],
            'gender' => 'male',
            'image' => 'doctors/mousa al dardah//hrP1vYnoFnZ1QTSnjAWnn4XSFSUZEYUYMa88aYmW.png',
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
