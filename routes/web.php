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

Route::group(['prefix'=> 'cidades', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', ['as'=>'cidades', 'uses'=> 'CidadesController@index']);
    Route::get('create', ['as'=>'cidades.create', 'uses'=> 'CidadesController@create']);
    Route::get('{id}/destroy', ['as'=>'cidades.destroy', 'uses'=> 'CidadesController@destroy']);
    Route::get('{id}/edit', ['as'=>'cidades.edit', 'uses'=> 'CidadesController@edit']);
    Route::put('{id}/update', ['as'=>'cidades.update', 'uses'=> 'CidadesController@update']);
    Route::post('store', ['as'=>'cidades.store', 'uses'=> 'CidadesController@store']);
});

Route::group(['prefix'=> 'veiculos', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('', ['as'=>'veiculos', 'uses'=> 'VeiculosController@index']);
    Route::get('create', ['as'=>'veiculos.create', 'uses'=> 'VeiculosController@create']);
    Route::get('{id}/destroy', ['as'=>'veiculos.destroy', 'uses'=> 'VeiculosController@destroy']);
    Route::get('{id}/edit', ['as'=>'veiculos.edit', 'uses'=> 'VeiculosController@edit']);
    Route::put('{id}/update', ['as'=>'veiculos.update', 'uses'=> 'VeiculosController@update']);
    Route::post('store', ['as'=>'veiculos.store', 'uses'=> 'VeiculosController@store']);
});