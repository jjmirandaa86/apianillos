<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Countryseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'idCountry' => "EC",
            'name' => "Ecuador",
            'currency' => "USD",
            'simbol' => "$",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('countries')->insert([
            'idCountry' => "GT",
            'name' => "Guatemala",
            'currency' => "QZT",
            'simbol' => "Q",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('countries')->insert([
            'idCountry' => "US",
            'name' => "Estados Unidos",
            'currency' => "USD",
            'simbol' => "$",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
