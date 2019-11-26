<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtos.index')->with([
            'produtos' => Produto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nomeFile = null;
        $upload = null;

        $this->validate($request, [
            'name' => 'required|unique:produtos',
            'description' => 'required',
            'image' => 'required|image',
            'exp_data' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'stock' => 'required',
        ]);
       
         $imagem = $request->file('image');
         $upload =  $request->file('image')->getClientOriginalName();
         $file = $imagem->move('produtos', $upload);
         
        $produto = Produto::create([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'image' => $file,
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'exp_data' => $request->input('exp_data')
        ]);

        return redirect()->route('produto.index')->with('success','Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

       
        return view('produtos.edit')->with([
            'produto' => $produto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $file = "";
        $image = "";
        $name = "";
        $data = null;
        $brand = "";
        $price = "";
        $stock = "";
        $description = "";

        $produto = Produto::find($id);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
        } else {
            $file = $produto->image;
        }
        if(!$request->input('price')){
            $price = $produto->price;
        } else {
            $price = $request->input('price');
        }

        if(!$request->input('brand')){
            $brand = $produto->brand;
        } else {
            $brand = $request->input('brand');
        }
       
        $produto->name = $request->input('name');
        $produto->image = $file;
        $produto->price = $price;
        $produto->brand = $brand;
        $produto->save();

        return redirect()->back();

       
        $file = "";
        $image = "";
        $name = "";
        $data = null;
        $brand = "";
        $price = "";
        $stock = "";
        $description = "";
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
        } else {
            $file = $produto->image;
        }
        if($request->input('name')){

            $name = $request->input('name');
        } else {
            $name = $produto->name;
        }
        if($request->input('exp_data')){
            $data = $request->input('exp_data');
        } else {
            $data = $produto->exp_data;
        }
        if($request->input('price')){
            $brand = $request->input('price');
        } else {
            $brand = $produto->brand;
        }
        if($request->input('brand')){
            $brand = $request->input('brand');
        } else {
            $brand = $produto->brand;
        }
        if($request->input('stock')){
            $stock = $request->input('stock');
        } else {
            $stock = $produto->stock;
        }
        if($request->input('description')){
            $description = $request->input('description');
        } else {
            $description = $produto->description;
        }
        
        $produto->name = $name;
        $produto->image = $file;
        $produto->price = $price;
        $produto->brand = $brand;
        $produto->stock = $stock;
        $produto->description = $description;

        $produto->refresh();

        return redirect()->route('produto.edit')->with('success', 'Produto actualizado com sucess.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('produto.index')->with('error', 'Produto eliminado com sucesso.');
    }
}
