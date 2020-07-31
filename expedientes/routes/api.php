<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//==================RUTAS ALERGIAS
Route::post('/alergia/create', 'alergiasController@store');
Route::get('/alergia/edit/{id}', 'alergiasController@edit');
Route::post('/alergia/update/{id}', 'alergiasController@update');
Route::delete('/alergia/delete/{id}', 'alergiasController@destroy');
Route::get('/alergia', 'alergiasController@index');

//================RUTAS PADECIMIENTOS

Route::post('/padecimiento/create', 'padecimientosController@store');
Route::get('/padecimiento/edit/{id}', 'padecimientosController@edit');
Route::post('/padecimiento/update/{id}', 'padecimientosController@update');
Route::delete('/padecimiento/delete/{id}', 'padecimientosController@destroy');
Route::get('/padecimiento', 'padecimientosController@index');

//================RUTAS MEDICAMENTOS
Route::post('/medicamento/create', 'medicamentosController@store');
Route::get('/medicamento/edit/{id}', 'medicamentosController@edit');
Route::post('/medicamento/update/{id}', 'medicamentosController@update');
Route::delete('/medicamento/delete/{id}', 'medicamentosController@destroy');
Route::get('/medicamento', 'medicamentosController@index');

//================RUTAS PACIENTES
Route::post('/paciente/create', 'pacientesController@store');
Route::get('/paciente/edit/{id}', 'pacientesController@edit');
Route::post('/paciente/update/{id}', 'pacientesController@update');
Route::delete('/paciente/delete/{id}', 'pacientesController@destroy');
Route::get('/paciente', 'pacientesController@index');
Route::get('/pu', 'pacientesController@ultimo');

//================RUTAS Medicos
Route::post('/medico/create', 'medicosController@create');
Route::get('/medico/edit/{id}', 'medicosController@edit');
Route::post('/medico/update/{id}', 'medicosController@update');
Route::delete('/medico/delete/{id}', 'medicosController@destroy');
Route::get('/medico', 'medicosController@index');

//================RUTAS SECRE
Route::post('/secretaria/create', 'medicosController@create2');
Route::get('/secretaria/edit/{id}', 'medicosController@edit');
Route::post('/secretaria/update/{id}', 'medicosController@update2');
Route::delete('/secretaria/delete/{id}', 'medicosController@destroy');
Route::get('/secretaria', 'medicosController@index2');



Route::post('/expediente/create', 'pacientesController@storeE');