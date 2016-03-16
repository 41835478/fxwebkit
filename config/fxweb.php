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
    'LinkTradeForUser'=>'https://trade.mql5.com/trade?servers=MetaQuotes-Demo&demo_server=MetaQuotes-Demo&lang=en',
    'EnableLinkTradeForUser'=>true,
    'mt4CheckHost'=>'192.168.15.10',
    'mt4CheckPort'=>'443',
    'liveServerName'=>'liveAAAAA',
    'mt4CheckDemoHost'=>'192.168.15.10',
    'mt4CheckDemoPort'=>'443',
    'demoServerName'=>'demo',
    'senderEmail'=>'m.hashim@mqplanet.com',
    'displayName'=>'Mqplanet',


    'adminEmail'=>'taylorsuccessor@gmail.com',

    'facebookLoginCallback'=>'http://localhost:8000/client/facebook-callback-login',
    'facebookLoginProvider'=>'facebook',
    'facebookLoginDriver' => 'Facebook',
    'facebookLoginIdentifier' => '1647542828861678',
    'facebookLoginApp_id' => '1647542828861678',
    'facebookLoginSecret' => '98ed8a842470ba1eed8ee1902bfec749',
    'facebookLoginScopes' => ['email'],






    'googleCallback' => 'http://localhost:8000/client/google-callback-login',
    'googleProvider'=>'google',
    'googleDriver' => 'google',
    'googleIdentifier' => '153369653879-grpme2quc1398mjf57q8gl4s7g48o8kg.apps.googleusercontent.com',
    'googleSecret' => 'M6gqHVqK-t3CC55g3aH63zGM',
    'googleScopes' => ['email'],




    'linkedinCallback' => 'http://localhost:8000/client/linkedin-callback-login',
    'linkedinProvider'=>'linkedin',
    'linkedinDriver' => 'linkedin',
    'linkedinIdentifier' => '779y8ism8ovwns',
    'linkedinSecret' => 'l9paUw3eQJgtYRRV',

    'key'=>'fgh',

    'value'=>'fgh','GroupLive'=>['dfg'=>'ger','sdf'=>'sdfsd',],'GroupDemo'=>['dfg'=>'ger','mohammd '=>'hashim','sdf'=>'sdfsd','1'=>'2','44'=>'44','demo'=>'demo','gggg'=>'gggggg',],'DepositLive'=>['1000'=>'1000','5000'=>'5000','10000'=>'10000','100000'=>'100000','25'=>'3000','30'=>'60','1'=>'1','fgggggggggg'=>'gggggg',],'DepositDemo'=>['1000'=>'1000','5000'=>'5000','10000'=>'10000','100000'=>'100000','25'=>'3000','30'=>'60','3'=>'2','ggggggg'=>'ggggggg',],'leverage'=>['50'=>'1:50','100'=>'1:100','150'=>'1:150','123'=>'000',],'leverageDemo'=>['50'=>'1:500','100'=>'1:1000','150'=>'1:1500','aaaa'=>'aaaa',],

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
                ],
                [
                    'route' => 'admin.settings',
                    'title' => 'settings',
                    'icon' => 'fa fa-gears',
                ]
            ]
        ],

    ],'client_menu' => [

    ],
];
