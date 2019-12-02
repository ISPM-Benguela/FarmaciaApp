@extends('layouts.site')


@section('principal')
<div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Inicio</a> <span class="mx-2 mb-0">/</span> <a
                href="{{ route('loja') }}">Loja</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $produto->name }}</strong></div>
          </div>
        </div>
      </div>

      <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-md-5 mr-auto">
                  <div class="border text-center">
                    <img src="/{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="img-fluid p-5">
                  </div>
                </div>
                <div class="col-md-6">
                  <h2 class="text-black">{{ $produto->nome }}</h2>
                  <p>{{ $produto->descricao }}</p>
                  
      
                  <p><strong class="text-primary h4">{{ $produto->preco }}  Kz</strong></p>
      
                  
                  <form action="{{ route('carrinho.add', $produto->id) }}" method="POST">
                    @csrf
                  <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 220px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                      </div>
                      <input type="text" class="form-control text-center" name="quantidade" value="1" placeholder=""
                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                      </div>
                    </div>
          
                  </div>
                  @if(Auth::user()->nivel == 3)
                  <input type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" value="Adicionar no carrinho">
                  @endif
                </form>
                </div>
              </div>
            </div>
          </div>
@endsection