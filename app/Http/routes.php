<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blankPage', function () {
    return view('vendor._blankPage');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['as' => 'user::'], function () {
  Route::resource('users', 'UserController');
  Route::get('/cli_users', [
    'as' => 'usersCli',
    'uses' => 'UserController@indexCli'
  ]);
  Route::get('/users_import', [
    'as' => 'import',
    'uses' => 'UserController@showImport'
  ]);
  Route::post('/users_import', [
    'as' => 'import',
    'uses' => 'UserController@doImport'
  ]);
  Route::get('/actLike/{id}', [
    'as' => 'actLike',
    'uses' => 'UserController@actLike'
  ]);
});

Route::group(['as' => 'client::'], function () {
  Route::get('/clients', [
    'as' => 'list',
    'uses' => 'ClientController@index'
  ]);
  Route::get('/client/{codice}', [
    'as' => 'detail',
    'uses' => 'ClientController@detail'
  ]);
  Route::post('/clients/filter', [
    'as' => 'fltList',
    'uses' => 'ClientController@fltIndex'
  ]);
});

Route::group(['as' => 'doc::'], function () {
  Route::get('/docs/{tipomodulo?}', [
    'as' => 'list',
    'uses' => 'DocCliController@index'
  ]);
  Route::post('/docs/filter', [
    'as' => 'fltList',
    'uses' => 'DocCliController@fltIndex'
  ]);
  Route::get('/client/{codice}/doc/{tipomodulo?}', [
    'as' => 'client',
    'uses' => 'DocCliController@docCli'
  ]);
  Route::get('/doc/{id_testa}', [
    'as' => 'detail',
    'uses' => 'DocCliController@showDetail'
  ]);

  Route::get('/docs_deliver', [
    'as' => 'orderDeliver',
    'uses' => 'DocCliController@showOrderToDeliver'
  ]);
  Route::get('/docs_receive', [
    'as' => 'ddtReceive',
    'uses' => 'DocCliController@showDdtToReceive'
  ]);
});

Route::group(['as' => 'prod::'], function () {
  Route::get('/prods', [
    'as' => 'list',
    'uses' => 'ProductController@index'
  ]);
  Route::post('/prods/filter', [
    'as' => 'fltList',
    'uses' => 'ProductController@fltIndex'
  ]);
  Route::get('/prod/{codice}', [
    'as' => 'detail',
    'uses' => 'ProductController@showDetail'
  ]);

  Route::get('/prods_new', [
    'as' => 'newProd',
    'uses' => 'ProductController@showNewProducts'
  ]);
});

Route::group(['as' => 'scad::'], function () {
  Route::get('/scads', [
    'as' => 'list',
    'uses' => 'ScadCliController@index'
  ]);
  Route::post('/scads/filter', [
    'as' => 'fltList',
    'uses' => 'ScadCliController@fltIndex'
  ]);
  Route::get('/client/{codice}/scads', [
    'as' => 'client',
    'uses' => 'ScadCliController@scadCli'
  ]);
  Route::get('/scad/{id_scad}', [
    'as' => 'detail',
    'uses' => 'ScadCliController@showDetail'
  ]);
});
