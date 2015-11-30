<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('idCategoria');
            $table->string('NombreCategoria');
            $table->integer('idTest')->unsigned();
            $table->integer('NumeroDePreguntas');
            $table->integer('Orden');
            $table->timestamps();

            $table->foreign('idTest')
                  ->references('idTest')
                  ->on('test')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categoria');
    }
}
