<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as User;
use Fxweb\Http\Requests\AdminsListRequest;
use Fxweb\Http\Requests\AddUserRequest;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Support\Facades\Config;

use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
class SettingsController extends Controller {

    /**
     * @var Mt4Group
     */
    protected $oUser;
    protected $oMt4User;
    public function __construct(User $oUser,Mt4User $oMt4User) {
        $this->oMt4User=$oMt4User;
        $this->oUser = $oUser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getAdminsList(AdminsListRequest $oRequest) {

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
            
        $role = explode(',', Config::get('fxweb.admin_roles'));
            $oResults = $this->oUser->getUsersByFilter($aFilterParams, false, $sOrder, $sSort,$role[0]);
        }



        return view('admin/user/adminsList')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getEditUser(Request $oRequest) {

        if ($oRequest->has('delete_id')) {
            $result = $this->oUser->deleteUser($oRequest->delete_id);
            return Redirect::route('admins-list')->withErrors($result);
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

        return view('admin/user/addUser')->with('userInfo', $userInfo);
    }

    public function postEditUser(AddUserRequest $oRequest) {


        $result = false;
        $resultMessage = [];
        if ($oRequest->edit_id > 0) {


            $result = $this->oUser->updateUser($oRequest);
        } else {
 $admin_role = explode(',', Config::get('fxweb.admin_roles'));
        
            $result = $this->oUser->addUser($oRequest,$admin_role[0]);
        }



        if ($result === true) {
            return Redirect::route('admins-list');
        } else {
            return view('admin/user/addUser')
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
 public function getMt4UsersList(Request $oRequest){
          if($oRequest->has('delete_id')){
          $this->oMt4User->delete($oRequest->delete_id);
     }
     
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
            'signed' => 0,
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
            $aFilterParams['signed'] = 0;
            $aFilterParams['account_id'] = $account_id;
            $aFilterParams['order'] = $oRequest->order;
        }

        $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, $sOrder, $sSort);

       

        return view('admin/user/mt4UsersList')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('account_id', $account_id)
                        ->with('aFilterParams', $aFilterParams);
   
 }
 
 public function getMt4UsersDetails(Request $oRequest){

        $oResults = null;
        $aFilterParams = [
            'exactLogin' => true,
            'login' => $oRequest->edit_id,
            'all_groups'=>true
        ];

        $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, 'login', 'desc');
      
dd($oResults);
  
 }
}
