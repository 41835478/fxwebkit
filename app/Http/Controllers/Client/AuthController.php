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
use Carbon\Carbon;
use Cartalyst\Sentinel\Addons\Social\Laravel\Facades\Social;

use Fxweb\Models\UsersDetails;

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
        $carbon = new Carbon();
        $dt =$carbon->now();
        $dt->subYears(18);
       
        return view('client.user.register')
        ->with('default_birthday', $dt->format('m/d/Y'))
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
          

             $aCredentialsFullDetails = [
            'users_id' => $oUser->id,
            'nickname' => $oRequest->nickname,
            'location' => $oRequest->location,
            'birthday' => $oRequest->birthday,
            'phone' => $oRequest->phone,
            'country' => $oRequest->country,
            'city' => $oRequest->city,
            'zipCode'=>$oRequest->zip_code,
            'gender'=>$oRequest->gender
        ];
             
            $details=new UsersDetails($aCredentialsFullDetails);
            $details->save();
             
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

    public function getFacebookLoginCallback() {




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
            $user = Social::authenticate('facebook', $callback, function(Cartalyst\Sentinel\Addons\Social\Models\LinkInterface $link, $provider, $token, $slug) {

                        return Redirect::intended('/client');
                        /*
                          // Retrieve the user in question for modificiation
                          $user = $link->getUser();

                          // You could add your custom data
                          $data = $provider->getUserDetails($token);
                          dd($user);
                          $user->foo = $data->foo;
                          $user->save();
                         * 
                         */
                    });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {

            return redirect()
                            ->route('client.auth.login')
                            ->withErrors([trans('user.InvalidLogin')]);
            /*
              var_dump($e); // You may save this to the session, redirect somewhere
              die();

              header('HTTP/1.0 404 Not Found');
             * 
             */
        }
    }

}
