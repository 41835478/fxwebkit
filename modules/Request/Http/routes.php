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
		'getForwordWithDrawalRequest'=>'admin.request.ForwordWithDrawal',
		'getIntenalTransferEdit'=>'admin.request.intenalTransferEdit',
		'getWithDrawalEdit'=>'admin.request.withDrawalEdit',
		'getWithDrawalList'=>'admin.request.withDrawal',
		'getChangeLeverageRequestList'=>'admin.request.changeLeverage',
		'getChangePasswordRequestList'=>'admin.request.changePassword',
		'getAddAccountList'=>'admin.request.addAccount',
		'getForwordAddAccountRequest'=>'admin.request.forwordAddAccount',

		'getAssignAccountRequestList'=>'admin.request.assignAccount',
		'getForwordAssignAccountRequest'=>'admin.request.forwordAssignAccount',


	]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'request', 'namespace' => 'Modules\Request\Http\Controllers\client'], function()
{

	Route::controller('client-request', 'RequestController', [
		'getPlanList'=>'client.ibportal.planList',

	]);
});