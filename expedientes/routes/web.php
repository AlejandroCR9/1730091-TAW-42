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


Route::get('/{any}', function () {
    return view('home');
  })->where('any', '.*');
*/
Auth::routes();

Route::get('/Alex/1730091-TAW-42/expedientes/public/{any}', 'HomeController@index')->name('home')->where('any', '.*');
