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


Auth::routes();
$spa =  function(){
    return view("layouts/app");
};

Route::get('/',$spa );
Route::get('/post',$spa );
Route::get('/works',$spa );
Route::get('/works/{id}',$spa );
Route::get('/artist',$spa );
Route::get('/artist/{id}',$spa );
Route::get('/blog',$spa );
Route::get('/blog/{id}',$spa );
Route::get('/contact',$spa );

Route::group(['prefix'=>"manage"],function(){
    Route::resource('post','PostController');
    Route::resource('work','WorkController');
    Route::resource('singer','SingerController');
});