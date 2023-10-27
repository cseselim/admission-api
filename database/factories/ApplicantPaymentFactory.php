<?php

namespace Database\Factories;

use App\Models\ApplicantStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'applicant_id' => function () {
                if ($applicantStudent = ApplicantStudent::inRandomOrder()->first()) {
                    return $applicantStudent->id;
                }
            },
            'name'=> $this->faker->firstName,
            'email'=> $this->faker->unique()->email,
            'phone'=> $this->faker->phoneNumber,
            'amount'=> 300,
            'address'=> $this->faker->address,
        ];
    }
}
