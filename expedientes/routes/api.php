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

Route::post('/producto/create', 'productosController@store');
Route::get('/producto/edit/{id}', 'productosController@edit');
Route::post('/producto/update/{id}', 'productosController@update');
Route::delete('/producto/delete/{id}', 'productosController@destroy');
Route::get('/producto', 'productosController@index');
