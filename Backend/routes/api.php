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

Route::get("type","TypeController@index");
Route::post("type","TypeController@store");
Route::get("type/{id}","TypeController@show");
Route::put("type/{id}","TypeController@update");
Route::delete("type/{id}","TypeController@destroy");

Route::get("expense","ExpenseController@index");
Route::post("expense","ExpenseController@store");
Route::get("expense/{id}","ExpenseController@show");
Route::put("expense/{id}","ExpenseController@update");
Route::delete("expense/{id}","ExpenseController@destroy");

Route::get("xablau","XablauController@index");
Route::post("xablau","XablauController@store");
Route::get("xablau/{id}","XablauController@show");
Route::put("xablau/{id}","XablauController@update");
Route::delete("xablau/{id}","XablauController@destroy");
Route::get("xablau/{month}/{year}","XablauController@findByDate");
