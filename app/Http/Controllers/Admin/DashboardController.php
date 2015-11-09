<?php

namespace Fxweb\Http\Controllers\Admin;

use Fxweb\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Modules\Accounts\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class DashboardController extends Controller {

    public function index() {
        return view('admin.dashboard');
    }

    protected $oUsers;

    public function __construct(
    Users $oUsers
    ) {
        $this->oUsers = $oUsers;
    }

    public function getProfile(Request $oRequest) {
        $user = Sentinel::getUser();
        $oResult = $this->oUsers->getUserDetails($user->id);

        $user_detalis = [
            'id' => $oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'nickname' => $oResult['nickname'],
            'location' => $oResult['location'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $this->oUsers->getCountry($oResult['country']),
            'city' => $oResult['city'],
        ];

        return view('admin.user.detailsProfile')->with('user_detalis', $user_detalis);
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
            'location' => $oResult['location'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $oResult['country'],
            'country_array' => $country_array,
            'city' => $oResult['city'],
        ];


        return view('admin.user.editProfile')->with('userInfo', $userInfo);
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
                                'location' => $oRequest->location,
                                'birthday' => $oRequest->birthday,
                                'phone' => $oRequest->phone,
                                'country' => $oRequest->country,
                                'country_array' => $this->oUsers->getCountry(null),
                                'city' => $oRequest->city,
            ]);
        }
    }

}
