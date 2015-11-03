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
Route::post('register', [
	'uses' => 'AuthController@postRegister'
]);

Route::get('recover', [
	'as' => 'client.auth.recover',
	'uses' => 'AuthController@getRecover'
]);


Route::get('facebook-login', [
	'as' => 'client.facebook.login',
	'uses' => 'AuthController@getFacebookLogin'
]);
Route::get('facebook-callback-login', [
	'as' => 'client.facebook_callback.login',
	'uses' => 'AuthController@getFacebookLoginCallback'
]);


Route::get('google-login', [
	'as' => 'client.google.login',
	'uses' => 'AuthController@getGoogleLogin'
]);
Route::get('google-callback-login', [
	'as' => 'client.google_callback.login',
	'uses' => 'AuthController@getGoogleLoginCallback'
]);

Route::get('linkedin-login', [
	'as' => 'client.linkedin.login',
	'uses' => 'AuthController@getLinkedinLogin'
]);
Route::get('linkedin-callback-login', [
	'as' => 'client.linkedin_callback.login',
	'uses' => 'AuthController@getLinkedinLoginCallback'
]);



