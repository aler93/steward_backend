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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/public', ['App\Http\Controllers\Frontend\HomeController', "public"]);
Route::get("/documentation", function(){
    return view("redoc");
});

Route::get("/php-info", function(){
    phpinfo();
});

// Frontend test only
//Route::get('/', ['App\Http\Controllers\Frontend\HomeController', "index"]);
Route::get('/login', ['App\Http\Controllers\Frontend\HomeController', "login"]);

Route::get('/carros', ['App\Http\Controllers\Frontend\ReabastecimentoController', "carros"]);
Route::get('/reabastecimento', ['App\Http\Controllers\Frontend\ReabastecimentoController', "registros"]);
