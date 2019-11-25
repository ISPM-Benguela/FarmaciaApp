@extends('layouts.site')


@section('principal')
<div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Inicio</a> <span class="mx-2 mb-0">/</span> <a
                href="{{ route('loja') }}">Loja</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Charope , 200mg</strong></div>
          </div>
        </div>
      </div>

      <div class="site-section">
            <div class="container">
              <div class="row">
                <div class="col-md-5 mr-auto">
                  <div class="border text-center">
                    <img src="{{asset('site/images/product_07_large.png')}}" alt="Image" class="img-fluid p-5">
                  </div>
                </div>
                <div class="col-md-6">
                  <h2 class="text-black">Charope, 200mg</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus
                    soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas,
                    distinctio, aperiam, ratione dolore.</p>
                  
      
                  <p><del>Kz95.00</del>  <strong class="text-primary h4">Kz55.00</strong></p>
      
                  
                  
                  <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 220px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                      </div>
                      <input type="text" class="form-control text-center" value="1" placeholder=""
                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                      <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                      </div>
                    </div>
          
                  </div>
                  <p><a href="{{ route('carrinho') }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Adicionar no carrinho</a></p>
      
                </div>
              </div>
            </div>
          </div>
@endsection