@extends('layouts.app')


@section('principal')
<div class="row mt">
        <div class="col-lg-12">
          <div class="row content-panel">
            <div class="col-md-4 profile-text mt mb centered">
              <form action="">
                  <div class="form-group">
                      <label for="Nome" class="pull-left">Nome</label>
                      <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="Email" class="pull-left">Email</label>
                      <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="Email" class="pull-left">Senha</label>
                      <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Actualizar" class="btn btn-theme pull-left">
                  </div>
              </form>
            </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 profile-text">
              <h3>{{ Auth::user()->name }}</h3>
              @if(Auth::user()->nivel == 1)
              <h6> Administrador</h6>
              @endif
              @if(Auth::user()->nivel == 2)
              <h6> Funcionario</h6>
              @endif
             
              <br>
              <form action="">
                <div class="form-group">
                  <label for="">Carregar imagem</label>
                  <input type="file" name="" class="form-control" id="">
                </div>
                <div class="form-group">
                    <button class="btn btn-theme"><i class="fa fa-upload"></i> Carregar</button>
                </div>
              </form>
            
            </div>
            <!-- /col-md-4 -->
            <div class="col-md-4 centered">
              <div class="profile-pic">
                <p><img src="{{ asset('img/perfil/default.jpg')}}" class="img-circle" width="80"></p>
                
              </div>
            </div>
            <!-- /col-md-4 -->
          </div>
          <!-- /row -->
        </div>
        
        <!-- /row -->
      </div>
     <div style="margin-bottom: 250px;"></div>
@endsection