<?php

namespace Database\Factories;

use App\Models\AdmissionNumber;
use App\Models\School;
use App\Models\Classes;
use App\Models\Shift;
use App\Models\StudentProfile;
use App\Models\User;
use App\Models\Version;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantStudentFactory extends Factory
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
            'parent_id' => function () {
                if ($users = User::inRandomOrder()->first()) {
                    return $users->id;
                }
            },
            'student_id' => function () {
                if ($studentProfile = StudentProfile::inRandomOrder()->first()) {
                    return $studentProfile->id;
                }
            },
            'school_id' => function () {
                if ($school = School::inRandomOrder()->first()) {
                    return $school->id;
                }
            },
            'class_id' => function () {
                if ($classes = Classes::inRandomOrder()->first()) {
                    return $classes->id;
                }
            },
            'admission_number' => $this->faker->randomNumber(5),
            'version_id' => function () {
                if ($version = Version::inRandomOrder()->first()) {
                    return $version->id;
                }
            },
            'shift_id' => function () {
                if ($shift = Shift::inRandomOrder()->first()) {
                    return $shift->id;
                }
            },
            'student_age' => $this->faker->randomNumber(2).'years',
            'session' => date('Y'),
            'transaction_id' => $this->faker->randomNumber(5),
            'payment_status' => 1,
        ];
    }
}
