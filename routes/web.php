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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function() {
    Route::group(['prefix'=> 'produtos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('', ['as'=>'produtos', 'uses'=> 'ProdutosController@index']);
        Route::get('create', ['as'=>'produtos.create', 'uses'=> 'ProdutosController@create']);
        Route::get('{id}/destroy', ['as'=>'produtos.destroy', 'uses'=> 'ProdutosController@destroy']);
        Route::get('edit', ['as'=>'produtos.edit', 'uses'=> 'ProdutosController@edit']);
        Route::put('update', ['as'=>'produtos.update', 'uses'=> 'ProdutosController@update']);
        Route::post('store', ['as'=>'produtos.store', 'uses'=> 'ProdutosController@store']);
    });

    Route::group(['prefix'=> 'cidades', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('', ['as'=>'cidades', 'uses'=> 'CidadesController@index']);
        Route::get('create', ['as'=>'cidades.create', 'uses'=> 'CidadesController@create']);
        Route::get('{id}/destroy', ['as'=>'cidades.destroy', 'uses'=> 'CidadesController@destroy']);
        Route::get('edit', ['as'=>'cidades.edit', 'uses'=> 'CidadesController@edit']);
        Route::put('update', ['as'=>'cidades.update', 'uses'=> 'CidadesController@update']);
        Route::post('store', ['as'=>'cidades.store', 'uses'=> 'CidadesController@store']);
    });

    Route::group(['prefix'=> 'veiculos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('', ['as'=>'veiculos', 'uses'=> 'VeiculosController@index']);
        Route::get('create', ['as'=>'veiculos.create', 'uses'=> 'VeiculosController@create']);
        Route::get('{id}/destroy', ['as'=>'veiculos.destroy', 'uses'=> 'VeiculosController@destroy']);
        Route::get('edit', ['as'=>'veiculos.edit', 'uses'=> 'VeiculosController@edit']);
        Route::put('update', ['as'=>'veiculos.update', 'uses'=> 'VeiculosController@update']);
        Route::post('store', ['as'=>'veiculos.store', 'uses'=> 'VeiculosController@store']);
    });

    Route::group(['prefix'=> 'envolvidos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('', ['as'=>'envolvidos', 'uses'=> 'EnvolvidosController@index']);
        Route::get('create', ['as'=>'envolvidos.create', 'uses'=> 'EnvolvidosController@create']);
        Route::get('{id}/destroy', ['as'=>'envolvidos.destroy', 'uses'=> 'EnvolvidosController@destroy']);
        Route::get('edit', ['as'=>'envolvidos.edit', 'uses'=> 'EnvolvidosController@edit']);
        Route::put('update', ['as'=>'envolvidos.update', 'uses'=> 'EnvolvidosController@update']);
        Route::post('store', ['as'=>'envolvidos.store', 'uses'=> 'EnvolvidosController@store']);
    });

    Route::group(['prefix'=> 'transportes', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('', ['as'=>'transportes', 'uses'=> 'TransportesController@index']);
        Route::get('create', ['as'=>'transportes.create', 'uses'=> 'TransportesController@create']);
        Route::get('{id}/destroy', ['as'=>'transportes.destroy', 'uses'=> 'TransportesController@destroy']);
        Route::get('edit', ['as'=>'transportes.edit', 'uses'=> 'TransportesController@edit']);
        Route::put('update', ['as'=>'transportes.update', 'uses'=> 'TransportesController@update']);
        Route::post('store', ['as'=>'transportes.store', 'uses'=> 'TransportesController@store']);
    });
});