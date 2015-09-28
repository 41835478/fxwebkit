<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function()
{
	Route::get('/', ['as' => 'client.index', 'uses' => 'DashboardController@index']);
    
       // Route::get('/', function(){dd(3);});
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
