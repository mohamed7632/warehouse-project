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

Route::get('cat' , 'CategoryController@index');
Route::get('cat/{id}' , 'CategoryController@show');
Route::get('cat/store/{name}' , 'CategoryController@store');
Route::get('cat/update/{id}' , 'CategoryController@update');
Route::get('cat/delete/{id}' , 'CategoryController@delete');

Route::get('/items/{cat_id}','ItemController@showItems');
Route::post('/items/store','ItemController@storeItems');
Route::get('/items/{item_id}/{price}' , 'ItemController@update');
Route::get('/items/delete/{id}' , 'ItemController@delete');
