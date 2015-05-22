<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function()
{
	//
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
Route::get('login', [
	'as' => 'client.auth.login',
	'uses' => 'AuthController@getLogin'
]);
Route::post('login', [
	'uses' => 'AuthController@postLogin'
]);

Route::get('logout', [
	'as' => 'client.auth.logout',
	'uses' => 'AuthController@getLogout'
]);
Route::get('register', [
	'as' => 'client.auth.register',
	'uses' => 'AuthController@getRegister'
]);
Route::get('recover', [
	'as' => 'client.auth.recover',
	'uses' => 'AuthController@getRecover'
]);
