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
use Fxweb\Models\Mt4User as modelMt4User;
use Modules\Request\Entities\RequestChangeLeverage;
use Modules\Request\Repositories\RequestContract as RequestLog;

class ClientAccountsController extends Controller
{

    /**
     * @var Mt4Group
     */
    protected $oUsers;
    protected $oMt4Trade;
    protected $oMt4User;
    protected $RequestLog;

    public function __construct(
        Users $oUsers, Mt4User $oMt4User, Mt4Trade $oMt4Trade,RequestLog $RequestLog
    )
    {
        $this->oUsers = $oUsers;
        $this->RequestLog = $RequestLog;
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
            'server_id' => '',
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
        $aFilterParams['server_id'] = 0;
        $aFilterParams['sort'] = $oRequest->sort;
        $aFilterParams['order'] = $oRequest->order;

        $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);

        $aFilterParams['server_id'] =1;
        $oResults2 = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);

        $denyLiveAccount = (current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount'])) ? true:true;

        return view('accounts::client.mt4Accounts')
            ->with('aGroups', $aGroups)
            ->with('denyLiveAccount', $denyLiveAccount)
            ->with('oResults', $oResults)
            ->with('oResults2', $oResults2)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getMt4UserDetails(Request $oRequest)
    {
        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }

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
            $oResults = $this->oMt4User->getUserInfo($aFilterParams['login'], $aFilterParams['server_id']);

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
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'));
    }
    private function setDefaultLoginInfo(&$oRequest){

        list($serversList,$firstServer)=$this->oMt4User->serversList($oRequest->server_id);
        if(!isset($oRequest->server_id)){
            $oRequest->merge(['server_id'=>$firstServer]);
        }

        list($mt4UsersArray,$firstLogin)=$this->oMt4User->getMt4UsersArray($oRequest->server_id);
        if(!isset($oRequest->login)  ){
            $oRequest->merge(['login'=>$firstLogin]);
        }else if(( isset($oRequest->current_server_id) && $oRequest->server_id !=$oRequest->current_server_id  ) ){
            $oRequest->login=$firstLogin;
        }
        return [$serversList,$mt4UsersArray];
    }

    public function getMt4Leverage(Request $oRequest)
    {

        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }
        $Result = Config('fxweb.leverage');
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage' => ''];


        $oCurrentLeverage = modelMt4User::select('LEVERAGE')->where(['login' => $oRequest->login, 'server_id' => $oRequest->server_id])->first()->LEVERAGE;


        $currentLeverage = [0, 0];
        if (array_key_exists($oCurrentLeverage, $Result)) {
            $currentLeverage = [$currentLeverage, $Result[$oCurrentLeverage]];
            unset($Result[$oCurrentLeverage]);
        } else {
            $currentLeverage = [$oCurrentLeverage, $oCurrentLeverage];
        }

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = config('request.requestStatus');

        $oResults = null;
        $status = (isset($oRequest->status))? $oRequest->status : -1;
            $aFilterParams['status']=$status;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['server_id'] = $oRequest->server_id;

            $oResults = $this->RequestLog->getChangeLeverageRequestByFilters($aFilterParams, false, $sOrder, $sSort);

        return view('accounts::client.addLeverage')
            ->with('Pssword', $Pssword)
            ->with('Result', $Result)
            ->with('oResults', $oResults)
            ->with('aFilterParams',$aFilterParams)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('currentLeverage', $currentLeverage)
            ->with('changeleverage', $changeleverage)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'));
    }

    public function postMt4Leverage(Request $oRequest)
    {

        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }
        $Result = Config('fxweb.leverage');
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');


        $oCurrentLeverage = modelMt4User::select('LEVERAGE')->where(['login' => $oRequest->login, 'server_id' => $oRequest->server_id])->first()->LEVERAGE;


        $currentLeverage = [0, 0];
        if (array_key_exists($oCurrentLeverage, $Result)) {
            $currentLeverage = [$currentLeverage, $Result[$oCurrentLeverage]];
            unset($Result[$oCurrentLeverage]);
        } else {
            $currentLeverage = [$oCurrentLeverage, $oCurrentLeverage];
        }

        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage' => ''];

        $oApiController = new ApiController();


        if ($oRequest['server_id'] == 1) {

            $oApiController->mt4Host = Config('fxweb.mt4CheckDemoHost');
            $oApiController->mt4Port = Config('fxweb.mt4CheckDemoPort');
            $oApiController->server_id = 1;
        }
        $result = $oApiController->changeMt4Leverage($oRequest['login'], $oRequest['leverage'], $oRequest['oldPassword']);
        return Redirect::back()->withErrors($result);
    }

    public function getMt4ChangePassword(Request $oRequest)
    {
        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }

        $Password = Config('accounts.apiReqiredConfirmMt4Password');
        $loginPasswordType = Config('accounts.loginPasswordType');

        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => '',
            'passwordType_array' => $loginPasswordType,
            'passwordType' => ''
        ];

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = config('request.requestStatus');

        $oResults = null;
        $status = (isset($oRequest->status))? $oRequest->status : -1;
        $aFilterParams['status']=$status;
        $aFilterParams['login'] = $oRequest->login;
        $aFilterParams['server_id'] = $oRequest->server_id;

        $oResults = $this->RequestLog->getChangePasswordRequestByFilters($aFilterParams, false, $sOrder, $sSort);

        return view('accounts::client.changePassword')
            ->with('Password', $Password)
            ->with('changePassword', $changePassword)
            ->with('login', $oRequest->login)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams',$aFilterParams)
            ->with('oResults', $oResults)
            ->with('loginPasswordType', $loginPasswordType)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'));
    }

    public function postMt4ChangePassword(Request $oRequest)
    {
        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }
        $Password = Config('accounts.apiReqiredConfirmMt4Password');
        $loginPasswordType = Config('accounts.loginPasswordType');

        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => '',
            'passwordType_array' => $loginPasswordType,
            'passwordType' => ''];

        $mT4ChangePassword = new ApiController();

        if ($oRequest['server_id'] == 1) {
            $mT4ChangePassword->mt4Host = Config('fxweb.mt4CheckDemoHost');
            $mT4ChangePassword->mt4Port = Config('fxweb.mt4CheckDemoPort');
            $mT4ChangePassword->server_id = 1;
        }

        $result = $mT4ChangePassword->changeMt4Password($oRequest['login'], $oRequest['newPassword'], $oRequest['passwordType'], $oRequest['oldPassword']);
        /* TODO with success */
        return view('accounts::client.changePassword')
            ->withErrors($result)
            ->with('Password', $Password)
            ->with('changePassword', $changePassword)
            ->with('loginPasswordType', $loginPasswordType)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'));
    }

    public function getMt4InternalTransfer(Request $oRequest)
    {

        list($serversList,$mt4UsersArray)=$this->setDefaultLoginInfo($oRequest);
        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }

        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        $oCurrentInternalTransfer = modelMt4User::where(['login' => $oRequest->login, 'server_id' => $oRequest->server_id])->first();

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = config('request.requestStatus');

        $oResults = null;
        $status = (isset($oRequest->status))? $oRequest->status : -1;
        $aFilterParams['status']=$status;
        $aFilterParams['login'] = $oRequest->login;
        $aFilterParams['server_id'] = $oRequest->server_id;

        $oResults = $this->RequestLog->getInternalTransferRequestByFilters($aFilterParams, false, $sOrder, $sSort);

        return view('accounts::client.internalTransfer')
            ->with('Pssword', $Pssword)
            ->with('oCurrentInternalTransfer', $oCurrentInternalTransfer)
            ->with('internalTransfer', $internalTransfer)
            ->with('login', $oRequest->login)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams',$aFilterParams)
            ->with('oResults', $oResults)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'))
            ->with(['serversList'=>$serversList,'mt4UsersArray'=>$mt4UsersArray]);
    }

    public function postMt4InternalTransfer(Request $oRequest)
    {
        list($serversList,$mt4UsersArray)=$this->setDefaultLoginInfo($oRequest);

        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }
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
            if ($oRequest['server_id'] == 1) {
                $oApiController->mt4Host = Config('fxweb.mt4CheckDemoHost');
                $oApiController->mt4Port = Config('fxweb.mt4CheckDemoPort');
                $oApiController->server_id = 1;
            }


            $result = $oApiController->internalTransfer($oRequest['login'], $oRequest['login2'], $oRequest['oldPassword'], $oRequest['amount']);
        } else {
            $result = 'The Admin does not allowed to transfer to unsigned Mt4 users';
        }

        $oCurrentInternalTransfer = modelMt4User::where(['login' => $oRequest->login, 'server_id' => $oRequest->server_id])->first();
        /* TODO with success */

        return view('accounts::client.internalTransfer')
            ->withErrors($result)
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oCurrentInternalTransfer', $oCurrentInternalTransfer)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'))
            ->with(['serversList'=>$serversList,'mt4UsersArray'=>$mt4UsersArray]);
    }


    public function getAddMt4User(Request $oRequest)
    {

        $userInfo = [
            'login' => $oRequest['login'],
            'password' => $oRequest['password']
        ];

        $denyLiveAccount = (current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount'])) ? true : false;

        if ($denyLiveAccount) {
            return Redirect::route('client.accounts.mt4DemoAccount');
        }
        return view('accounts::client.addMt4User')->with('userInfo', $userInfo)
            ->with('denyLiveAccount', $denyLiveAccount);
    }

    public function postAddMt4User(Request $oRequest)
    {


        $denyLiveAccount = (current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount'])) ? true : false;


        $oApiController = new ApiController();


        $result = $oApiController->AssignAccount($oRequest['login'], $oRequest['password'], 0);

        if ($result === true) {
            $asign_result = $this->oUsers->asignMt4UsersToAccount(current_user()->getUser()->id, [$oRequest['login']], 0);
            \Session::flash('flash_success','The User has been assigned successfully');

            return Redirect::route('clients.accounts.Mt4UsersList');

        } else {
            return view('accounts::client.addMt4User')
                ->with('userInfo', ['login' => $oRequest['login'], 'password' => $oRequest['password']])
                ->withErrors($result)->with('denyLiveAccount', $denyLiveAccount);
        }
    }


    public function getMt4DemoAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);


        $array_group = Config('fxweb.GroupDemo');
        $array_deposit = Config('fxweb.DepositDemo');
        $array_leverage = Config('fxweb.leverageDemo');


        $mt4_user_details = [
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

        $denyLiveAccount = (current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount'])) ? true : false;


        return view('accounts::client.mt4DemoAccount')
            ->with('mt4_user_details', $mt4_user_details)
            ->with('array_group', $array_group)
            ->with('array_leverage', $array_leverage)
            ->with('array_deposit', $array_deposit)->with('denyLiveAccount', $denyLiveAccount);
    }

    public function postMt4DemoAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry($oResult['country']);

        $array_group = Config('fxweb.GroupDemo');
        $array_deposit = Config('fxweb.DepositDemo');
        $array_leverage = Config('fxweb.leverageDemo');

        $country_name = preg_replace("/ \((.*)\)/", "", $country_array);

        $mt4_user_details = [
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

        $oApiController->mt4Host = Config('fxweb.mt4CheckDemoHost');
        $oApiController->mt4Port = Config('fxweb.mt4CheckDemoPort');
        $oApiController->server_id = 1;

        $result = $oApiController->mt4UserFullDetails(current_user()->getUser()->id, $mt4_user_details);

        if ($result * 1 > 0) {
            $result = $this->oUsers->asignMt4UsersToAccount(current_user()->getUser()->id, [$result], 1);

        if($result == true){
           \Session::flash('flash_success','The User Assigned Successfully');

       }else{
           $result =  'error,the Mt4 user does not assigned to this account';
       }

        }
        return Redirect::route('client.accounts.mt4DemoAccount')->withErrors($result);

    }


    public function getMt4LiveAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);


        $array_group = Config('fxweb.GroupLive');
        $array_deposit = Config('fxweb.DepositLive');
        $array_leverage = Config('fxweb.leverage');


        $mt4_user_details = [
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


        $denyLiveAccount = (current_user()->getUser()->hasAnyAccess(['user.denyLiveAccount'])) ? true : false;


        return view('accounts::client.mt4LiveAccount')
            ->with('mt4_user_details', $mt4_user_details)
            ->with('array_group', $array_group)
            ->with('array_leverage', $array_leverage)
            ->with('array_deposit', $array_deposit)->with('denyLiveAccount', $denyLiveAccount);
    }

    public function postMt4LiveAccount(Request $oRequest)
    {

        $user = current_user()->getUser();

        $oResult = $this->oUsers->getUserDetails($user->id);

        $country_array = $this->oUsers->getCountry($oResult['country']);

        $array_group = Config('fxweb.GroupDemo');
        $array_deposit = Config('fxweb.DepositDemo');
        $array_leverage = Config('fxweb.leverageDemo');

        $country_name = preg_replace("/ \((.*)\)/", "", $country_array);

        $mt4_user_details = [
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
        $result = $oApiController->mt4UserFullDetails(current_user()->getUser()->id, $mt4_user_details);

        if ($result * 1 > 0) {
            $result = $this->oUsers->asignMt4UsersToAccount(current_user()->getUser()->id, [$result], 1);

            if ($result == true) {
                \Session::flash('flash_success', 'The User Assigned Successfully');

            } else {
                $result = 'error,the Mt4 user does not assigned to this account';
            }
        }
        return Redirect::route('client.accounts.mt4LiveAccount')->withErrors($result);

    }


    public function getWithdrawal(Request $oRequest)
    {

        list($serversList,$mt4UsersArray)=$this->setDefaultLoginInfo($oRequest);

        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);


        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        $oCurrentWithdrawal = modelMt4User::where(['login' => $oRequest->login, 'server_id' => $oRequest->server_id])->first();

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = config('request.requestStatus');

        $oResultsTable = null;

        $status = (isset($oRequest->status))? $oRequest->status : -1;

        $aFilterParams['status']=$status;

        $aFilterParams['id'] =  (isset($oRequest->id))? $oRequest->id:'';

        $oResultsTable = $this->RequestLog->getWithdrawalRequestByFilters($aFilterParams, false, $sOrder, $sSort);

        return view('accounts::client.withdrawal')
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oCurrentWithdrawal', $oCurrentWithdrawal)
            ->with('oResults', $oResults)
            ->with('oResultsTable', $oResultsTable)
            ->with('aFilterParams',$aFilterParams)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'))
            ->with(['serversList'=>$serversList,'mt4UsersArray'=>$mt4UsersArray]);
    }

    public function postWithdrawal(Request $oRequest)
    {

        list($serversList,$mt4UsersArray)=$this->setDefaultLoginInfo($oRequest);

        if(!hasMtUser($oRequest->login,$oRequest->server_id)){
            return Redirect::route('clients.accounts.Mt4UsersList');
        }

        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);

        $internalTransfer = [
            'login' => '',
            'oldPassword' => '',
            'amount' => ''];

        $oApiController = new ApiController();
        if ($oRequest['server_id'] == 1) {
            $oApiController->mt4Host = Config('fxweb.mt4CheckDemoHost');
            $oApiController->mt4Port = Config('fxweb.mt4CheckDemoPort');
            $oApiController->server_id = 1;
        }

        $result = $oApiController->withdrawal($oRequest['login'], $oRequest['amount'], $oRequest['oldPassword']);
        $oCurrentWithdrawal = modelMt4User::where(['login' => $oRequest->login, 'server_id' => $oRequest->server_id])->first();

        /* TODO with success */
        return view('accounts::client.withdrawal')
            ->withErrors($result)
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oCurrentWithdrawal', $oCurrentWithdrawal)
            ->with('oResults', $oResults)
            ->with('server_id', $oRequest->server_id)
            ->with('login', $oRequest->login)
            ->with('showMt4Leverage', config('accounts.showMt4Leverage'))
            ->with('showMt4ChangePassword', config('accounts.showMt4ChangePassword'))
            ->with('showWithdrawal', config('accounts.showWithdrawal'))
            ->with('showMt4Transfer', config('accounts.showMt4Transfer'))
            ->with(['serversList'=>$serversList,'mt4UsersArray'=>$mt4UsersArray]);
    }


    public function getUnssignUserFromMt4User(Request $oRequest){

        $this->oUsers->unsignMt4UsersToAccount(current_user()->getUser()->id, [$oRequest->login.','. $oRequest->server_id],3);

       // return $this->getMt4UsersList($oRequest);
        return Redirect::route('clients.accounts.Mt4UsersList');

//        $this->oUsers->unsignMt4UsersToAccount(current_user()->getUser()->id, [$oRequest->login.','. $oRequest->server_id],3);

    //    return $this->getMt4UsersList($oRequest);
    }

}
