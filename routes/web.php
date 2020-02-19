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

Route::get('/', function(){
    return view('welcome');
});

//Route:: method('path', nomeController@nomeMetodo);
//Quando uma requisição GET for realizada na path '/produtos' o metodo 'lista()' do ProdutoController será executado
Route::get('/produtos', 'ProdutoController@lista');

//Passagem do id do produto pela url, o '{id} será susbstituido pelo valor do id em tempo de execução
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+'); //Através do método where define que o id precisa ser numérico

//Rota que exibe um produto Json
Route::get('produtos/mostraJson/{id}', 'ProdutoController@mostraJson')->where('id', '[0-9]+' );

//Rota para cadastrar um novo produto
Route::get('/produtos/novo', 'ProdutoController@novo');

//Rota para adicionar um novo produto no banco
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

//Rota para deletar um produto
Route::delete('/produtos/remove/{id}', 'ProdutoController@remove');

//Rota para preencher a atualização de um produto
Route::get('/produtos/atualiza/{id}', 'ProdutoController@atualiza')->where('id', '[0-9]+');

//Rota para atualização concluida
Route::put('/produtos/atualizado/{id}', 'ProdutoController@atualizado');

Route::get('geraToken', 'ProdutoController@geraToken');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
