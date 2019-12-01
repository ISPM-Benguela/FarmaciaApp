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
      $check = Carrinho::all();



      if( $quantidade > $produto->stock){
        return "A quantidade do produto no stock e inferior";
      }

      foreach($check as $item){
        if($item->produto == $produto->nome){
          return "Este produto ja esta no carrinho";
        }
      }

      if(Auth::user()){
        $carrinho = Carrinho::create([
            'user_id' => Auth::user()->id,
            'produto_id' => $produto->id,
            'produto' => $produto->nome,
            'preco' => $produto->preco,
            'quantidade' => $quantidade
        ]);

        $produto->stock -= $quantidade;
        $produto->save();
       
        return redirect()->route('site.index')->with('success', 'Produto adicionaro ao carrinho');
      }else {
          return "Nao estas logado";
      }
    }
    public function carrinhoActualizar($id){
      $carrinho = Carrinho::find($id);

      return view('site.update')->with([
        'produto' => Produto::where('nome', $carrinho->produto)->first(),
        'carrinho' => Carrinho::find($id),
        'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count()
    ]);
    }
    public function carrinhoActualizarQuantidade(Request $request, $id){
       $carrinho = Carrinho::find($id);
       $produto = Produto::where('nome', $carrinho->produto)->first();
       $quantidade = $request->input('quantidade');
       if($quantidade > $produto->stock){
         return "A quantidade do stock e inferiro";
       }
       $carrinho->quantidade = $quantidade;
       $carrinho->save();
       return redirect()->route('carrinho');
    }
}
