<?php

namespace Fxweb\Http\Controllers\admin;

use Fxweb\Models\SettingsMassGroups;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as User;
use Fxweb\Http\Requests\AdminsListRequest;
use Fxweb\Http\Requests\Admin\AddUserRequest;
use Fxweb\Http\Requests\Admin\EditUserRequest;
use Fxweb\Http\Requests\Admin\ChangePasswordRequest;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Carbon\Carbon;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use File;
use Fxweb\Http\Controllers\Admin\Email;
use Modules\Request\Entities\SettingsEmailTemplates;
use Fxweb\Http\Controllers\Admin\EditConfigController as EditConfig;

use Fxweb\Models\SettingsMassMail;
use Fxweb\Models\SettingsMassTemplates;
//use Fxweb\Models\SettingsEmailTemplates;


class SettingsController extends Controller
{

    /**
     * @var Mt4Group
     */
    protected $oUser;
    protected $oMt4User;
    private $aTemplates;

    public function __construct(Users $oUser, Mt4User $oMt4User)
    {
        $this->oMt4User = $oMt4User;
        $this->oUser = $oUser;
        $this->aTemplates = [
            'signUpWelcome' => 'Client-Sign Up Welcome',
            'recoverPassword' => 'Client-Recover Password',
            'newContract' => 'Client-New Contract',
            'massMailler' => 'Client-Mass Mailler',
            'activeAccount' => 'Client-Active Account',
            'forgetPassword' => 'Client-Forget Password',
            'agentActivation' => 'Agent-Activation',
            'accountAssign' => 'Admin-Account Assign',
            'newAgent' => 'Admin-New Agent',
            'newPassword' => 'Admin-New Password',
            'changeMt4Password' => 'Admin-Mt4 User Change Password',
            'internalTransfers' => 'Admin-Internal Transfers',
            'withdrawal'=>'Admin-Withdrawal',
            'withdrawResult' => 'Admin-Withdraw Result',
            'newAgentNotify' => 'Admin-New Agent Notify',
            'withdrawRequest' => 'Admin-Withdraw Request',
            'changeLeverage' => 'Admin-User Change Leverage',
            'newUserSignUp' => 'Admin-New User Sign Up',
            'expiryContract'=>'Expiry Contract'
        ];


        //$this->middleware('SubAdmin.admin',['except'=>['getAdminsList']]);
        //$this->middleware('SubAdmin.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getAdminsList(AdminsListRequest $oRequest)
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

    public function getAddUser(Request $oRequest)
    {


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

    public function getDeleteUser(Request $oRequest)
    {

        $result = $this->oUser->deleteUser($oRequest->delete_id);
        /* TODO with success */
        return Redirect::route('admin.adminsList')->withErrors($result);
    }

    public function getEditUser(Request $oRequest)
    {

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

    public function postEditUser(EditUserRequest $oRequest)
    {

        $result = 0;

        $result = $this->oUser->updateUser($oRequest);

        if ($result > 0) {

            return $this->getUserDetails($oRequest);
        } else {
            return Redirect::route('general.editUser')->withErrors($result);
        }
    }

    public function postAddUser(AddUserRequest $oRequest)
    {

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

    public function getUserDetails(Request $oRequest)
    {

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




    public function getEmailTemplates(Request $oRequest)
    {

        $sLanguage = ($oRequest->has('lang')) ? $oRequest->lang : 'en';
        $status = ($oRequest->has('status')) ? $oRequest->status : 0;
        $type = ($oRequest->has('type')) ? $oRequest->type : 'client';

        $searchData=[
            'language'=>$sLanguage,
            'status'=>$status,
            'type'=>$type
        ];

        $aTemplates = config('fxweb.emailTemplates');

        $template_name = '';
        foreach($aTemplates as $key=>$value){$template_name=$key;break;}

        $oEmail = [];
        if (isset($oRequest->template_name ) && $oRequest->template_name != '') {
            $template_name = $oRequest->template_name;

        }



        $emailInfo=['id'=>0,'title'=>$template_name,'to_field'=>'accountInfo_email','to_email'=>'','type'=>$type,'status'=>$status,'mail'=>''];


        $oEmailLanguage = SettingsEmailTemplates::where(['template_name' => $template_name]+$searchData)->first();
        if (count($oEmailLanguage)) {
            $emailInfo = $oEmailLanguage->toArray();
        }

        $aLanguages = config('app.language');


        $aStatus=(is_array(config('fxweb.status_'.$template_name)))? config('fxweb.status_'.$template_name)
            :config('fxweb.generalStatus');


        return view('request::admin.addEmailTemplates')
            ->with('aLanguages', $aLanguages)
            ->with('aTemplates', $aTemplates)
            ->with('template_name', $template_name)
            ->with('sLanguage', $sLanguage)
            ->with('aType',config('fxweb.emailTypes'))
            ->with('aStatus',$aStatus)
            ->with($emailInfo);
    }

    public function postEmailTemplates(Request $oRequest)
    {
        $templateId = $oRequest->templateId;
        $sLanguage = $oRequest->lang;
        $emailInfo=
            [
                'title'=>$oRequest->title,
                'template_name'=>$oRequest->template_name,
                'to_field'=>$oRequest->to_field,
                'to_email'=>$oRequest->to_email,
                'type'=>$oRequest->type,
                'status'=>$oRequest->status,
                'mail'=>$oRequest->template_body,
                'language'=>$sLanguage];


        if ($oRequest->has('save') && $templateId>0) {

            $email = SettingsEmailTemplates::where(['id' => $templateId])->first();
            if (count($email)) {
                $email->update($emailInfo);
            } else {

                $email = SettingsEmailTemplates::create($emailInfo);
                $templateId = $email->id;

            }
        } else if ($oRequest->has('saveNew') ||($oRequest->has('save') && $templateId==0)) {


            $email = SettingsEmailTemplates::create($emailInfo);
            $templateId = $email->id;
        } elseif ($oRequest->has('delete') && $templateId>0) {

            SettingsEmailTemplates::find($templateId)->delete();
            $templateId = 0;
        }


        return Redirect::to(route('admin.addEmailTemplates') . '?template_name=' . $oRequest->template_name. '&lang=' . $sLanguage.'&type='.$oRequest->type.
            '&status='.$oRequest->status);
    }



    public function getMassMailer(Request $oRequest)
    {

        $sLanguage = ($oRequest->has('lang')) ? $oRequest->lang : 'en';
        $group_id=($oRequest->has('group_id')) ? $oRequest->group_id : 0;

        $aTemplates = SettingsMassTemplates::select(['id','subject'])->where('language',$sLanguage)->lists('subject','id');

        $templateId = ($oRequest->has('templateId')) ? $oRequest->templateId :1;
        $sContent = '';

        $aLanguages =config('app.language');


//       $sPath = base_path() . '/resources/views/admin/email/templates/' . $sLanguage . '/' . $sTemplate . '.blade.php';
//
//        if (file_exists($sPath)) {
//            $sContent = File::get($sPath);
//        }

        $massMail= SettingsMassTemplates::select(['subject','mail'])->find($templateId);
        $tMail='';
        $tSubject='';
        if($massMail){
            $tMail=$massMail->mail;
            $tSubject=$massMail->subject;
        }
        $aMassGroups=SettingsMassGroups::select(['id','group'])->lists('group','id')->toArray();

        $aMassGroups=['-2'=>'All Clients','-1'=>'All Admins','0'=>'All']+$aMassGroups ;
        return view('admin.email.massMailler')
            ->with('aTemplates', $aTemplates)
            ->with('templateId', $templateId)
            ->with('aLanguages', $aLanguages)
            ->with('sLanguage', $sLanguage)
            ->with('sContent', $tMail)
            ->with('subject',$tSubject)
            ->with('aMassGroups',$aMassGroups)
            ->with('group_id',$group_id);
    }


    public function postMassMailer(Request $oRequest)
    {

        $EmailClass = new Email();
        if($oRequest->has('save')){

            $email= SettingsMassTemplates::create([
                'subject'=>$oRequest->subject,
                'mail' => $oRequest->template_body,
                'group_id' => $oRequest->group_id,
                'language' => $oRequest->lang
            ]);
            $oRequest->templateId=$email->id;
        }else if($oRequest->has('saveSend')){


           $emailTemplate= SettingsMassTemplates::create([
               'subject'=>$oRequest->subject,
               'mail' => $oRequest->template_body,
               'group_id' => $oRequest->group_id,
               'language' => $oRequest->lang
           ]);


           $email= SettingsMassMail::create([
               'subject'=>$oRequest->subject,
               'mail' => $oRequest->template_body,
               'group_id' => $oRequest->group_id,
               'language' => $oRequest->lang
           ]);
            $EmailClass-> autoSendMassMail(7,$email->id,0);
            $oRequest->templateId=$emailTemplate->id;
        }elseif($oRequest->has('send')){

            $email= SettingsMassMail::create([
                'subject'=>$oRequest->subject,
                'mail' => $oRequest->template_body,
                'group_id' => $oRequest->group_id,
                'language' => $oRequest->lang
            ]);
            $EmailClass-> autoSendMassMail(7,$email->id,0);


        }


return $this->getMassMailer($oRequest);


    }


    public function getSettings(Request $oRequest)
    {






        $editConfig = new EditConfig();


        return view('admin.settings',
        [
            'editGroupLive'=>$editConfig->getEditDropDownHtml('GroupLive',config('fxweb.GroupLive')),
            'editGroupDemo'=>$editConfig->getEditDropDownHtml('GroupDemo',config('fxweb.GroupDemo')),

            'editDepositLive'=>$editConfig->getEditDropDownHtml('DepositLive',config('fxweb.DepositLive')),
            'editDepositDemo'=>$editConfig->getEditDropDownHtml('DepositDemo',config('fxweb.DepositDemo')),
            'editleverage'=>$editConfig->getEditDropDownHtml('leverage',config('fxweb.leverage')),
            'editleverageDemo'=>$editConfig->getEditDropDownHtml('leverageDemo',config('fxweb.leverageDemo')),
        ]);

    }

    /**
     *
     * @param Request $oRequest
     * @return $this
     *
     */
    public function postSettings(Request $oRequest)
    {


        $enableLinkTradeForUser = ($oRequest->EnableLinkTradeForUser) ? true : false;
        $enableLinkedinRegister= ($oRequest->EnableLinkedinRegister) ? true : false;
        $enableGoogleRegister= ($oRequest->EnableGoogleRegister) ? true : false;
        $enableFacebookRegister= ($oRequest->EnableFacebookRegister) ? true : false;

        $aSetting = [

            'mt4CheckHost' => $oRequest->mt4CheckHost,
            'mt4CheckPort' => $oRequest->mt4CheckPort,
            'liveServerName' => $oRequest->liveServerName,

            'mt4CheckDemoHost' => $oRequest->mt4CheckDemoHost,
            'mt4CheckDemoPort' => $oRequest->mt4CheckDemoPort,
            'demoServerName' => $oRequest->demoServerName,

            'adminEmail' => $oRequest->adminEmail,
            'senderEmail'=>$oRequest->senderEmail,
            'displayName'=>$oRequest->displayName,


            'facebookLoginCallback'=>$oRequest->facebookLoginCallback,
            'facebookLoginProvider'=>$oRequest->facebookLoginProvider,
            'facebookLoginDriver'=>$oRequest->facebookLoginDriver,
            'facebookLoginIdentifier'=>$oRequest->facebookLoginIdentifier,
            'facebookLoginApp_id'=>$oRequest->facebookLoginApp_id,
            'facebookLoginSecret'=>$oRequest->facebookLoginSecret,
            'EnableFacebookRegister'=>$enableFacebookRegister,



            'googleCallback'=>$oRequest->googleCallback,
            'googleProvider'=>$oRequest->googleProvider,
            'googleDriver'=>$oRequest->googleDriver,
            'googleIdentifier'=>$oRequest->googleIdentifier,
            'googleSecret'=>$oRequest->googleSecret,
            'EnableGoogleRegister'=>$enableGoogleRegister,

            'linkedinCallback'=>$oRequest->linkedinCallback,
            'linkedinProvider'=>$oRequest->linkedinProvider,
            'linkedinDriver'=>$oRequest->linkedinDriver,
            'linkedinIdentifier'=>$oRequest->linkedinIdentifier,
            'linkedinSecret'=>$oRequest->linkedinSecret,
            'EnableLinkedinRegister'=>$enableLinkedinRegister,


            'layoutAssetsFolder'=>$oRequest->layoutAssetsFolder,
            'LinkTradeForUser'=>$oRequest->LinkTradeForUser,
            'demoAccountHost'=>$oRequest->demoAccountHost,
            'demoAccountPort'=>$oRequest->demoAccountPort,
            'EnableLinkTradeForUser'=>$enableLinkTradeForUser,

        ];


        $editConfig = new EditConfig();




        $editConfig->editConfigFile('config/fxweb.php', $aSetting,
            [
                'GroupLive'=>$editConfig->arrayToString('GroupLive',$oRequest->GroupLive),
                'GroupDemo'=>$editConfig->arrayToString('GroupDemo',$oRequest->GroupDemo),
                 'DepositLive'=>$editConfig->arrayToString('DepositLive',$oRequest->DepositLive),
                'DepositDemo'=>$editConfig->arrayToString('DepositDemo',$oRequest->DepositDemo),
                'leverage'=>$editConfig->arrayToString('leverage',$oRequest->leverage),
                'leverageDemo'=>$editConfig->arrayToString('leverageDemo',$oRequest->leverageDemo),
                'servers'=>$editConfig->multiLivilArrayToString('servers',$oRequest->servers)

             ]);




        \Session::flash('refresh', 'true');

        return Redirect::route('admin.settings');

    }


    public function getMassGroupsList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'group' => '',
            'sort' => $sSort,
            'order' => $sOrder
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['group'] = $oRequest->first_name;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
        }

        $oResults = $this->oUser->getMassGroupsList($aFilterParams, false, $sOrder, $sSort);

        return view('admin.email.massGroupsList')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }




    public function getAddMassGroup(Request $oRequest)
    {
        $massGroup = [
            'id'=>0,
            'group_name' => '',

        ];

        return view('admin.email.addGroup')->with('massGroup', $massGroup);
    }

    public function postAddMassGroup(Request $oRequest)
    {

        $result = 0;

        $result = $this->oUser->addMassGroup($oRequest);

        if ($result > 0) {

            $oRequest->id = $result;
            return Redirect::to(route('admin.assignToMassGroup').'?group_id='.$result);
        }
        return Redirect::route('admin.addMassGroup')->withErrors(trans('general.error_please_try'));
    }

    public function getEditMassGroup(Request $oRequest)
    {
        $massGroup = [
            'id'=>0,
            'group_name' => '',
        ];
        
        if ($oRequest->has('id')) {

            $oResult = $this->oUser->getMassGroupDetails($oRequest->id);

            $massGroup = [
                'id' => $oRequest->id,
                'group_name' => $oResult['group'],
            ];
        }

        return view('admin.email.editGroup')->with('massGroup', $massGroup);
    }

    public function postEditMassGroup(Request $oRequest)
    {
        $result = 0;

        $result = $this->oUser->updateGroup($oRequest);

        if ($result > 0) {

            $oRequest->id = $result;

            $oResult = $this->oUser->getMassGroupDetails($oRequest->id);

            $massGroup = [
                'id' => $oRequest->id,
                'group_name' => $oResult['group'],
            ];

            return Redirect::route('admin.massGroupsList');
        }

    }

    public function getDeleteContract(Request $oRequest)
    {
        $result = $this->oUser->deleteGroup($oRequest->delete_id);

        return Redirect::route('admin.massGroupsList')->withErrors($result);
    }

    public function getAssignToMassGroup(Request $oRequest)
    {
        $group_id = $oRequest->group_id;

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
            'group_id' => $group_id,
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
            $aFilterParams['group_id'] = $group_id;
            $aFilterParams['order'] = $oRequest->order;

        }

        $oResults = $this->oMt4User->getUsersMt4UsersWithMassGroup($aFilterParams, false, $sOrder, $sSort);

        return view('admin.email.assignTo')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('group_id', $group_id)
            ->with('aFilterParams', $aFilterParams);

    }

    public function postAssignToMassGroup(Request $oRequest)
    {

        if ($oRequest->has('asign_mt4_users_submit') || $oRequest->has('asign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('asign_mt4_users_submit_id')) ? [$oRequest->get('asign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $group_id = $oRequest->group_id;

                $this->oUser->assignMt4ToMassGroup($group_id, $users_checkbox,1);

            return $this->getAssignToMassGroup($oRequest);

        }

        if ($oRequest->has('un_sign_mt4_users_submit') || $oRequest->has('un_sign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('un_sign_mt4_users_submit_id')) ? [$oRequest->get('un_sign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $group_id = $oRequest->group_id;
            $this->oUser->unassignMt4ToMassGroup($group_id, $users_checkbox,1);

            return $this->getAssignToMassGroup($oRequest);


        }
    }


    public function getAssginToMassAccountsList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id'=>'',
            'group_id' => $oRequest->group_id,
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
            'signed' => 0,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['group_id'] = $oRequest->group_id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['signed'] = $oRequest->signed;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
        }

        $oResults = $this->oUser->getUsersWithMassGroup($aFilterParams, false, $sOrder, $sSort);

        return view('admin.email.accountsList')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams)
            ->with('aActive',[
                    trans('accounts::accounts.all'),
                    trans('accounts::accounts.active'),
                    trans('accounts::accounts.notActive')
                ]
            );
    }


    public function postAssginToMassAccountsList(Request $oRequest)
    {

        if ($oRequest->has('asign_mt4_users_submit') || $oRequest->has('asign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('asign_mt4_users_submit_id')) ? [$oRequest->get('asign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $group_id = $oRequest->group_id;

            $this->oUser->assignMt4ToMassGroup($group_id, $users_checkbox,0);

            return $this->getAssginToMassAccountsList($oRequest);

        }

        if ($oRequest->has('un_sign_mt4_users_submit') || $oRequest->has('un_sign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('un_sign_mt4_users_submit_id')) ? [$oRequest->get('un_sign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $group_id = $oRequest->group_id;
            $this->oUser->unassignMt4ToMassGroup($group_id, $users_checkbox,0);

            return $this->getAssginToMassAccountsList($oRequest);


        }
    }

    public function getChangePassword(Request $oRequest)
    {


        $userInfo = [
            'edit_id' => $oRequest->edit_id,
            'password' => '',
            'password_confirmation' => '',
        ];
        return view('admin.user.adminChangePassword')->with('userInfo', $userInfo);
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $result = $this->oUser->changePassword($request);

        $userInfo = [
            'edit_id' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        \Session::flash('flash_success', trans('user.successfully'));

        return Redirect::route('admin.users.changePassword')->with('userInfo', $userInfo);
    }


public function getSetPermissions(){
return false;
    echo \Route::getCurrentRoute()->getActionName();
    $routeCollection = \Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->getMethods()[0] . "</td>";
        echo "<td>" . $value->getPath() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    dd($routeCollection);
}
}



