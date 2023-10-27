<?php

namespace Database\Seeders;

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

        /*===============school factory======*/
        School::factory(5)->create();

        $this->call(VersionSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(ClassSeeder::class);
    }
}
