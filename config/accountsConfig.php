<?php

return [

    'is_admin' => 1,
    'is_client' => 0,
    'name' => 'accounts',
    'icon' => 'fa fa-user',
    'route' => '',
    'directOrderToMt4Server' => true,
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
    'denyLiveAccount' => true,
    'showMt4Leverage' => false,
    'showWithDrawal' => true,
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

    ],
    'client_menu' => [

        [
            'route' => 'client.accounts.addMt4User',
            'title' => 'addMt4User',
            'icon' => 'fa fa-plus',
        ],
        [
            'route' => 'clients.accounts.Mt4UsersList',
            'title' => 'mt4UsersList',
            'icon' => 'fa-briefcase',
        ]
    ]

];