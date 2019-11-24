@extends('layouts.app')

@section('principal')
    <h3><i class="fa fa-users"></i> Funcionarios</h3>
    <a href="{{ route('funcionario.create') }}"  class="btn btn-default">
        <i class="fa fa-user-plus"></i> Criar funcionario
    </a>
          
        
    <hr>

    <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Funcionarios</h4>
                  <hr>
                  <thead>
                    <tr>
                      <th><i class="fa fa-bullhorn"></i> Codigo</th>
                      <th class="hidden-phone"><i class="fa fa-question-circle"></i> Funcionario</th>
                      <th><i class="fa fa-bookmark"></i> Email</th>
                      <th><i class=" fa fa-edit"></i> Departamento</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($funcionarios as $funcionario)
                    <tr>
                      <td>
                        <a href="basic_table.html#">{{ $funcionario->id }}</a>
                      </td>
                      <td class="hidden-phone">{{ $funcionario->name }}</td>
                      <td>{{ $funcionario->email }} </td>
                      <td><span class="label label-info label-mini">{{ $funcionario->departamento['departamento'] }}</span></td>
                      <td>
                        <a href="{{ route('funcionario.edit', $funcionario->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('destroy', $funcionario->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                      </td>
                    </tr>
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