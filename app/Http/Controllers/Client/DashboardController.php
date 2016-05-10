<?php

namespace Fxweb\Http\Controllers\Client;

use Fxweb\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Accounts\Http\Requests\AddUserRequest;
use Modules\Reports\Http\Requests\Admin\ClosedTradesRequest;
use Illuminate\Support\Facades\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;


use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use \Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    protected $oMt4Trade;

    protected $oUsers;

    protected $oMt4User;

    public function __construct(Mt4User $oMt4User, Users $oUsers, Mt4Trade $oMt4Trade)
    {
        $this->oMt4Trade = $oMt4Trade;
        $this->oUsers = $oUsers;
        $this->oMt4User = $oMt4User;
    }

    public function index(ClosedTradesRequest $oRequest)
    {


        /*$horizontal_line_numbers = [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000];

        $growth_array = [0.00, 50.00, 100.00, 150.00, 200.00, 250.00, 300.00, 350.00, 400.00, 450.00];
       $averages_array = [50.00, 100.00, 150.00, 200.00, 250.00, 300.00, 350.00, 400.00, 450.00];
        */
        $oUser = Sentinel::getUser();
        $clientId = $oUser->id;

        /*_____________________________test*

//        $oUser->permissions = [
//            'user.create' => false,
//            'user.delete' => true,
//        ];
//
//        //$user->removePermission('user.delete')->save();
//        $oUser->save();

        if ($oUser->hasAnyAccess(['user.create', 'user.delete']))
        {
          dd($oUser);  // Execute this code if the user has permission
        }
        else
        {
            dd(5); // Execute this code if the permission check failed
        }
        /*___________________________END__test*/

        list($firstLogin, $firstLoginServerId, $aLoginList) = $this->oMt4User->getUsersMt4Users($clientId);
        $login = 0;
        $server_id = $firstLoginServerId;
        if ($oRequest->has('login')) {
            $login = $oRequest->login;
            $server_id = $oRequest->server_id;
        }

        list($horizontal_line_numbers,
            $growth_array,
            $averages_array,
            $statistics,
            $symbols_pie_array,
            $sell_array,
            $buy_array,
            $sell_buy_horizontal_line_numbers,
            $growth) = [[], [], [], [], [], [], [], [], []];

        if ($login != 0) {
            list($horizontal_line_numbers,
                $growth_array,
                $averages_array,
                $statistics,
                $symbols_pie_array,
                $sell_array,
                $buy_array,
                $sell_buy_horizontal_line_numbers,
                $growth) = $this->oMt4Trade->getClientGrowthChart($login, $server_id);

        }
        if ($oUser->hasAnyAccess(['user.denyLiveAccount'])) {
            Session::flash('flash_info', trans('user.fillFullDetailsToAllowLive'));
        }


        // dd( \Illuminate\Support\Facades\Session::get('flash_success'));
        return view('client.dashboard')
            ->with('horizontal_line_numbers', $horizontal_line_numbers)
            ->with('growth_array', $growth_array)
            ->with('averages_array', $averages_array)
            ->with('statistics', $statistics)
            ->with('aLogin', $aLoginList)
            ->with('login', $login)
            ->with('server_id', $server_id)
            ->with('sell_buy_horizontal_line_numbers', $sell_buy_horizontal_line_numbers)
            ->with('symbols_pie_array', $symbols_pie_array)
            ->with('sell_array', $sell_array)
            ->with('buy_array', $buy_array)
            ->with('growth', $growth);


    }

    public function getBalanceChart(ClosedTradesRequest $oRequest)
    {
        $clientId = Sentinel::getUser()->id;


        list($firstLogin, $firstLoginServerId, $aLoginList) = $this->oMt4User->getUsersMt4Users($clientId);
        $login = 0;
        $server_id = $firstLoginServerId;

        if ($oRequest->has('login')) {
            $login = $oRequest->login;
            $server_id = $oRequest->server_id;
        }

        list($horizontal_line_numbers,
            $balance_array,
            $statistics,
            $symbols_pie_array,
            $sell_array,
            $buy_array,
            $sell_buy_horizontal_line_numbers,
            $balance) = [[], [], [], [], [], [], [], [], []];



        if ($login != 0) {

            list($horizontal_line_numbers,
                $balance_array,
                $statistics,
                $symbols_pie_array,
                $sell_array,
                $buy_array,
                $sell_buy_horizontal_line_numbers,
                $balance) = $this->oMt4Trade->getClinetBalanceChart($login, $server_id);
        }


        return view('client.balanceChart')
            ->with('horizontal_line_numbers', $horizontal_line_numbers)
            ->with('balance_array', $balance_array)
            ->with('statistics', $statistics)
            ->with('aLogin', $aLoginList)
            ->with('login', $login)
            ->with('server_id', $server_id)
            ->with('sell_buy_horizontal_line_numbers', $sell_buy_horizontal_line_numbers)
            ->with('symbols_pie_array', $symbols_pie_array)
            ->with('sell_array', $sell_array)
            ->with('buy_array', $buy_array)
            ->with('balance', $balance);

    }

    /*
      protected $oUsers;

      public function __construct(
      Users $oUsers
      ) {
      $this->oUsers = $oUsers;
      }

      public function getClientProfile(Request $oRequest) {
      $user = Sentinel::getUser();
      $oResult = $this->oUsers->getUserDetails($user->id);

      $user_details = [
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

      return view('client.user.detailsProfile')->with('user_detalis', $user_details);
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

     */
}
