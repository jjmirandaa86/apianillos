<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUser')->primary();
            $table->string('idOffice', 4)->nullable(false);
            $table->string('firtsName', 50)->nullable(false);
            $table->string('lastName', 50)->nullable(false);
            $table->string('position', 50)->nullable(false);
            $table->string('profile', 3)->nullable(false)->default('USR'); //USR Usuario ADM Administrador VIS Visualización
            $table->string('email', 40)->nullable(false)->unique();
            $table->string('password')->nullable();
            $table->string('api_token')->nullable(true)->comment('Token de conexion');
            $table->string('state', 1)->default('A');
            $table->timestamps();

            $table->foreign('idOffice')->references('idOffice')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

//C:\Ampps\www\apianillos