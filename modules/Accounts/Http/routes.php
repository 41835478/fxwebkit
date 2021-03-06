<?php


Route::group(['middleware' => ['authenticate.admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Accounts\Http\Controllers'], function ()
{
    Route::controller('accounts', 'AccountsController',
        [
        'getAccountsList' => 'accounts.accountsList',
        'getAddAccount' => 'accounts.addAccount',
        'getAsignMt4Users' => 'accounts.asignMt4Users',
        'getDetailsAccount' => 'accounts.detailsAccount',
        'getEditClientInfo' => 'accounts.editClientInfo',
        'getMt4UsersList' => 'accounts.Mt4UsersList',
        'getMt4UserDetails' => 'accounts.mt4UserDetails',
        'getEditMt4User' => 'accounts.addMt4User',
        'getEditAccount' => 'accounts.editAccount',
        'getDeleteAccount' => 'accounts.deleteAccount',
        'getBlockAccount' => 'accounts.blockAccount',
        'getUnBlockAccount' => 'accounts.unBlockAccount',
        'getMt4Leverage' => 'accounts.mt4Leverage',
        'getMt4ChangePassword' => 'accounts.mt4ChangePassword',
        'getMt4InternalTransfer' => 'accounts.mt4InternalTransfer',
        'getMt4Operation' => 'accounts.mt4Operation',
        'getAllowLiveAccount' => 'accounts.allowLiveAccoun',
        'getUnAllowedLiveAccount' => 'accounts.unAllowedLiveAccount',
        'getAccountsSettings'=>'accounts.accountsSettings',
        'getWithdrawal'=>'accounts.withdrawal',
        'getMt4AssignedUsers'=>'accounts.mt4AssignedUsers',
        'getUnssignUserFromMt4User'=>'accounts.unssignUserFromMt4User',
       'getActivateUser'=>'accounts.activateUser',
            'getAssignAccountManager'=>'accounts.assignAccountManager',
            'getChangePassword'=>'accounts.changePassword',

    ]);
});


Route::group(['middleware' => ['authenticate.client'], 'prefix' => 'client', 'namespace' => 'Modules\Accounts\Http\Controllers'], function () {
    Route::controller('accounts', 'ClientAccountsController', [
        'getMt4UsersList' => 'clients.accounts.Mt4UsersList',
        'getMt4UserDetails' => 'clients.accounts.mt4UserDetails',
        'getMt4Leverage' => 'clients.accounts.mt4Leverage',
        'getMt4ChangePassword' => 'clients.accounts.mt4ChangePassword',
        'getMt4InternalTransfer' => 'clients.accounts.mt4InternalTransfer',
        'getAddMt4User' => 'client.accounts.addMt4User',
        'getMt4DemoAccount' => 'client.accounts.mt4DemoAccount',
        'getMt4LiveAccount' => 'client.accounts.mt4LiveAccount',
        'getWithdrawal'=>'client.accounts.withdrawal',
        'getUnssignUserFromMt4User'=>'client.aaccounts.unssignUserFromMt4User',
    ]);
});
