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

Route::group(['prefix' => 'product'], function () {
  Route::group(['middleware' => ['auth', 'permission:ver_productos']], function () {
    Route::get('/index', 'ProductController@index');
  });

  Route::group(['middleware' => ['auth', 'permission:crear_productos']], function () {
    Route::post('/store', 'ProductController@store');
  });

  Route::group(['middleware' => ['auth', 'permission:editar_productos']], function () {
    Route::get('/edit/{product}', 'ProductController@edit');
    Route::post('/update/{product}', 'ProductController@update');
  });

  Route::group(['middleware' => ['auth', 'permission:eliminar_productos']], function () {
    Route::get('/delete/{product}', 'ProductController@destroy');
  });

  // routes categories

  Route::group(['middleware' => ['auth', 'permission:ver_categorias']], function () {
    Route::get('/categories', 'CategoryController@index');
  });

  Route::group(['middleware' => ['auth', 'permission:crear_categorias']], function () {
    Route::post('/categories/store', 'CategoryController@store');
  });

  Route::group(['middleware' => ['auth', 'permission:editar_categorias']], function () {
    Route::get('/editcategory/{category}', 'CategoryController@edit');
    Route::post('/updatecategory/{category}', 'CategoryController@update');
  });

  Route::group(['middleware' => ['auth', 'permission:eliminar_categorias']], function () {
    Route::get('/deletecategory/{category}', 'CategoryController@destroy');
  });

});
