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
Route::get('home', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    return view('welcome');
});

//Route:: method('path', nomeController@nomeMetodo);
//Quando uma requisição GET for realizada na path '/produtos' o metodo 'lista()' do ProdutoController será executado
Route::get('/produtos', 'ProdutoController@index');

//Rota que exibe um produto Json
Route::get('produtos/{id}', 'ProdutoController@show')->where('id', '[0-9]+' );

//Rota para adicionar um novo produto no banco
Route::post('/produtos', 'ProdutoController@store');

//Rota para deletar um produto
Route::delete('/produtos/{id}', 'ProdutoController@delete');

//Rota para view formularioAtualiza de um produto
Route::get('/produtos/atualiza/{id}', 'ProdutoController@atualiza')->where('id', '[0-9]+');

//Rota para atualização 
Route::put('/produtos/{id}', 'ProdutoController@update');

Route::get('geraToken', 'ProdutoController@geraToken');

Auth::routes();

