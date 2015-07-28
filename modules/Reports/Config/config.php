<?php

return [
	'is_admin' => 1,
	'is_client' => 1,
	'name' => 'Reports',
	'icon' => 'fa-info-circle',
	'route' => '',
	'admin_menu' => [
		[
			'route' => 'admin.reports.closedOrders',
			'title' => 'ClosedOrders',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'admin.reports.openOrders',
			'title' => 'OpenOrders',
			'icon' => 'fa-folder-open-o',
		]
	]
];