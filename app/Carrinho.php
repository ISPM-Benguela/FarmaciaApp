<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = [
        'user_id',
        'produto',
        'quantidade',
        'quantidade'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
   

}
