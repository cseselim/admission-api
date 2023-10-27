<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = [
            [
                
            ],
       ];

       foreach ($school as $value) {
           School::create($value);
       }
    }
}
