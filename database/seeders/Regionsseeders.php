<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Regionsseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'idRegion' => 1,
            'idCountry' => "EC",
            'name' => "Costa",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('regions')->insert([
            'idRegion' => 2,
            'idCountry' => "EC",
            'name' => "Sierra",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('regions')->insert([
            'idRegion' => 3,
            'idCountry' => "EC",
            'name' => "Guayaquil",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('regions')->insert([
            'idRegion' => 4,
            'idCountry' => "EC",
            'name' => "Quito",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
