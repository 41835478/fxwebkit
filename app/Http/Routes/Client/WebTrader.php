<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function()
{
	Route::controller('webTrader','\Fxweb\Http\Controllers\Client\WebTraderController',[
		'getWebTrader'=>'client.webTrader'
	]);
});

