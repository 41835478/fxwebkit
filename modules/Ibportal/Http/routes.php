<?php

Route::group(['prefix' => 'ibportal', 'namespace' => 'Modules\Ibportal\Http\Controllers'], function()
{
	Route::get('/', 'IbportalController@index');
});


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'Modules\Ibportal\Http\Controllers\admin'], function()
{

	Route::controller('Ibportal', 'IbportalController', [
		'getPlansList'=>'admin.ibportal.plansList',
		'getAddPlan' => 'admin.ibportal.addPlan',
		'getDeletePlan'=>'admin.ibportal.deletePlan',
		'getDetailPlan'=>'admin.ibportal.detailPlan',
		'getEditPlan'=>'admin.ibportal.editPlan',
		'getAssignPlan'=>'admin.ibportal.assignPlan',
		'getAliasesList'=>'admin.ibportal.aliasesList',
		'getAddAliases'=>'admin.ibportal.addAliases',
		'getAgentList'=>'admin.ibportal.agentList',
		'getAgentUsers'=>'admin.ibportal.agentUsres',
		'getAgentPlans'=>'admin.ibportal.agentPlans',
		'getAssignAgentPlan'=>'admin.ibportal.assignAgentPlan',
		'getAgentCommission'=>'admin.ibportal.agentCommission',
		'getAgentName'=>'admin.ibportal.agentName',
		'postPlanName'=>'admin.ibportal.planName',
		'postMt4UsersName'=>'admin.ibportal.mt4UsersName',
		'postUsersName'=>'admin.ibportal.usersName',
		'getAgentsCommission'=>'admin.ibportal.agentsCommission',
		'getIbportalSettings'=>'admin.ibportal.ibportalSettings',
		'getAddAgents'=>'admin.ibportal.addAgents',
		'getAssignAgents'=>'admin.ibportal.assignAgents',
		'getAgentMoney'=>'admin.ibportal.agentMoney',
		'getSummary'=>'admin.ibportal.summary',
	]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'client', 'namespace' => 'Modules\Ibportal\Http\Controllers\client'], function()
{

	Route::controller('Ibportal', 'ClientIbportalController', [
		'getPlanList'=>'client.ibportal.planList',
		'getDetailsPlan'=>'client.ibportal.detailsPlan',
		'getAgreemmentPlan'=>'client.ibportal.agreemmentPlan',
		'getAgentUsers'=>'client.ibportal.agentUser',
		'getAgentCommission'=>'client.ibportal.agentCommission',
		'getAgentMoney'=>'clients.ibportal.agentMoney',
		'getAgentSummary'=>'clients.ibportal.agentSummary',
		'getAgentUserMt4Users' => 'clients.ibportal.agentUserMt4Users',
		'getClosedOrders' => 'clients.ibportal.closedOrders',
		'getOpenOrders' => 'clients.ibportal.openOrders',

	]);
});