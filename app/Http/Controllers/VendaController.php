<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use Auth;
use App\ItemsVenda;
use App\Venda;

class VendaController extends Controller
{
    public function balcao(){
        $total = 0;

        foreach(ItemsVenda::all() as $item){
           $total += $item->preco * $item->quantidade;
        }
        
        return view('vendas.balcao')->with([
            'itemsVenda' => ItemsVenda::where('vendido', 0)->get(),
            'total' => @$total
        ]);
    }
    public function vender(Request $request){

        
        $cliente = $request->input('cliente');
        $produto = $request->input('produtos');
        $quantidade = $request->input('quantidade');
        
        $getProduto = Produto::where("nome", $produto)->first();
        $getCliente = User::where("name", "=", $cliente)->first();
        // adcionar item devendas

        try {
            $itemVendas = ItemsVenda::create([
                'user_id' => $getCliente->id,
                'produto_id' => $getProduto->id,
                'produto' => $getProduto->nome,
                'preco' => $getProduto->preco,
                'quantidade' => $quantidade
            ]);
            /*
            $itemVendas->user_id = $getCliente->id;
            $itemVendas->produto = $getProduto->nome;
            $itemVendas->preco = $getProduto->preco;
            $itemVendas->quantidade = $quantidade;
            $itemVendas->save();*/
            return redirect()->route('venda.balcao')->with('success','Item adicionado.');

        return response()->json($itemVendas);
        } catch (Exception $e){
            return redirect()->route('venda.balcao')->with('error','Nao foi possivel');
        }
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
    public function eliminarItem($id){
        $getProduto = ItemsVenda::findOrFail($id); 
        $getProduto->delete();

        return redirect()->route('venda.balcao')
            ->with('error',
             'Item eliminado');
    }
    public function editarItem($id){
        $getProduto = ItemsVenda::findOrFail($id);
        return view('vendas.editaritem')->with([
            'item' => $getProduto
        ]);
    }
    public function itemActualizar(Request $request){
        $getProduto = ItemsVenda::findOrFail($request->input('produto'));
        $getProduto->quantidade = $request->input('quantidade');
        $getProduto->save();
        return redirect()->route('venda.balcao')
            ->with('success',
             'Item actualizado com sucesso');
    }
    public function cancelarVenda(){

        foreach(ItemsVenda::all() as $items){
            $items->delete();
        }
        return redirect()->route('venda.balcao')->with('error','Venda cancelada com sucesso');
    }
    public function finalizarVenda(Request $request){
      
        $cliente = ItemsVenda::where('vendido', 1)->first();
        
        $items = ItemsVenda::all();
        $total = 0;
        $troco = 0;
        $valor = $request->input('valor');

        foreach(ItemsVenda::all() as $item){
           $total += $item->preco * $item->quantidade;
        }
        if(empty($valor)){
            return redirect()->route('venda.balcao')->with('error',"É obrigatorio informar o valor da compra."); 
        } 

        if($total > $valor){
            return redirect()->route('venda.balcao')->with('error',"O valor dado é inferior, o valor certo é $total Kz");
        }
        $troco = $valor - $total;
        foreach($items as $item){

           $venda = Venda::create([
               'user_id' => $item->user_id,
               'produto_id' => $item->produto_id,
               'quantidade' => $item->quantidade,
               'valor' => $valor
           ]);
        }
        foreach(ItemsVenda::all() as $item){
            $item->vendido = 1;
            $item->save();
         }

        return view('faturas.item')->with([
            'total' => $total,
            'cliente' => $cliente,
            'itemsVenda' => ItemsVenda::where('imprimir', 0)->get(),
            'valor' => $valor,
            'troco' => $troco
        ]);
    }

    public function faturaItem(){
        $total = 0;

        foreach(ItemsVenda::all() as $item){
           $total += $item->preco * $item->quantidade;
        }
        $cliente = ItemsVenda::find(1)->first();
       
        $venda = Venda::where('user_id', $cliente->id)->first();
        return $venda;


        return view('faturas.item')->with([
            'total' => $total,
            'cliente' => $cliente,
            'itemsVenda' => ItemsVenda::all(),
        ]);
    }
    public function imprimirFatura(Request $request){
        foreach(ItemsVenda::all() as $item){
            $item->imprimir = 1;
            $item->save();
         }

        return response()->json(['success' => true]);
    }
}
