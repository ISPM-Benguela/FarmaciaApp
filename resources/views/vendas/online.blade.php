@extends('layouts.app')

@section('principal')
    <h3>Lista de todas vendas</h3>

    <div class="content-panel" style="padding: 14px;">
        <table id="table_vendas" class="table table-striped table-advance table-hover">
          <h4><i class="fa fa-angle-right"></i>Venda do dia</h4>
          <hr>
          <thead>
            <tr>
              <th><i class="fa fa-bullhorn"></i> Cliente</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i> Produto</th>
              <th><i class="fa fa-bookmark"></i> Preço</th>
              <th><i class=" fa fa-edit"></i> Quantidade</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($vendas as $item)
            <tr>
              <td>
                <a href="">{{ $item->user['name'] }}</a>
              </td>
              <td class="hidden-phone">{{ $item->produto['nome'] }}</td>
              <td>{{ $item->produto['preco'] }} Kz</td>
              <td><span class="label label-info label-mini">{{ $item->produto['stock'] }}</span></td>
              <td>
                <a href="{{ route('visualizar.venda', $item->user_id) }}" class="btn btn-success btn-xs">visualizar <i class="fa fa-eye"></i></a>
                <a href="{{ route('eliminar.venda', $item->id ) }}" class="btn btn-danger btn-xs">eliminar <i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="container">
          <a href="" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir a lista</a>
        </div>
      </div>
@endsection