<?php

return ['is_admin' => 1,
	'is_client' => 1,
	'name' => 'tools',
	'icon' => 'fa fa-gear',
	'route' => '',
	'admin_menu' => [
		[
			'route' => 'tools.futureContract',
			'title' => 'futureContract',
			'icon' => 'fa fa-suitcase',
		],
		[
			'route' => 'tools.marketWatch',
			'title' => 'marketWatch',
			'icon' => 'fa fa-shopping-cart',
		]
	]
];