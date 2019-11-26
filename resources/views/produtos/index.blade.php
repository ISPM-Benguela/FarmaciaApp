@extends('layouts.app')

@section('principal')
    <h3><i class="fa fa-users"></i> Produtos</h3>
    <a href="{{ route('produto.create') }}"  class="btn btn-default">
        <i class="fa fa-user-plus"></i> Cadastrar produto
    </a>
          
        
    <hr>

    <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Produtos</h4>
                  <hr>
                  <thead>
                    <tr>
                      <th><i class="fa fa-bullhorn"></i> Codigo</th>
                      <th class="hidden-phone"><i class="fa fa-question-circle"></i> Produto</th>
                      <th><i class="fa fa-bookmark"></i> Preço</th>
                      <th><i class=" fa fa-edit"></i> Stock</th>
                      <th><i class=" fa fa-clock-o"></i> Data vencimento</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($produtos as $produto)
                    <tr>
                      <td>
                        <a href="basic_table.html#">{{ $produto->id }}</a>
                      </td>
                      <td class="hidden-phone">{{ $produto->name }}</td>
                      <td>{{ $produto->price }} </td>
                      <td><span class="label label-info label-mini">{{ $produto->stock }}</span></td>
                      <td>{{ $produto->exp_data }}</td>
                      <td>
                        <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('produto.eliminar', $produto->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                      </td>
                    </tr>
                    @else
                     <p>O stock está vazio</p>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /content-panel -->
            </div>
            <!-- /col-md-12 -->
          </div>
          <br>
@endsection