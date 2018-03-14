<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration{

    public function up(){
        Schema::create('inscricoes', function(Blueprint $table){
            $table->increments('id');
            $table->integer('usuarios_id')->unsigned();
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->integer('linha_pesquisa_id')->unsigned();
            $table->foreign('linha_pesquisa_id')->references('id')->on('linhas_pesquisa')->onDelete('cascade');
            $table->unique(['usuarios_id', 'curso_id']);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('inscricoes');
    }
}
