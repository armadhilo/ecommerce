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

Route::get('/','MainproductController@index')->name('main_product.index');

Route::get('login','LoginController@index')->name('login.index');
Route::post('login','LoginController@action')->name('login.post');
Route::get('logout','LoginController@logout')->name('login.logout');

Route::group(['middleware' => 'cekLogin'], function () {

    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
    Route::get('/dashboard/chart','DashboardController@chart')->name('dashboard.chart');
    Route::get('/change_password','SettingsController@change_password')->name('settings.change_password');
    Route::post('/change_password/action','SettingsController@actionChangePassword');
    Route::get('/edit_profile','SettingsController@edit_profile')->name('settings.edit_profile');
    

    Route::group(['middleware' => 'cekSuperAdmin'], function () {
        Route::get('/category','CategoryController@index')->name('category.index');
        Route::post('category/add','CategoryController@store')->name('category.post');
        Route::get('category/list','CategoryController@list')->name('category.get');
        Route::post('category/update','CategoryController@update')->name('category.edit');
        Route::get('category/detail/{id}','CategoryController@detail')->name('category.detail');

        Route::get('/users','UsersController@index')->name('users.index');
        Route::post('users/add','UsersController@store')->name('users.post');
        Route::get('users/list','UsersController@list')->name('users.get');
        Route::post('users/update','UsersController@update')->name('users.edit');
        Route::get('users/detail/{id}','UsersController@detail')->name('users.detail');

        Route::get('/log','LogController@index')->name('log.index');
        Route::get('/log/list','LogController@list')->name('log.get');
    });

    Route::group(['middleware' => 'cekAdmin'], function () {
        Route::get('/product','ProductController@index')->name('product.index');
        Route::post('product/add','ProductController@store')->name('product.post');
        Route::get('product/list','ProductController@list')->name('product.get');
        Route::post('product/update','ProductController@update')->name('product.edit');
        Route::get('product/detail/{id}','ProductController@detail')->name('product.detail');
        Route::post('product/delete/{id}','ProductController@delete')->name('product.delete');

        Route::post('image/add','ImageController@store');
        Route::post('image/update','ImageController@update');
        Route::get('image/detail/{id}','ImageController@detail');
        Route::get('image/list/{id}','ImageController@list');
        Route::post('image/delete/{id}','ImageController@delete');

        Route::get('/slider','SliderController@index')->name('slider.index');
        Route::post('slider/add','SliderController@store')->name('slider.post');
        Route::get('slider/list','SliderController@list')->name('slider.get');
        Route::get('slider/detail/{id}','SliderController@detail')->name('slider.detail');
        Route::post('slider/update','SliderController@update')->name('slider.edit');
        Route::post('slider/delete/{id}','SliderController@delete')->name('slider.delete');
    });

});

Route::get('/product/export_pdf/{id}','ProductController@cetak_pdf');
// Route::view('product/export_pdf','pdf');
Route::get('/about_us','AboutusController@index')->name('about_us.index');
Route::get('/contact_us','AboutusController@contact_us')->name('about_us.contact_us');
Route::get('/main_product','MainproductController@index')->name('main_product.index');
Route::post('main_product/search','MainproductController@list');
Route::get('/product_detail/{id}','MainproductController@product_detail')->name('main_product.product_detail');
