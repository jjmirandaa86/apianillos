<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeentries', function (Blueprint $table) {
            $table->id('idTypeEntry')
                ->primary()
                ->comment('Tipos de Gastos Primary Key');
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Country Primary Key');
            $table->string('name', 30)
                ->nullable(false)
                ->comment('Nombre del Gasto');
            $table->string('state', 1)
                ->default('A')
                ->comment('A Activo P Pasivo');
            $table->timestamps();

            $table->foreign('idCountry')->references('idCountry')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typeentries');
    }
}
