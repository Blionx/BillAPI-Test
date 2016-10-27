<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//api/v1 Routes Begin
Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
	//clientes Routes Begin
	Route::get('/clientes','ClientesController@index');
	Route::get('/clientes/{id}/facturas','ClientesController@indexbills');
	Route::post('/clientes', 'ClientesController@creator');
	Route::put('/clientes/{id}', 'ClientesController@editor');
	Route::delete('/clientes/{id}', 'ClientesController@deletor');
	//clientes Routes End
	//productos Routes Begin
	Route::get('/productos','ProductosController@index');
	Route::post('/productos', 'ProductosController@creator');
	Route::put('/productos/{id}', 'ProductosController@editor');
	Route::delete('/productos/{id}', 'ProductosController@deletor');
	//productos Routes End
	//facturas Routes Begin solo registro de facturas +vista
	Route::get('/facturas','FacturasController@index');
	Route::post('/facturas', 'FacturasController@creator');
	//facturas Routes End
});
//api/v1 Routes End