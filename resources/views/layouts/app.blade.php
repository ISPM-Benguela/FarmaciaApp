<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet">
  <script src="{{ asset('lib/chart-master/Chart.js')}}"></script>
  <link href="{{ asset('css/main.css')}}" rel="stylesheet">
  <link href="{{ asset('css/gijgo.min.css')}}" rel="stylesheet">

  @yield('extra-css')
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header id="up" class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/" class="logo"><b>FARM<span>BOA</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
       
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li class="nav-item">
            <a href="{{ route('site.index') }}" class="logout">Ver site</a>
          </li>
          <li class="nav-item">
              <a href="" class="logout">Meu Perfil</a>
            </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="logout dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{ asset('img/perfil/default.jpg')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a class="active" href="/">
              <i class="fa fa-dashboard"></i>
              <span>Painel de Controle</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-building"></i>
              <span>EMPRESA</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('departamento.index') }}"><i class="fa fa-users"></i> Departamento</a></li>
              <li><a href="{{ route('funcionario.index') }}"><i class="fa fa-users"></i> Funcionarios</a></li>
              <li><a href="{{ route('produto.index') }}"><i class="fa fa-cubes"></i> Produtos</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-dollar"></i>
              <span>Vendas</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('venda.balcao') }}">Venda balcao</a></li>
              <li><a href="{{ route('venda.dia') }}">Vendas do dia</a></li>
              <li><a href="{{ route('fechar.venda') }}">Fechar vendas</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bar-chart-o"></i>
              <span>RELATORIOS</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('departamento.index') }}"><i class="fa fa-shopping-cart"></i> Vendas</a></li>
              <li><a href="{{ route('funcionario.index') }}"><i class="fa fa-users"></i> Funcionarios</a></li>
              <li><a href="{{ route('produto.index') }}"><i class="fa fa-cubes"></i> Produtos</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
  

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @include('includes.message')
            @yield('principal')
        </section>
        <!-- /wrapper -->
      </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; <strong>Farmboa</strong>. Todos direitos reservados.
        </p>
       
        <a href="#up" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>

  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap3-typeahead.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{ asset('lib/jquery.sparkline.js')}}"></script>
  <script src="{{ asset('js/gijgo.min.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{ asset('lib/sparkline-chart.js')}}"></script>
  <script src="{{ asset('lib/zabuto_calendar.js')}}"></script>
  @if (Session::has('success'))
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Farmacio sistema de mensagem!',
        // (string | mandatory) the text inside the notification
        text: {!! Session::get('success') !!},
        // (string | optional) the image to display on the left
        image: 'img/icons/feeds.jpeg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>

  @endif

  <script type="application/javascript">
      $('#datepicker').datepicker({
          uiLibrary: 'bootstrap4'
      });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

  @yield('scripts')
</body>

</html>
