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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/client', 'ClientController@index');
Route::get('/client/{codice}', 'ClientController@detail');

Route::get('/doc/{tipodoc?}', 'DocCliController@index');
Route::get('/client/{codice}/doc/{tipomodulo?}', 'DocCliController@docCli');

Route::get('docrows/{id_testa}', 'DocRowController@show');