<?php

return [
	'is_admin' => 1,
	'is_client' => 0,
	'name' => 'Mt4Configrations',
	'icon' => 'fa-info-circle',
	'apiAdminPassword'=>'abc123',
	'route' => '',
	'admin_menu' => [
		[
			'route' => 'admin.mt4Configrations.symbolsList',
			'title' => 'symbolsList',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.mt4Configrations.securitiesList',
			'title' => 'securitiesList',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.mt4Configrations.groupsList',
			'title' => 'groupsList',
			'icon' => 'fa fa-group',
		],
		[
			'route' => 'admin.mt4Configrations.mt4ConfigrationsSettings',
			'title' => 'settings',
			'icon' => 'fa fa-gears',
		]



	],
	'client_menu' => [


	]
];