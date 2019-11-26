@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-users"></i> Editar produto</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <form action="{{ route('produto.actulizar', $produto->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="name" value="{{ $produto->name }}"  class="form-control"  placeholder="Nome">
              @if($errors->has('name'))
              <small id="emailHelp" class="invalid-feedback">{{ $errors->first('name') }}</small>
              @endif  
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Imagem</label>
                <input type="file" name="image" class="form-control" >
                @if($errors->has('image'))
                <small id="emailHelp" class="invalid-feedback">{{ $errors->first('image') }}</small>
                @endif  
            </div>
            <div class="form-group{{ $errors->has('exp_data') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Data Vencimento</label>
                    <input type="date" name="exp_data" class="form-control" />
                    @if($errors->has('exp_data'))
                    <small id="emailHelp" value="{{ $produto->exp_data }}" class="invalid-feedback">{{ $errors->first('exp_data') }}</small>
                    @endif  
                </div>
            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Preço</label>
                <input type="text" name="price" value="{{ $produto->price }}" class="form-control"  placeholder="Preço">
                @if($errors->has('price'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('price') }}</small>
                @endif 
            </div>
            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" name="brand" value="{{ $produto->brand }}" class="form-control"  placeholder="Marca">
                @if($errors->has('brand'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('brand') }}</small>
                @endif 
            </div>
            <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
              <label for="exampleInputPassword1">Stock</label>
              <input type="number" name="stock" value="{{ $produto->stock }}" class="form-control" id="exampleInputPassword1" placeholder="Stock">
              @if($errors->has('stock'))
                    <small id="emailHelp" class="invalid-feedback">{{ $errors->first('stock') }}</small>
                @endif
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="exampleInputPassword1">Descrição</label>
                <textarea name="description" class="form-control" rows="5">{{ $produto->description }}</textarea>
                @if($errors->has('description'))
                        <small id="emailHelp" class="invalid-feedback">{{ $errors->first('description') }}</small>
                @endif
                </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

 </div>
</div>
@stop
