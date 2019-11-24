<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = [
        'user_id',
        'tipo',
        'imagem'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
