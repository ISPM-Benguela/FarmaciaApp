<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('site/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('site/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('site/css/jquery-ui.css')}}">
  <link rel="stylesheet" href={{asset('"site/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">


  <link rel="stylesheet" href="{{asset('site/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('site/css/style.css')}}">

</head>

<body>

  <div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="/" class="js-logo-clone">Farmacia</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li ><a href="/">Inicio</a></li>
                <li><a href="{{ route('loja') }}">Loja</a></li>
              
                <li><a href="{{ route('contactos') }}">Contactos</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
              <a href="{{ route('login') }}" class="icons-btn d-inline-block mr-3">Entrar</a>
              <a href="{{ route('login') }}" class="icons-btn d-inline-block">Criar conta</a>
            <a href="{{ route('carrinho') }}" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>



     @yield('principal')
   
   
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">Sobre nós</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navegação</h3>
            <ul class="list-unstyled">
              <li><a href="#">Inicio</a></li>
              <li><a href="#">Loja</a></li>
              <li><a href="{{ route('contactos') }}">Contactos</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Endereco</h3>
              <ul class="list-unstyled">
                <li class="address">Jardim Milionário, Benguela, Angola</li>
                <li class="phone"><a href="tel://23923929210">+24 923 455 543</a></li>
                <li class="email">geral@farmacia.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> Todos direitos reservados</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('site/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('site/js/jquery-ui.js')}}"></script>
  <script src="{{asset('site/js/popper.min.js')}}"></script>
  <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('site/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('site/js/aos.js')}}"></script>

  <script src="{{asset('site/js/main.js')}}"></script>

</body>

</html>