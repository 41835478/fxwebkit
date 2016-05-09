<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function()
{ 
	Route::controller('users', 'UserController', [
		'getSettings' => 'client.users.settings',
		 'getProfiles'=>'client.users.profile',
                'getEditProfile' => 'clinet.editProfile',   
                'postEditProfile' => 'clinet.users.editProfiles', 
               
	]);
        /*
          Route::get('clientProfile', [
		'as' => 'clinet.profile',
		'uses' => 'UserController@getClientProfile'
	]);
        Route::get('editProfile', [
		'as' => 'clinet.editProfile',
		'uses' => 'UserController@getEditProfile'
	]);
    
        Route::post('editProfile', [
		'as' => 'clinet.editProfile',
		'uses' => 'UserController@postEditProfile'
	]);
         
         */
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
