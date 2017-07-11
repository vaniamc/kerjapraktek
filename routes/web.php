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

Route::group(['prefix' => 'dashboard'], function (){
    Route::get('/', 'AdminController@index');
    Route::get('all', 'AdminController@all')->name('admin.all');
    Route::get('publish', 'AdminController@publish')->name('admin.published');
    Route::get('add', 'AdminController@add')->name('admin.add');
    Route::post('add', 'AdminController@insert')->name('admin.insert');
    Route::get('edit/{id}', 'AdminController@edit');
    Route::post('edit/{id}', 'AdminController@submitEdit');
    Route::get('delete/{id}', 'AdminController@delete');
    Route::post('delete/{id}', 'AdminController@submitDelete');
});