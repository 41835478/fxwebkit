<?php

namespace Fxweb\Http\Controllers\Client;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

//use Cartalyst\Sentinel\Users;
//use Guzzle\Http\Message\Request;
use Fxweb\Models\User;
use Modules\Accounts\Entities\Users;
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
use Cartalyst\Sentinel\Addons\Social\Models\LinkInterface;
use Fxweb\Models\UsersDetails;
use Fxweb\Http\Controllers\Admin\Email;
use Illuminate\Http\Request;

use Fxweb\Repositories\Admin\User\UserContract;

use Modules\Ibportal\Entities\IbportalUserIbid as UserIbid;
use Modules\Ibportal\Entities\IbportalAgentUser as AgentUser;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;

use Cartalyst\Sentinel\Laravel\Facades\Reminder;

use Modules\Accounts\Http\Controllers\ApiController;
use Fxweb\Http\Controllers\Admin\EmailController as Email2;

class AuthController extends Controller
{


    protected $oUsers;
    protected $oMt4User;
    protected $oUserRepostry;

    public function __construct(
        Users $oUsers, UserContract $oUserRepostry,Mt4User $oMt4User
    )
    {
        $this->oUserRepostry = $oUserRepostry;
        $this->oUsers = $oUsers;
        $this->oMt4User = $oMt4User;
    }

    public function getLogin()
    {

//        $socialNumber=config('fxweb.EnableFacebookRegister')+ config('fxweb.EnableGoogleRegister')+config('fxweb.EnableLinkedinRegister');
//        $width=(socialNumber>0)? 85/socialNumber:0;

        return view('client.user.login')
            ->with('random', rand(1, 3));
    }

    public function postLogin(LoginRequest $oRequest)
    {
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




    public function getMt4Signup()
    {


        return view('client.user.mt4Signup')
            ->with('random', rand(1, 3))
            ->with('serverList',[0=>config('fxweb.liveServerName'),1=>config('fxweb.demoServerName')]);
    }

    public function postMt4Signup(Request $oRequest)
    {
        $login=$oRequest->login;
        $password=$oRequest->password;
        $memberAreaPassword = $oRequest->memberAreaPassword;
        $server_id=config('fxweb.liveServerId');

       $api=new ApiController();

        $authLogin=$api->checkLoginPassword($login, $password,$server_id);
        $mt4User=\Fxweb\Models\Mt4User::where(['LOGIN'=>$login,'server_id'=>$server_id])->first();


        if($authLogin ==true && $mt4User){

            $mt4User=\Fxweb\Models\Mt4User::where(['LOGIN'=>$login,'server_id'=>$server_id])->first();



            $emailExist=User::where('email',$mt4User->EMAIL)->first();

            if($emailExist ){

                return redirect()
                    ->route('client.auth.mt4Signup')
                    ->withErrors([trans('user.mt4EmailAlreadySignup')]);
            }
            if( !substr_count($mt4User->EMAIL,'@')){

                return redirect()
                    ->route('client.auth.mt4Signup')
                    ->withErrors([trans('user.mt4EmailError')]);
            }

            $mt4UserDemtauls= [
                'first_name' => $mt4User->NAME,
                'last_name' => '',
                'email' => $mt4User->EMAIL,
                'password' => $memberAreaPassword,

                'nickname' => $mt4User->nickname,
                'address' => $mt4User->ADDRESS,
                'birthday' => '',
                'phone' => $mt4User->PHONE,
                'country' => $mt4User->COUNTRY,
                'city' => $mt4User->CITY,
                'zip_code' => $mt4User->ZIPCODE,
                'gender' => 0
            ];




            $oRequest->merge($mt4UserDemtauls);

            $result=$this->regesterWithoutValidat($oRequest,true);
            if($result==true){

                return Redirect::intended('/client');
            }else{
                return redirect()
                    ->route('client.auth.mt4Signup')
                    ->withErrors([trans('user.internalError')]);
            }
        } else {
                return redirect()
                    ->route('client.auth.mt4Signup')
                    ->withErrors([trans('user.mt4UserNotExest')]);
            }

//        try {
//            $oUser = Sentinel::authenticate([
//                'email' => $oRequest->email,
//                'password' => $oRequest->password,
//            ]);
//        } catch (ThrottlingException $e) {
//            return redirect()
//                ->route('client.auth.login')
//                ->withErrors([trans('user.LoginSuspended')]);
//        } catch (NotActivatedException $e) {
//            return redirect()
//                ->route('client.auth.login')
//                ->withErrors([trans('user.LoginNotActive')]);
//        } catch (Exception $e) {
//            Log::error('Login', ['context' => __FILE__ . ' : ' . __LINE__ . ' : ' . $e->getMessage()]);
//            return redirect()
//                ->route('client.auth.login')
//                ->withErrors([trans('user.InvalidLogin')]);
//        }
//
//        if ($oUser) {
//            return Redirect::intended('/client');
//        } else {
//            return redirect()
//                ->route('client.auth.mt4Signup')
//                ->withErrors([trans('user.InvalidLogin')]);
//        }
    }



    public function getLogout()
    {
        Sentinel::logout(null, true);
        return redirect()->route('client.auth.login');
    }

    public function getRegister(Request $request)
    {
        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);
        $country_array = $this->oUserRepostry->getCountry(null);

        $ibid = ($request->has('ibid')) ? $request->ibid : '';
        $planId = ($request->has('planId')) ? $request->planId : '';

        return view('client.user.register')
            ->with('default_birthday', $dt->format('Y/m/d'))
            ->with('country_array', $country_array)
            ->with('ibid', $ibid)
            ->with('planId', $planId)
            ->with('random', rand(1, 3));
    }

