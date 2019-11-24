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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('meu-perfil', 'PerfilController@index')->name('profile');

    Route::resource('departamento', 'DepartamentoController');

    Route::resource('funcionario', 'FuncionarioController');
    Route::post('funcionarios/{id}/update', 'FuncionarioController@update')->name('actualizar');
    Route::get('funcionarios/{id}/destroy', 'FuncionarioController@destroy')->name('destroy');

    Route::post('departamentos/{id}/update', 'DepartamentoController@update')->name('actualizar.departamento');
    Route::get('departamentos/{id}/destroy', 'DepartamentoController@destroy')->name('destroy');
});