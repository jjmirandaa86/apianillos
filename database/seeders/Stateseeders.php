<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Stateseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //*********************************** */
        //********* typeentries ************* */
        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "typeentries",
            'value' => "I",
            'name' => "Inactivo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "typeentries",
            'value' => "A",
            'name' => "Activo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //*********************************** */
        //************** Users ************* */
        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "users",
            'value' => "I",
            'name' => "Inactivo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "users",
            'value' => "A",
            'name' => "Activo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //*********************************** */
        //************** regions ************* */
        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "regions",
            'value' => "I",
            'name' => "Inactivo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "regions",
            'value' => "A",
            'name' => "Activo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //*********************************** */
        //************** offices ************* */
        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "offices",
            'value' => "I",
            'name' => "Inactivo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "offices",
            'value' => "A",
            'name' => "Activo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //*********************************** */
        //************** languages ************* */
        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "languages",
            'value' => "I",
            'name' => "Inactivo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "languages",
            'value' => "A",
            'name' => "Activo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //*********************************** */
        //********* typeentries ************* */

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "expenses",
            'value' => "A",
            'name' => "Aprobado",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "expenses",
            'value' => "N",
            'name' => "Negado",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "expenses",
            'value' => "I",
            'name' => "Ingresado",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //*********************************** */
        //************** countries ************* */
        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "countries",
            'value' => "I",
            'name' => "Inactivo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('states')->insert([
            'idCountry' => "EC",
            'tableReference' => "countries",
            'value' => "A",
            'name' => "Activo",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
