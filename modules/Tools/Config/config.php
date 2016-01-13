<?php

return ['is_admin' => 1,
	'is_client' => 1,
	'name' => 'tools',
	'icon' => 'fa fa-gear',
	'route' => '',
	'city_array'=>[
		['Local', 6, -1, 'realOffset'],
		["Sydney Time", 22, 9, 2],
		["Tokyo  Time", 24, 9, 1],
		["London  Time", 8, 9, 4],
		["New York  Time", 13, 9, 1]
	],
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
	],
    'client_menu' => [
		
         [
                    'route' => 'client.tools.futureContract',
                    'title' => 'futureContract',
                    'icon' => 'fa fa-suitcase',
                ],
        [
			'route' => 'client.tools.marketWatch',
			'title' => 'marketWatch',
			'icon' => 'fa fa-shopping-cart',
		]
        ]
];