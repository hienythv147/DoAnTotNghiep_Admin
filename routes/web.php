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


Auth::routes();

Route::middleware('auth')->group(function() {
	Route::middleware(['can:isAdmin'])->group(function() {
		Route::prefix('Admin')->group(function()  {
			Route::get('/','HomeController@index')->name('admin-home');
			Route::get('/home', 'HomeController@index')->name('admin-home');

			Route::prefix('products')->group(function(){
				Route::get('list','ProductsController@index')->name('products-list');
				Route::get('add','ProductsController@create')->name('products-add');
				Route::post('add','ProductsController@store')->name('products-add-process');
				Route::get('delete/{id}','ProductsController@destroy')->name('products-del');
				Route::get('trash','ProductsController@trash')->name('products-trash');
				Route::get('restore/{id}','ProductsController@restore')->name('products-res');
			});

			Route::prefix('categories')->group(function(){
				Route::get('list','CategoriesController@index')->name('categories-list');
				Route::get('add','CategoriesController@create')->name('categories-add');
				Route::post('add','CategoriesController@store')->name('categories-add-process');
				Route::get('edit/{id}','CategoriesController@edit')->name('categories-edit');
				Route::post('edit/{id}','CategoriesController@update')->name('categories-edit-process');
				Route::get('delete/{id}','CategoriesController@destroy')->name('categories-del');
				Route::get('trash','CategoriesController@trash')->name('categories-trash');
				Route::get('restore/{id}','CategoriesController@restore')->name('categories-res');
			});

			Route::prefix('customers')->group(function(){
				Route::get('list','CustomersController@index')->name('customers-list');
				Route::get('add','CustomersController@create')->name('customers-add');
				Route::post('add','CustomersController@store')->name('customers-add-process');
				Route::get('edit/{id}','CustomersController@edit')->name('customers-edit');
				Route::post('edit/{id}','CustomersController@update')->name('customers-edit-process');
				Route::get('disable/{id}','CustomersController@disable')->name('customers-disable');
				Route::get('trash','CustomersController@trash')->name('customers-trash');
				Route::get('restore/{id}','CustomersController@restore')->name('customers-res');
			});

			Route::prefix('users')->group(function(){
				Route::get('list','UsersController@index')->name('users-list');
				Route::get('add','UsersController@create')->name('users-add');
				Route::post('add','UsersController@store')->name('users-add-process');
				Route::get('edit/{id}','UsersController@edit')->name('users-edit');
				Route::post('edit/{id}','UsersController@update')->name('users-edit-process');
				Route::get('disable/{id}','UsersController@disable')->name('users-disable');
				Route::get('trash','UsersController@trash')->name('users-trash');
				Route::get('restore/{id}','UsersController@restore')->name('users-res');
			});

			Route::prefix('roles')->group(function(){
				Route::get('list','RolesController@index')->name('roles-list');
				Route::get('add','RolesController@create')->name('roles-add');
				Route::post('add','RolesController@store')->name('roles-add-process');
				Route::get('edit/{id}','RolesController@edit')->name('roles-edit');
				Route::post('edit/{id}','RolesController@update')->name('roles-edit-process');
				Route::get('delete/{id}','RolesController@destroy')->name('roles-del');
				Route::get('trash','RolesController@trash')->name('roles-trash');
				Route::get('restore/{id}','RolesController@restore')->name('roles-res');
			});

			Route::prefix('ingredients')->group(function(){
				Route::get('list','IngredientsController@index')->name('ingredients-list');
				Route::get('add','IngredientsController@create')->name('ingredients-add');
				Route::post('add','IngredientsController@store')->name('ingredients-add-process');
				Route::get('edit/{id}','IngredientsController@edit')->name('ingredients-edit');
				Route::post('edit/{id}','IngredientsController@update')->name('ingredients-edit-process');
				Route::get('delete/{id}','IngredientsController@destroy')->name('ingredients-del');
				Route::get('trash','IngredientsController@trash')->name('ingredients-trash');
				Route::get('restore/{id}','IngredientsController@restore')->name('ingredients-res');
			});

			Route::prefix('orders-in')->group(function(){
				Route::get('list','OrdersInController@index')->name('orders-in-list');
				Route::get('detail/{id}','OrdersInController@show')->name('orders-in-detail');
			});

			Route::prefix('orders-out')->group(function(){
				Route::get('list','OrdersOutController@index')->name('orders-out-list');
				Route::get('detail/{id}','OrdersOutController@show')->name('orders-out-detail');
			});
		});
	});
});

// Route home index
Route::get('/', 'HomeController@index_user')->name('home');
Route::get('/home', 'HomeController@index_user')->name('home');

// Route page categories
Route::get('/categories', 'CategoriesController@home_categories')->name('categories');
Route::get('/category/{id}', 'ProductsController@show')->name('category_detail');

// Route page list products
Route::get('/products', 'ProductsController@index_user')->name('products');

// Route page product detail
Route::get('/product/{id}', 'ProductsController@showProductDetail')->name('product_detail')->middleware('auth');;

// Route page cart
Route::get('/cart', 'HomeController@viewCart')->name('cart')->middleware('auth');
Route::get('/add-to-cart', 'HomeController@addToCart')->name('addCart')->middleware('auth');
Route::get('/add-to-cart-product-detail', 'HomeController@addToCartProductDetail')->name('addCartPD')->middleware('auth');

// Route page about
Route::get('/about', function () {
    return view('home/about');
})->name('about');

// Route order products
Route::get('/create-order', 'OrderController@createOrder')->name('create_order')->middleware('auth');

// Route history order
Route::get('/history-order', 'OrderController@historyOrder')->name('history_order')->middleware('auth');

// Route history order detail
Route::get('/history-order-detail/{id}', 'OrderController@historyOrderDetail')->middleware('auth');
