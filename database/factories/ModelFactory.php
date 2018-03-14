<?php

$factory->define(App\Models\Usuario::class, function(Faker\Generator $faker){
    static $password;

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'pai' => $faker->name,
        'mae' => $faker->name,
        'nacionalidade' => $faker->name,
        'naturalidade' => $faker->name,
        'uf' => 'MG',
        'sexo' => 'MASCULINO',
        'estado_civil' => 'Solteiro',
        'cpf' => substr($faker->unique()->name, 0, 11),
        'rg' => substr($faker->unique()->name, 0, 11),
        'emissao_rg' => '2000-01-01',
        'org_exped' => 'SSP/MG',
        'data_nasc' => '2000-01-01',
        'telefone_residencial' => $faker->e164PhoneNumber,
        'celular' => $faker->tollFreePhoneNumber,
        'cep' => '39400496',
        'logradouro' => $faker->name,
        'numero' => '1A',
        'complemento' => $faker->name,
        'cidade' => $faker->name,
        'bairro' => $faker->name,
        'estado' =>  substr($faker->name, 0, 1),
        'curso_graduacao' => $faker->name,
        'modalidade' => $faker->name,
        'instituicao' => $faker->name,
        'semestre_ano_graduacao' => '01/2019',
        'cidade_graduacao' => $faker->name,
        'uf_graduacao' => $faker->name,
        'necessidades_especiais' => 'Não',
        'nome_necessidade_especial' => $faker->name,
        'possiveis_orientadores' => $faker->name,
    ];
});
