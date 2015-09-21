<?php

Route::group(['middleware' => ['authenticate.admin'], 'prefix' => env('ADMIN_NAME'), 'namespace' => 'Modules\Reports'], function()
{
	require_once __DIR__ . "/Routes/Admin/routes.php";
});


Route::group(['prefix' => env('CLIENT_NAME'), 'namespace' => 'Client'], function()
{
	//require_once __DIR__ . "/Routes/Client/routes.php";
});



Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
