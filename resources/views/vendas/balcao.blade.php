@extends('layouts.app')

@section('extra-css')
<link href="{{ asset('css/balcao.css')}}" rel="stylesheet">
@endsection

@section('principal')
<section class="wrapper">
        
    <h3><i class="fa fa-angle-right"></i> Adetendimento ao cliente</h3>
    <div class="alert alert-success success message-hide"   role="alert">
      
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('balcao.vender') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente" name="cliente" class="form-control" autocomplete="off">
                <a href="#" data-toggle="modal" data-target="#clienteModal"><i class="fa fa-user-plus"></i></a>
            </div>
            <div class="form-group">
                <label for="produto">Produto</label>
                <input type="text" id="produto" name="produto" class="form-control">
            </div>
            <div class="form-group">
                <label for="funcionario">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="funcionario">Valor</label>
                <input type="text" name="preco" id="price" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="funcionario">Funcionario</label>
                <input type="text" id="produto" value="{{ Auth::user()->name }}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">adicionar carrinho</button>
            </div>
        </form>
      </div>
      <div class="col-md-6">
          <div class="card">
              <div class="card-body">
                  <p>Produto A</p>
              </div>
          </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-create-cliente">
                  <div class="form-group">
                      <label for="name">Nome</label>
                      <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" id="save" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
 <script src="{{ asset('js/balcao.js')}}"></script>
@endsection