<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'name',
        'price',
        'brand',
        'image',
        'exp_data',
        'stock',
        'description', 
    ];
}
