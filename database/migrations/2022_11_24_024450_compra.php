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
            $table->bigIncrements('id');
            $table->string('n_orden');
            $table->date('fecha_compra');
            $table->integer('cantidad');
            $table->integer('precio_unitario');
            $table->integer('total');
            $table->integer('estado')->default(1);
            $table->bigInteger('id_proveedor')->unsigned();
            $table->bigInteger('id_insumo')->unsigned();
            $table->bigInteger('id_metodo_pago')->unsigned();
            $table->foreign('id_insumo')->references('id')->on('insumos');
            $table->foreign('id_proveedor')->references('id')->on('proveedors');
            $table->foreign('id_metodo_pago')->references('id')->on('metodo_pagos');
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
