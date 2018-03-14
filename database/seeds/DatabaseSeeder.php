<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    public function run(){

        DB::table('configs')->insert([
            'inicio_inscricoes' => '2017-11-20 08:00:00',
            'termino_inscricoes' => '2017-12-01 18:00:00'
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Fellipe Geraldo Pereira Botelho',
            'email' => 'fellipe.botelho@unimontes.br',
            'cpf' => '11122233344',
            'password' => bcrypt('5557975'),
            'permissao' => 2
        ]);

        DB::table('cursos')->insert([
            'nome' => 'MESTRADO PROFISSIONAL EM DESENVOLVIMENTO ECONÔMICO E ESTRATÉGIA EMPRESARIAL'
        ]);

        DB::table('linhas_pesquisa')->insert([
            'nome' => 'Desenvolvimento Econômico',
            'vagas_disponiveis' => '8',
            'curso_id' => 1
        ]);

        DB::table('linhas_pesquisa')->insert([
            'nome' => 'Estratégia e Finanças Empresariais',
            'vagas_disponiveis' => '7',
            'curso_id' => 1
        ]);
    }
}
