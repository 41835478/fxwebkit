<?php

return [

    'is_admin' => 1,
    'is_client' => 1,
    'name' => 'accounts',
    'icon' => 'fa fa-user',
    'route' => '',
    'directOrderToMt4Server' => true,
    'directLeverageOrderToMt4Server'=>true,
    'directChangePasswordOrderToMt4Server'=>false,
    'directTransferOrderToMt4Server'=>true,
    'directLiveAccountOrderToMt4Server'=>false,
    'directWithdrawalOrderToMt4Server'=>false,
    'operation' => [
        '0' => 'Credit In',
        '1' => 'Credit Out',
        '2' => 'Deposit',
        '3' => 'Withdraw',
    ],

    'apiReqiredConfirmMt4Password' => true,
    'apiMasterPassword' => 'PASSWORD',
    'allowTransferToUnsignedMT4' => true,

    'changeLeverageWarning' => 'Please, be careful with this operation !',
    'denyLiveAccount' => false,
    'showMt4Leverage' => true,
    'showWithdrawal' => true,
    'showMt4ChangePassword' => true,
    'showMt4Transfer' => true,

    'loginPasswordType' => [
        '0' => 'PASS',
        '1' => 'OUT',
    ],


    'admin_menu' => [
        [
            'route' => 'accounts.accountsList',
            'title' => 'accountsList',
            'icon' => 'fa fa-users',
        ],
        [
            'route' => 'accounts.Mt4UsersList',
            'title' => 'mt4UsersList',
            'icon' => 'fa fa-users',
        ],
        [
            'route' => 'accounts.accountsSettings',
            'title' => 'settings',
            'icon' => 'fa fa-gears',
        ]

    ],'client_menu' => [ [
                    'display'=>'1',
                    'route' => 'client.accounts.addMt4User',
                    'title' => 'addMt4User',
                    'icon' => 'fa fa-plus',
                ],
             [
                    'display'=>'1',
                    'route' => 'clients.accounts.Mt4UsersList',
                    'title' => 'mt4UsersList',
                    'icon' => 'fa-briefcase',
                ],
        [
            'display'=>'1',
            'route' => 'clients.accounts.mt4InternalTransfer',
            'title' => 'internalTransfer',
            'icon' => 'fa-retweet',
        ],
        [
            'display'=>'1',
            'route' => 'client.accounts.withdrawal',
            'title' => 'withdrawal',
            'icon' => 'fa-external-link',
        ],
            ]

];