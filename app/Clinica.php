<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'regional',
        'data_inauguracao',
        'ativa',
        'especialidades',
    ];

    protected $casts = [
        'ativa' => 'boolean',
        'data_inauguracao' => 'date',
        'especialidades' => 'array',
    ];  
}
