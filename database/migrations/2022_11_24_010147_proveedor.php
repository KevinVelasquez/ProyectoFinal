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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->integer('cedula')->unique();  
            $table->string('nombre');
            $table->string('telefono');
            $table->string('pais');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->integer('estado')->default(1);
            $table->bigInteger('tipo_persona')->unsigned();
            $table->bigInteger('regimen')->unsigned();
            $table->bigInteger('tipo_comercio')->unsigned();
            $table->timestamps();
            $table->foreign('tipo_persona')->references('id')->on('tipo_persona')->onDelete("cascade");
            $table->foreign('regimen')->references('id')->on('regimen')->onDelete("cascade");
            $table->foreign('tipo_comercio')->references('id')->on('tipo_comercio')->onDelete("cascade");

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
