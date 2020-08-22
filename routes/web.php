<?php

use App\Http\Controllers\Ejemplo3Controller;
use App\Http\Controllers\PaginasController;
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

/*Route::get('/', "PaginasController@inicio");
Route::get('/inicio', "PaginasController@inicio");
Route::get('/quienessomos', "PaginasController@quienessomos");
Route::get('/dondeestamos', "PaginasController@dondeestamos");
Route::get('/foro', "PaginasController@foro");

Route::get('/inicio/{id}', 'Ejemplo3Controller@index');*/

Route::get('/', function(){
    return view('welcome');
});

Route::resource('restaurantes', 'Ejemplo3Controller');
