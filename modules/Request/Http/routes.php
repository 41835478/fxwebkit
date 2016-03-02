<?php

Route::group(['prefix' => 'request', 'namespace' => 'Modules\Request\Http\Controllers'], function()
{
	Route::get('/', 'RequestController@index');
});


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'request', 'namespace' => 'Modules\Request\Http\Controllers\admin'], function()
{

	Route::controller('request', 'RequestController', [
		'getIntenalTransferRequestList'=>'admin.request.internalTransfer',
		'getForwordIntenalTransferRequest'=>'admin.request.ForwordInternalTransfer',
		'getIntenalTransferEdit'=>'admin.request.intenalTransferEdit'


	]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'request', 'namespace' => 'Modules\Request\Http\Controllers\client'], function()
{

	Route::controller('client-request', 'RequestController', [
		'getPlanList'=>'client.ibportal.planList',

	]);
});