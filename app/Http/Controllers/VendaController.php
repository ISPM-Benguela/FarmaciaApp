<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use Auth;

class VendaController extends Controller
{
    public function balcao(){
        return view('vendas.balcao');
    }
    public function vender(Request $request){
        $cliente = $request->input('cliente');
        $produto = $request->input('produto');
        $funcionario = Auth::user()->id;
        $quantidade = $request->input('quantidade');

        $getCliente = User::where("name","LIKE", "%{$cliente}%")->get();
        return "$getCliente";
    }
    public function pesquisaCliente(Request $request){
        $cliente = $request->input('cliente');
        $getCliente = User::where("name","LIKE", "%{$cliente}%")->get();
        return response()->json($getCliente);
    }
}
