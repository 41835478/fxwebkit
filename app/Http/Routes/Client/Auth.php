<?php

/*
 * Client Routes that needs login
 */
Route::group(['middleware' => ['authenticate.client']], function () {
    //
});

/*
 * Client Routes that needs authorization
 */
Route::group(['middleware' => ['authorize.client']], function () {
    //
});

/*
 * Unprotected Client Routes
 */
Route::get('login', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.login',
    'uses' => 'AuthController@getLogin'
]);
Route::post('login', [
    'before'=>'changeLanguage',
    'uses' => 'AuthController@postLogin'
]);

Route::get('mt4-signup', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.mt4Signup',
    'uses' => 'AuthController@getMt4Signup'
]);
Route::post('mt4-signup', [
    'before'=>'changeLanguage',
    'uses' => 'AuthController@postMt4Signup'
]);

Route::get('logout', [
    'as' => 'client.auth.logout',
    'uses' => 'AuthController@getLogout'
]);

Route::get('register', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.register',
    'uses' => 'AuthController@getRegister'
]);

Route::Filter('changeLanguage',function($route, $oRequest){
    if ($oRequest->has('locale')) {
        Session::put('locale',$oRequest['locale']);
        return Redirect::back();
    } else if (!Session::has('locale')) {
        Session::put('locale', 'en');
    }


    App::setLocale(Session::get('locale'));


});

Route::post('register', [
    'before'=>'changeLanguage',
    'uses' => 'AuthController@postRegister'
]);

Route::get('recover', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.recover',
    'uses' => 'AuthController@getRecover'
]);
Route::post('recover', [
    'as' => 'client.auth.recover',
    'uses' => 'AuthController@postRecover'
]);
Route::get('resetForgetPassword/{userId}/{code}', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.resetForgetPassword',
    'uses' => 'AuthController@getResetForgetPassword'
]);
Route::post('resetForgetPassword/{userId}/{code}', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.resetForgetPassword',
    'uses' => 'AuthController@postResetForgetPassword'
]);


Route::get('activateAccount/{userId}/{code}', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.activateAccount',
    'uses' => 'AuthController@getActivateAccount'
]);

Route::post('activateAccount/{userId}/{code}', [
    'as' => 'client.auth.activateAccount',
    'uses' => 'AuthController@postResendActivateEmail'
]);



Route::get('facebook-login', [
    'as' => 'client.facebook.login',
    'uses' => 'AuthController@getFacebookLogin'
]);
Route::get('facebook-callback-login', [
    'as' => 'client.facebook_callback.login',
    'uses' => 'AuthController@getFacebookLoginCallback'
]);


Route::get('google-login', [
    'as' => 'client.google.login',
    'uses' => 'AuthController@getGoogleLogin'
]);
Route::get('google-callback-login', [
    'as' => 'client.google_callback.login',
    'uses' => 'AuthController@getGoogleLoginCallback'
]);

Route::get('linkedin-login', [
    'as' => 'client.linkedin.login',
    'uses' => 'AuthController@getLinkedinLogin'
]);
Route::get('linkedin-callback-login', [
    'as' => 'client.linkedin_callback.login',
    'uses' => 'AuthController@getLinkedinLoginCallback'
]);

Route::get('twitter-login', [
    'as' => 'client.twitter.login',
    'uses' => 'AuthController@getTwitterLogin'
]);
Route::get('twitter-callback-login', [
    'as' => 'client.twitter_callback.login',
    'uses' => 'AuthController@getTwitterLoginCallback'
]);



