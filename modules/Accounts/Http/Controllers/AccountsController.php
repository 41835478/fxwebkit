<?php

namespace Modules\Accounts\Http\Controllers;

use Fxweb\Models\User;
use Pingpong\Modules\Routing\Controller;
use Modules\Accounts\Http\Requests\AccountsRequest;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Modules\Accounts\Http\Requests\AddUserRequest;
use Modules\Accounts\Http\Requests\EditUserRequest;
use Modules\Accounts\Http\Requests\AsignMt4User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Carbon\Carbon;
use Modules\Accounts\Http\Controllers\ApiController;
use Fxweb\Http\Controllers\Admin\EditConfigController as EditConfig;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class AccountsController extends Controller
{

    /**
     * @var Mt4Group
     */
    protected $oUsers;
    protected $oMt4Trade;
    protected $oMt4User;

    public function __construct(Users $oUsers, Mt4User $oMt4User, Mt4Trade $oMt4Trade)
    {
        $this->oUsers = $oUsers;
        $this->oMt4Trade = $oMt4Trade;
        $this->oMt4User = $oMt4User;
    }

    public function index()
    {
        return view('accounts::index');
    }

    public function getAccountsList(AccountsRequest $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
            'active'=>0
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['active'] = $oRequest->active;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

        }

        if ($oRequest->has('search')||$oRequest->has('active')) {

            $aFilterParams['active'] = $oRequest->active;
            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->oUsers->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        }



        return view('accounts::accountsList')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams)
            ->with('aActive',[
                    trans('accounts::accounts.all'),
                    trans('accounts::accounts.active'),
                    trans('accounts::accounts.notActive')
                ]
            );
    }


    public function getActivateUser(Request $oRequest){
        $user=Sentinel::findById($oRequest->account_id);
        $activation = Activation::exists($user);


        if ($activation)
        {
           Activation::where('user_id',$oRequest->account_id)->update(['completed'=>1]);


        }
        else
        {
            if(Activation::create($user))
            {
                Activation::where('user_id',$oRequest->account_id)->update(['completed'=>1]);
            }else{

            return Redirect::route('accounts.accountsList')
                ->withErrors(trans('accounts::accounts.error_please'));
            }
        }

        $assignMt4UsresByEmail=$this->oMt4User->getMt4UsersByEmail($user);

        return Redirect::route('accounts.accountsList');
    }
    public function getDeleteAccount(Request $oRequest)
    {
        $result = $this->oUsers->deleteUser($oRequest->delete_id);

        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return Redirect::route('accounts.accountsList')->withErrors($result);
    }

    public function getAddAccount(Request $oRequest)
    {

        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);

        $country_array = $this->oUsers->getCountry(null);
        $userInfo = ['edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'password' => '',
            'email' => '',
            'nickname' => '',
            'address' => '',
            'birthday' => $dt->format('Y/m/d'),
            'phone' => '',
            'country' => '',
            'country_array' => $country_array,
            'city' => '',
            'zip_code' => '',
            'gender' => 0
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);


            $userInfo = [
                'edit_id' => $oRequest->edit_id,
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
                'gender' => $oResult['gender']
            ];
        }
        return view('accounts::addAccount')->with('userInfo', $userInfo);
    }

    public function getEditAccount(Request $oRequest)
    {
        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);

        $country_array = $this->oUsers->getCountry(null);
        $userInfo = ['edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'password' => '',
            'email' => '',
            'nickname' => '',
            'address' => '',
            'birthday' => $dt->format('Y/m/d'),
            'phone' => '',
            'country' => '',
            'country_array' => $country_array,
            'city' => '',
            'zip_code' => '',
            'gender' => 0
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);

            $userInfo = [
                'edit_id' => $oRequest->edit_id,
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
                'gender' => $oResult['gender']
            ];
        }
        return view('accounts::editAccount')->with('userInfo', $userInfo);
    }

    public function postAddAccount(AddUserRequest $oRequest)
    {
        $result = 0;

        $admin_role = explode(',', Config::get('fxweb.client_default_role'));

        $result = $this->oUsers->addUser($oRequest, $admin_role[0]);

        if ($result > 0) {
            $oRequest->edit_id = $result;

            $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);

            $user_details = [
                'id' => $oRequest->edit_id,
                'first_name' => $oResult['first_name'],
                'last_name' => $oResult['last_name'],
                'password' => '',
                'email' => $oResult['email'],
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'city' => $oResult['city'],
                'zip_code' => $oResult['zip_code'],
                'gender' => $oResult['gender'],
                'last_login'=>$oResult['last_login'],
                'created_at'=>$oResult['created_at']
            ];
            return view('accounts::detailsAccount')->with('user_details', $user_details);
        } else {

            return view('accounts::addAccount')->withErrors($result);
        }
    }


    public function postEditAccount(EditUserRequest $oRequest)
    {

        $result = 0;

        $result = $this->oUsers->updateUser($oRequest);

        if ($result > 0) {

            $oRequest->edit_id = $result;

            $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);

            $user_details = [

                'id' => $oRequest->edit_id,
                'first_name' => $oResult['first_name'],
                'last_name' => $oResult['last_name'],
                'password' => '',
                'email' => $oResult['email'],
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'city' => $oResult['city'],
                'zip_code' => $oResult['zip_code'],
                'gender' => $oResult['gender'],
                'last_login'=>$oResult['last_login'],
                'created_at'=>$oResult['created_at']
            ];

            return view('accounts::detailsAccount')->with('user_details', $user_details);
        } else {

            return view('accounts::addAccount')->withErrors($result);
        }
    }

    public function getAsignMt4Users(Request $oRequest)
    {
        $account_id = $oRequest->account_id;

        $oGroups = $this->oMt4User->getAllGroups();
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
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
            'sort' => $sSort,
            'order' => $sOrder,
            'signed' => 1,
            'account_id' => $account_id,
        ];

        foreach ($oGroups as $oGroup) {
            $aGroups[$oGroup->group] = $oGroup->group;
        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['signed'] = $oRequest->signed;
            $aFilterParams['account_id'] = $account_id;
            $aFilterParams['order'] = $oRequest->order;
             }
        $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, $sOrder, $sSort);


        if ($oRequest->has('export')) {
            $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, true, $sOrder, $sSort);

            $sOutput = $oRequest->export;
            $aData = [];
            $aHeaders = [
                trans('reports::reports.Login'),
                trans('reports::reports.Name'),
                trans('reports::reports.Group'),
                trans('reports::reports.Equity'),
                trans('reports::reports.Balance'),
                trans('reports::reports.Comments')
            ];

            foreach ($oResults as $oResult) {
                $aData[] = [
                    $oResult->LOGIN,
                    $oResult->NAME,
                    $oResult->GROUP,
                    $oResult->EQUITY,
                    $oResult->BALANCE,
                    $oResult->COMMENTS,
                ];
            }
            $oExport = new Export($aHeaders, $aData);
            return $oExport->export($sOutput);
        }


        return view('accounts::fastAsignMt4Users')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('account_id', $account_id)
            ->with('aFilterParams', $aFilterParams);
    }

    public function postAsignMt4Users(Request $oRequest)
    {

        if ($oRequest->has('asign_mt4_users_submit') || $oRequest->has('asign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('asign_mt4_users_submit_id')) ? [$oRequest->get('asign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $account_id = $oRequest->account_id;
            if($oRequest->has('server_id')){
                $this->oUsers->asignMt4UsersToAccount($account_id, $users_checkbox,0);
            }else{
            $this->oUsers->asignMt4UsersToAccount($account_id, $users_checkbox,3);
            }
            return $this->getAsignMt4Users($oRequest);
            return Redirect::route('accounts.asignMt4Users')->with('account_id', $account_id);
        }

        if ($oRequest->has('un_sign_mt4_users_submit') || $oRequest->has('un_sign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('un_sign_mt4_users_submit_id')) ? [$oRequest->get('un_sign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $account_id = $oRequest->account_id;
            $this->oUsers->unsignMt4UsersToAccount($account_id, $users_checkbox,3);

            return $this->getAsignMt4Users($oRequest);
            return Redirect::route('accounts.asignMt4Users')->with('account_id', $account_id);
        }
    }

    public function getDetailsAccount(Request $oRequest)
    {
        $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);

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
            'last_login'=>$oResult['last_login'],
            'created_at'=>$oResult['created_at']
        ];

        return view('accounts::detailsAccount')->with('user_details', $user_details);
    }

    public function getEditClientInfo(Request $oRequest)
    {
        $userInfo = ['edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'password' => '',
            'email' => '',
            'nickname' => '',
            'address' => '',
            'birthday' => '',
            'phone' => '',
            'country' => '',
            'city' => '',
            'zip_code' => '',
            'gender' => 0
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oUsers->getUserDetails($oRequest->edit_id);

            $userInfo = [

                'edit_id' => $oRequest->edit_id,
                'first_name' => $oResult['first_name'],
                'last_name' => $oResult['last_name'],
                'password' => '',
                'email' => $oResult['email'],
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'city' => $oResult['city'],
                'zip_code' => $oResult['zip_code'],
                'gender' => $oResult['gender'],
            ];
        }

        return view('accounts::addAccount')->with('userInfo', $userInfo);
    }

    public function getMt4UsersList(Request $oRequest)
    {
        $oGroups = $this->oMt4User->getAllGroups();
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
            'assigned'=>0,
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        foreach ($oGroups as $oGroup) {

            $aGroups[$oGroup->group] = $oGroup->group;

        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['server_id'] = $oRequest->server_id;
            $aFilterParams['assigned'] = $oRequest->assigned;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);
        }

        if ($oRequest->has('search')||$oRequest->has('server_id')) {
            $aFilterParams['server_id'] = $oRequest->server_id;
            $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);
        }


        return view('accounts::mt4Accounts')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('serverTypes',$serverTypes)
            ->with('aFilterParams', $aFilterParams)
            ->with('aAssigned',[
                trans('accounts::accounts.all'),
                trans('accounts::accounts.assigned'),
                trans('accounts::accounts.notAssigned')
            ]);
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


        return view('accounts::accountStatement')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('aSummery', $aSummery)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getClientAddMt4User(Request $oRequest)
    {
        $userInfo = [
            'login' => $oRequest['login'],
            'password' => $oRequest['password']
        ];

        return view('accounts::clientAddMt4User')->with('userInfo', $userInfo);
    }

    public function postClientAddMt4User(AsignMt4User $oRequest)
    {
        $userInfo = [
            'login' => $oRequest['login'],
            'password' => $oRequest['password']];


        return view('accounts::clientAddMt4User')->with('userInfo', $userInfo);
    }

    public function getBlockAccount(Request $oRequest)
    {
        $user = Sentinel::findById($oRequest->account_id);
        $user->removePermission('user.block')->save();

        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return Redirect::route('accounts.accountsList')->withErrors(trans('accounts::accounts.unblock_user'));
    }


    public function getUnBlockAccount(Request $oRequest)
    {
        $user = Sentinel::findById($oRequest->account_id);
        $user->permissions = [
            'user.block' => true
        ];
        $user->save();


        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return Redirect::route('accounts.accountsList')->withErrors(trans('accounts::accounts.block_user'));
    }


    public function getAllowLiveAccount(Request $oRequest)
    {
        $user = Sentinel::findById($oRequest->account_id);

        $user->removePermission('user.denyLiveAccount')->save();

        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return Redirect::route('accounts.accountsList')->withErrors(trans('accounts::accounts.allowCreatLiveMt4Account'));
    }


    public function getUnAllowedLiveAccount(Request $oRequest)
    {
        $user = Sentinel::findById($oRequest->account_id);

        $user->permissions = [
            'user.denyLiveAccount' => true
        ];
        $user->save();

        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return Redirect::route('accounts.accountsList')->withErrors(trans('accounts::accounts.denyCreatLiveMt4Account'));

    }


    public function getMt4Leverage(Request $oRequest)
    {

        $Result = config('fxweb.leverage');
        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);


        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage_array' => $Result,
            'leverage' => $oResults['LEVERAGE']];


        return view('accounts::addLeverage')
            ->with('Pssword', $Pssword)
            ->with('Result', $Result)
            ->with('changeleverage', $changeleverage)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id);
    }

    public function postMt4Leverage(Request $oRequest)
    {
        $Result = config('fxweb.leverage');
        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');

        $changeleverage = [
            'login' => '',
            'server_id'=>'',
            'oldPassword' => '',
            'leverage_array' => $Result,
            'leverage' => ''];

        $oApiController = new ApiController();
        if($oRequest['server_id']==1){
            $oApiController->mt4Host=config('fxweb.mt4CheckDemoHost');
            $oApiController->mt4Port=config('fxweb.mt4CheckDemoPort');
            $oApiController->server_id=1;
        }
        $result = $oApiController->changeMt4Leverage($oRequest['login'], $oRequest['leverage'], $oRequest['oldPassword']);


        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return view('accounts::addLeverage')
            ->with('Result', $Result)
            ->with('Pssword', $Pssword)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)
            ->with('changeleverage', $changeleverage)
            ->withErrors($result);
    }

    public function getMt4ChangePassword(Request $oRequest)
    {

        $Password = config('accountsConfig.apiReqiredConfirmMt4Password');
        $loginPasswordType = config('accountsConfig.loginPasswordType');


        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => '',
            'passwordType_array'=>$loginPasswordType,
            'passwordType'=>''
        ];

        return view('accounts::changePassword')
            ->with('Password', $Password)
            ->with('loginPasswordType', $loginPasswordType)
            ->with('changePassword', $changePassword)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id);
    }

    public function postMt4ChangePassword(Request $oRequest)
    {

        $Password = config('accountsConfig.apiReqiredConfirmMt4Password');
        $loginPasswordType = config('accountsConfig.loginPasswordType');


        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => '',
            'passwordType_array'=>$loginPasswordType,
            'passwordType'=>''];

        \Session::flash('flash_success',trans('accounts::accounts.success'));

        $mT4ChangePassword = new ApiController();
        if($oRequest['server_id']==1){
            $mT4ChangePassword->mt4Host=config('fxweb.mt4CheckDemoHost');
            $mT4ChangePassword->mt4Port=config('fxweb.mt4CheckDemoPort');
            $mT4ChangePassword->server_id=1;
        }


        $result = $mT4ChangePassword->changeMt4Password($oRequest['login'], $oRequest['newPassword'],$oRequest['passwordType'], $oRequest['oldPassword']);
        /* TODO with success */
        return view('accounts::changePassword')
            ->withErrors($result)
            ->with('Password', $Password)
            ->with('loginPasswordType', $loginPasswordType)
            ->with('changePassword', $changePassword)
            ->with('server_id', $oRequest->server_id)
            ->with('login', $oRequest->login);
    }

    public function getMt4InternalTransfer(Request $oRequest)
    {
        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);


        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        return view('accounts::internalTransfer')
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oResults', $oResults)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)   ;
    }

    public function postMt4InternalTransfer(Request $oRequest)
    {
        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);

        $internalTransfer = [
            'login' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        $oApiController = new ApiController();
        if($oRequest['server_id']==1){
            $oApiController->mt4Host=config('fxweb.mt4CheckDemoHost');
            $oApiController->mt4Port=config('fxweb.mt4CheckDemoPort');
            $oApiController->server_id=1;
        }

        $result = $oApiController->internalTransfer($oRequest['login'], $oRequest['login2'], $oRequest['oldPassword'], $oRequest['amount']);


        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return view('accounts::internalTransfer')
            ->withErrors($result)
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oResults', $oResults)
            ->with('server_id', $oRequest->server_id)
            ->with('login', $oRequest->login);
    }

    public function getWithDrawal(Request $oRequest)
    {
        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);


        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        return view('accounts::withDrawal')
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oResults', $oResults)
            ->with('login', $oRequest->login)
            ->with('server_id', $oRequest->server_id)   ;
    }

    public function postWithDrawal(Request $oRequest)
    {


        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $oResults = $this->oMt4User->getUserInfo($oRequest->login);

        $internalTransfer = [
            'login' => '',
            'oldPassword' => '',
            'amount' => ''];

        $oApiController = new ApiController();
        if($oRequest['server_id']==1){
            $oApiController->mt4Host=config('fxweb.mt4CheckDemoHost');
            $oApiController->mt4Port=config('fxweb.mt4CheckDemoPort');
            $oApiController->server_id=1;
        }

        $result = $oApiController->withDrawal($oRequest['login'], $oRequest['amount'],$oRequest['oldPassword']);


        \Session::flash('flash_success',trans('accounts::accounts.success'));

        return view('accounts::withDrawal')
            ->withErrors($result)
            ->with('Pssword', $Pssword)
            ->with('internalTransfer', $internalTransfer)
            ->with('oResults', $oResults)
            ->with('server_id', $oRequest->server_id)
            ->with('login', $oRequest->login);
    }


    public function getMt4Operation(Request $oRequest)
    {

        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $Result = config('accountsConfig.operation');

        $changeOperation = [
            'login1' => '',
            'oldPassword' => '',
            'operation' => '',
            'amount' => '',
        ];

        return view('accounts::operation')
            ->with('Pssword', $Pssword)
            ->with('Result', $Result)
            ->with('changeOperation', $changeOperation)
            ->with('login', $oRequest->login);
    }

    public function postMt4Operation(Request $oRequest)
    {

        $Pssword = config('accountsConfig.apiReqiredConfirmMt4Password');
        $Result = config('accountsConfig.operation');

        if ($oRequest->operation == '0') {
            $operation = 5;
            $amount = $oRequest->amount;
        } elseif ($oRequest->operation == '1') {
            $operation = 5;
            $amount = $oRequest->amount * -1;
        } elseif ($oRequest->operation == '2') {
            $operation = 3;
            $amount = $oRequest->amount;
        } else {
            $operation = 3;
            $amount = $oRequest->amount * -1;
        }
        $changeOperation = [
            'login' => '',
            'oldPassword' => '',
            'operation' => '',
            'amount' => '',
        ];

        $oApiController = new ApiController();
        $result = $oApiController->operation($oRequest['login'], $amount, $operation);

        \Session::flash('flash_success',trans('accounts::accounts.success'));
        return view('accounts::operation')
            ->withErrors($result)
            ->with('Pssword', $Pssword)
            ->with('Result', $Result)
            ->with('changeOperation', $changeOperation)
            ->with('login', $oRequest->login);
    }

    public function getAccountsSettings(Request $oRequest)
    {

        $accountsSetting = [
            'changeLeverageWarning'=>config('accountsConfig.changeLeverageWarning'),
            'showMt4Leverage' => config('accountsConfig.showMt4Leverage'),
            'showMt4ChangePassword' => config('accountsConfig.showMt4ChangePassword'),
            'showMt4Transfer' => config('accountsConfig.showMt4Transfer'),
            'denyLiveAccount' => config('accountsConfig.denyLiveAccount'),
            'apiReqiredConfirmMt4Password' => config('accountsConfig.apiReqiredConfirmMt4Password'),
            'allowTransferToUnsignedMT4' => config('accountsConfig.allowTransferToUnsignedMT4'),
            'showWithDrawal' => config('accountsConfig.showWithDrawal'),
            'is_client' => config('accountsConfig.is_client'),
            'directOrderToMt4Server' => config('accountsConfig.directOrderToMt4Server'),

            //Leverage     ChangePassword   Transfer    LiveAccount  WithDrawal
            'directLeverageOrderToMt4Server' => config('accountsConfig.directLeverageOrderToMt4Server'),
            'directChangePasswordOrderToMt4Server' => config('accountsConfig.directChangePasswordOrderToMt4Server'),
            'directTransferOrderToMt4Server' => config('accountsConfig.directTransferOrderToMt4Server'),
            'directLiveAccountOrderToMt4Server' => config('accountsConfig.directLiveAccountOrderToMt4Server'),
            'directWithDrawalOrderToMt4Server' => config('accountsConfig.directWithDrawalOrderToMt4Server'),

        ];

        return view('accounts::accountsSetting')->with('accountsSetting', $accountsSetting);

    }

    /**
     * @param Request $oRequest
     * @return $this
     */
    public function postAccountsSettings(Request $oRequest)
    {

        $showMt4Leverage = ($oRequest->showMt4Leverage) ? true : false;
        $showMt4ChangePassword = ($oRequest->showMt4ChangePassword) ? true : false;
        $showMt4Transfer = ($oRequest->showMt4Transfer) ? true : false;
        $denyLiveAccount = ($oRequest->denyLiveAccount) ? true : false;
        $apiReqiredConfirmMt4Password = ($oRequest->apiReqiredConfirmMt4Password) ? true : false;
        $allowTransferToUnsignedMT4 = ($oRequest->allowTransferToUnsignedMT4) ? true : false;
        $directOrderToMt4Server = ($oRequest->directOrderToMt4Server) ? true : false;

        //Leverage     ChangePassword   Transfer    LiveAccount  WithDrawal

        $directLeverageOrderToMt4Server = ($oRequest->directLeverageOrderToMt4Server) ? true : false;
        $directChangePasswordOrderToMt4Server = ($oRequest->directChangePasswordOrderToMt4Server) ? true : false;
        $directTransferOrderToMt4Server = ($oRequest->directTransferOrderToMt4Server) ? true : false;
        $directLiveAccountOrderToMt4Server = ($oRequest->directLiveAccountOrderToMt4Server) ? true : false;
        $directWithDrawalOrderToMt4Server = ($oRequest->directWithDrawalOrderToMt4Server) ? true : false;

        $showWithDrawal = ($oRequest->showWithDrawal) ? true : false;
        $is_client = ($oRequest->is_client) ? 1 : 0;

        $accountsSetting = [

            'showMt4Leverage' => $showMt4Leverage,
            'showMt4ChangePassword' => $showMt4ChangePassword,
            'showMt4Transfer' => $showMt4Transfer,
            'denyLiveAccount' => $denyLiveAccount,
            'apiReqiredConfirmMt4Password'=>$apiReqiredConfirmMt4Password,
            'allowTransferToUnsignedMT4'=>$allowTransferToUnsignedMT4,
            'directOrderToMt4Server'=>$directOrderToMt4Server,


            'directLeverageOrderToMt4Server'=>$directLeverageOrderToMt4Server,
            'directChangePasswordOrderToMt4Server'=>$directChangePasswordOrderToMt4Server,
            'directTransferOrderToMt4Server'=>$directTransferOrderToMt4Server,
            'directLiveAccountOrderToMt4Server'=>$directLiveAccountOrderToMt4Server,
            'directWithDrawalOrderToMt4Server'=>$directWithDrawalOrderToMt4Server,

            'showWithDrawal'=>$showWithDrawal,
            'changeLeverageWarning'=>$oRequest->changeLeverageWarning,
            'apiMasterPassword'=>$oRequest->apiMasterPassword,
            'is_client' => $is_client,

        ];


        $editConfig = new EditConfig();
        $editConfig->editConfigFile('config/accountsConfig.php', $accountsSetting);

        \Session::flash('refresh', 'true');

        return  Redirect::route('accounts.accountsSettings')->with('accountsSetting', $accountsSetting);

    }


    public function getMt4AssignedUsers(Request $oRequest){
        $login=$oRequest->login;
        $server_id=$oRequest->server_id;

        $oResults=$this->oUsers->getMt4AssignedUsers($login,$server_id);
        return view('accounts::mt4AssignedUsers',[
            'oResults'=>$oResults,
            'login'=>$login,
            'server_id'=>$server_id
        ]);
    }

    public function getUnssignUserFromMt4User(Request $oRequest){

        $this->oUsers->unsignMt4UsersToAccount($oRequest->user_id, [$oRequest->login.','. $oRequest->server_id],3);

            return $this->getMt4AssignedUsers($oRequest);
    }
}
