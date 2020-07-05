<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', 'productosController@index');
Route::get('/{any}', function () {
    return view('welcome');
  })->where('any', '.*');

/*Route::post('/producto/create', 'PproductosController@store');
Route::get('/producto/edit/{id}', 'productosController@edit');
Route::post('/producto/update/{id}', 'productosController@update');
Route::delete('/producto/delete/{id}', 'productosController@delete');
Route::get('/producto', 'productosController@index');*/
//Route::resource('productos', 'productosController');