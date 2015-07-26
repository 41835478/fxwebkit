<?php
/*
 * Admin Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function()
{
	//
});

/*
 * Admin Routes that needs authorization
 */
Route::group(['middleware' => ['authorize.admin']], function()
{
	//
});

/*
 * Unprotected Admin Routes
 */