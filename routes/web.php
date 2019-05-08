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
    return view('public.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('post', 'PostController@all_post');
//Route::get('/{anypath}','HomeController@index')->where('path','.*');



Route::group(['middleware' => ['auth']], function () {
    //category
        Route::post('/add-category','CategoryController@add_category');
        Route::get('/category','CategoryController@all_category');
        Route::get('/category/{id}','CategoryController@delete_category');
        Route::get('/editcategory/{id}','CategoryController@edit_category');
        Route::post('/update-category/{id}','CategoryController@update_category');
        //post
        Route::get('/post','PostController@all_post');
        Route::post('/savepost','PostController@save_post');
        Route::get('/delete/{id}','PostController@delete_post');
        Route::get('/post/{id}','PostController@edit_post');
        Route::post('/update/{id}','PostController@update_post');
});