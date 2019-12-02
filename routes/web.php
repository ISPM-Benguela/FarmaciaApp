<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiteController@index')->name('site.index');

Route::get('/home', function(){
    return redirect()->route('site.index');
});


Route::get('/contactos', 'SiteController@contactos')->name('contactos');

Route::get('/loja', 'SiteController@loja')->name('loja');

Route::get('/loja/produto/{id}','SiteController@produto')->name('loja.visualizar');

Route::get('meu-perfil', 'PerfilController@perfilCliente')->name('profile.cliente');

Route::post('meu-perfil/actualizar/', 'PerfilController@actualizar')->name('perfil.actualizar');

Route::post('perfil/carrigar-image', 'PerfilController@carregar')->name('carregar.imagem');



Route::group(['middleware' => 'auth'], function(){
    Route::get('/carrinho', 'SiteController@carrinho')->name('carrinho');

    Route::post('/carrinho/adicionar/{id}', 'CarrinhoController@carrinho')->name('carrinho.add');
    
    Route::get('/carrinho/actualizar/{id}', 'CarrinhoController@carrinhoActualizar')->name('carrinho.actualizar');
    
    Route::post('/carrinho/actualizar/{id}', 'CarrinhoController@carrinhoActualizarQuantidade')->name('tualizar.quantidade');
    
    Route::get('/carrinho/eliminar/{id}', 'CarrinhoController@carrinhoEliminar')->name('carrinho.eliminar');

    Route::get('/carrinho/finalizar', 'CarrinhoController@carrinhoFinalizar')->name('carrinho.finanlizar');

    Route::get('/carrinho/imprim', 'CarrinhoController@carrinhoFinalizar')->name('carrinho.finanlizar');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'admin'], function(){
    

    Route::get('/', 'HomeController@admin')->name('admin.index');
    
    Route::get('meu-perfil', 'PerfilController@index')->name('perfil.dashboard');

   //Route::get('departamento/{id}/destroy', 'DepartamentoController@destroy')->name('destroy.departamento');

    Route::resource('departamento', 'DepartamentoController');

    Route::resource('funcionario', 'FuncionarioController');

    Route::post('funcionarios/{id}/update', 'FuncionarioController@update')->name('actualizar');

    Route::get('funcionarios/{id}/destroy', 'FuncionarioController@destroy')->name('funcionario.destroy');

    Route::post('departamentos/{id}/update', 'DepartamentoController@update')->name('actualizar.departamento');

    Route::get('departamentos/{id}/destroy', 'DepartamentoController@destroy')->name('destroy');

    Route::post('produto/{id}/update', 'ProdutoController@update')->name('produto.actulizar');

    Route::get('produto/{id}/destroy', 'ProdutoController@destroy')->name('produto.eliminar');


    Route::get('venda-balcao', 'VendaController@balcao')->name('venda.balcao');

    Route::post('balcao-vender', 'VendaController@vender')->name('balcao.vender');
    
    Route::post('pesquisar-preco', 'VendaController@presquisarPreco')->name('presquisar.preco');

    Route::get('pesquisa-cliente', 'VendaController@pesquisaCliente')->name('pesquisa.cliente');

    Route::post('pesquisa-produto', 'VendaController@pesquisaProduto')->name('pesquisa.produto');

    Route::post('pesquisa-teste', 'VendaController@pesquisaTeste');

    Route::post('cadastrar-cliente', 'ClienteController@store')->name('cadastrar.cliente');

    Route::get('eliminar-item/{id}', 'VendaController@eliminarItem')->name('eliminar.item');

    Route::get('editar-item/{id}', 'VendaController@editarItem')->name('editar.item');

    Route::post('actualizar-item', 'VendaController@itemActualizar')->name('item.actualizar');

    Route::get('cancelar-venda', 'VendaController@cancelarVenda')->name('cancelar.venda');

    Route::post('finalizar-venda', 'VendaController@finalizarVenda')->name('finalizar.venda');

    Route::get('fatura-item', 'VendaController@faturaItem')->name('fatura.item');

    Route::get('fechar-fatura', 'VendaController@imprimirFatura')->name('imprimir.fatura');

    Route::get('vendas', 'VendaController@vendas')->name('venda.dia');
    
    Route::get('fechar-venda', 'VendaController@fecharVenda')->name('fechar.venda');

    Route::get('fechar-online/{id}', 'VendaOnlineController@fecharVenda')->name('fechar.venda');

    Route::get('fechar-carrinho', 'CarrinhoController@fecharCarrinho')->name('fechar.carrinho');

    Route::get('relatorio-venda', 'RelatorioController@relatorioVenda')->name('relatorio.venda');

    Route::get('vendas-online', 'VendaOnlineController@index')->name('vendas.online');

    Route::get('eliminar-venda/{id}', 'VendaController@eliminarVenda')->name('eliminar.venda');

    Route::get('visualizar-venda/{id}', 'VendaController@visualizarVenda')->name('visualizar.venda');

    Route::post('terminar-venda-online/{id}', 'VendaOnlineController@teminarVenda')->name('terminar.online');

    /*
    Route::get('produto', 'ProdutoController@index')->name('produto.index');
    Route::get('produto/create', 'ProdutoController@create')->name('produto.create');
    Route::get('produto/{id}', 'ProdutoController@show')->name('produto.show');
    Route::post('produto', 'ProdutoController@store')->name('produto.store');
    Route::get('produto/{id}', 'ProdutoController@edit')->name('produto.edit');
    Route::get('produto/{id/destroy}', 'ProdutoController@destroy')->name('produto.destroy');*/
   
    Route::resource('produto', 'ProdutoController');

    });
});