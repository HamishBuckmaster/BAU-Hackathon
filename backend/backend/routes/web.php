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

//routes to backend Database
Route::get('/backend/sellin/all', 'SellInController@index');
Route::get('/backend/sellout/all', 'SellOutController@index');
Route::get('/backend/promo/all', 'PromoController@index');
Route::get('/backend/masterdata/all', 'MasterDataController@index');

//get the specific data
Route::get('/backend/masterdata/{id}', 'MasterDataController@id');
Route::get('/backend/sellin/{id}', 'SellInController@id');
Route::get('/backend/sellout/{id}', 'SellOutController@id');
Route::get('/backend/promo/{id}', 'PromoController@id');
