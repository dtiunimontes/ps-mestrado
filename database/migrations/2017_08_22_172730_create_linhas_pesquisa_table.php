<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinhasPesquisaTable extends Migration{

    public function up(){
        Schema::create('linhas_pesquisa', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome', 150);
            $table->integer('vagas_disponiveis')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('linhas_pesquisa');
    }
}
