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
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->integer('valor_unitario');
            $table->bigInteger('id_orden_compra')->unsigned();
            $table->bigInteger('id_insumo')->unsigned();
            $table->foreign('id_insumo')->references('id')->on('insumos');
            $table->foreign('id_orden_compra')->references('id')->on('compra');
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
