<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class SiteController extends Controller
{
    public function index(){
        
        return view('site.index')->with([
            'produtos' => Produto::where('stock', '>', 1)->orderBy('id', 'asc')->take(6)->get()
        ]);
    
    }

    public function contactos(){
        return view('site.contacto');
    }

    public function loja(){
        return view('site.loja');
    }
    public function produto($id){
        return view('site.produto')->with([
            'produto' => Produto::findOrFail($id)
        ]);
    }
    public function carrinho(){
        return view('site.carrinho');
    }
}
