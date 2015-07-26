<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function()
{
	Route::controller('users', 'UserController', [
		'getSettings' => 'client.users.settings',
		'getProfile' => 'client.users.profile',
	]);
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
