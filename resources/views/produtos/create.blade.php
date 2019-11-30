@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-users"></i> Cadastrar produto</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Nomes</label>
              <input type="text" name="nome" value="{{ old('nome') }}"  class="form-control"  placeholder="Nome">
              @if($errors->has('nome'))
              <small id="emailHelp" class="invalid-feedback">{{ $errors->first('nome') }}</small>
              @endif  
            </div>
            <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Imagem</label>
                <input type="file" name="imagem" class="form-control" >
                @if($errors->has('imagem'))
                <small id="emailHelp" class="invalid-feedback">{{ $errors->first('imagem') }}</small>
                @endif  
            </div>
            <div class="form-group{{ $errors->has('exp_data') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Data Vencimento</label>
                    <input type="date" name="exp_data" class="form-control" />
                    @if($errors->has('exp_data'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('exp_data') }}</small>
                    @endif  
                </div>
            <div class="form-group{{ $errors->has('preco') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Preço</label>
                <input type="text" name="preco" value="{{ old('preco') }}" class="form-control"  placeholder="Preço">
                @if($errors->has('preco'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('preco') }}</small>
                @endif 
            </div>
            <div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" name="marca" value="{{ old('marca') }}" class="form-control"  placeholder="Marca">
                @if($errors->has('marca'))
                    <small id="emailHelp"  class="invalid-feedback">{{ $errors->first('marca') }}</small>
                @endif 
            </div>
            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1">Stock</label>
              <input type="number" value="{{ old('stock') }}" name="stock" class="form-control" id="exampleInputPassword1" placeholder="Stock">
              @if($errors->has('stock'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('stock') }}</small>
                @endif
            </div>
            <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                <label for="exampleInputPassword1">Descrição</label>
                <textarea name="descricao" class="form-control" rows="5"></textarea>
                @if($errors->has('descricao'))
                        <small id="emailHelp" class="invalid-feedback">{{ $errors->first('descricao') }}</small>
                @endif
                </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

 </div>
</div>
@stop
