<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => env('ADMIN_NAME'), 'namespace' => 'Admin'], function()
{
	require_once __DIR__ . "/Routes/Admin/Dashboard.php";
	require_once __DIR__ . "/Routes/Admin/Auth.php";
});

Route::group(['prefix' => env('CLIENT_NAME'), 'namespace' => 'Client'], function()
{
	require_once __DIR__ . "/Routes/Client/Dashboard.php";
	require_once __DIR__ . "/Routes/Client/Auth.php";
});

/*
 * Redirect root routes to clients area
 */
Route::get('/', function ()
{
	return Redirect::to(env('CLIENT_NAME'));
});

//Route::get('/', 'TestController@index');