<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'client'], function () {
  Route::group(['middleware' => ['auth', 'permission:ver_clientes']], function () {
    Route::get('/index', 'ClientController@index');
  });

  Route::group(['middleware' => ['auth', 'permission:crear_clientes']], function () {
    Route::post('/store', 'ClientController@store');
  });

  Route::group(['middleware' => ['auth', 'permission:editar_clientes']], function () {
    Route::get('/edit/{client}', 'ClientController@edit');
    Route::post('/update/{client}', 'ClientController@update');
  });

  Route::group(['middleware' => ['auth', 'permission:eliminar_clientes']], function () {
    Route::get('/delete/{client}', 'ClientController@destroy');
  });
});
