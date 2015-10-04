<?php namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Accounts\Http\Requests\AccountsRequest;

use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Modules\Accounts\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
class AccountsController extends Controller {
	
    /**
     * @var Mt4Group
     */
    protected $oUsers;
    
    
    public function __construct(
    Users $oUsers
    ) {
        $this->oUsers = $oUsers;
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

}