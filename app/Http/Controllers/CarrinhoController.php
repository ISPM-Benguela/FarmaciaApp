<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Carrinho;
use Auth;
use App\Venda;

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

      if($quantidade > $produto->stock){
        return redirect()->route('site.index')->with('success', "A quantidade do stock e inferior");
      }

      if( $quantidade > $produto->stock){
         return redirect()->route('carrinho')->with('success', 'A quantidade inferior');
      }

      foreach($check as $item){
        if($item->produto == $produto->nome){
          return redirect()->route('site.index')->with('success', 'Produto ja esta no carrinho');
        }
      }

      if(Auth::user()){
        $carrinho = Carrinho::create([
            'user_id' => Auth::user()->id,
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
         return redirect()->route('carrinho')->with('success', 'Testando');
       }
       $carrinho->quantidade = $quantidade;
       $carrinho->save();
       return redirect()->route('carrinho');
    }
    public function carrinhoEliminar($id){
      $carrinho =  Carrinho::find($id);
      $produto = Produto::where('nome', $carrinho->produto)->first();
      $produto->stock += $carrinho->quantidade;
      $produto->save();
    
      $carrinho->delete();
      return redirect()->back();
    }

    public function carrinhoFinalizar(){

      $p = Carrinho::where('user_id', Auth::user()->id)->first();
      $carrinho = Carrinho::where('user_id', Auth::user()->id)->get();
      $produto = Produto::where('nome', $p->produto)->first();
      $total = 0;
      foreach($carrinho as $item){
        /*
        $venda = Venda::create([
          'user_id' => Auth::user()->id,
          'produto_id' => $produto->id,
          'quantidade' => $item->quantidade,
        ]);*/
        $total += ($item->preco * $item->quantidade);

        //$item->delete();
      }

       return view('site.imprimir')->with([
          'total' =>  $total,
          'cliente' => Auth::user(),
          'itemsVenda' => Carrinho::where('user_id', Auth::user()->id)->get()
       ]);
     
    }
    public function fecharCarrinho(){
      foreach(Carrinho::where('user_id', Auth::user()->id)->get() as $item){
        $item->delete();
     }

    return response()->json(['success' => true]);
    }
}
