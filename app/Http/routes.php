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

Route::post('ddtConfirm/{id}', [
  'as' => 'ddtConfirm',
  'uses' => 'DdtOkController@store'
]);

Route::group(['as' => 'visit::'], function(){
  Route::get('/visit/insert/{codice?}', [
    'as' => 'insert',
    'uses' => 'VisitController@index'
  ]);
  Route::get('/visit/{codice}', [
    'as' => 'show',
    'uses' => 'VisitController@show'
  ]);
  Route::post('/visit/store', [
    'as' => 'store',
    'uses' => 'VisitController@store'
  ]);
});

Route::group(['as' => 'stFatt::'], function(){
  Route::get('/stFattAg/{codag?}', [
    'as' => 'idxAg',
    'uses' => 'StFattController@idxAg'
  ]);
  Route::get('/stFattCli', [
    'as' => 'idxCli',
    'uses' => 'StFattController@idxCli'
  ]);
  Route::get('/stFattCli/{codcli}', [
    'as' => 'fltCli',
    'uses' => 'StFattController@idxCli'
  ]);
  Route::post('/stFattAg', [
    'as' => 'idxAg',
    'uses' => 'StFattController@idxAg'
  ]);
  Route::post('/stFattCli', [
    'as' => 'idxCli',
    'uses' => 'StFattController@idxCli'
  ]);
});
// API ROUTES ==================================
// Route::group(['prefix' => 'api'], function() {
//
//     // since we will be using this just for CRUD, we won't need create and edit
//     // Angular will handle both of those forms
//     // this ensures that a user can't access api/create or api/edit when there's nothing there
//     Route::resource('product', 'ProductController', [
//       'only' => ['show']
//     ]);
//
// });
