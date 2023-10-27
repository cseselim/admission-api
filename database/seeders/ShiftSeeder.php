<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shift = [
            [
                'name' => 'Day',
                'code' => '6001',
            ],
            [
                'name' => 'Morning',
                'code' => '6002',
            ],
            [
                'name' => 'Evening',
                'code' => '6003',
            ],
       ];

       foreach ($shift as $value) {
           Shift::create($value);
       }
    }
}
