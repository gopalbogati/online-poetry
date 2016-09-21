<?php
Route::group(
    ['prefix' => 'user'], function () {

    Route::get('register', 'UserController@registerUser')->name('register.user');
    Route::get('/login', 'UserController@loginUser')->name('user.login');
    Route::get('readmore/{post}', 'PostController@single')->name('post.single');
    //Route::get('/', 'UserController@indexpage')->name('welcomepage');
    Route::post('users/Register', 'UserController@storeUser')->name('user.store');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('create/post', 'PostController@create')->name('postcreate');
        Route::post('posts', 'PostController@store')->name('poststore');
        Route::get('display/posts', 'PostController@lists')->name('postLists');
        Route::get('delete/{post}', 'PostController@postDelete')->name('post.delete');
        Route::get('edit/{post}', 'PostController@postEdit')->name('post.edit');
        Route::post('update/{post}', 'PostController@postUpdate')->name('post.update');
        Route::get('users/list', 'UserController@index')->name('userlist');

        Route::get('users/{usertable}', 'UserController@deleteUserDetails')->name('deleteuser');

    });
}
);