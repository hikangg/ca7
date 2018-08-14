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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/manufacturers', function () {
    $manufacturers = App\Manufacturer::all();
    return $manufacturers;
});

Route::middleware('auth:api')->get('/brands', function () {
    $brands = App\Brand::all();
    return $brands;
});

Route::middleware('auth:api')->get('/models', function () {
    $models = App\Modell::all();
    return $models;
});

Route::middleware('auth:api')->get('/modelsByBrand/{brand_id}', function ($id) {
    $models = App\Modell::where('brand_id', $id)->get();
    return $models;
});

Route::middleware('auth:api')->get('/vehicles', function () {
    $vehicles = App\Vehicle::all();
    return $vehicles;
});

Route::middleware('auth:api')->get('/vehiclesByModel/{model_id}', function ($id) {
    $vehicles = App\Vehicle::where('model_id', $id)->get();
    return $vehicles;
});

Route::middleware('auth:api')->get('/baskets', function () {
    $baskets = App\Baskets::all();
    return $baskets;
});

Route::middleware('auth:api')->post('/baskets', function (Request $request) {

    $call = \App\Http\Controllers\BasketsController::store($request);
           dd($call);
});


/*Route::middleware('auth:api')->get('/brands/{manufacturer_id}', function () {
    $brands = App\Brand::where('manufacturer_id', manufacturer_id)->get();
    return $brands;
});*/


Route::middleware('auth:api')->get('/modelnames', function () {
    return $array =  '[{
        "id": "100030",
        	"make": "BMW",
        	"model": "R 1200 RT",
        	"price": 17000
        }, {
        "id": "100040",
        	"make": "YAMAHA",
        	"model": "FJR1300AS",
        	"price": 19000
        }]';

/*    return $array = [
        [
            "id" => "100030",
            "make" => "BMW",
            "model" => "R 1200 RT"
        ],
        [
            "id" => "100040",
            "make" => "YAMAHA",
            "model" => "FJR1300AS"
        ]
    ];*/
});

