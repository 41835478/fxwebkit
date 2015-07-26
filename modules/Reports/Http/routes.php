<?php

Route::group(['prefix' => 'reports', 'namespace' => 'Modules\Reports\Http\Controllers'], function()
{
	Route::get('/', 'ReportsController@index');
});