<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'departamento'
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
}
