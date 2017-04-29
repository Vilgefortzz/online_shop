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

    $categories = \App\Category::all();

    /*
     * Recommended products - collection
     */
    $recommendedProducts = \App\Product::all()->where('recommended', true);

    return view('main_page', compact('categories', 'recommendedProducts'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * Cart - Session
 */

Route::get('/cart', 'CartController@showProducts');

/*
 * User Routes
 */
Route::group(['prefix' => 'users'], function () {

    Route::get('/', 'UserController@index');
    Route::get('/{user}/settings', 'UserController@showSettings');

    /*
     * Settings panel
     */
    Route::put('/{user}/update/name', 'UserController@updateName');
    Route::put('/{user}/update/password', 'UserController@updatePassword');
    Route::put('/{user}/update/email', 'UserController@updateEmail');
    Route::delete('/{user}/delete', 'UserController@delete');
});

/*
 * Products Routes
 */
Route::group(['prefix' => 'products'], function () {

    Route::get('/{product}', 'ProductController@show');
});

Route::get('/subcategories/{subcategory}/products', 'SubcategoryController@showAllProducts');

Route::post('/cart/add/{product}', 'CartController@addProduct');
Route::delete('/cart/delete/{product}', 'CartController@deleteProduct');

Route::post('/products/{product}/reviews/add', 'ReviewController@store');
