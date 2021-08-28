<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Country Primary Key');
            $table->string('tableReference', 20)->nullable(false);
            $table->string('value', 1)->nullable(false);
            $table->string('name', 30)->nullable(false);
            $table->string('state', 1)->default('A'); //A o I (o more)
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
        Schema::dropIfExists('states');
    }
}
