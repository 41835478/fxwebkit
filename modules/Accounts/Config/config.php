<?php

return [
	'is_admin' => 1,
	'is_client' => 1,
	'name' => 'accounts',
	'icon' => 'fa fa-user',
	'route' => '',
        'leverage'=>[
           '1:50',
            '1:100',
            '1:150',
        ],
	'apiReqiredConfirmMt4Password'=>true,
	'apiMasterPassword'=>'PASS',
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