<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Farmacia - fatura</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('ccss/style-responsive.css')}}" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section>
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        ************************************************************************************************************
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section  class="container" >
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>Farmacia</h1>
                  <address>
                <strong>Angola, Benguela.</strong><br>
                Jardim milionario<br>
                <abbr title="Phone"> (27222) 45-78
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  <h2>Fatura</h2>
                </div>
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-9">
                    <h4>CLIENTE</h4>
                    <address>
                  <strong>{{ $cliente->name }}</strong><br>
                  Cliente desde<br>
                  {{ $cliente->created_at }}<br>
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> DATA : </div>
                      <div class="pull-right"> {{ $cliente->created_at }} </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Codigo</th>
                      <th class="text-left">Produto</th>
                      <th style="width:140px" class="text-right">Quatidade</th>
                      <th style="width:90px" class="text-right">Preço</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($itemsVenda as $item)
                        
                   
                    <tr>
                      <td class="text-center">{{ $item->id }}</td>
                      <td>{{ $item->produto['nome'] }}</td>
                      <td class="text-right">{{ $item->quantidade }}</td>
                      <td class="text-right">{{ $item->produto['preco'] }} Kz</td>
                    </tr>
                    @endforeach
                    
                    <tr>
                      <td colspan="2" rowspan="4">
                        <h4>Parabens pela compra</h4>
                        <p>Nós agradecemos a tua referencia, volte mais vezes.</p>
                        <td class="text-right"><strong>Total a pagar: </strong></td>
                        <td class="text-right">{{ $total }} Kz</td>
                    </tr>
                   
                    <tr>
                        <td class="text-right no-border"><strong>Valor dado</strong></td>
                        <td class="text-right">{{ $valor }} Kz</td>
                      </tr>
                     
                   
                  </tbody>
                </table>
               
                <br>
                <button type="submit" id="imprimir">Imprimir</button>
                <br>
              </div>
              
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->

  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  <script>
    $(document).ready(function(){
      $("#imprimir").click(function(){
        window.print();
        window.location.assign("http://127.0.0.1:8000/admin/vendas-online");
       
      });
    });
  </script>

</body>

</html>
