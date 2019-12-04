@extends('layouts.site')

@section('principal')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-body">
                    <img src="/{{  $perfil->imagem }}" class="nd-img " alt="imagem de perfil">
                    <h6>Carregar imagem</h6>
                    <form action="{{ route('carregar.imagem') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group{{ $errors->has('imagem') ? 'has-errror' : '' }}">
                            <input type="file" name="imagem" class="form-control">
                            @if($errors->has('imagem'))
                            <small id="emailHelp" class="invalid-feedback">{{ $errors->first('imagem') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default"> Carregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="contaier">
                <h3 class="mt-3">Dados do meu perfil</h3>
                <form action="{{ route('perfil.actualizar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" value="{{ $usuario->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{ $usuario->email }}" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection