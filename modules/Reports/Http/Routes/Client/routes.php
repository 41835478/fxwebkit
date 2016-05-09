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
	//	'getAgentCommission' => 'clients.reports.agentCommission',
		'getAccountant' => 'clients.reports.accountant',
            
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
