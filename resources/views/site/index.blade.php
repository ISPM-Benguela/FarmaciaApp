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
              <a href="{{ route('produto') }}#" class="btn btn-primary px-5 py-3">Explorar nossa oferta</a>
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
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <span class="tag">Promoção</span>
          <a href="{{ route('produto') }}"> <img src="{{asset('site/images/product_01.png')}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('produto') }}#">Bioderma</a></h3>
          <p class="price"><del>95.00</del> &mdash; Kz 55.00</p>
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_02.png')}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('produto') }}#">Chanca Piedra</a></h3>
          <p class="price">Kz 70.00</p>
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_03.png')}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">Umcka Cold Care</a></h3>
          <p class="price">Kz 120.00</p>
        </div>

        <div class="col-sm-6 col-lg-4 text-center item mb-4">

          <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_04.png')}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">Cetyl Pure</a></h3>
          <p class="price"><del>45.00</del> &mdash; Kz 20.00</p>
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_05.png')}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">CLA Core</a></h3>
          <p class="price">Kz 38.00</p>
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <span class="tag">Promoção</span>
          <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_06.png')}}" alt="Image"></a>
          <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">Poo Pourri</a></h3>
          <p class="price"><del>Kz 89</del> &mdash; Kz 38.00</p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="{{ route('produto') }}shop.html" class="btn btn-primary px-4 py-3">Ver mais</a>
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
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <span class="tag">Promoção</span>
              <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_01.png')}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{ route('produto') }}#">Bioderma</a></h3>
              <p class="price"><del>95.00</del> &mdash; Kz 55.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_02.png')}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{ route('produto') }}#">Chanca Piedra</a></h3>
              <p class="price">Kz 70.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_03.png')}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">Umcka Cold Care</a></h3>
              <p class="price">Kz 120.00</p>
          </div>
  
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
  
              <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_04.png')}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">Cetyl Pure</a></h3>
              <p class="price"><del>45.00</del> &mdash; Kz 20.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_05.png')}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">CLA Core</a></h3>
              <p class="price">Kz 38.00</p>
          </div>
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
              <span class="tag">Promoção</span>
              <a href="{{ route('produto') }}shop-single.html"> <img src="{{asset('site/images/product_06.png')}}" alt="Image"></a>
              <h3 class="text-dark"><a href="{{ route('produto') }}shop-single.html">Poo Pourri</a></h3>
              <p class="price"><del>Kz 89</del> &mdash; Kz 38.00</p>
          </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 text-center">
                <div class="site-block-27">
                <ul>
                    <li><a href="{{ route('produto') }}#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="{{ route('produto') }}#">2</a></li>
                    <li><a href="{{ route('produto') }}#">3</a></li>
                    <li><a href="{{ route('produto') }}#">4</a></li>
                    <li><a href="{{ route('produto') }}#">5</a></li>
                    <li><a href="{{ route('produto') }}#">&gt;</a></li>
                </ul>
                </div>
            </div>
        </div>
      </div>
      </div>
@endsection