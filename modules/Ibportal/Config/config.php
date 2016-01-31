<?php

return [
	'is_admin' => 1,
	'is_client' => 1,
	'name' => 'Ibportal',
	'icon' => 'fa-info-circle',
	'route' => '',
	'type'=>[
		'50'=> 'type',
		'100'=>'type',
		'150'=>'type',
	],
	'admin_menu' => [
		[
			'route' => 'admin.ibportal.planeList',
			'title' => 'addPlan',
			'icon' => 'fa-briefcase',
		],[
				'route' => 'admin.ibportal.aliasesList',
			'title' => 'aliases',
			'icon' => 'fa-briefcase',
		]
,
		[
		'route' => 'admin.ibportal.aliasesList',
		'title' => 'Symbols',
		'icon' => 'fa-briefcase',
	]



	],
	'client_menu' => [


	]
];