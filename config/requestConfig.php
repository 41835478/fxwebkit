<?php

return [
    'is_admin' => 1,
    'is_client' => 0,
    'route' => '',
    'icon' => 'fa-user',
    'name' => 'Request',
    'icon' => 'fa-user',
    'route' => '',
	'requestStatus'=>[
		'-1'=>'All',
		0=>'pending',
		1=>'complete',
		2=>'fail'
	],
	'admin_menu' => [

		[
			'route' => 'admin.request.internalTransfer',
			'title' => 'internalTransfer',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.request.withdrawal',
			'title' => 'withdrawal',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.request.changeLeverage',
			'title' => 'changeLeverage',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.request.changePassword',
			'title' => 'changePassword',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.request.addAccount',
			'title' => 'addAccount',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.request.activateUser',
			'title' => 'activateUser',
			'icon' => 'fa-briefcase',
		]

	],
	'client_menu' => [


	]
];