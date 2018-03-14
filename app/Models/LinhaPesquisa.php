<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinhaPesquisa extends Model{
    
    protected $table = 'linhas_pesquisa';
    protected $fillable = ['nome', 'vagas_disponiveis', 'curso_id'];
}
