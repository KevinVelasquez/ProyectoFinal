<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->integer('n_orden')->unique();
            $table->date('fecha_compra');
            $table->integer('total');
            $table->integer('estado')->default(1);
            $table->integer('anulado')->default(0);

            $table->bigInteger('id_proveedor')->unsigned();
            $table->bigInteger('id_metodo_pagos')->unsigned();
            $table->timestamps();
            $table->foreign('id_proveedor')->references('id')->on('proveedors');
            $table->foreign('id_metodo_pagos')->references('id')->on('metodo__pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
