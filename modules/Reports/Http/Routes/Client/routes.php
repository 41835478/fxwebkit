<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client'], 'namespace' => 'Http\Controllers\Client'], function()
{
	Route::controller('users', 'UserController', [
		'getSettings' => 'client.users.settings',
	]);
        	Route::controller('reports', 'ReportsController', [
		'getClosedOrders' => 'clients.reports.closedOrders',
		'getOpenOrders' => 'clients.reports.openOrders',
		'getAccounts' => 'clients.reports.accounts',
		'getAccountStatement' => 'clients.reports.accountStatement',
		'getCommission' => 'clients.reports.commission',
		'getAccountant' => 'clients.reports.accountant',
		'getDailyReport'=>'clients.reports.dailyReport'
            
	]);
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
