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

Route::get('/', function(){
    return view('welcome');
});

//Route:: method('path', nomeController@nomeMetodo);
//Quando uma requisição GET for realizada na path '/produtos' o metodo 'lista()' do ProdutoController será executado
Route::get('/produtos', 'ProdutoController@lista');

//Passagem do id do produto pela url, o '{id} será susbstituido pelo valor do id em tempo de execução
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');