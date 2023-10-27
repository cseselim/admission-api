<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'Six',
                'code' => '666',
            ],
            [
                'name' => 'Seven',
                'code' => '777',
            ],
            [
                'name' => 'Eight',
                'code' => '888',
            ],
            [
                'name' => 'Nine',
                'code' => '999',
            ],
       ];

       foreach ($classes as $value) {
           Classes::create($value);
       }
    }
}
