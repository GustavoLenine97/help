<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamado', function (Blueprint $table) {
            $table->id('id_chamado');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->delete('cascade');
            
            $table->bigInteger('id_cat')->unsigned();
            $table->foreign('id_cat')->references('CodigoCategoria')->on('Categoria')->delete('cascade');
            
            $table->bigInteger('id_subcat')->unsigned();
            $table->foreign('id_subcat')->references('CodigoSubCategoria')->on('SubCategoria')->delete('cascade');
            
            $table->text('descricao');
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
        Schema::dropIfExists('chamado');
    }
}
