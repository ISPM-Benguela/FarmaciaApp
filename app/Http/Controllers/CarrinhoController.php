<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class CarrinhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function carrinho($id){
        try {
           return Produto::findOrFail($id);
        } catch(Excepion $e){
            return "Nao achamos";
        }
    }
}
