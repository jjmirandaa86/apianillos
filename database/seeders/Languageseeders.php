<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Languageseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'idLanguage' => 1,
            'name' => "Español",
            'shortName' => "ES",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('languages')->insert([
            'idLanguage' => 2,
            'name' => "English",
            'shortName' => "EN",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('languages')->insert([
            'idLanguage' => 3,
            'name' => "Portugués",
            'shortName' => "PO",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
