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
          <form id="form-vender">
            @csrf
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente" name="cliente" class="form-control" autocomplete="off">
                <a href="#" data-toggle="modal" data-target="#clienteModal"><i class="fa fa-user-plus"></i></a>
            </div>
            <div class="form-group">
                <label for="produtos">Produto</label>
                <input type="text" id="produtos" name="produtos" class="form-control" autocomplete="off">
                <div id="produtoList" style="width: 100%;">
                </div>
              </div>
            <div class="form-group">
                <label for="funcionario">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="funcionario">Funcionario</label>
                <input type="text" id="produto" value="{{ Auth::user()->name }}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <button type="submit" id="btn-vender" class="btn btn-primary">adicionar carrinho</button>
            </div>
        </form>
      </div>
      <div class="col-md-6">
          <div class="card">
              <div class="card-body">
                <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i> Item da compra</h4>
                    <hr>
                    <thead>
                      <tr>
                        <th><i class="fa fa-bullhorn"></i> Company</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                        <th><i class="fa fa-bookmark"></i> Profit</th>
                        <th><i class=" fa fa-edit"></i> Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <a href="basic_table.html#">Company Ltd</a>
                        </td>
                        <td class="hidden-phone">Lorem Ipsum dolor</td>
                        <td>12000.00$ </td>
                        <td><span class="label label-info label-mini">Due</span></td>
                        <td>
                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="basic_table.html#">
                            Dashio co
                            </a>
                        </td>
                        <td class="hidden-phone">Lorem Ipsum dolor</td>
                        <td>17900.00$ </td>
                        <td><span class="label label-warning label-mini">Due</span></td>
                        <td>
                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="basic_table.html#">
                            Another Co
                            </a>
                        </td>
                        <td class="hidden-phone">Lorem Ipsum dolor</td>
                        <td>14400.00$ </td>
                        <td><span class="label label-success label-mini">Paid</span></td>
                        <td>
                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="basic_table.html#">Dashio ext</a>
                        </td>
                        <td class="hidden-phone">Lorem Ipsum dolor</td>
                        <td>22000.50$ </td>
                        <td><span class="label label-success label-mini">Paid</span></td>
                        <td>
                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="basic_table.html#">Total Ltd</a>
                        </td>
                        <td class="hidden-phone">Lorem Ipsum dolor</td>
                        <td>12120.00$ </td>
                        <td><span class="label label-warning label-mini">Due</span></td>
                        <td>
                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="" class="btn btn-primary btn-nd">Finalizar compra</a>
                </div>
                <!-- /content-panel -->
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