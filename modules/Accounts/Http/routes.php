<?php

Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'accounts', 'namespace' => 'Modules\Accounts\Http\Controllers'], function()
{

        Route::controller('accounts','AccountsController',['getAccountsList'=>'accounts.accountsList']);
});

