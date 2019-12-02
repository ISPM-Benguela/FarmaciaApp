<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Auth;
use App\Carrinho;
use DB;

class SiteController extends Controller
{

    public function index(){
        
        $paginacao = DB::table('produtos')->orderBy('created_at', 'desc')->paginate(6);
        
        return view('site.index')->with([
            'produtos' => Produto::where('stock', '>', 1)->orderBy('id', 'asc')->take(6)->get(),
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count(),
            "destacados" => $paginacao
        ]);
    
    }

    public function contactos(){
        return view('site.contacto')->with([
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count()
        ]);
    }

    public function loja(){
        return view('site.loja')->with([
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count(),
            'produtos' => Produto::all()
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
