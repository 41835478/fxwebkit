<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as User;
use Fxweb\Http\Requests\AdminsListRequest;
use Fxweb\Http\Requests\Admin\AddUserRequest;
use Fxweb\Http\Requests\Admin\EditUserRequest;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Carbon\Carbon;
use File;
use Fxweb\Http\Controllers\admin\Email;

class SettingsController extends Controller {

    /**
     * @var Mt4Group
     */
    protected $oUser;
    protected $oMt4User;

    public function __construct(User $oUser, Mt4User $oMt4User) {
        $this->oMt4User = $oMt4User;
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
            
            }
            $role = explode(',', Config::get('fxweb.admin_roles'));
            $oResults = $this->oUser->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role[0]);
        
        return view('admin/user/adminsList')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getAddUser(Request $oRequest) {

        
        $country_array = $this->oUser->getCountry(null);

        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);

        $userInfo = [
            'edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'nickname' => '',
            'address' => '',
            'birthday' => $dt->format('Y/m/d'),
            'phone' => '',
            'country' => '',
            'country_array' => $country_array,
            'city' => '',
            'gender' => '',
            'zip_code' => ''];
        if ($oRequest->has('edit_id')) {
            $user = Sentinel::findById($oRequest->edit_id);

            $oResult = $this->oUser->getUserDetails($user->id);
            $userInfo = [
                'edit_id' => $oRequest->edit_id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => '',
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'country_array' => $country_array,
                'city' => $oResult['city'],
                'gender' => $oResult['gender'],
                'zip_code' => $oResult['zip_code'],
            ];
        }

        return view('admin/user/addUser')->with('userInfo', $userInfo);
    }

    public function getDeleteUser(Request $oRequest) {

        $result = $this->oUser->deleteUser($oRequest->delete_id);
        return Redirect::route('admin.adminsList')->withErrors($result);
    }

    public function getEditUser(Request $oRequest) {

        $country_array = $this->oUser->getCountry(null);

        $carbon = new Carbon();
        $dt = $carbon->now();
        $dt->subYears(18);

        $userInfo = [
            'edit_id' => 0,
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'nickname' => '',
            'address' => '',
            'birthday' => $dt->format('Y/m/d'),
            'phone' => '',
            'country' => '',
            'country_array' => $country_array,
            'city' => '',
            'gender' => '',
            'zip_code' => ''];
        if ($oRequest->has('edit_id')) {
            $user = Sentinel::findById($oRequest->edit_id);


            $oResult = $this->oUser->getUserDetails($user->id);

            $userInfo = [
                'edit_id' => $oRequest->edit_id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => '',
                'nickname' => $oResult['nickname'],
                'address' => $oResult['address'],
                'birthday' => $oResult['birthday'],
                'phone' => $oResult['phone'],
                'country' => $oResult['country'],
                'country_array' => $country_array,
                'city' => $oResult['city'],
                'gender' => $oResult['gender'],
                'zip_code' => $oResult['zip_code'],
            ];
        }

        return view('admin/user/editUser')->with('userInfo', $userInfo)->with('oResult', $oResult);
    }

    public function postEditUser(EditUserRequest $oRequest) {

        $result = 0;

        $result = $this->oUser->updateUser($oRequest);

        if ($result > 0) {

            return $this->getUserDetails($oRequest);
        } else {
            return Redirect::route('general.editUser')->withErrors($result);
        }
    }

    public function postAddUser(AddUserRequest $oRequest) {

        $result = 0;

        $admin_role = explode(',', Config::get('fxweb.admin_roles'));
        $result = $this->oUser->addUser($oRequest, $admin_role[0]);

        if ($result > 0) {
            $oRequest->edit_id = $result;
            return $this->getUserDetails($oRequest);
        } else {

            return view('admin/user/addUser')->withErrors($result);
        }
    }

    public function getUserDetails(Request $oRequest) {

        $oResult = $this->oUser->getUserDetails($oRequest->edit_id);


        $user_details = [
            'edit_id' => $oRequest->edit_id,
            'first_name' => $oResult['first_name'],
            'last_name' => $oResult['last_name'],
            'email' => $oResult['email'],
            'nickname' => $oResult['nickname'],
            'address' => $oResult['address'],
            'birthday' => $oResult['birthday'],
            'phone' => $oResult['phone'],
            'country' => $this->oUser->getCountry($oResult['country']),
            'city' => $oResult['city'],
            'zip_code' => $oResult['zip_code'],
            'gender' => $oResult['gender'],
        ];

        return view('admin.user.detailsAccount')->with('user_details', $user_details);
    }

    public function getEmailTemplates(Request $oRequest) {

        $aTemplates = [
            '' => '',
            'external' => [
                'signUpWelcome' => 'Sign Up Welcome',
                'accountAssign' => 'Account Assign',
                'agentActivation' => 'Agent Activation',
                'newAgent' => 'New Agent',
                'newPassword' => 'New Password',
                'recoverPassword' => 'Recover Password',
                'withdrawResult' => 'Withdraw Result',
                'newContract' => 'New Contract',
                'massMailler'=>'Mass Mailler'
            ],
            'internal' => [
                'newAgentNotify' => 'New Agent Notify',
                'withdrawRequest' => 'Withdraw Request'
            ]
        ];
        $sTemplate = $oRequest->name;
        $sLanguage = $oRequest->lang;
        $sContent = '';

        $aLanguages = ['ar' => 'Arabic', 'en' => 'English'];


        if (!empty($sTemplate) && !empty($sLanguage)) {
            $sPath = base_path() . '/resources/views/admin/email/templates/' . $sLanguage . '/' . $sTemplate . '.blade.php';

            if (file_exists($sPath)) {
                $sContent = File::get($sPath);
            }
        }

        return view('admin.email.addEmailTemplates')
                        ->with('aLanguages', $aLanguages)
                        ->with('aTemplates', $aTemplates)
                        ->with('sTemplate', $sTemplate)
                        ->with('sLanguage', $sLanguage)
                        ->with('sContent', $sContent);
    }

    public function postEmailTemplates(Request $oRequest) {
        $sTemplate = $oRequest->name;
        $sLanguage = $oRequest->lang;
        $sContent = $oRequest->template_body;
        if (!empty($sTemplate) && !empty($sLanguage) && !empty($sContent)) {
            $sPath = base_path() . '/resources/views/admin/email/templates/' . $sLanguage . '/' . $sTemplate . '.blade.php';

            if (file_exists($sPath)) {
                File::put($sPath, $sContent);
            }
        }

        return Redirect::to(route('admin.addEmailTemplates') . '?name=' . $sTemplate . '&lang=' . $sLanguage);
    }


    public function getMassMailer(Request $oRequest) {


        $sLanguage =($oRequest->has('lang'))? $oRequest->lang:'en';
        $sContent = '';

        $aLanguages = ['ar' => 'Arabic', 'en' => 'English'];



            $sPath = base_path() . '/resources/views/admin/email/templates/' . $sLanguage . '/massMailler.blade.php';

            if (file_exists($sPath)) {
                $sContent = File::get($sPath);
            }


        return view('admin.email.massMailler')
            ->with('aLanguages', $aLanguages)
            ->with('sLanguage', $sLanguage)
            ->with('sContent', $sContent);
    }



    public function postMassMailer(Request $oRequest) {

        $email=new Email();

        $email->massMailler(['email'=>'taylorsuccessor@gmail.com','content'=>$oRequest->template_body]);
    }
}
