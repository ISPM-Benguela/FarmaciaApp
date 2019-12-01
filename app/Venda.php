<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'user_id',
        'produto_id',
        'quantidade',
        'valor'
    ];

    public function produto(){
        return $this->belongsTo("App\Produto");
    }
}
