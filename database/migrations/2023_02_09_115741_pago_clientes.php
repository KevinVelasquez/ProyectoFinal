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
        Schema::create('pago__clientes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('abono')->nullable();
            $table->integer('estado')->default(1);
            $table->bigInteger('id_medio_pago')->unsigned()->nullable();
            $table->bigInteger('id_pedido')->unsigned();

            $table->foreign('id_medio_pago')->references('id')->on('medio__pagos')->onDelete("cascade");
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
