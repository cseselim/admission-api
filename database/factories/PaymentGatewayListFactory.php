<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentGatewayListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_id' => function () {
                if ($school = School::inRandomOrder()->first()) {
                    return $school->id;
                }
            },
            'app_keys'=> $this->faker->randomNumber(8),
            'app_secret'=> $this->faker->randomNumber(8),
            'username'=> $this->faker->userName,
            'password'=> $this->faker->password,
            'merchant_id'=> $this->faker->randomNumber(5),
            'paymentGateway'=> "SSL",
            'amount'=>300,
        ];
    }
}
