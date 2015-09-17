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
		],
		[
			'route' => 'admin.reports.accounts',
			'title' => 'accounts',
			'icon' => 'fa fa-user',
		],
		[
			'route' => 'admin.reports.accountStatement',
			'title' => 'accountStatement',
			'icon' => 'fa fa-gears',
		],
		[
			'route' => 'admin.reports.commission',
			'title' => 'commission',
			'icon' => 'fa fa-money',
		],
		[
			'route' => 'admin.reports.agentCommission',
			'title' => 'agentCommission',
			'icon' => 'fa fa-money',
		]
            
	]
];