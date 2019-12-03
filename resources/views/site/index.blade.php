@extends('layouts.site')


@section('principal')


<div class="site-blocks-cover nd-title-section" style="background-image: url('site/images/hero_1.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto order-lg-2 align-self-center ">
          <div class="site-block-cover-content text-center ">
            <h2 class="sub-title">Medicina Efectiva, Medicina do dia a dia</h2>
            <h1>Bem vindo a Farmacia</h1>
            <p>
              <a href="{{ route('loja') }}" class="btn btn-primary px-5 py-3">Explorar nossa oferta</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section  text-center col-12">
          <h2 class="text-uppercase">Produtos Recentes</h2>
        </div>
      </div>

      <div class="row">

        @foreach ($produtos as $produto)
            
       
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
         
          <a href="{{ route('loja.visualizar', $produto->id) }}"> <img src="/{{ $produto->imagem }}" alt="{{ $produto->imagem }}"></a>
          <h3 class="text-dark"><a href="{{ route('loja.visualizar', $produto->id) }}">{{ $produto->nome }}</a></h3>
          <p class="price"><span>preço</span> &mdash; Kz 55.00</p>
        </div>
        @endforeach
     
       
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="{{ route("loja") }}" class="btn btn-primary px-4 py-3">Ver mais</a>
        </div>
      </div>
    </div>
  </div>

  
  
  <div class="site-section bg-light">
      <div class="container">
          <div class="row">
          <div class="title-section  text-center col-12">
              <h2 class="text-uppercase">Mais vendidos</h2>
          </div>
          </div>
  
          <div class="row">

           @foreach ($destacados as $item)
               
         
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
              
              <a href="{{ route('loja.visualizar', $item->id) }}"> <img src="/{{ $item->imagem }}" alt="{{ $item->imagem }}"></a>
              <h3 class="text-dark"><a href="">{{ $item->nome }}</a></h3>
              <p class="price">{{ $item->preco }} Kz</p>
          </div>
          @endforeach 
          </div>
          <div class="row mt-5">
            <div class="col-md-12 text-center">
                    {{ $destacados->links() }}
            </div>
        </div>
      </div>
      </div>
@endsection