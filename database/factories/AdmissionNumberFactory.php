<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // not sure why you do this, is it not a autoincrement column?
            'admission_number' => $this->faker->unique()->randomNumber(3), 
            'school_id' => function () {
                if ($school = School::inRandomOrder()->first()) {
                    return $school->id;
                }

                //return factory(Category::class)->create()->id;
            },
            'class_id' => function () {
                if ($classes = Classes::inRandomOrder()->first()) {
                    return $classes->id;
                }

                //return factory(User::class)->create()->id;
            },
        ];
    }
}
