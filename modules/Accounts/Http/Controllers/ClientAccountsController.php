<?php

namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Illuminate\Support\Facades\Redirect;
use Modules\Accounts\Http\Controllers\ApiController;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ClientAccountsController extends Controller
{

    /**
     * @var Mt4Group
     */
    protected $oUsers;
    protected $oMt4Trade;
    protected $oMt4User;

    public function __construct(
        Users $oUsers, Mt4User $oMt4User, Mt4Trade $oMt4Trade
    )
    {
        $this->oUsers = $oUsers;

        $this->oMt4Trade = $oMt4Trade;
        $this->oMt4User = $oMt4User;
    }

    public function getMt4UsersList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $aGroups = [];
        $oResults = null;

        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'name' => '',
            'all_groups' => true,
            'group' => '',
            'server_id'=>'',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $aFilterParams['from_login'] = $oRequest->from_login;
        $aFilterParams['to_login'] = $oRequest->to_login;
        $aFilterParams['exactLogin'] = $oRequest->exactLogin;
        $aFilterParams['login'] = $oRequest->login;
        $aFilterParams['name'] = $oRequest->name;
        $aFilterParams['all_groups'] = true;
        $aFilterParams['group'] = $oRequest->group;
        $aFilterParams['server_id'] = $oRequest->server_id;
        $aFilterParams['sort'] = $oRequest->sort;
        $aFilterParams['order'] = $oRequest->order;
        $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);



        return view('accounts::client.mt4Accounts')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('serverTypes',$serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getMt4UserDetails(Request $oRequest)
    {

        $oGroups = $this->oMt4User->getAllGroups();
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $aGroups = [];
        $oResults = null;
        $oOpenResults = null;
        $oCloseResults = null;
        $aFilterParams = [
            'login' => '',
            'from_date' => '',
            'to_date' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];
        $aSummery = [
            'deposit' => 0,
            'credit_facility' => 0,
            'closed_trade' => 0,
            'floating' => 0,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['server_id'] = $oRequest->server_id;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            $oResults = $this->oMt4User->getUserInfo($aFilterParams['login'],$aFilterParams['server_id']);

            $aSummery = [
                'deposit' => $this->oMt4Trade->getDepositByLogin($aFilterParams),
                'credit_facility' => $this->oMt4Trade->getCreditFacilityByLogin($aFilterParams),
                'closed_trade' => $this->oMt4Trade->getClosedTradeByLogin($aFilterParams),
                'floating' => $this->oMt4Trade->getFloatingByLogin($aFilterParams),
            ];
        }


        return view('accounts::client.accountStatement')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('aSummery', $aSummery)
            ->with('aFilterParams', $aFilterParams)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }

    public function getMt4Leverage(Request $oRequest)
    {

        $Result = Config('accounts.leverage');
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage' => ''];


        return view('accounts::client.addLeverage')
            ->with('Pssword', $Pssword)
            ->with('Result', $Result)
            ->with('changeleverage', $changeleverage)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }

    public function postMt4Leverage(Request $oRequest)
    {

        $Result = Config('accounts.leverage');
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');


        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage' => ''];

        $oApiController = new ApiController();

        if($oRequest['sever_id']==1){
            $oApiController->mt4Host=Config('fxweb.mt4CheckDemoHost');
            $oApiController->mt4Port=Config('fxweb.mt4CheckDemoPort');
        }
        $result = $oApiController->changeMt4Leverage($oRequest['login'], $oRequest['leverage'], $oRequest['oldPassword']);

        /* TODO with success */
        return view('accounts::client.addLeverage')
            ->with('Result', $Result)
            ->with('Pssword', $Pssword)
            ->with('login', $oRequest->login)
            ->with('changeleverage', $changeleverage)
            ->withErrors($result)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }

    public function getMt4ChangePassword(Request $oRequest)
    {
        $Password = Config('accounts.apiReqiredConfirmMt4Password');

        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => ''];

        return view('accounts::client.changePassword')
            ->with('Password', $Password)
            ->with('changePassword', $changePassword)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }

    public function postMt4ChangePassword(Request $oRequest)
    {
        $Password = Config('accounts.apiReqiredConfirmMt4Password');

        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => ''];

        $mT4ChangePassword = new ApiController();

        if($oRequest['sever_id']==1){
            $mT4ChangePassword->mt4Host=Config('fxweb.mt4CheckDemoHost');
            $mT4ChangePassword->mt4Port=Config('fxweb.mt4CheckDemoPort');
        }
        $result = $mT4ChangePassword->changeMt4Password($oRequest['login'], $oRequest['newPassword'], $oRequest['oldPassword']);
        /* TODO with success */
        return view('accounts::client.changePassword')
            ->withErrors($result)
            ->with('Password', $Password)
            ->with('changePassword', $changePassword)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }

    public function getMt4InternalTransfer(Request $oRequest)
    {
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        return view('accounts::client.internalTransfer')
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }

    public function postMt4InternalTransfer(Request $oRequest)
    {


        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');
        $allowTransferToUnsignedMT4 = Config('accounts.allowTransferToUnsignedMT4');

        $allowed = true;

        if ($allowTransferToUnsignedMT4 == false) {
            $aFilterParams = [
                'from_login' => '',
                'to_login' => '',
                'exactLogin' => true,
                'login' => $oRequest['login2'],
                'name' => '',
                'all_groups' => true,
                'group' => '',
                'sort' => "",
                'order' => '',
                'signed' => 1,
                'account_id' => current_user()->getUser()->id,
            ];
            $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, 'login', 'desc');

            if (!count($oResults)) {
                $allowed = false;
            }
        }

        $internalTransfer = [
            'login' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];
        $result = '';
        if ($allowed) {
            $oApiController = new ApiController();
            if($oRequest['sever_id']==1){
                $oApiController->mt4Host=Config('fxweb.mt4CheckDemoHost');
                $oApiController->mt4Port=Config('fxweb.mt4CheckDemoPort');
            }
            $result = $oApiController->internalTransfer($oRequest['login'], $oRequest['login2'], $oRequest['oldPassword'], $oRequest['amount']);
        } else {
            $result = 'The Admin does not allowed to transfer to unsigned Mt4 users';
        }
        /* TODO with success */
        return view('accounts::client.internalTransfer')
            ->withErrors($result)
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage',config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword',config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer',config('accounts.showMt4Transfer'));
    }


    public function getAddMt4User(Request $oRequest)
    {

        $userInfo = [
            'login' => $oRequest['login'],
            'password' => $oRequest['password']
        ];

        $denyLiveAccount=(current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount'])  )? true:false;

        if($denyLiveAccount){
            return Redirect::route('client.mt4DemoAccount');
        }
        return view('accounts::client.addMt4User')->with('userInfo', $userInfo)
            ->with('denyLiveAccount',$denyLiveAccount);
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
            return Redirect::route('clients.accounts.Mt4UsersList');
        }


        $denyLiveAccount=(current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount']) )? true:false;


        return view('accounts::client.addMt4User')
            ->with('userInfo', ['login' => $oRequest['login'], 'password' => $oRequest['password']])
            ->withErrors('Error, Please try again later!')->with('denyLiveAccount',$denyLiveAccount);
    }


    public function getMt4DemoAccount(Request $oRequest)
    {
        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);


        $array_group = Config('fxweb.GroupDemo');
        $array_deposit = Config('fxweb.DepositDemo');
        $array_leverage = Config('accounts.leverageDemo');


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

        $denyLiveAccount=(current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount']) )? true:false;


        return view('accounts::client.mt4DemoAccount')
            ->with('mt4_user_details', $mt4_user_details)
            ->with('array_group', $array_group)
            ->with('array_leverage', $array_leverage)
            ->with('array_deposit', $array_deposit)->with('denyLiveAccount',$denyLiveAccount);
    }

    public function postMt4DemoAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry($oResult['country']);

        $array_group = Config('fxweb.GroupDemo');
        $array_deposit = Config('fxweb.DepositDemo');
        $array_leverage = Config('accounts.leverageDemo');

        $country_name = preg_replace("/ \((.*)\)/", "", $country_array);

        $mt4_user_details = [
            'edit_id' => $oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'array_group' => $oRequest['array_group'],
            'email' => $oResult['email'],
            'password' => $oRequest->password,
            'investor' => $oRequest->investor,
            'array_deposit' => $oRequest['array_deposit'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $country_name,
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'array_leverage' => $oRequest['array_leverage'],
        ];


        $oApiController = new ApiController();

        $oApiController->mt4Host=Config('fxweb.mt4CheckDemoHost');
        $oApiController->mt4Port=Config('fxweb.mt4CheckDemoPort');

        $result = $oApiController->mt4UserFullDetails($mt4_user_details);


        return Redirect::route('client.accounts.mt4DemoAccount')->withErrors($result) ;

    }

    public function getMt4LiveAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);


        $array_group = Config('fxweb.GroupLive');
        $array_deposit = Config('fxweb.DepositLive');
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


        $denyLiveAccount=(current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount']) )? true:false;


        return view('accounts::client.mt4LiveAccount')
            ->with('mt4_user_details', $mt4_user_details)
            ->with('array_group', $array_group)
            ->with('array_leverage', $array_leverage)
            ->with('array_deposit', $array_deposit)->with('denyLiveAccount',$denyLiveAccount);
    }

    public function postMt4LiveAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry($oResult['country']);

        $array_group = Config('fxweb.GroupDemo');
        $array_deposit = Config('fxweb.DepositDemo');
        $array_leverage = Config('accounts.leverageDemo');

        $country_name = preg_replace("/ \((.*)\)/", "", $country_array);

        $mt4_user_details = [
            'edit_id' => $oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'array_group' => $oRequest['array_group'],
            'email' => $oResult['email'],
            'password' => $oRequest->password,
            'investor' => $oRequest->investor,
            'array_deposit' => $oRequest['array_deposit'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $country_name,
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'array_leverage' => $oRequest['array_leverage'],
        ];


        $oApiController = new ApiController();
        $result = $oApiController->mt4UserFullDetails($mt4_user_details);

        return Redirect::route('client.accounts.mt4LiveAccount')->withErrors($result);

    }

}
