<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'code' => $this->faker->randomNumber(5),
            'logo' => $this->faker->imageUrl($width = 640, $height = 480),
            'phone' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'has_shift' => 1,
            'has_version' => 1,
            'has_section' => 1,
        ];
    }
}
