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
    //   'app_name' => 'FxWebKit',
    'admin_roles' => env('ADMIN_ROLES', 'admin'),
    'client_default_role' => env('CLIENT_DEFAULT_ROLE'),
    'auto_activate_client' => env('CLIENT_AUTO_ACTIVATE',true),
    'pagination_size' => env('PAGINATION_SIZE', 25),
    'mt4CheckHost'=>'192.168.15.10',
    'mt4CheckPort'=>443,

    'adminEmail'=>'taylorsuccessor@gmail.com',
    'Group'=>[
],
    'GroupLive'=>[
           '1'=> '1',
            '2'=>'2',
            '3'=>'3',
            '4'=>'4',
        ],
    'GroupDemo'=>[
        '1'=> '10',
        '2'=>'20',
        '3'=>'30',
        '4'=>'40',
    ],
    'DepositLive'=>[
           '1000'=> '1000',
            '5000'=>'5000',
            '10000'=>'10000',
            '100000'=>'100000',
        ],
    'DepositDemo'=>[
        '1000'=> '10',
        '5000'=>'20',
        '10000'=>'30',
        '100000'=>'40',
    ],
    'theme' => [
        'color' => env('THEME_COLOR', 'default'),
        'navbarFixed' => env('FIXED_NAVBAR', false),
            'menuFixed' => env('FIXED_MENU mmc', false),
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
                ],
                [
                    'route' => 'admin.addEmailTemplates',
                    'title' => 'addEmailTemplates',
                    'icon' => 'fa fa-plus',
                ],
                [
                    'route' => 'admin.massMailer',
                    'title' => 'massMailler',
                    'icon' => 'fa fa-plus',
                ]
                
            ]
        ],
        
    ],'client_menu' => [
        
    ],
    'mohammd'=>'not'
];
