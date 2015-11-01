<?php

return [
	'is_admin' => 1,
	'is_client' => 0,
	'name' => 'accounts',
	'icon' => 'fa fa-user',
	'route' => '',
	'admin_menu' => [
		[
			'route' => 'accounts.accountsList',
			'title' => 'accountsList',
			'icon' => 'fa fa-users',
		]
	]
];