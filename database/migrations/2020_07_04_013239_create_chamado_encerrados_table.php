<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadoEncerradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado_encerrado', function (Blueprint $table) {
            $table->id('id_cha_enc');

            $table->bigInteger('id_chamado')->unsigned();
            $table->foreign('id_chamado')->references('id_chamado')->on('chamado')->delete('cascade');
            
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
        Schema::dropIfExists('chamado_encerrado');
    }
}
