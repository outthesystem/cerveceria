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

Route::group(['prefix' => 'invoiceb'], function () {
  Route::group(['middleware' => ['auth', 'permission:ver_facturas']], function () {
    Route::get('/index', 'InvoiceController@index');
  });

  Route::group(['middleware' => ['auth', 'permission:crear_facturas']], function () {
    Route::get('/create_step1', 'InvoiceController@create_step1');
    Route::post('/step1_store', 'InvoiceController@step1_store');
  });

  Route::group(['middleware' => ['auth', 'permission:editar_facturas']], function () {
    Route::get('/edit/{invoice}', 'InvoiceController@edit');
    Route::get('/paidinvoice/{invoice}', 'InvoiceController@paidInvoice');
    Route::get('/cancelinvoice/{invoice}', 'InvoiceController@cancelInvoice');
    Route::post('/updateclient/{invoice}', 'InvoiceController@updateClient');
    Route::post('/storeitem/{invoice}', 'InvoiceController@storeItem');
    Route::post('/deleteitem/{invoiceitem}', 'InvoiceController@deleteItem');
    Route::post('/updatestock/{product}', 'InvoiceController@updateStock');
  });

  Route::group(['middleware' => ['auth', 'permission:eliminar_facturas']], function () {
    Route::get('/delete/{invoice}', 'InvoiceController@delete');
  });
});
