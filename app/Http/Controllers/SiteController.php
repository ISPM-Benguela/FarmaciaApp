<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Auth;
use App\Carrinho;


class SiteController extends Controller
{

    public function index(){
        
        return view('site.index')->with([
            'produtos' => Produto::where('stock', '>', 1)->orderBy('id', 'asc')->take(6)->get(),
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count()
        ]);
    
    }

    public function contactos(){
        return view('site.contacto')->with([
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count()
        ]);
    }

    public function loja(){
        return view('site.loja')->with([
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count()
        ]);
    }
    public function produto($id){
        return view('site.produto')->with([
            'produto' => Produto::findOrFail($id),
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count()
        ]);
    }
    public function carrinho(){

        $carrinho =  Carrinho::where('user_id', @Auth::user()->id)->get();
        $total = 0;
        foreach($carrinho as $item){
            $total += ($item->preco * $item->quantidade);
        }

        return view('site.carrinho')->with([
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count(),
            'meu_carrinho' => $carrinho,
            'total' => $total
        ]);
    }
}
