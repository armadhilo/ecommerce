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

Route::get('/','Product@index');

Route::get('/category','Category@index');
Route::post('/save_category','Category@save_category');
Route::get('/ajax_list','Category@ajax_list');
Route::get('/edit/{id}', 'Category@edit');
Route::post('/update_category', 'Category@update_category');
Route::get('/delete/{id}', 'Category@hapus');