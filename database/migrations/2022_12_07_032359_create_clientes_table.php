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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula')->unique();  
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->integer('estado')->default(1);

            $table->bigInteger('id_municipio')->unsigned();
            $table->bigInteger('tipo_persona')->unsigned();
            $table->bigInteger('regimen')->unsigned();
            $table->bigInteger('tipo_comercio')->unsigned();
            $table->timestamps();

            $table->foreign('id_municipio')->references('id')->on('municipios');
            $table->foreign('tipo_persona')->references('id')->on('tipo_persona');
            $table->foreign('regimen')->references('id')->on('regimen');
            $table->foreign('tipo_comercio')->references('id')->on('tipo_comercio');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
