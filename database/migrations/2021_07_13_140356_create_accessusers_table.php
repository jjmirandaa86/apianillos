<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessusers', function (Blueprint $table) {
            $table->id('idUser')
                ->primary()
                ->comment('User Primary Key');
            $table->macAddress('macAddress')
                ->comment('Mac Address desde donde se conecto');
            $table->ipAddress('ipAddress')
                ->comment('IP desde donde se conecto');
            $table->timestamps();

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
        Schema::dropIfExists('accessusers');
    }
}
