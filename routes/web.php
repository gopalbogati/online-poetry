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



    /*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
|
*/

// INDEX
    Route::get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);

// CREATE | STORE
    Route::get('role/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
    Route::post('role', ['as' => 'role.store', 'uses' => 'RoleController@store']);

// SHOW
    Route::get('role/{id}', ['as' => 'role.show', 'uses' => 'RoleController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('role/{id}/edit', ['as' => 'role.edit', 'uses' => 'RoleController@edit'])->where('id', '[0-9]+');
    Route::put('role/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('role', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);


// INDEX
    Route::get('permission', ['as' => 'permission.index', 'uses' => 'PermissionController@index']);

// CREATE | STORE
    Route::get('permission/create', ['as' => 'permission.create', 'uses' => 'PermissionController@create']);
    Route::post('permission', ['as' => 'permission.store', 'uses' => 'PermissionController@store']);

// SHOW
    Route::get('permission/{id}', ['as' => 'permission.show', 'uses' => 'PermissionController@show'])->where('id',
        '[0-9]+');

// EDIT | UPDATE
    Route::get('permission/{id}/edit', ['as' => 'permission.edit', 'uses' => 'PermissionController@edit'])->where('id',
        '[0-9]+');
    Route::put('permission/{id}', ['as' => 'permission.update', 'uses' => 'PermissionController@update'])->where('id',
        '[0-9]+');

// DELETE
    Route::delete('permission', ['as' => 'permission.destroy', 'uses' => 'PermissionController@destroy']);


    /*
    |--------------------------------------------------------------------------
    | User Group
    |--------------------------------------------------------------------------
    |
    */

// INDEX
    Route::get('user', ['as' => 'user.group.index', 'uses' => 'UserGroupController@index']);

// CREATE | STORE
    Route::get('user/create', ['as' => 'user.group.create', 'uses' => 'UserGroupController@create']);
    Route::post('user', ['as' => 'user.group.store', 'uses' => 'UserGroupController@store']);

// SHOW
    Route::get('user/{id}', ['as' => 'user.group.show', 'uses' => 'UserGroupController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('user/{id}/edit', ['as' => 'user.group.edit', 'uses' => 'UserGroupController@edit'])->where('id', '[0-9]+');
    Route::put('user/{id}', ['as' => 'user.group.update', 'uses' => 'UserGroupController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('user', ['as' => 'user.group.destroy', 'uses' => 'UserGroupController@destroy']);

//Route::post('/login', 'UserController@loginUser')->name('login.user');
/*Route::get('/top-secret-page', ['middleware'=> 'auth','uses' => 'TopSecretController@index']);*/
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

Route::get('standalone-filemanager/{filed_id}/{type?}',
    ['as' => 'standalone-filemanager', 'uses' => 'FilemanagerController@standalone']);
Route::post('upload/image', ['as' => 'uploadImage', 'uses' => 'FilemanagerController@uploadImage']);
