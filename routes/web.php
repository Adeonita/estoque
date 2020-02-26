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

Route::get('/produtos', 'ProdutoController@index'); //lista todos os produtos

Route::get('produtos/{id}', 'ProdutoController@show')->where('id', '[0-9]+' ); //Mostra produto{id}

Route::post('/produtos', 'ProdutoController@store'); //Rota para inserir um produto

Route::delete('/produtos/{id}', 'ProdutoController@delete'); //Deleta produto{id}

Route::put('/produtos/{id}', 'ProdutoController@update');//Atualiza produto{id}

Route::get('geraToken', 'ProdutoController@geraToken');

Auth::routes();

Route::post('/api/auth/login', 'AuthController@authenticate');

Route::post('/usuarios', 'UsuarioController@store'); //Insere usuario
Route::put('/usuarios/{id}', 'UsuarioController@update'); //Atualiza usuario{id}
Route::delete('/usuarios/{id}', 'UsuarioController@delete'); //Deleta usuario{id}
Route::get('/usuarios/{id}', 'UsuarioController@show'); //Lista usuario{id}
Route::get('/usuarios', 'UsuarioController@index'); //Lista todos os usuarios
