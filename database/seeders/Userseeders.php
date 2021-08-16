<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Userseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'idUser' => 500000,
            'idOffice' => "AGYE",
            'firtsName' => "GENERICO",
            'lastName' => "GENERICO",
            'position' => "ANALISTA DE G&G",
            'email' => "generico@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 500857,
            'idOffice' => "AGYE",
            'firtsName' => "Jefferson",
            'lastName' => "Miranda",
            'position' => "IT",
            'profile' => "ADM",
            'email' => "jmiranda@cbc.co",
            'password' => ".",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 500568,
            'idOffice' => "ES01",
            'firtsName' => "ADBRUSHKING ADALBERT",
            'lastName' => "GALLEGOS ANGULO",
            'position' => "GERENTE VENTAS GUAYAQUIL",
            'email' => "agallegos@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 503782,
            'idOffice' => "ES26",
            'firtsName' => "FRANCISCO DAVID",
            'lastName' => "AVALOS ARIAS",
            'position' => "GERENTE DE VENTAS COSTA",
            'email' => "favalos@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 503986,
            'idOffice' => "ES30",
            'firtsName' => "MARTIN DARIO",
            'lastName' => "MORALES GRANDA",
            'position' => "GERENTE DE VENTAS SIERRA",
            'email' => "mgranda@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 504021,
            'idOffice' => "ES64",
            'firtsName' => "EDUARDO ANDRES",
            'lastName' => "VASCONES LUQUE",
            'position' => "FRANCHISE MANAGER BOTELLON",
            'email' => "evascones@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 504232,
            'idOffice' => "AGYE",
            'firtsName' => "DAVID EDUARDO",
            'lastName' => "NAVA CUENCA",
            'position' => "GERENTE CAPABILITY",
            'email' => "dnava@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'idUser' => 505646,
            'idOffice' => "ES10",
            'firtsName' => "ANGEL ORLANDO",
            'lastName' => "ALVAREZ HERRERA",
            'position' => "GERENTE VENTAS QUITO",
            'email' => "aalvarez@cbc.co",
            'password' => "12345",
            'state' => "A",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
