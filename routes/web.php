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

Route::get('/carrinho', 'SiteController@carrinho')->name('carrinho');

Route::post('/carrinho/adicionar/{id}', 'CarrinhoController@carrinho')->name('carrinho.add');

Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'admin'], function(){
    

    Route::get('/', 'HomeController@admin')->name('admin.index');
    
    Route::get('meu-perfil', 'PerfilController@index')->name('perfil.dashboard');

    Route::resource('departamento', 'DepartamentoController');

    Route::resource('funcionario', 'FuncionarioController');
    Route::post('funcionarios/{id}/update', 'FuncionarioController@update')->name('actualizar');
    Route::get('funcionarios/{id}/destroy', 'FuncionarioController@destroy')->name('destroy');

    Route::post('departamentos/{id}/update', 'DepartamentoController@update')->name('actualizar.departamento');
    Route::get('departamentos/{id}/destroy', 'DepartamentoController@destroy')->name('destroy');

    Route::post('produto/{id}/update', 'ProdutoController@update')->name('produto.actulizar');
    Route::get('produto/{id}/destroy', 'ProdutoController@destroy')->name('produto.eliminar');


    Route::get('venda-balcao', 'VendaController@balcao')->name('venda.balcao');

    Route::post('balcao-vender', 'VendaController@vender')->name('balcao.vender');
    
    Route::post('pesquisar-preco', 'VendaController@presquisarPreco')->name('presquisar.preco');

    Route::get('pesquisa-cliente', 'VendaController@pesquisaCliente')->name('pesquisa.cliente');

    Route::get('pesquisa-produto', 'VendaController@pesquisaProduto')->name('pesquisa.produto');

    Route::post('pesquisa-teste', 'VendaController@pesquisaTeste');

    Route::post('cadastrar-cliente', 'ClienteController@store')->name('cadastrar.cliente');

    Route::get('vendas-do-dia', 'VendaController@vendaDia')->name('venda.dia');
    Route::get('fechar-venda', 'VendaController@fecharVenda')->name('fechar.venda');
    Route::get('relatorio-venda', 'VendaController@fecharVenda')->name('relatorio.venda');

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