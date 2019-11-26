<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = [
        'user_id',
        'produto_id',
        'quantidade'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function produtos(){
        return $this->hasMany('App\Produto');
    }

}
