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

Route::get('login','LoginController@index');
Route::post('login','LoginController@action')->name('login.post');
Route::get('logout','LoginController@logout');

Route::group(['middleware' => 'cekAdmin'], function () {

    Route::post('users','UsersController@store')->name('users.post');
    Route::put('users/edit/{id}','UsersController@update')->name('users.edit');
    Route::delete('users','UsersController@delete')->name('users.delete');

});

Route::get('users/detail/{id}','UsersController@detail')->name('users.detail');

Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
Route::get('/category','CategoryController@index')->name('category.index');
Route::post('/category','CategoryController@save')->name('category.save');


Route::get('/users','UsersController@index')->name('users.index');
Route::get('/product','ProductController@index')->name('product.index');

Route::get('/main_product','MainproductController@index')->name('main_product.index');
Route::get('/product_detail','MainproductController@product_detail')->name('main_product.product_detail');

Route::get('/change_password','SettingsController@change_password')->name('settings.change_password');
Route::get('/edit_profile','SettingsController@edit_profile')->name('settings.edit_profile');
