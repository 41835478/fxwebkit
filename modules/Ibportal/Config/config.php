<?php

return [
	'is_admin' => 1,
	'is_client' => 1,
	'route' => 'admin.ibportal.planList',
	'icon' => 'fa-briefcase',
],
	[
		'route' => 'admin.ibportal.aliasesList',
		'title' => 'aliases',
		'icon' => 'fa-random',
	]

	'name' => 'Ibportal',
	'icon' => 'fa-user',
	'route' => '',
	'type'=>[
		'50'=> 'type',
		'100'=>'type',
		'150'=>'type',
],
	'admin_menu' => [

			'title' => 'plans',[
	],
	'client_menu' => [
		[
		'route' => 'client.ibportal.planList',
		'title' => 'plans',
		'icon' => 'fa-briefcase',
	]
	]
];