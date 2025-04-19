<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        // First create a state
        $stateId = DB::table('states')->insertGetId([
            'state_name' => 'Default State',
            'isactive' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Then create a city
        DB::table('cities')->insert([
            'city_name' => 'Default City',
            'state_id' => $stateId,
            'isactive' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
