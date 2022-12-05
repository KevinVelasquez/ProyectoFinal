
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
        Schema::create('pago_clientes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('abono');
            $table->bigInteger('id_medio_pago')->unsigned();
            $table->bigInteger('id_pedido')->unsigned();

            $table->foreign('id_medio_pago')->references('id')->on('medio_pagos')->onDelete("cascade");
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete("cascade");
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