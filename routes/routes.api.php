<?php

Route::group(['prefix' => 'api', 'middleware' => ['check-token']], function () {
    Route::get('users', 'ApiController@index');
    Route::get('users/{userTable}', 'ApiController@show');
    Route::get('active', 'ApiController@active');

});
