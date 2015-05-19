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

Route::group(['prefix' => env('ADMIN_NAME')], function()
{
	/*
	 * Admin Routes that needs login
	 */
	Route::group(['middleware' => ['authenticate.admin']], function()
	{
		//
	});

	/*
	 * Admin Routes that needs authorization
	 */
	Route::group(['middleware' => ['authorize.admin']], function()
	{
		//
	});

	/*
	 * Unprotected Admin Routes
	 */
	Route::get('login', ['as' => 'admin.login', 'uses' => 'Admin\UserController@getLogin']);
	Route::get('logout', ['as' => 'admin.logout', 'uses' => 'Admin\UserController@getLogout']);
});

Route::group(['prefix' => env('CLIENT_NAME')], function()
{
	/*
	 * Client Routes that needs login
	 */
	Route::group(['middleware' => ['authenticate.client']], function()
	{
		Route::get('/', 'Client\DashboardController@index');
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
	Route::get('login', ['as' => 'client.login', 'uses' => 'Client\UserController@getLogin']);
	Route::get('logout', ['as' => 'client.logout', 'uses' => 'Client\UserController@getLogout']);
});

/*
 * Redirect root routes to clients area
 */
Route::get('/', function () {return Redirect::to(env('CLIENT_NAME'));});
//Route::get('/', 'TestController@index');