<?php

namespace Fxweb\Http\Controllers\Client;

use Fxweb\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Modules\Accounts\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class DashboardController extends Controller {

    public function index() {
        return view('client.dashboard');
    }

    protected $oUsers;

    public function __construct(
    Users $oUsers
    ) {
        $this->oUsers = $oUsers;
    }

    public function getClientProfile(Request $oRequest) {
        $user = Sentinel::getUser();
        $oResult = $this->oUsers->getUserDetails($user->id);

        $user_detalis = [
            'id' => $oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'nickname' => $oResult['nickname'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $this->oUsers->getCountry($oResult['country']),
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'gender' => $oResult['gender'],
        ];

        return view('client.user.detailsProfile')->with('user_detalis', $user_detalis);
    }

    public function getEditProfile(Request $oRequest) {
        $user = Sentinel::getUser();
        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry(null);


        $userInfo = [
            'edit_id' => $user->id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'password' => '',
            'nickname' => $oResult['nickname'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $oResult['country'],
            'country_array' => $country_array,
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'gender' => $oResult['gender'],
        ];


        return view('client.user.editProfile')->with('userInfo', $userInfo);
    }

    public function postEditProfile(AddUserRequest $oRequest) {


        $result = 0;
        $resultMessage = [];
        if ($oRequest->edit_id > 0) {
            $oRequest->edit_id = Sentinel::getUser()->id;
            $result = $this->oUsers->updateUser($oRequest);
        } else {
            $role = explode(',', Config::get('fxweb.client_default_role'));
            $result = $this->oUsers->addUser($oRequest, $role);
        }

        if ($result > 0) {
            return $this->getEditProfile($oRequest);
        } else {
            return view('accounts::addAccount')
                            ->withErrors($resultMessage)
                            ->withErrors($result)
                            ->with('userInfo', [
                                'edit_id' => $oRequest->edit_id,
                                'first_name' => $oRequest->first_name,
                                'last_name' => $oRequest->last_name,
                                'email' => $oRequest->email,
                                'password' => $oRequest->password,
                                'nickname' => $oRequest->nickname,
                                'address' => $oRequest->address,
                                'birthday' => $oRequest->birthday,
                                'phone' => $oRequest->phone,
                                'country' => $oRequest->country,
                                'country_array' => $this->oUsers->getCountry(null),
                                'city' => $oRequest->city,
                                'zip_code' => $oRequest->zip_code,
                                 'gender' => $oRequest->gender,
            ]);
        }
    }
    
    public function getClientAddMt4User(Request $oRequest)
    {
      
        $userInfo = [    
            'login' => $oRequest['login'],
            'password' => $oRequest['password']];
        
        return view('accounts::clientAddMt4User')->with('userInfo',$userInfo);
    }
    
     public function postClientAddMt4User(AsignMt4User $oRequest)
    {
      
        $userInfo = [    
            'login' => $oRequest['login'],
            'password' => $oRequest['password']];
        
        dd($userInfo);
        
        return view('accounts::clientAddMt4User')->with('userInfo',$userInfo);
    }

}
