@extends('layouts.app')

@section('extra-css')
<link href="{{ asset('css/balcao.css')}}" rel="stylesheet">
@endsection

@section('principal')
<section class="wrapper">
        
    <h3><i class="fa fa-angle-right"></i> Adetendimento ao cliente </h3>
    <div class="alert alert-success success message-hide"   role="alert">
      
    </div>
    <div class="row">
      <div class="col-md-6">
          <form  action="{{ route('balcao.vender') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente"  value="{{ old('cliente')}}" name="cliente" class="form-control" autocomplete="off">
                @if($errors->has('cliente'))
                  <small id="emailHelp" class="invalid-feedback">{{ $errors->first('cliente') }}</small>
                   <br />
                @endif
                
                <a href="#" data-toggle="modal" data-target="#clienteModal"><i class="fa fa-user-plus"></i></a>
            </div>
            <div class="form-group">
                <label for="produtos">Produto</label>
                <input type="text" id="produtos" name="produtos" value="{{ old('produtos')}}" class="form-control" autocomplete="off">
                <div id="produtoList" style="width: 100%;">
                </div>
                @if($errors->has('produtos'))
                  <small id="emailHelp" class="invalid-feedback">{{ $errors->first('produtos') }}</small>
                  
                @endif
              </div>
            <div class="form-group">
                <label for="funcionario">Quantidade</label>
                <input type="number" value="{{ old('quantidade')}}" name="quantidade" id="quantidade" value="" class="form-control">
                @if($errors->has('produtos'))
                  <small id="emailHelp" class="invalid-feedback">{{ $errors->first('produtos') }}</small>
                  
                @endif
              </div>
            <div class="form-group">
                <button type="submit" id="btn-vender" class="btn btn-primary">adicionar carrinho</button>
            </div>
        </form>
      </div>
      <div class="col-md-6">
              <div class="tabela">
                    <table id="itemTable" class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Item da compra</h4>
                    <hr>
                    <thead>
                      <tr>
                        <th><i class="fa fa-bullhorn"></i> Cliente</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Produto</th>
                        <th><i class="fa fa-bookmark"></i> Qtd</th>
                        <th><i class=" fa fa-edit"></i> Preco</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($itemsVenda as $item)
                          
                     
                      <tr>
                        <td>
                          <a href="basic_table.html#">{{ $item->user['name'] }}</a>
                        </td>
                        <td class="hidden-phone">{{ $item->produto }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td><span class="label label-info label-mini">{{ $item->preco }} Kz</span></td>
                        <td>
                          <a href="{{ route('editar.item', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="{{ route('eliminar.item', $item->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row">
                      <div class="col-md-6">
                          <form action="{{ route('finalizar.venda') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="">valor a pagar</label>
                              <input type="text" name="valor" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group" >
                                <input type="submit" class="btn btn-primary" value="Finalizar a venda">
                                
                            </div>
                            <div class="form-group">
                                
                            </div>
                          </form>
                          
                      </div>
                      <div class="col-md-6">
                          @if($total > 0)
                            <h3 class="pull-right">Total: {{ $total }} Kz</h3>
                            <a href="{{ route('cancelar.venda') }}" class="btn btn-danger btn-cancelar pull-right">Cancelar a venda</a>
                          @endif
                        </div>
                      </div>
                  
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