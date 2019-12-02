<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\User;

class VendaOnlineController extends Controller
{
    public function index(){
        $vendas = Venda::where('terminou', 0)->get();
        return view('vendas.online')->with([
            'vendas' => $vendas
        ]);
    }
    public function teminarVenda(Request $request, $id){

        $cliente = User::find($id);
        $venda = Venda::where('user_id', $id)->get();
        $valor = $request->input('valor');
        $total = 0;

        foreach($venda as $item){
            $total += $item->produto['preco'] * $item->quantidade;
        }
        
        if(empty($valor)){
            return redirect()->back()->with('error', 'O campo valor nao pode estar vazio');
        }
        if($total > $valor){
            return redirect()->back()->with('error', 'O valor dado pelo cliente é inferior');
        }
        foreach($venda as $item){
            $item->terminou = 1;
            $item->save();
        }
        return view('faturas.online_print')->with([
            'total' => $total,
            'valor' => $valor,
            'cliente' => $cliente,
            'itemsVenda' => $venda,
        ]);
    }
    public function fecharVenda(Request $request, $id){
        //$vendas = Venda::where('user_id', $id)->get();
        return response()->json(['success' => $id]);
    }
}
