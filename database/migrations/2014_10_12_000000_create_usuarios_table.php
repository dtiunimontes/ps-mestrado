<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration{

    public function up(){
        Schema::create('usuarios', function(Blueprint $table){
            $table->increments('id');
            // DADOS PESSOAIS
            $table->string('nome', 100);
            $table->string('pai', 100)->nullable();
            $table->string('mae', 100)->nullable();
            $table->string('nacionalidade', 30)->nullable();
            $table->string('naturalidade', 30)->nullable();
            $table->string('uf', 5)->nullable();
            $table->enum('sexo', ['MASCULINO', 'FEMININO'])->nullable();
            $table->string('estado_civil', 30)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('password');
            $table->string('cpf', 11)->unique();
            $table->string('rg', 20)->unique()->nullable();
            $table->date('emissao_rg')->nullable();
            $table->string('org_exped', 20)->nullable();
            $table->date('data_nasc')->nullable();
            // CONTATO
            $table->string('telefone_residencial', 20)->nullable();
            $table->string('celular', 20)->nullable();
            // ENDEREÇO
            $table->integer('cep')->nullable();
            $table->string('logradouro', 80)->nullable();
            $table->string('numero', 25)->nullable();
  			$table->string('complemento', 40)->nullable();
  			$table->string('cidade', 100)->nullable();
  			$table->string('bairro', 100)->nullable();
            $table->string('estado', 2)->nullable();
            // FORMAÇÃO ACADÊMICA
            $table->string('curso_graduacao', 60)->nullable();
            $table->string('modalidade', 40)->nullable();
            $table->string('instituicao', 80)->nullable();
            $table->string('semestre_ano_graduacao', 7)->nullable();
            $table->string('cidade_graduacao', 100)->nullable();
            $table->string('uf_graduacao', 100)->nullable();
            $table->enum('necessidades_especiais', ['SIM', 'NÃO'])->nullable();
            $table->string('nome_necessidade_especial', 50)->nullable();
            $table->text('possiveis_orientadores')->nullable();
            $table->integer('permissao')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(){
        Schema::dropIfExists('usuarios');
    }
}
