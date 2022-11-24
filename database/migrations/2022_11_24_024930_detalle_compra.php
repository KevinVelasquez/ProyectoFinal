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
            $table->string('cantidad');
            $table->date('valor_unitario');
            $table->integer('valor_total');
            $table->bigInteger('id_orden_compra')->unsigned();
            $table->bigInteger('id_insumo')->unsigned();
            $table->foreign('id_insumo')->references('id')->on('insumos')->onDelete("cascade");
            $table->foreign('id_orden_compra')->references('id')->on('compras')->onDelete("cascade");
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
