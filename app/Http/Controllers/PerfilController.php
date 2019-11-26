<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrinho;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }
    public function perfilCliente(){

        return view('site.perfil')->with([
            'carrinho_conta' => Carrinho::where('user_id', @Auth::user()->id)->count(),
            'usuario' => User::find(Auth::user()->id)
        ]);
    }
    public function actualizar(Request $request){
        
        $usuario = User::find(Auth::user()->id);

        if($request->input('name')){
            $usuario->name = $request->input('name');
        }
        if($request->input('email')){
            $usuario->email = $request->input('email');
        }
        if($request->input('password')){
            $usuario->password = Hash::make($request->input('password'));
        }
        $usuario->save();
        return redirect()->back();
    }
}
