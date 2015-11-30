<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaInciso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inciso', function (Blueprint $table) {
            $table->increments('idInciso');
            $table->string('Contenido');
            $table->integer('idPregunta');
            $table->integer('Orden');
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
        Schema::drop('inciso');
    }
}
