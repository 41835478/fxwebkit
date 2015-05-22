<?php

return [
	'app_name' => env('APP_NAME', 'FxWeb'),
	'admin_roles' => env('ADMIN_ROLES', 'admin'),

	'theme' => [
		'color' => env('THEME_COLOR', 'default'),
		'navbarFixed' => env('FIXED_NAVBAR', false),
		'menuFixed' => env('FIXED_MENU', false),
		'menuAnimated' => env('ANIMATED_MENU', false),
	]
];