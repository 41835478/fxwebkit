<?php

/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function()
{
	Route::get('/', ['as' => 'admin.index', 'uses' => 'DashboardController@index']);
});

/*
 * Admin Routes that needs authorization
 */
Route::group(['middleware' => ['authorize.admin']], function()
{
	//
});

/*
 * Unprotected Client Routes
 */
