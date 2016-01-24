<?php

Route::group(['prefix' => 'mt4configrations', 'namespace' => 'Modules\Mt4Configrations\Http\Controllers\admin'], function()
{

	Route::controller('mt4Configrations', 'Mt4ConfigrationsController', [
		'getSymbolsList' => 'admin.mt4Configrations.symbolsList',
		'getSecuritiesList' => 'admin.mt4Configrations.securitiesList',
		'getGroupsList' => 'admin.mt4Configrations.groupsList',
	]);
});