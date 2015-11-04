<?php

namespace Fxweb\Http\Controllers\Client;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Users;
use Fxweb\Http\Controllers\Controller;
use Fxweb\Http\Requests\Client\LoginRequest;
use Fxweb\Http\Requests\Client\RegisterRequest;
use Exception,
    Sentinel,
    Lang,
    Redirect,
    Config,
    Log,
    Activation;
use Cartalyst\Sentinel\Addons\Social\Laravel\Facades\Social;
use Cartalyst\Sentinel\Addons\Social\Models\LinkInterface;

class AuthController extends Controller {

    public function getLogin() {
        return view('client.user.login')
                        ->with('random', rand(1, 8));
    }

    public function postLogin(LoginRequest $oRequest) {
        try {
            $oUser = Sentinel::authenticate([
                        'email' => $oRequest->email,
                        'password' => $oRequest->password,
            ]);
        } catch (ThrottlingException $e) {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.LoginSuspended')]);
        } catch (NotActivatedException $e) {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.LoginNotActive')]);
        } catch (Exception $e) {
            Log::error('Login', ['context' => __FILE__ . ' : ' . __LINE__ . ' : ' . $e->getMessage()]);
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
        }

        if ($oUser) {
            return Redirect::intended('/client');
        } else {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
        }
    }

    public function getLogout() {
        Sentinel::logout(null, true);
        return redirect()->route('client.auth.login');
    }

    public function getRegister() {
        return view('client.user.register')
                        ->with('random', rand(1, 8));
    }

    public function postRegister(RegisterRequest $oRequest) {
        $oClientRole = Sentinel::findRoleBySlug(Config::get('fxweb.client_default_role'));
        $bAutoActivate = Config::get('fxweb.auto_activate_client');
        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email,
            'password' => $oRequest->password,
        ];

        if ($bAutoActivate) {
            $oUser = Sentinel::registerAndActivate($aCredentials);
            $oClientRole->users()->attach($oUser);
            return redirect()->route('client.index');
        } else {
            $oUser = Sentinel::register($aCredentials);
            $oClientRole->users()->attach($oUser);
            $oActivation = Activation::create($oUser);
            dd($oActivation);
            return redirect()->route('client.auth.login');
        }
    }

    public function getRecover() {
        //
    }

    public function getFacebookLogin() {
        Social::addConnection('facebook', [
            'driver' => 'Facebook',
            'identifier' => '1647542828861678',
            'app_id' => '1647542828861678',
            'secret' => '98ed8a842470ba1eed8ee1902bfec749',
            'scopes' => ['email'],
                ]
        );
        $callback = 'http://localhost:8000/client/facebook-callback-login';
        $url = Social::getAuthorizationUrl('facebook', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getFacebookLoginCallback(\Illuminate\Support\Facades\Request $oRequest) {

        $callback = 'http://localhost:8000/client/facebook-callback-login';
        Social::addConnection('facebook', [
            'driver' => 'Facebook',
            'identifier' => '1647542828861678',
            'app_id' => '1647542828861678',
            'secret' => '98ed8a842470ba1eed8ee1902bfec749',
            'scopes' => ['email'],
                ]
        );
        try {

            $user = Social::authenticate('facebook', $callback, function(LinkInterface $link, $provider, $token, $slug) {

                        $user = $link->getUser();
                        $data = $provider->getUserDetails($token);
                        $user->save();

                        if (!$user->inRole('client')) {
                            $activation = Activation::create($user);
                            $activation_code = $activation->code;
                            $role = Sentinel::findRoleByName('client');
                            $role->users()->attach($user);
                        }
                    });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getGoogleLogin() {

        Social::addConnection('google', [
            'driver' => 'google',
            'identifier' => '153369653879-grpme2quc1398mjf57q8gl4s7g48o8kg.apps.googleusercontent.com',
            'secret' => 'M6gqHVqK-t3CC55g3aH63zGM',
            'scopes' => ['email'],
                ]
        );

        $callback = 'http://localhost:8000/client/google-callback-login';
        $url = Social::getAuthorizationUrl('google', $callback);


        header('Location: ' . $url);
        exit;
    }

    public function getGoogleLoginCallback(\Illuminate\Support\Facades\Request $oRequest) {

        $callback = 'http://localhost:8000/client/google-callback-login';
        Social::addConnection('google', [
            'driver' => 'google',
            'identifier' => '153369653879-grpme2quc1398mjf57q8gl4s7g48o8kg.apps.googleusercontent.com',
            'secret' => 'M6gqHVqK-t3CC55g3aH63zGM',
            'scopes' => ['email'],
                ]
        );
        try {

            $user = Social::authenticate('google', $callback, function(LinkInterface $link, $provider, $token, $slug) {

                        $user = $link->getUser();
                        $data = $provider->getUserDetails($token);
                        $user->save();

                        if (!$user->inRole('client')) {
                            $activation = Activation::create($user);
                            $activation_code = $activation->code;
                            $role = Sentinel::findRoleByName('client');
                            $role->users()->attach($user);
                        }
                    });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    
    public function getLinkedinLogin() {

       
    Social::addConnection('linkedin', [
                                       'driver'     => 'linkedin',
                                       'identifier' => '779y8ism8ovwns',
                                       'secret'     => 'l9paUw3eQJgtYRRV',
                                      ]
                           );

        $callback = 'http://localhost:8000/client/linkedin-callback-login';
        $url = Social::getAuthorizationUrl('linkedin', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getLinkedinLoginCallback(\Illuminate\Support\Facades\Request $oRequest) {

        $callback = 'http://localhost:8000/client/linkedin-callback-login';

       
    Social::addConnection('linkedin', [
                                       'driver'     => 'linkedin',
                                       'identifier' => '779y8ism8ovwns',
                                       'secret'     => 'l9paUw3eQJgtYRRV',
                                      ]
                           );
        try {

            $user = Social::authenticate('linkedin', $callback, function(LinkInterface $link, $provider, $token, $slug) {

                        $user = $link->getUser();
                        $data = $provider->getUserDetails($token);
                        $user->save();

                        if (!$user->inRole('client')) {
                            $activation = Activation::create($user);
                            $activation_code = $activation->code;
                            $role = Sentinel::findRoleByName('client');
                            $role->users()->attach($user);
                        }
                    });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getTwitterLogin() {

       
 
    Social::addConnection('twitter', [
        'driver' => 'twitter',
        'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
        'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
        'scopes' => [],
            ]
    );

        $callback = 'http://localhost:8000/client/twitter-callback-login';
        $url = Social::getAuthorizationUrl('twitter', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getTwitterLoginCallback(\Illuminate\Support\Facades\Request $oRequest) {

        $callback = 'http://localhost:8000/client/twitter-callback-login';

       
  
    Social::addConnection('twitter', [
        'driver' => 'twitter',
        'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
        'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
        'scopes' => [],
            ]
    );
        try {

            $user = Social::authenticate('twitter', $callback, function(LinkInterface $link, $provider, $token, $slug) {

                        $user = $link->getUser();
                        $data = $provider->getUserDetails($token);
                        $user->save();

                        if (!$user->inRole('client')) {
                            $activation = Activation::create($user);
                            $activation_code = $activation->code;
                            $role = Sentinel::findRoleByName('client');
                            $role->users()->attach($user);
                        }
                    });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

}
