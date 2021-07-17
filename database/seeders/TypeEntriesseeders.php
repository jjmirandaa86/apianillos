<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeEntriesseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeentries')->insert([
            'idTypeEntry' => 1,
            'idCountry' => "EC",
            'name' => "Combustible Vehículos Emp",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('typeentries')->insert([
            'idTypeEntry' => 2,
            'idCountry' => "EC",
            'name' => "Deprec Vehículo Empleado",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('typeentries')->insert([
            'idTypeEntry' => 3,
            'idCountry' => "EC",
            'name' => "Reembolso Alimentacion Q2",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('typeentries')->insert([
            'idTypeEntry' => 4,
            'idCountry' => "EC",
            'name' => "Reembolso Movilizacion Q2",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
