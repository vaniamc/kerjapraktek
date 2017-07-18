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
Route::get('blog/searchdate','AboutController@searchdate');
Route::get('search','AboutController@search');


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

        Route::get('category','AdminController@allCategory')->name('admin.view.category');
        Route::get('add-category','AdminController@addCategory')->name('admin.new.category');
        Route::post('add-category','AdminController@insertCategory')->name('admin.insert.category');
        Route::get('edit-category/{id}', 'AdminController@editCategory');
        Route::post('edit-category/{id}', 'AdminController@submitEditCategory');

        Route::get('info','AdminController@allInfo')->name('admin.all.info');
        Route::get('add-info','AdminController@addInfo')->name('admin.add.info');
        Route::post('add-info','AdminController@insertInfo')->name('admin.insert.info');
        Route::get('edit-info/{id}', 'AdminController@editInfo');
        Route::post('edit-info/{id}', 'AdminController@submitEditInfo');
        Route::post('delete-info', 'AdminController@deleteInfo');

        Route::get('album','AdminController@allAlbum')->name('admin.all.album');
        Route::get('add-album','AdminController@addAlbum')->name('admin.add.album');
        Route::post('add-album','AdminController@insertAlbum')->name('admin.insert.album');
        Route::get('edit-album/{id}', 'AdminController@editAlbum');
        Route::post('edit-album/{id}', 'AdminController@submitEditAlbum');
        Route::post('delete-album', 'AdminController@deleteAlbum');

        Route::get('gallery','AdminController@allGallery')->name('admin.all.gallery');
        Route::get('add-gallery','AdminController@addGallery')->name('admin.add.gallery');
        Route::post('add-gallery','AdminController@insertGallery')->name('admin.insert.gallery');
        Route::get('edit-gallery/{id}', 'AdminController@editGallery');
        Route::post('edit-gallery/{id}', 'AdminController@submitEditGallery');
        Route::post('delete-gallery', 'AdminController@deleteGallery');
    });
});