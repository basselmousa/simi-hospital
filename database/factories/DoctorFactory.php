<?php

namespace Database\Factories;

use App\Http\Cities;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'building_number' => $this->faker->buildingNumber(),
            'phone_number' => $this->faker->phoneNumber(),
            'password' => Hash::make('123456789'), // password
            'country' => 'Jordan',
            'city' => Cities::$cities[$this->faker->numberBetween(0, count(Cities::$cities)-1)],
            'gender' => 'male',
            'image' => 'doctors/mousa al jarah//Gu91UlVAkIYSkaKjtMWe5UN8gMZ14uqu8r7WC6wv.png'
        ];
    }
}
