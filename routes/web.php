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

Route::get('/', 'Frontend\FrontendController@index');
Route::get('/login', 'Backend\Auth\AuthController@login')->name('login');
Route::get('/register', 'Backend\Auth\AuthController@register')->name('register');

Route::post('/authenticate', 'Backend\Auth\AuthController@authenticate')->name('authenticate');
Route::post('/signup', 'Backend\Auth\AuthController@signup')->name('signup');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', 'Backend\Dashboard\DashboardController@index')->name('dashboard.index');
});

Route::group(['middleware' => ['auth', 'permission:ver_usuarios']], function () {
  Route::get('/users', 'Backend\Auth\UserController@index')->name('users.index');
});
Route::group(['middleware' => ['auth', 'permission:crear_usuario']], function () {
  Route::post('/user', 'Backend\Auth\UserController@store');
});
Route::group(['middleware' => ['auth', 'permission:editar_usuario']], function () {
  Route::get('/user/{user}', 'Backend\Auth\UserController@edit');
  Route::post('/user/{id}', 'Backend\Auth\UserController@update');
});
Route::group(['middleware' => ['auth', 'permission:eliminar_usuario']], function () {
  Route::get('/deleteuser/{id}', 'Backend\Auth\UserController@destroy');
});

Route::group(['middleware' => ['auth', 'permission:ver_permisos']], function () {
  Route::get('/permissions', 'Backend\Auth\PermissionController@index')->name('permissions.index');
});

Route::group(['middleware' => ['auth', 'permission:crear_permiso']], function () {
  Route::post('/permission', 'Backend\Auth\PermissionController@store');
});
Route::group(['middleware' => ['auth', 'permission:editar_permiso']], function () {
  Route::get('/permission/{permission}', 'Backend\Auth\PermissionController@edit');
  Route::post('/permission/{id}', 'Backend\Auth\PermissionController@update');
});

Route::group(['middleware' => ['auth', 'permission:eliminar_permiso']], function () {
  Route::get('/deletepermission/{id}', 'Backend\Auth\PermissionController@destroy');

});

Route::group(['middleware' => ['auth', 'permission:ver_roles']], function () {
  Route::get('/roles', 'Backend\Auth\RoleController@index')->name('roles.index');
});
Route::group(['middleware' => ['auth', 'permission:crear_rol']], function () {
  Route::post('/role', 'Backend\Auth\RoleController@store');
});

Route::group(['middleware' => ['auth', 'permission:editar_rol']], function () {
  Route::get('/role/{role}', 'Backend\Auth\RoleController@edit');
  Route::post('/role/{id}', 'Backend\Auth\RoleController@update');
});

Route::group(['middleware' => ['auth', 'permission:eliminar_rol']], function () {
  Route::get('/deleterole/{id}', 'Backend\Auth\RoleController@destroy');
});
