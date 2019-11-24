@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-users"></i> Editar departamento</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <form action="{{ route('actualizar.departamento', $departamento->id) }}" method="POST">
            @csrf
            <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" value="{{ $departamento->departamento }}" name="departamento" class="form-control"  placeholder="Nome">
              @if($errors->has('departamento'))
              <small id="emailHelp" class="invalid-feedback">{{ $errors->first('departamento') }}</small>
              @endif  
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>

 </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@stop
