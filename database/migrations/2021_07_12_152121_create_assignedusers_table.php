<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignedusers', function (Blueprint $table) {
            $table->id()
                ->comment('Cupo Primary Key, asignado del usuario');
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Country Primary Key');
            $table->unsignedBigInteger('idUser')
                ->nullable(false)
                ->comment('USer Primary Key');
            $table->integer('year')
                ->comment('Año de la asignación');
            $table->integer('month')
                ->comment('Mes de la asignación');
            $table->double('amount', 8, 2)
                ->nullable(false)
                ->comment('Monto total a gastar en el mes');
            $table->string('state', 1)
                ->default('A')
                ->comment('A Activo P Pasivo');
            $table->timestamps();

            $table->foreign('idCountry')->references('idCountry')->on('countries');
            $table->foreign('idUser')->references('idUser')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignedusers');
    }
}
