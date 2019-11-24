@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-users"></i> Cadastrar departamento</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <form action="{{ route('departamento.store') }}" method="POST">
            @csrf
            <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="departamento" class="form-control"  placeholder="Nome">
              @if($errors->has('departamento'))
              <small id="emailHelp" class="invalid-feedback">{{ $errors->first('departamento') }}</small>
              @endif  
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>

 </div>
</div>
@stop
