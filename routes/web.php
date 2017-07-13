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

Route::get('/contact', 'AboutController@contact' );
Route::get('/', 'AboutController@home' );
Route::get('/index', 'AboutController@home' )->name('index');
Route::get('blog/search','AboutController@search');


/* Admin Routes*/
Route::get('blog/{id}','BlogController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::group(['prefix' => 'dashboard'], function (){
        Route::get('/', 'AdminController@index');
        Route::get('all', 'AdminController@all')->name('admin.all');
        Route::get('publish', 'AdminController@publish')->name('admin.published');
        Route::get('add', 'AdminController@add')->name('admin.add');
        Route::post('add', 'AdminController@insert')->name('admin.insert');
        Route::get('edit/{id}', 'AdminController@edit');
        Route::post('edit/{id}', 'AdminController@submitEdit');
        Route::post('delete', 'AdminController@delete');
    });
});