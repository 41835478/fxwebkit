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
		0=>'pending',
		1=>'complete',
		2=>'fail'
	],
	'admin_menu' => [

		[
			'route' => 'admin.request.internalTransfer',
			'title' => 'internalTransfer',
			'icon' => 'fa-briefcase',
		]

	],
	'client_menu' => [


	]
];