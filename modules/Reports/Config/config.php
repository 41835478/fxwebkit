<?php

return [
	'is_admin' => 1,
	'is_client' => 1,
	'name' => 'Reports',
	'icon' => 'fa-file-text-o',
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
			'title' => 'accountStatement',
			'icon' => 'fa fa-user',
		],
//		[
//			'route' => 'admin.reports.accountStatement',
//			'title' => 'accountStatement',
//			'icon' => 'fa fa-gears',
//		],
		[
			'route' => 'admin.reports.commission',
			'title' => 'commission',
			'icon' => 'fa fa-money',
		],
		[
			'route' => 'admin.reports.agentCommission',
			'title' => 'agentCommission',
			'icon' => 'fa fa-money',
		],
		[
			'route' => 'admin.reports.accountant',
			'title' => 'accountant',
			'icon' => 'fa fa-money',
		],
		[
			'route' => 'admin.reports.reportsSettings',
			'title' => 'settings',
			'icon' => 'fa fa-gears',
		]
            
	],
	'client_menu' => [
		[
			'route' => 'clients.reports.closedOrders',
			'title' => 'ClosedOrders',
			'icon' => 'fa-briefcase',
		],
		[
			'route' => 'clients.reports.openOrders',
			'title' => 'OpenOrders',
			'icon' => 'fa-folder-open-o',
		],
		[
			'route' => 'clients.reports.accounts',
			'title' => 'accountStatement',
			'icon' => 'fa fa-user',
		],
//		[
//			'route' => 'clients.reports.accountStatement',
//			'title' => 'accountStatement',
//			'icon' => 'fa fa-gears',
//		],
		[
			'route' => 'clients.reports.commission',
			'title' => 'commission',
			'icon' => 'fa fa-money',
		],
		[
			'route' => 'clients.reports.agentCommission',
			'title' => 'agentCommission',
			'icon' => 'fa fa-money',
		],
		[
			'route' => 'clients.reports.accountant',
			'title' => 'accountant',
			'icon' => 'fa fa-money',
		]
            
	]
];