<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('site.index')->with('produto');
    }

    public function contactos(){
        return view('site.contacto');
    }

    public function loja(){
        return view('site.loja');
    }
    public function produto(){
        return view('site.produto');
    }
    public function carrinho(){
        return view('site.carrinho');
    }
}
