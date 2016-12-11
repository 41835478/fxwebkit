<?php

Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'Modules\Mt4Configrations\Http\Controllers\admin'], function()
{

	Route::controller('mt4Configrations', 'Mt4ConfigrationsController', [
		'getDashboard'=>'admin.mt4Configrations.dashboard',
		'getSymbolsList' => 'admin.mt4Configrations.symbolsList',
		'getSyncSymbols'=>'admin.mt4Configrations.syncSymbols',
		'getSecuritiesList' => 'admin.mt4Configrations.securitiesList',
		'getGroupsList' => 'admin.mt4Configrations.groupsList',
		'getMt4ConfigrationsSettings'=>'admin.mt4Configrations.mt4ConfigrationsSettings',
	]);
});