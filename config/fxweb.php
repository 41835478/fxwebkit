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
    'auto_activate_client' => env('CLIENT_AUTO_ACTIVATE',true),
    'pagination_size' => env('PAGINATION_SIZE', 25),
    'mt4CheckHost'=>'192.168.15.10',
    'mt4CheckPort'=>443,
    'theme' => [
        'color' => env('THEME_COLOR', 'default'),
        'navbarFixed' => env('FIXED_NAVBAR', false),
        'menuFixed' => env('FIXED_MENU', false),
        'menuAnimated' => env('ANIMATED_MENU', false),
    ],
    'admin_menu' => [
        [
            'route' => 'admin.adminsList',
            'title' => 'Settings',
            'icon' => 'fa fa-gears',
            'subMenus' => [
                [
                    'route' => 'admin.adminsList',
                    'title' => 'adminsList',
                    'icon' => 'fa fa-users',
                ]
                
            ]
        ]
    ],'client_menu' => [
        [
            'route' => '#',
            'title' => 'Mt4Users',
            'icon' => 'fa fa-users',
            'subMenus' => [
                [
                    'route' => 'client.addMt4User',
                    'title' => 'addMt4User',
                    'icon' => 'fa fa-plus',
                ]
                
            ]
        ]
    ]
];
