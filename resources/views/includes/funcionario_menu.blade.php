<li class="sub-menu">
    <a href="javascript:;">
      <i class="fa fa-building"></i>
      <span>EMPRESA</span>
      </a>
    <ul class="sub">
      <li><a href="{{ route('funcionario.index') }}"><i class="fa fa-users"></i> Funcionarios</a></li>
    </ul>
  </li>
  <li class="sub-menu">
    <a href="javascript:;">
      <i class="fa fa-dollar"></i>
      <span>Vendas</span>
      </a>
    <ul class="sub">
      <li><a href="{{ route('venda.balcao') }}">Venda balcao</a></li>
      <li><a href="{{ route('venda.dia') }}">Lista de Vendas</a></li>
      <li><a href="{{ route('vendas.online') }}">Vendas online</a></li>
    </ul>
  </li>