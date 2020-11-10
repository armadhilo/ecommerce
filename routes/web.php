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
    return view('login.login');
});

Route::get('login','LoginController@index')->name('login.index');
Route::post('login','LoginController@action')->name('login.post');
Route::get('logout','LoginController@logout')->name('login.logout');

// Route::group(['middleware' => 'cekAdmin'], function () {

    Route::post('users/add','UsersController@store')->name('users.post');
    Route::get('users/list','UsersController@list')->name('users.get');
    Route::post('users/update','UsersController@update')->name('users.edit');
    // Route::delete('users','UsersController@delete')->name('users.delete');
    Route::get('users/detail/{id}','UsersController@detail')->name('users.detail');

    Route::post('category/add','CategoryController@store')->name('category.post');
    Route::get('category/list','CategoryController@list')->name('category.get');
    Route::post('category/update','CategoryController@update')->name('category.edit');
    // Route::delete('category','UsersController@delete')->name('users.delete');
    Route::get('category/detail/{id}','CategoryController@detail')->name('category.detail');

    Route::post('product/add','ProductController@store')->name('product.post');
    Route::get('product/list','ProductController@list')->name('product.get');
    Route::post('product/update','ProductController@update')->name('product.edit');
    // Route::delete('category','UsersController@delete')->name('users.delete');
    Route::get('product/detail/{id}','ProductController@detail')->name('product.detail');

    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
    Route::get('/users','UsersController@index')->name('users.index');
    Route::get('/category','CategoryController@index')->name('category.index');
    Route::get('/product','ProductController@index')->name('product.index');

    Route::get('/slider','SliderController@index')->name('slider.index');
    Route::post('slider/add','SliderController@store')->name('slider.post');
    Route::get('slider/list','SliderController@list')->name('slider.get');
    Route::get('slider/detail/{id}','SliderController@detail')->name('slider.detail');
    Route::post('slider/update','SliderController@update')->name('slider.edit');


// });

    

    Route::get('/main_product','MainproductController@index')->name('main_product.index');
    Route::get('main_product/search','MainproductController@list');
    Route::get('/product_detail','MainproductController@product_detail')->name('main_product.product_detail');

    Route::get('/change_password','SettingsController@change_password')->name('settings.change_password');
    Route::get('/edit_profile','SettingsController@edit_profile')->name('settings.edit_profile');
