@extends('layouts.site')

@section('principal')


<div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0">
              <a href="/">Inicio</a> <span class="mx-2 mb-0">/</span> 
              <strong class="text-black">Carrinho</strong>
            </div>
          </div>
        </div>
      </div>
  
      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="product-name">Produto</th>
                      <th class="product-price">Preço</th>
                      <th class="product-quantity">Quantidade</th>
                      <th class="product-total">Total</th>
                      <th class="product-remove">Remover</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($meu_carrinho as $carrinho)
                    <tr>
                     
                      <td class="product-name">
                        <h2 class="h5 text-black">{{ $carrinho->produto }}</h2>
                      </td>
                      <td>{{ $carrinho->produto }}</td>
                      <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                          
                          <input type="text" class="form-control text-center" value="{{ $carrinho->quantidade }}" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
              
                        </div>
      
                      </td>
                      <td>{{ number_format(20, 2, '.', '') }}</td>
                      <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                    </tr>
                    @endforeach
               
                  </tbody>
                </table>
              </div>
            </form>
          </div>
      
          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <a  href="" class="btn btn-primary btn-md btn-block">Actualizar carrinho</a>
                </div>
                <div class="col-md-6">
                  <a href="{{ route('loja') }}" class="btn btn-outline-primary btn-md btn-block">Terminar compra</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection