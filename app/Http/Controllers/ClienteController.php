<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Perfil;
use App\User;

class ClienteController extends Controller
{
    public function store(Request $request){
        $input = $request->input('name');
        $senha = "12345678";
        $email =  str_replace(' ', '', $input);
        $email = strtolower($email);

        if(empty($request->input('name'))){
            return response()->json(['error' => 'O campo nome nao pode estar vazio']);
        }
      
        $cliente = new User;
        $cliente->name = $input;
        $cliente->email = $email . "@gmail.com";
        $cliente->password = Hash::make($senha);
        $cliente->nivel = 3;

        $cliente->save();

        $perfil = new Perfil;
        $perfil->user_id = $cliente->id;
        $perfil->tipo = "Cliente";
        $perfil->save();

        return response()->json(['success'=> "Cliente cadastrado com successo." ]);
    }
}
