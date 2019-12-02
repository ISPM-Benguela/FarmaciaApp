@extends('layouts.app')

@section('extra-css')
  
@endsection
@section('principal')
    <h3>Departamentos</h3>
    @if(Auth::user()->nivel == 1)
    <a href="{{ route('departamento.create') }}" class="btn btn-default"><i class="fa fa-plus"></i> Criar departamento</a>
     @endif
    <hr>

    <div class="row mb">
            <div class="col-md-12">
              <div class="content-panel ">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Departamentos</h4>
                  <hr>
                  <thead>
                    <tr>
                      <th><i class="fa fa-bullhorn"></i> Codigo</th>
                      <th class="hidden-phone"><i class="fa fa-question-circle"></i> Departamento</th>
 
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($departamentos as $departamento)
                    <tr>
                      <td>
                        <a href="basic_table.html#">{{ $departamento->id }}</a>
                      </td>
                      <td class="hidden-phone">{{ $departamento->departamento }}</td>
                      
                      <td>
                          @if(Auth::user()->nivel == 1)
                        <a href="{{ route('departamento.edit', $departamento->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('destroy', $departamento->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                        @endif
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
          <br>
          <br>
          <br>
          <br>
@endsection