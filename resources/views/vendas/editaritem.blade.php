@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-gift"></i> Actualizar quantidade</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <form action="{{ route('item.actualizar') }}" method="POST">
            @csrf
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Produto</label>
              <input type="text"  value="{{ $item->produto }}" class="form-control"  placeholder="Nome" disabled>
              <input type="hidden" name="produto" value="{{ $item->id }}">
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Preço</label>
                <input type="email" name="email" value="{{ $item->preco }} Kz" class="form-control" disabled>
                @if($errors->has('email'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('email') }}</small>
              @endif 
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1">Password</label>
              <input type="number" name="quantidade" value="{{ $item->quantidade }}" class="form-control" >
              @if($errors->has('password'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('password') }}</small>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>

 </div>
</div>
@stop
