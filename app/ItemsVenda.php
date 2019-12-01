<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsVenda extends Model
{
    protected $fillable = [
        'user_id',
        'produto_id',
        'produto',
        'preco',
        'quantidade'
    ];
    public function user(){
        return $this->belongsTo("App\User");
    }
}
