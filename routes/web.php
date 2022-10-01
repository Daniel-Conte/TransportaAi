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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'produtos', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', ['as'=>'produtos', 'uses'=> 'ProdutosController@index']);
    Route::get('create', ['as'=>'produtos.create', 'uses'=> 'ProdutosController@create']);
    Route::get('{id}/destroy', ['as'=>'produtos.destroy', 'uses'=> 'ProdutosController@destroy']);
    Route::get('{id}/edit', ['as'=>'produtos.edit', 'uses'=> 'ProdutosController@edit']);
    Route::put('{id}/update', ['as'=>'produtos.update', 'uses'=> 'ProdutosController@update']);
    Route::post('store', ['as'=>'produtos.store', 'uses'=> 'ProdutosController@store']);
});