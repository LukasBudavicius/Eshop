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


Route::resource('product', 'ProductsController');
Route::get('/', 'ProductsController@index');
Route::get('/cart', 'ProductsController@cart');
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
Route::patch('update-cart', 'ProductsController@update');
Route::delete('remove-from-cart', 'ProductsController@destroy');
Route::get('checkout', 'ProductsController@checkout');
Route::post('/charge', 'ProductsController@charge');
Route::get('/dashboard', 'PagesController@showAdmin');

Route::group(['prefix' => 'user'], function(){
  Route::group(['middleware' => 'guest'], function(){
    Route::get('/signup', 'UserController@getSignup');
    Route::post('/signup', 'UserController@postSignup');
    Route::get('/signin', 'UserController@getSignIn');
    Route::post('/signin', 'UserController@postSignIn');
  });
  Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'UserController@getProfile');
    Route::get('/logout', 'UserController@getLogout');
  });
});


##Route::get('/about', function(){
    ##return view('pages.about');
##});
