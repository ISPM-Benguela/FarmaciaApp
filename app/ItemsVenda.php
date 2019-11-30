<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsVenda extends Model
{
    protected $fillable = [
        'user_id',
        'produto',
        'preco',
        'quantidade'
    ];
}
