<?php
/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function () {
    //
});

/*
 * Admin Routes that needs authorization
 */
Route::group(['middleware' => ['authorize.admin']], function () {
    //
});

/*
 * Unprotected Admin Routes
 */
Route::get('login', [
    'as' => 'admin.auth.login',
    'uses' => 'AuthController@getLogin'
]);
Route::post('login', [
    'uses' => 'AuthController@postLogin'
]);

Route::get('logout', [
    'as' => 'admin.auth.logout',
    'uses' => 'AuthController@getLogout'
]);

