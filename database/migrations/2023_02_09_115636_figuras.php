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
        Schema::create('figuras', function (Blueprint $table) {
            $table->id();
            $table->string('etiqueta');
            $table->string('imagen');
            $table->integer('estado')->default(1);
            $table->bigInteger('id_cliente')->unsigned();
            $table->timestamps();
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
