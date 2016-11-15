<?php

Route::group(['middleware' => ['authorize.admin'], 'namespace' => 'Http\Controllers\Admin'], function()
{
	Route::controller('reports', 'ReportsController', [
		'getClosedOrders' => 'admin.reports.closedOrders',
		'getOpenOrders' => 'admin.reports.openOrders',
		'getAccounts' => 'admin.reports.accounts',
		'getAccountStatement' => 'admin.reports.accountStatement',
		'getCommission' => 'admin.reports.commission',
		'getAgentCommission' => 'admin.reports.agentCommission',
		'getAccountant' => 'admin.reports.accountant',
		'getReportsSettings'=>'admin.reports.reportsSettings',
		'getDailyReport'=>'admin.reports.dailyReport'
            
	]);
});
