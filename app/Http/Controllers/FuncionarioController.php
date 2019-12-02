<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Departamento;
use App\Perfil;
use App\Funcionario;
use Auth;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('funcionario.index')->with([
            'funcionarios' => User::where('nivel','!=', 3)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('funcionario.create')->with([
            'departamentos' => Departamento::all()
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'departamento_id' => 'required'
        ]);


        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->departamento_id = $request->input('departamento_id');
        $user->nivel = 2;

        $user->save();

        $perfil = new Perfil;
        $perfil->user_id = $user->id;
        $perfil->tipo = 'Funcionario';
        
        $perfil->save();

        return redirect()->route('funcionario.index')->with('success', 'Funcionario cadastrado com sucesso.');
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
        $user = User::findOrFail($id);
        return view('funcionario.edit')->with([
            'funcionario' => $user,
            'departamentos' => Departamento::all()
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
        $user = User::findOrFail($id); 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('email'));
        $user->departamento_id = $request->input('departamento_id');

        $user->save();
        return redirect()->route('funcionario.index')->with('success','Funcionario actulizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete();

        return redirect()->route('funcionario.index')
            ->with('error',
             'Funcionario eliminado com sucesso.');
    }
}
