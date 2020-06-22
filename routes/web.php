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
    return view('master-page');
});

Route::prefix('products')->group(function(){
	Route::get('/list','ProductsController@index')->name('products-list');
});
Route::prefix('categories')->group(function(){
	Route::get('/list','CategoriesController@index')->name('categories-list');
});
Route::prefix('customers')->group(function(){
	Route::get('/list','CustomersController@index')->name('customers-list');
});
Route::prefix('users')->group(function(){
	Route::get('/list','UsersController@index')->name('users-list');
});
Route::prefix('roles')->group(function(){
	Route::get('/list','RolesController@index')->name('roles-list');
});
Route::prefix('ingredients')->group(function(){
	Route::get('/list','IngredientsController@index')->name('ingredients-list');
});
Route::prefix('orders-in')->group(function(){
	Route::get('/list','OrdersInController@index')->name('orders-in-list');
});
Route::prefix('orders-out')->group(function(){
	Route::get('/list','OrdersOutController@index')->name('orders-out-list');
});