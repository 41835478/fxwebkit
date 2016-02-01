<?php

Route::group(['prefix' => 'ibportal', 'namespace' => 'Modules\Ibportal\Http\Controllers'], function()
{
	Route::get('/', 'IbportalController@index');
});


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'ibportal', 'namespace' => 'Modules\Ibportal\Http\Controllers\admin'], function()
{

	Route::controller('Ibportal', 'IbportalController', [
		'getPlansList'=>'admin.ibportal.planList',
		'getAddPlan' => 'admin.ibportal.addPlan',
		'getDeletePlan'=>'admin.ibportal.deletePlan',
		'getDetailsPlan'=>'admin.ibportal.detailsPlan',
		'getAssignPlan'=>'admin.ibportal.assignPlan',
		'getAliasesList'=>'admin.ibportal.aliasesList',
		'getAddAliases'=>'admin.ibportal.addAliases',

	]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'ibportal', 'namespace' => 'Modules\Ibportal\Http\Controllers\client'], function()
{

	Route::controller('Ibportal', 'ClientIbportalController', [
		'getPlanList'=>'client.ibportal.planList',
		'getDetailsPlan'=>'client.ibportal.detailsPlan',
		'getAgreemmentPlan'=>'client.ibportal.agreemmentPlan',

	]);
});