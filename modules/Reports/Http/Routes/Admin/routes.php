<?php

Route::group(['middleware' => ['authorize.admin'], 'namespace' => 'Http\Controllers\Admin'], function()
{
	Route::get('/', 'ReportsController@index');

	Route::controller('reports', 'ReportsController', [
		'getClosedOrders' => 'admin.reports.closedOrders',
		'getOpenOrders' => 'admin.reports.openOrders',
	]);
});
