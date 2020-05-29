<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id('id_func');
            $table->bigInteger('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id_cargo')->on('cargo')->delete('cascade');
            
            $table->bigInteger('id_local')->unsigned();
            $table->foreign('id_local')->references('id_local')->on('local')->delete('cascade');

            $table->string('nome_func');
            $table->string('CPF');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
