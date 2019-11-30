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
        
        $produto = $request->input('query');
        $getProduto = Produto::where("nome","LIKE", "%{$produto}%")->get();
       
        $data = Produto::select("nome")
        ->where("nome","LIKE","%{$request->input('query')}%")
        ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
         $output .= '
         <li class="produto"><a href="#">'.$row->nome.'</a></li>
         ';
        }
        $output .= '</ul>';
        return response()->json($output);
        /*
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($getProduto as $row)
        {
         $output .= '
         <li><a href="#">'.$row->nome.'</a></li>
         ';
        }
        $output .= '</ul>';

        return response()->json($output);*/
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
