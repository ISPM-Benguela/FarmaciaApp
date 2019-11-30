<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'marca',
        'imagem',
        'exp_data',
        'stock',
        'descricao', 
    ];
}
