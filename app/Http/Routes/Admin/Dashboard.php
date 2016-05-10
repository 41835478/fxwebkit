<?php

/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function () {
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'DashboardController@index'
    ]);
    /*
Route::get('profile', [
    'as' => 'admin.profile',
    'uses' => 'DashboardController@getProfile'
]);
   Route::get('editProfile', [
    'as' => 'admin.editProfile',
    'uses' => 'DashboardController@getEditProfile'
]);
    Route::post('editProfile', [
    'as' => 'admin.editProfile',
    'uses' => 'DashboardController@postEditProfile'
]);

     */
});

/*
 * Admin Routes that needs authorization
 */
Route::group(['middleware' => ['authorize.admin']], function () {
    //
});

/*
 * Unprotected Client Routes
 */
