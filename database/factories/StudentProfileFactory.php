<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_name'=> $this->faker->name,
            'father_name'=> $this->faker->name($gender = 'male') ,
            'father_nid_no'=> $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'father_occupation'=> $this->faker->word,
            'father_contact'=> $this->faker->phoneNumber,
            'unit'=> 'Army-012',
            'rank'=> 'Cornel',
            'mother_name'=> $this->faker->firstNameFemale,
            'mother_contact'=> $this->faker->phoneNumber,
            'permanent_address'=> $this->faker->address,
            'date_of_birth'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'student_sex'=> $this->faker->title,
            'religion'=> 'Islam',
            'skill'=> $this->faker->text,
            'profile_image'=> $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
