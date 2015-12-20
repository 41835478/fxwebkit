<?php


Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'accounts', 'namespace' => 'Modules\Accounts\Http\Controllers'], function()
{
        Route::controller('accounts','AccountsController',[
            'getAccountsList'=>'accounts.accountsList',
            'getAddAccount'=>'accounts.addAccount',
            'getAsignMt4Users'=>'accounts.asignMt4Users',
            'getDetailsAccount'=>'accounts.detailsAccount',
            'getEditClientInfo'=>'accounts.editClientInfo',
            'getMt4UsersList'=>'accounts.Mt4UsersList',
            'getMt4UserDetails'=>'accounts.mt4UserDetails',
            'getEditMt4User'=>'accounts.addMt4User',
            'getEditAccount'=>'accounts.editAccount',
           'getDeleteAccount'=>'accounts.deleteAccount',
           'getBlockAccount'=>'accounts.blockAccount',
           'getUnBlockAccount'=>'accounts.unBlockAccount',
            ]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'accounts', 'namespace' => 'Modules\Accounts\Http\Controllers'], function()
{
        Route::controller('client-accounts','ClientAccountsController',[
            'getMt4UsersList'=>'clients.accounts.Mt4UsersList',
            'getMt4UserDetails'=>'clients.accounts.mt4UserDetails',
            ]);
});
