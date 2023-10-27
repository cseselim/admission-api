<?php

namespace Database\Seeders;

use App\Models\Version;
use Illuminate\Database\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $versions = [
            [
                'name' => 'Bangla Version',
                'code' => '5001',
            ],
            [
                'name' => 'English Version',
                'code' => '5002',
            ],
            [
                'name' => 'English Medium',
                'code' => '5003',
            ],
       ];

       foreach ($versions as $value) {
           Version::create($value);
       }
    }
}
