<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Carrinho;
use Auth;

class CarrinhoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function carrinho(Request $request, $id){
      $quantidade =  $request->input('quantidade');
      $produto = Produto::find($id);

      if(Auth::user()){
        $carrinho = Carrinho::create([
            'user_id' => Auth::user()->id,
            'produto_id' => $produto->id,
            'quantidade' => $quantidade
        ]);
  
        return redirect()->route('site.index')->with('success', 'Produto adicionaro ao carrinho');
      }else {
          return "Nao estas logado";
      }
    }
}
