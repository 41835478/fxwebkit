<?php

namespace Fxweb\Http\Controllers\client;

use Illuminate\Http\Request;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use Fxweb\Repositories\Admin\User\UserContract as Users;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Modules\Accounts\Http\Controllers\ApiController;

class Mt4UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    protected $oUsers;

    public function __construct(Users $oUsers)
    {
        $this->oUsers = $oUsers;
    }

    public function getAddMt4User(Request $oRequest)
    {

        $userInfo = [
            'login' => $oRequest['login'],
            'password' => $oRequest['password']
        ];

        return view('client.addMt4User')->with('userInfo', $userInfo);
    }

    public function postAddMt4User(Request $oRequest)
    {

        $fp = @fsockopen(config('fxweb.mt4CheckHost'), config('fxweb.mt4CheckPort'));
        $result = 'Invalid';
        if ($fp) {
            fwrite($fp, "WWAPUSER-" . $oRequest['login'] . "|" . $oRequest['password'] . "\nQUIT\n");
            $result = fgets($fp, 1024);
            fclose($fp);
        }
        if (preg_match('#^Balance: #', $result) === 1) {
            $asign_result = $this->oUsers->asignMt4UsersToAccount(current_user()->getUser()->id, [$oRequest['login']]);
            return Redirect::route('clients.reports.accounts');
        }
        return view('client.addMt4User')
            ->with('userInfo', ['login' => $oRequest['login'], 'password' => $oRequest['password']])
            ->withErrors('Error, Please try again later!');
    }


    public function getMt4UserFullDetails(Request $oRequest)
    {
        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);


        $array_group = Config('fxweb.Group');
        $array_deposit = Config('fxweb.Deposit');
        $array_leverage = Config('accounts.leverage');


        $mt4_user_details = [
            'edit_id' => $oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'array_group' => $array_group,
            'email' => $oResult['email'],
            'password' => '',
            'investor' => '',
            'array_deposit' => $array_deposit,
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $oResult['country'],
            //  'country_array' => $country_array,
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'array_leverage' => $array_leverage,
        ];

        return view('client.mt4UserFullDetails')
            ->with('mt4_user_details', $mt4_user_details)
            ->with('array_group', $array_group)
            ->with('array_leverage', $array_leverage)
            ->with('array_deposit', $array_deposit);
    }

    public function postMt4UserFullDetails(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry($oResult['country']);

        $array_group = Config('fxweb.Group');
        $array_deposit = Config('fxweb.Deposit');
        $array_leverage = Config('accounts.leverage');

        $country_name = preg_replace("/ \((.*)\)/", "", $country_array);

        $mt4_user_details = [
            'edit_id' => $oRequest->edit_id,
            'first_name' => $oRequest['first_name'],
            'last_name' => $oResult['last_name'],
            'array_group' => $oRequest['array_group'],
            'email' => $oRequest['email'],
            'password' => $oRequest->password,
            'investor' => $oRequest->investor,
            'array_deposit' => $oRequest['array_deposit'],
            'address' => $oRequest['address'],
            'birthday' => $oRequest['birthday'],
            'phone' => $oRequest['phone'],
            'country' => $country_name,
            'city' => $oRequest['city'],
            'zip_code' => $oRequest['zip_code'],
            'array_leverage' => $oRequest['array_leverage'],
        ];


        $oApiController = new ApiController();
        $result = $oApiController->mt4UserFullDetails($mt4_user_details);

        return Redirect::route('client.addMt4UserFullDetails')->withErrors($result);

    }

}
