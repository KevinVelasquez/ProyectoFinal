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
        
Schema::create('pedidos', function (Blueprint $table) {
    $table->id();
    $table->bigInteger('id_cliente')->unsigned();
    $table->bigInteger('id_municipio')->unsigned();
    $table->bigInteger('id_metodo_entrega')->unsigned();
    $table->bigInteger('id_metodo_pago')->unsigned();

    $table->string('direccion');
    $table->date('fecha_registro');
    $table->date('fecha_entrega');
    $table->integer('estado')->default(1);
    $table->integer('proceso')->default(0);
    $table->integer('abono');
    $table->integer('totalpedido');
    $table->timestamps();
    $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete("cascade");
    $table->foreign('id_metodo_entrega')->references('id')->on('metodo_entregas')->onDelete("cascade");
    $table->foreign('id_metodo_pago')->references('id')->on('metodo_pagos')->onDelete("cascade");
    $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete("cascade");

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
