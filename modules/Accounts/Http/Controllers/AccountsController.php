<?php namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Accounts\Http\Requests\AccountsRequest;

use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;

use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;

use Modules\Accounts\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
class AccountsController extends Controller {
	
    /**
     * @var Mt4Group
     */
    protected $oUsers;
    
    
    public function __construct(
    Users $oUsers, Mt4User $oMt4User
    ) {
        $this->oUsers = $oUsers;
        
        $this->oMt4User = $oMt4User;
    }
	public function index()
	{
		return view('accounts::index');
	}
	
        

    public function getAccountsList(AccountsRequest $oRequest) {
     
        
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
        ];




        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            
        $role = explode(',', Config::get('fxweb.client_default_role'));
        
            $oResults = $this->oUsers->getUsersByFilter($aFilterParams, false, $sOrder, $sSort,$role);
        }



        return view('accounts::accountsList')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    
    
    public function getEditAccount(Request $oRequest) {

        if ($oRequest->has('delete_id')) {
            $result = $this->oUsers->deleteUser($oRequest->delete_id);
            return Redirect::route('accounts.accountsList')->withErrors($result);
        }


        $userInfo = [
            'edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => ''];
        if ($oRequest->has('edit_id')) {
            $user = Sentinel::findById($oRequest->edit_id);
            $userInfo = [
                'edit_id' => $oRequest->edit_id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => ''];
        }

        return view('accounts::addAccount')->with('userInfo', $userInfo);
    }

    public function postEditAccount(AddUserRequest $oRequest) {


        $result = false;
        $resultMessage = [];
        if ($oRequest->edit_id > 0) {
            $result = $this->oUsers->updateUser($oRequest);
        } else {

        $role = explode(',', Config::get('fxweb.client_default_role'));
            $result = $this->oUsers->addUser($oRequest,$role);
        }



        if ($result === true) {
            return Redirect::route('accounts.accountsList');
        } else {
            return view('accounts::addAccount')
                            ->withErrors($resultMessage)
                            ->withErrors($result)
                            ->with('userInfo', [
                                'edit_id' => $oRequest->edit_id,
                                'first_name' => $oRequest->first_name,
                                'last_name' => $oRequest->last_name,
                                'email' => $oRequest->email,
                                'password' => $oRequest->password]);
        }
    }
    public function getAsignMt4Users(Request $oRequest ){
$account_id=$oRequest->account_id;
if(!$account_id >0){$account_id=Session::get('account_id');}
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

        return view('accounts::asignMt4Users')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                ->with('account_id',$account_id)
                        ->with('aFilterParams', $aFilterParams);
    }
    
     public function postAsignMt4Users(Request $oRequest ){
         if($oRequest->has('asign_mt4_users_submit')){
             
             $users_checkbox=$oRequest->users_checkbox;
             $account_id=$oRequest->account_id;
         $this->oUsers->asignMt4UsersToAccount($account_id,$users_checkbox);
     
           return Redirect::route('accounts.asignMt4Users')->with('account_id',$account_id);
         }
     }
    

}