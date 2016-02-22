<?php

return [
    'is_admin' => 1,
    'is_client' => 1,
    'name' => 'accounts',
    'icon' => 'fa fa-user',
    'route' => '',
    'leverage' => [
        '50' => '1:50',
        '100' => '1:100',
        '150' => '1:150',
    ],
    'leverageDemo' => [
        '50' => '1:50',
        '100' => '1:100',
        '150' => '1:150',
    ],
    'operation' => [
        '0' => 'Credit In',
        '1' => 'Credit Out',
        '2' => 'Deposit',
        '3' => 'Withdraw',
    ],
    'apiReqiredConfirmMt4Password' => false,
    'apiMasterPassword' => 'PASSWORD',
    'allowTransferToUnsignedMT4' => false,

'denyLiveAccount'=>false,

    'showMt4Leverage'=>true,
    'showMt4ChangePassword'=>false,
    'showMt4Transfer'=>false,

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
            'route' => 'client.addMt4User',
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