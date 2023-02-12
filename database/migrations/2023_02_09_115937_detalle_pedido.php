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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->bigInteger('imagen')->nullable()->unsigned();

            $table->integer('cantidad');
            $table->integer('precio');
            $table->string('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete("cascade");
            $table->foreign('imagen')->references('id')->on('figuras')->onDelete("cascade");
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete("cascade");
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
