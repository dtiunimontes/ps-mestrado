<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model{

    protected $table = 'configs';
    protected $fillable = [
        'inicio_inscricoes',
        'termino_inscricoes',
    ];
}
