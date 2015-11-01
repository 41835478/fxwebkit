<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
/*
Route::get('facebook',function(){
    
    Social::addConnection('facebook' ,[
        'driver'     => 'Facebook',
        'identifier' => '1647542828861678',
        'app_id' => '1647542828861678',
        'secret'     => '98ed8a842470ba1eed8ee1902bfec749',
        'scopes'     => ['email'],
    ]
);
    
    $callback = 'http://localhost:8000/callback';
$url      = Social::getAuthorizationUrl('facebook', $callback);


header('Location: ' . $url);
exit;


});


Route::get('callback',function(){
    
    $callback = 'http://localhost:8000/callback';
        Social::addConnection('facebook' ,[
        'driver'     => 'Facebook',
        'identifier' => '1647542828861678',
        'app_id' => '1647542828861678',
        'secret'     => '98ed8a842470ba1eed8ee1902bfec749',
        'scopes'     => ['email'],
    ]
);
    try
{
    $user = Social::authenticate('facebook', $callback, function(Cartalyst\Sentinel\Addons\Social\Models\LinkInterface $link, $provider, $token, $slug)
    {
        // Retrieve the user in question for modificiation
        $user = $link->getUser();

        // You could add your custom data
        $data = $provider->getUserDetails($token);
dd($user);
        $user->foo = $data->foo;
        $user->save();
    });
}
catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e)
{
    var_dump($e); // You may save this to the session, redirect somewhere
    die();

    header('HTTP/1.0 404 Not Found');
}
    
});
*/

Route::get('twitter',function(){
    
    Social::addConnection('twitter' ,[
        'driver'     => 'twitter',
        'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
        'app_id' => 'ls4If9Mewb28kKF8DtjgBw7Os',
        'secret'     => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
        'scopes'     => ['email'],
    ]
);
    
    $callback = 'http://localhost:8000/callback_twitter';
$url      = Social::getAuthorizationUrl('twitter', $callback);


header('Location: ' . $url);
exit;


});


Route::get('callback_twitter',function(){
    

    Social::addConnection('twitter' ,[
        'driver'     => 'twitter',
        'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
        'secret'     => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
        'scopes'     => [],
    ]
);
    
    $callback = 'http://www.mqplanet.com/callback';
    try
{
    $user = Social::authenticate('twitter', $callback, function(Cartalyst\Sentinel\Addons\Social\Models\LinkInterface $link, $provider, $token, $slug)
    {dd($data);
        // Retrieve the user in question for modificiation
        $user = $link->getUser();

        // You could add your custom data
        $data = $provider->getUserDetails($token);
dd($data);
        $user->foo = $data->foo;
        $user->save();
    });
}
catch (Exception $e)
{
    var_dump($e); // You may save this to the session, redirect somewhere
    die();

    header('HTTP/1.0 404 Not Found');
}
    
});



Route::get('google',function(){
   
    Social::addConnection('google' ,[
        'driver'     => 'google',
        'identifier' => '153369653879-grpme2quc1398mjf57q8gl4s7g48o8kg.apps.googleusercontent.com',
        'secret'     => 'M6gqHVqK-t3CC55g3aH63zGM',
        'scopes'     => ['email'],
    ]
);
    
    $callback = 'http://localhost:8000/callback_google';
$url      = Social::getAuthorizationUrl('google', $callback);


header('Location: ' . $url);
exit;


});


Route::get('callback_google',function(){
    

    Social::addConnection('google' ,[
        'driver'     => 'google',
        'identifier' => '153369653879-grpme2quc1398mjf57q8gl4s7g48o8kg.apps.googleusercontent.com',
        'secret'     => 'M6gqHVqK-t3CC55g3aH63zGM',
        'scopes'     => ['email'],
    ]
);
    
    $callback = 'http://localhost:8000/callback_google';
    try
{
    $user = Social::authenticate('google', $callback, function(Cartalyst\Sentinel\Addons\Social\Models\LinkInterface $link, $provider, $token, $slug)
    {
        // Retrieve the user in question for modificiation
        $user = $link->getUser();

        // You could add your custom data
        $data = $provider->getUserDetails($token);
dd($user);
        $user->foo = $data->foo;
        $user->save();
    });
}
catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e)
{
    var_dump($e); // You may save this to the session, redirect somewhere
    die();

    header('HTTP/1.0 404 Not Found');
}
    
});


Route::get('linkedin',function(){
   
    Social::addConnection('linkedin' ,[
        'driver'     => 'linkedin',
        'identifier' => '779y8ism8ovwns',
        'secret'     => 'l9paUw3eQJgtYRRV',
    ]
);
    
    $callback = 'http://localhost:8000/callback_linkedin';
$url      = Social::getAuthorizationUrl('linkedin', $callback);


header('Location: ' . $url);
exit;


});


Route::get('callback_linkedin',function(){
    

    Social::addConnection('linkedin' ,[
        'driver'     => 'linkedin',
        'identifier' => '779y8ism8ovwns',
        'secret'     => 'l9paUw3eQJgtYRRV',
    ]
);
    
    $callback = 'http://localhost:8000/callback_linkedin';
    try
{
    $user = Social::authenticate('linkedin', $callback, function(Cartalyst\Sentinel\Addons\Social\Models\LinkInterface $link, $provider, $token, $slug)
    {
        // Retrieve the user in question for modificiation
        $user = $link->getUser();

        // You could add your custom data
        $data = $provider->getUserDetails($token);
dd($user);
        $user->foo = $data->foo;
        $user->save();
    });
}
catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e)
{
    var_dump($e); // You may save this to the session, redirect somewhere
    die();

    header('HTTP/1.0 404 Not Found');
}
    
});

Route::group(['prefix' => env('ADMIN_NAME'), 'namespace' => 'Admin'], function() {
    require_once __DIR__ . "/Routes/Admin/Dashboard.php";
    require_once __DIR__ . "/Routes/Admin/Settings.php";
    require_once __DIR__ . "/Routes/Admin/Auth.php";
});


/*
 * Redirect root routes to clients area
 */


if (class_exists("Module") && Module::find('cms')) {
 
    Route::group(['prefix' => env('CLIENT_NAME'), 'namespace' => 'Client'], function () {

        require_once __DIR__ . "/Routes/Client/Dashboard.php";
        require_once __DIR__ . "/Routes/Client/Auth.php";
    });
    Route::get('/', '\Modules\Cms\Http\Controllers\PagesController@getRenderPage');
    Route::get('/{page_name}', '\Modules\Cms\Http\Controllers\PagesController@getRenderPage');

} else {

    Route::get('/', function () {

        return Redirect::to(env('CLIENT_NAME'));
    });
}
