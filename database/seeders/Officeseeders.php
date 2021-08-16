<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Officeseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            'idOffice' => "ES01",
            'idRegion' => 3,
            'name' => "Guayaquil Norte",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES02",
            'idRegion' => 3,
            'name' => "Guayaquil Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES07",
            'idRegion' => 3,
            'name' => "Guayaquil Norte Especiales",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES26",
            'idRegion' => 1,
            'name' => "Manta",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES27",
            'idRegion' => 1,
            'name' => "Portoviejo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES30",
            'idRegion' => 2,
            'name' => "Ambato",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES64",
            'idRegion' => 3,
            'name' => "Guayaquil Botellon",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "AGYE",
            'idRegion' => 3,
            'name' => "Administrativo Guayaquil",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('offices')->insert([
            'idOffice' => "ES10",
            'idRegion' => 4,
            'name' => "Quito Sur",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
