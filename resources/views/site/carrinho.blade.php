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
                      <th class="product-thumbnail">Imagem</th>
                      <th class="product-name">Produto</th>
                      <th class="product-price">Preço</th>
                      <th class="product-quantity">Quantidade</th>
                      <th class="product-total">Total</th>
                      <th class="product-remove">Remover</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="product-thumbnail">
                        <img src="site/images/product_02.png" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">Ibuprofen</h2>
                      </td>
                      <td>Kz 55.00</td>
                      <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center" value="1" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                          </div>
                        </div>
      
                      </td>
                      <td>Kz 49.00</td>
                      <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                    </tr>
      
                    <tr>
                      <td class="product-thumbnail">
                        <img src="site/images/product_01.png" alt="Image" class="img-fluid">
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">Bioderma</h2>
                      </td>
                      <td>Kz 49.00</td>
                      <td>
                        <div class="input-group mb-3" style="max-width: 120px;">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                          </div>
                          <input type="text" class="form-control text-center" value="1" placeholder=""
                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                          </div>
                        </div>
      
                      </td>
                      <td>Kz 49.00</td>
                      <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
                    </tr>
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