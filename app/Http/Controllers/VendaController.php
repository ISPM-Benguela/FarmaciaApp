<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use Auth;
use App\ItemsVenda;

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


        return response()->json(['success' => 'success']);
    }
    public function pesquisaCliente(Request $request){
        $cliente = $request->input('cliente');
        
        $getCliente = User::where("name","LIKE", "%{$cliente}%")->get();

        return response()->json($getCliente);
    }
    public function pesquisaProduto(Request $request){
        $produto = $request->input('produto');
        $getProduto = Produto::where("nome","LIKE", "%{$produto}%")->get();

        return response()->json($getProduto);
    }
    public function presquisarPreco(Request $request){
        $produto = $request->input('produto');
        $getProduto = Produto::where("nome","LIKE", "%{$produto}%")->get();
        return response()->json(['success' => $getProduto]);
    }
    public function pesquisaTeste(Request $request){
        $getProduto = Produto::all();
        return response()->json($getProduto);
    }

    public function vendaDia(){
        return view('vendas.vendadia');
    }
    public function fecharVenda(){
        return view('vendas.fecharvenda');
    }
}
