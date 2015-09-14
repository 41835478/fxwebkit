<?php

Route::group(['middleware' => ['authorize.admin'], 'namespace' => 'Http\Controllers\Admin'], function()
{
	Route::controller('reports', 'ReportsController', [
		'getClosedOrders' => 'admin.reports.closedOrders',
		'getOpenOrders' => 'admin.reports.openOrders',
		'getAccounts' => 'admin.reports.accounts',
	]);
});
