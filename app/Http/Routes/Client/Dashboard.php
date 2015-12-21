<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function()
{
	Route::get('/', ['as' => 'client.index', 'uses' => 'DashboardController@index']);
        /*
        Route::get('clientProfile', [
		'as' => 'clinet.profile',
		'uses' => 'DashboardController@getClientProfile'
	]);
        Route::get('editProfile', [
		'as' => 'clinet.editProfile',
		'uses' => 'DashboardController@getEditProfile'
	]);
    
        Route::post('editProfile', [
		'as' => 'clinet.editProfile',
		'uses' => 'DashboardController@postEditProfile'
	]);
 */
});

/*
 * Client Routes that needs authorization
 */
Route::group(['middleware' => ['authorize.client']], function()
{
	//
});

/*
 * Unprotected Client Routes
 */
