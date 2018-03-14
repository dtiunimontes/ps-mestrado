<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration{

    public function up(){
        Schema::create('configs', function(Blueprint $table){
            $table->increments('id');
            $table->dateTime('inicio_inscricoes');
            $table->dateTime('termino_inscricoes');
        });
    }

    public function down(){
        Schema::dropIfExists('configs');
    }
}
