@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-users"></i> Editar o funcionario</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <form action="{{ route('actualizar', $funcionario->id ) }}" method="POST">
            @csrf
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="name" value="{{ $funcionario->name }}" class="form-control"  placeholder="Nome">
              @if($errors->has('name'))
              <small id="emailHelp" class="invalid-feedback">{{ $errors->first('name') }}</small>
              @endif  
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="{{ $funcionario->email }}" class="form-control"  placeholder="Email">
                @if($errors->has('email'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('email') }}</small>
                @endif 
            </div>
            <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Departamento</label>
                <select name="departamento_id" id="" class="form-control">
                    <option value=""> {{ $funcionario->departamento['departamento'] }}</option>
                    <option value="">-----------------------------------</option>
                    @foreach ($departamentos as $departamento)
                      <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                     
                    @endforeach
                </select>
                @if($errors->has('departamento'))
                <small id="emailHelp" class="invalid-feedback">{{ $errors->first('departamento') }}</small>
                @endif  
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              @if($errors->has('password'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('password') }}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>

 </div>
</div>
@stop
