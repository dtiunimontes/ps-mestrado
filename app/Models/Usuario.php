<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable{

    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'pai',
        'mae',
        'nacionalidade',
        'naturalidade',
        'uf',
        'sexo',
        'estado_civil',
        'email',
        'password',
        'cpf',
        'rg',
        'emissao_rg',
        'org_exped',
        'data_nasc',
        'telefone_residencial',
        'celular',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'cidade',
        'bairro',
        'estado',
        'curso_graduacao',
        'modalidade',
        'instituicao',
        'semestre_ano_graduacao',
        'cidade_graduacao',
        'uf_graduacao',
        'necessidades_especiais',
        'nome_necessidade_especial',
        'possiveis_orientadores',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
