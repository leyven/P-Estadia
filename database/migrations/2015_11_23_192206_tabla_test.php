<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->increments('idTest');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->integer('NumeroPreguntas');
            $table->integer('IncisosEnPreguntas');
            $table->integer('TipoTest');
            $table->integer('Categorias');
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
        Schema::drop('test');
    }
}
