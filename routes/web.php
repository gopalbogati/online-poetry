<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//Route::post('/login', 'UserController@loginUser')->name('login.user');
//social login
Route::get('auth/Facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
Route::get('auth/Facebook/callback', 'FacebookController@handleProviderCallback');
Route::get('/', 'CategoryController@WelcomeCategoryLists')->name('welcome.user');
Route::get('category/create', 'CategoryController@create')->name('categorycreate');
Route::post('category/store', 'CategoryController@storeCategory')->name('category.store');
Route::get('category/list', 'CategoryController@listCategory')->name('categorylist');
Route::get('delete/{category}', 'CategoryController@deleteDetails')->name('category.delete');
Route::post('update/{category}', 'CategoryController@updateDetails')->name('category.update');
Route::get('edit/{category}', 'CategoryController@editDetails')->name('category.edit');
Route::get('category/{alias}', 'PostController@getCategoryPosts')->name('category.posts');
Route::get('logout', 'CategoryController@logout')->name('logout');
Route::get('category/search', 'CategoryController@search')->name('category.search');
Route::get('post/search', 'PostController@search')->name('post.search');
/*Route::resource('demo', 'DemoController');*/



