@extends('layouts.app')

@section('principal')
<div class="container">
    <h3><i class="fa fa-shopping-cart"></i> Visualizar venda</h3>
</div>
<div class="nd-container">

     <div class="nd-content">
        <h4>Cliente: {{ $cliente->name }}</h4>

        <table id="table_vendas" class="table table-striped table-advance table-hover">
            <h6><i class="fa fa-angle-right"></i> Total a pagar: {{ $total }} Kz</h6>
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
                  <a href="{{ route('eliminar.venda', $item->id ) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <form action="{{ route('terminar.online', $cliente->id) }}" method="POST">
              @csrf
              <div class="form-group">
                  <label for="">Valor</label>
                  <input type="text" class="form-control" name="valor" autocomplete="off">
              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Terminar a venda">
              </div>
          </form>
     </div>
</div>
@stop
