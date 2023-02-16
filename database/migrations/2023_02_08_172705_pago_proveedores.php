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
        Schema::create('pago_proveedores', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('abono');
            $table->integer('estado')->default(1);
            $table->bigInteger('id_medio_pagos')->unsigned();
            $table->bigInteger('id_compra')->unsigned();

            $table->foreign('id_medio_pagos')->references('id')->on('medio_pagos');
            $table->foreign('id_compra')->references('id')->on('compra');
            $table->timestamps();

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
