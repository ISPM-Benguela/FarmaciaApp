@extends('layouts.site')

@section('principal')
<div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Loja</strong></div>
          </div>
        </div>
      </div>
  
      <div class="site-section">
        <div class="container">
          
            <div class="row">
            <div class="title-section  text-center col-12">
              <h2 class="text-uppercase">Produtos Disponiveis</h2>
            </div>
          </div>
      
          <div class="row">
              @foreach ($produtos as $item)
               
         
              <div class="col-sm-6 col-lg-4 text-center item mb-4">
                  
                  <a href="{{ route('loja.visualizar', $item->id) }}"> <img src="/{{ $item->imagem }}" alt="{{ $item->imagem }}"></a>
                  <h3 class="text-dark"><a href="">{{ $item->nome }}</a></h3>
                  <p class="price">{{ $item->preco }} Kz</p>
              </div>
              @endforeach 
           
          </div>
          <div class="row mt-5">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      
      <div class="site-section bg-secondary bg-image" style="background-image: url('site/images/bg_2.jpg');">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('site/images/bg_1.jpg');">
                <div class="banner-1-inner align-self-center">
                  <h2>A qualidade dos nossos produtos</h2>
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                  </p>
                </div>
              </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
              <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('site/images/doctor2.jpeg');">
                <div class="banner-1-inner ml-auto  align-self-center">
                  <h2>Consultorio Médico</h2>
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
  
@endsection