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

Route::resource('manager/post','Activity\PostController');

Route::get('/image','Activity\PostController@index');

Route::get('manager/post','Activity\PostController@index');

Route::get('/image',function(){
  return view('image');
});

Route::get('/tips',function(){
  return view('tips');
});

Route::get('/contact',function(){
  return view('contact');
});

// Route::get('/uploadfile','PhotoController@index');
// Route::post('/uploadfile', 'PhotoController@upload');
//
// Route::resource('/image','ImageController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
