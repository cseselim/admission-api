<?php

namespace Database\Seeders;

use App\Models\AdmissionNumber;
use App\Models\ApplicantPayment;
use App\Models\ApplicantStudent;
use App\Models\PaymentGatewayList;
use App\Models\User;
use App\Models\School;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
            ->has(StudentProfile::factory()->count(1))
        ->create();

        School::factory(5)->create();

        $this->call(VersionSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(ClassSeeder::class);

        AdmissionNumber::factory(10)->create();
        ApplicantStudent::factory(10)->create();
        ApplicantPayment::factory(10)->create();
        PaymentGatewayList::factory(1)->create();
    }
}
