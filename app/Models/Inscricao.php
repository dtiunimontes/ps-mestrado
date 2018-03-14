<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model{

    protected $table = 'inscricoes';
    protected $fillable = [
        'usuarios_id',
        'curso_id',
        'linha_pesquisa_id'
    ];
}
