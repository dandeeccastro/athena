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

Route::get("book","BookController@index");
Route::post("book","BookController@store");
Route::get("book/{id}","BookController@show");
Route::put("book/{id}","BookController@update");
Route::delete("book/{id}","BookController@destroy");
Route::get("book/download/{id}","BookController@downloadBook");


Route::get("category","CategoryController@index");
Route::post("category","CategoryController@store");
Route::get("category/{id}","CategoryController@show");
Route::put("category/{id}","CategoryController@update");
Route::delete("category/{id}","CategoryController@destroy");
