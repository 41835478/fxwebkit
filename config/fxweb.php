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
    'auto_activate_client' => env('CLIENT_AUTO_ACTIVATE', true),
    'pagination_size' => env('PAGINATION_SIZE', 25),

    'LinkTradeForUser' => 'https://trade.mql5.com/trade?servers=MetaQuotes-Demo&demo_server=192.168.15.10&lang=en',

    'EnableLinkTradeForUser' => true,
    'mt4CheckHost' => '192.168.15.10',
    'mt4CheckPort' => '443',
    'liveServerName' => 'liveAAA',
    'mt4CheckDemoHost' => '192.168.15.10',
    'mt4CheckDemoPort' => '443',
    'demoServerName' => 'demo',
    'senderEmail' => 'm.hashim@mqplanet.com',
    'displayName' => 'Mqplanet',
    'layoutAssetsFolder'=>'fxwebkit',


    'adminEmail' => 'mag@mqplanet.com',

    'facebookLoginCallback' => 'http://www.fxwebkit.com/client/facebook-callback-login',
    'facebookLoginProvider' => 'facebook',
    'facebookLoginDriver' => 'Facebook',
    'facebookLoginIdentifier' => '905239722928440',
    'facebookLoginApp_id' => '905239722928440',
    'facebookLoginSecret' => '8dfda7399b0793451f6dcc49370dadf6',
    'EnableFacebookRegister'=>true,
    'facebookLoginScopes' => ['email'],


    'googleCallback' => 'http://www.fxwebkit.com/client/google-callback-login',
    'googleProvider' => 'google',
    'googleDriver' => 'Google',
    'googleIdentifier' => '550013315281-l4e78dgaou1i5up951shripl599ivb6o.apps.googleusercontent.com',
    'googleSecret' => 'FROszwzxu9ahiCqU40nRb28u',
    'EnableGoogleRegister'=>true,
    'googleScopes' => ['email'],


    'linkedinCallback' => 'http://www.fxwebkit.com/client/linkedin-callback-login',
    'linkedinProvider' => 'linkedin',
    'linkedinDriver' => 'LinkedIn',
    'linkedinIdentifier' => '77pt0cs5p0duu6',
    'EnableLinkedinRegister'=>true,
    'linkedinSecret' => 'ddVzvRTG0Nmkyy6u',

    'key' => 'fgh',

    'value' => 'fgh','GroupLive'=>['1'=>'100','2'=>'300',],'GroupDemo'=>['1'=>'100',],'DepositLive'=>['1'=>'100',],'DepositDemo'=>['1'=>'100',],'leverage'=>['1'=>'1:300',],'leverageDemo'=>['1'=>'1:150',],

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
                ], [
                    'route' => 'admin.massGroupsList',
                    'title' => 'massGroupsList',
                    'icon' => 'fa fa-users',
                ],
                [
                    'route' => 'admin.language.editLanguage',
                    'title' => 'language',
                    'icon' => 'fa fa-globe',
                ],
                [
                    'route' => 'admin.settings',
                    'title' => 'settings',
                    'icon' => 'fa fa-gears',
                ]
            ]
        ],

    ], 'client_menu' => [

    ],
    'htmlToPdfPath'=>'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe'
];




























