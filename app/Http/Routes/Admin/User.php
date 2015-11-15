<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.admin']], function()
{ 
	Route::controller('users', 'UserController', [
		'getSettings' => 'admin.users.settings',
		 'getProfiles'=>'admin.users.profile',
                'getEditProfile' => 'admin.editProfile',   
                'postEditProfile' => 'admin.editProfiles', 
               
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
