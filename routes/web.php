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

    //nang kene route mari validasi

});

Route::get('/users','UsersController@index')->name('users.index');
Route::get('/category','CategoryController@index')->name('category.index');
Route::get('/product','ProductController@index')->name('product.index');