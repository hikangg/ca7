<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/security', 'SecurityController@index');
Route::get('/manufacturers', 'ManufacturerController@index');
Route::get('/manufacturers/{manufacturer}', 'ManufacturerController@show');
Route::get('/brands', 'BrandController@index');
Route::get('/brands/{brand}', 'BrandController@show');
Route::get('/brandmodels', 'BrandController@more');
Route::get('/brandmatrix', 'BrandController@matrix');
Route::get('/models', 'ModellController@index');
Route::get('/models/{model}', 'ModellController@show');
Route::get('/baskets', 'BasketsController@index');
