<?php

/*
|--------------------------------------------------------------------------
| Fxwebkit General Config
|--------------------------------------------------------------------------
|
|	* Theme Colors:
|		default, asphalt, purple-hills,
|		adminflare, dust, frost, fresh,
|		silver, clean, white
*/

return [
	'app_name' => env('APP_NAME', 'FxWebKit'),
	'admin_roles' => env('ADMIN_ROLES', 'admin'),
	'client_default_role' => env('CLIENT_DEFAULT_ROLE'),
	'auto_activate_client' => env('CLIENT_AUTO_ACTIVATE', false),

	'theme' => [
		'color' => env('THEME_COLOR', 'default'),
		'navbarFixed' => env('FIXED_NAVBAR', false),
		'menuFixed' => env('FIXED_MENU', false),
		'menuAnimated' => env('ANIMATED_MENU', false),
	]
];