    public function postRegister(RegisterRequest $oRequest)
    {
        $bAutoActivate = Config::get('fxweb.auto_activate_client');
        $result=$this->regesterWithoutValidat($oRequest,$bAutoActivate);
        if ($result ==true ) {


            return redirect()->route('clinet.editProfile');
        } else if($result =='needActivate') {

            return redirect()->route('client.auth.login')->withErrors([trans('user.checkEmailToActive')]);
        }
    }


    public function regesterWithoutValidat($oRequest,$bAutoActivate=true){
        $oClientRole = Sentinel::findRoleBySlug(Config::get('fxweb.client_default_role'));


        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email,
            'password' => $oRequest->password,
        ];

        $ibid = ($oRequest->has('ibid')) ? $oRequest->ibid : '';
        $planId = ($oRequest->has('planId')) ? $oRequest->planId : '';


        if ($bAutoActivate) {

            $oUser = Sentinel::registerAndActivate($aCredentials);
            $oClientRole->users()->attach($oUser);

            Sentinel::login($oUser);
            $this->assignNewUserToAgent($ibid, $oUser->id, $planId);
            $aCredentialsFullDetails = [
                'users_id' => $oUser->id,
                'nickname' => $oRequest->nickname,
                'address' => $oRequest->address,
                'birthday' => $oRequest->birthday,
                'phone' => $oRequest->phone,
                'country' => $oRequest->country,
                'city' => $oRequest->city,
                'zip_code' => $oRequest->zip_code,
                'gender' => $oRequest->gender
            ];


            $details = new UsersDetails($aCredentialsFullDetails);
            $details->save();
//            $oEmail = new Email;
//            @$oEmail->signUpWelcome($aCredentials + $aCredentialsFullDetails);
//            @$oEmail->newUserSignUp(['adminEmail'=>config('fxweb.adminEmail')]+$aCredentials + $aCredentialsFullDetails);
            $email=new  Email2();
            $email->sendSignUp(['id'=> $oUser->id,'status'=>[0,1]]);


            if(config('accounts.denyLiveAccount')){
                $oUser->permissions = [
                    'user.denyLiveAccount' => true
                ];
                $oUser->save();}


            $assignMt4UsresByEmail=$this->oMt4User->getMt4UsersByEmail($oUser);
            return true;
        } else {

            $oUser = Sentinel::register($aCredentials);
            $oClientRole->users()->attach($oUser);
            $oActivation = Activation::create($oUser);

            $this->assignNewUserToAgent($ibid, $oUser->id, $planId);

            $aCredentialsFullDetails = [
                'users_id' => $oUser->id,
                'nickname' => $oRequest->nickname,
                'address' => $oRequest->address,
                'birthday' => $oRequest->birthday,
                'phone' => $oRequest->phone,
                'country' => $oRequest->country,
                'city' => $oRequest->city,
                'zip_code' => $oRequest->zip_code,
                'gender' => $oRequest->gender
            ];

            $details = new UsersDetails($aCredentialsFullDetails);
            $details->save();

            /* TODO[moaid] test sign up with auto activate and not auto activate from .env CLIENT_AUTO_ACTIVATE and check activate email*/
            $oEmail = new Email;
            $oEmail->activeAccount(['email'=>$oRequest->email,
                'code'=>$oActivation->code,
                'userId'=>$oUser->id,
                'website'=>$oRequest->root()
            ]);
            @$oEmail->newUserSignUp(['adminEmail'=>config('fxweb.adminEmail')]+$aCredentials + $aCredentialsFullDetails);

            if(config('accounts.denyLiveAccount')){
                $oUser->permissions = [
                    'user.denyLiveAccount' => true
                ];
                $oUser->save();}

            return 'needActivate';
        }
    }



    private function assignNewUserToAgent($ibid, $newUserId, $planId)
    {
        if ($ibid != '') {
            $oAgent = UserIbid::where('user_ibid', $ibid)->first();
            if ($oAgent) {
                AgentUser::create([
                    'agent_id' => $oAgent->user_id,
                    'user_id' => $newUserId,
                    'plan_id' => $planId]);
            }
        }

    }

    public function getRecover()
    {
        return view('client.user.forgetPassword')
            ->with('random', rand(1, 3));
    }

    public function postRecover(Request $oRequest)
    {
        $message = trans('user.PleaseTryAgain');
        $credentials = [
            'login' => $oRequest->email,
        ];

        $user = Sentinel::findByCredentials($credentials);


        if ($user) {
            $oReminder = Reminder::create($user);

            if ($oReminder) {


                // TODO email template new way
//                $oEmail = new Email();
//                $oEmail->forgetPassword();
                $email=new  Email2();
                $email->sendForgetPassword(['id'=> $oReminder->id,'status'=>[0]]);



                $message = trans('user.checkEmailResetPassword');
            }

        } else {
            $message = trans('user.userNotExist');
        }
        return view('client.user.forgetPassword')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }

    function getResetForgetPassword($userId, $code)
    {

        return view('client.user.resetForgetPassword')
            ->with('random', rand(1, 3));
    }

    function postResetForgetPassword(Request $oRequest, $userId, $code)
    {
        $message = trans('user.PleaseTryAgain');
        $user = Sentinel::findById($userId);

        /* TODO validate password and confirm from Request not from code */

     if($oRequest->password ==$oRequest->confirmPassword && strlen($oRequest->password) > 7){
        if ($reminder = Reminder::complete($user, $code, $oRequest->password))
        {
            $oReminder=Reminder::where(['code'=>$code,'user_id'=>$userId])->first();
            // TODO email template new way
            $email=new  Email2();
            $email->sendForgetPassword(['id'=> $oReminder->id,'status'=>[1]]);

            // Reminder was successfull
            return Redirect::route('client.auth.login');
        }
     }else{

         $message=trans('invalidPassord');
     }



        return view('client.user.resetForgetPassword')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }


    function getActivateAccount(Request $oRequest,$userId,$code){

        $message=trans('PleaseTryAgain');
        $user = Sentinel::findById($userId);

        if (Activation::complete($user,$code)) {
            // Reminder was successfull


            $assignMt4UsresByEmail=$this->oMt4User->getMt4UsersByEmail($user);

            return Redirect::route('client.auth.login');
        }



        return view('client.user.activateAccountResult')
            ->with('random', rand(1, 3))
            ->withErrors($message);
    }

    function postResendActivateEmail(Request $oRequest,$userId,$code){

        $oUser = Sentinel::findById($userId);
        $oActivation = Activation::create($oUser);



        $oEmail = new Email;
        @$oEmail->activeAccount(['email'=>$oUser->email,
            'code'=>$oActivation->code,
            'userId'=>$userId,
            'website'=>$oRequest->root()
        ]);

        return view('client.user.activateAccountResult')
            ->with('random', rand(1, 3));
    }


    public function getFacebookLogin()
    {

        Social::addConnection(Config('fxweb.facebookLoginProvider'), [
                'driver' => Config('fxweb.facebookLoginDriver'),
                'identifier' => Config('fxweb.facebookLoginIdentifier'),
                'app_id' => Config('fxweb.facebookLoginApp_id'),
                'secret' => Config('fxweb.facebookLoginSecret'),
                'scopes' => ['email'],
            ]
        );
        $callback =Config('fxweb.facebookLoginCallback');
        $url = Social::getAuthorizationUrl('facebook', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getFacebookLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback =Config('fxweb.facebookLoginCallback');
        Social::addConnection(Config('fxweb.facebookLoginProvider'), [
                'driver' => Config('fxweb.facebookLoginDriver'),
                'identifier' => Config('fxweb.facebookLoginIdentifier'),
                'app_id' => Config('fxweb.facebookLoginApp_id'),
                'secret' => Config('fxweb.facebookLoginSecret'),
                'scopes' => ['email'],
            ]
        );
        try {

            $user = Social::authenticate('facebook', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                Sentinel::login($user);
                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];
                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getGoogleLogin()
    {

        Social::addConnection(Config('fxweb.googleProvider'), [
                'driver' => Config('fxweb.googleDriver'),
                'identifier' => Config('fxweb.googleIdentifier'),
                'secret' => Config('fxweb.googleSecret'),
                'scopes' => ['email'],
            ]
        );

        $callback =Config('fxweb.googleCallback');
        $url = Social::getAuthorizationUrl('google', $callback);


        header('Location: ' . $url);
        exit;
    }

    public function getGoogleLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = Config('fxweb.googleCallback');
        Social::addConnection(Config('fxweb.googleProvider'), [
                'driver' => Config('fxweb.googleDriver'),
                'identifier' => Config('fxweb.googleIdentifier'),
                'secret' => Config('fxweb.googleSecret'),
                'scopes' => ['email'],
            ]
        );
        try {

            $user = Social::authenticate('google', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];

                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getLinkedinLogin()
    {


        Social::addConnection(Config('fxweb.linkedinProvider'), [
                'driver' => Config('fxweb.linkedinDriver'),
                'identifier' =>Config('fxweb.linkedinIdentifier'),
                'secret' => Config('fxweb.linkedinSecret'),
            ]
        );

        $callback = Config('fxweb.linkedinCallback');
        $url = Social::getAuthorizationUrl('linkedin', $callback);
        header('Location: ' . $url);
        exit;
    }

    public function getLinkedinLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = Config('fxweb.linkedinCallback');


        Social::addConnection(Config('fxweb.linkedinProvider'), [
                'driver' => Config('fxweb.linkedinDriver'),
                'identifier' =>Config('fxweb.linkedinIdentifier'),
                'secret' => Config('fxweb.linkedinSecret'),
            ]
        );
        try {

            $user = Social::authenticate('linkedin', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];

                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
                }
            });
        } catch (Cartalyst\Sentinel\Addons\Social\AccessMissingException $e) {
            return redirect()
                ->route('client.auth.login')
                ->withErrors([trans('user.InvalidLogin')]);
        }
        return Redirect::intended('/client');
    }

    public function getTwitterLogin()
    {


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

    public function getTwitterLoginCallback(\Illuminate\Support\Facades\Request $oRequest)
    {

        $callback = 'http://localhost:8000/client/twitter-callback-login';


        Social::addConnection('twitter', [
                'driver' => 'twitter',
                'identifier' => 'ls4If9Mewb28kKF8DtjgBw7Os',
                'secret' => 'OhjvkSm7P4yHEJ89FpHsChCWhgTwO9Xp5QT9kvkZx5G6I4sw82',
                'scopes' => [],
            ]
        );
        try {

            $user = Social::authenticate('twitter', $callback, function (LinkInterface $link, $provider, $token, $slug) {

                $user = $link->getUser();
                $data = $provider->getUserDetails($token);
                $user->save();

                if (!$user->inRole('client')) {
                    $activation = Activation::create($user);
                    $activation_code = $activation->code;
                    $role = Sentinel::findRoleByName('client');
                    $role->users()->attach($user);

                    $aCredentialsFullDetails = [
                        'users_id' => $user->id,
                        'nickname' => (isset($data->nickname)) ? $data->nickname : '',
                        'address' => (isset($data->location)) ? $data->location : '',
                        'birthday' => (isset($data->birthday)) ? $data->birthday : ' ',
                        'phone' => (isset($data->phone)) ? $data->phone : ' ',
                        'country' => (isset($data->country)) ? $data->country : ' ',
                        'city' => (isset($data->city)) ? $data->city : ' ',
                        'zip_code' => (isset($data->zip_code)) ? $data->zip_code : ' ',
                        'gender' => (isset($data->gender) && $data->gender == 'female') ? 1 : 0
                    ];

                    $details = new UsersDetails($aCredentialsFullDetails);
                    $details->save();
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
