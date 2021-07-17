<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('idExpense')
                ->primary()
                ->comment('Gastos Primary Key');
            $table->string('idCountry', 2)
                ->nullable(false)
                ->comment('Country Primary Key');
            $table->unsignedBigInteger('idUser')
                ->nullable(false)
                ->comment('User Primary Key');
            $table->unsignedBigInteger('idTypeEntry')
                ->nullable(false)
                ->comment('Type Entry Primary Key');
            $table->string('idSupplier', 13)
                ->nullable(false)
                ->comment('Ruc Cedula factura');
            $table->string('nameSupplier', 50)
                ->nullable(false)
                ->comment('Nombre Factura');
            $table->string('serieInvoice', 20)
                ->nullable(false)
                ->comment('Serie Factura');
            $table->date('dateInvoice')
                ->comment('Fecha Factura');
            $table->double('amount', 8, 2)
                ->nullable(false)
                ->comment('Monto de la factura');
            $table->string('image', 100)
                ->nullable(false)
                ->comment('Ruta de Imagen Servidor');
            $table->string('state', 1)
                ->default('I')
                ->comment('I Ingresada, A Aprobada D Devuelta');
            $table->timestamps();

            $table->foreign('idCountry')->references('idCountry')->on('countries');
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idTypeEntry')->references('idTypeEntry')->on('typeentries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
