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
                      <th class="product-remove">Actualizar</th>
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
                          
                          <input type="text" class="form-control text-center" value="{{ $carrinho->quantidade }}"
                            aria-label="Example text with button addon" aria-describedby="button-addon1" disabled>
              
                        </div>
      
                      </td>
                      <td>{{ number_format($carrinho->preco, 2, '.', '') }} Kz</td>
                      <td><a href="{{ route('carrinho.eliminar', $carrinho->id) }}" class="btn btn-primary height-auto btn-sm"><i class="fa fa-trash"></i></a></td>
                      <td><a href="{{ route('carrinho.actualizar', $carrinho->id) }}" class="btn btn-primary height-auto btn-sm"><i class="fa fa-edit"></i></a></td>
                    </tr>
                    @endforeach
               
                  </tbody>
                </table>
                @if($total > 0)
                <div class="container">
                  <h3>Total a pagar: {{number_format( $total, 2, '.', '')  }} Kz</h3>
                </div>
                @endif
              </div>
            </form>
          </div>
      
          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                @if($total > 0)
                <div class="col-md-6">
                  <a href="{{ route('carrinho.finanlizar') }}" class="btn btn-outline-primary btn-md btn-block"><i class="fa fa-shopping-cart"></i> Terminar compra</a>
                </div>
                @endif
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection