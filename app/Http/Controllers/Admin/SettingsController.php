<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as User;
use Fxweb\Http\Requests\AdminsListRequest;
use Fxweb\Http\Requests\Admin\AddUserRequest;
use Fxweb\Http\Requests\Admin\EditUserRequsest;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Carbon\Carbon;
use File;


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

            $role = explode(',', Config::get('fxweb.admin_roles'));
            $oResults = $this->oUser->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role[0]);
        }



        return view('admin/user/adminsList')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }
    
    public function getAddUser(Request $oRequest) {

        if ($oRequest->has('delete_id')) {
            $result = $this->oUser->deleteUser($oRequest->delete_id);
            return Redirect::route('admins-list')->withErrors($result);
        }
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
                'gender'=> '',
                'zip_code'=> ''];
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
                'gender'=> $oResult['gender'],
                'zip_code'=> $oResult['zip_code'],
            ];
        }

        return view('admin/user/addUser')->with('userInfo', $userInfo);
    }

    public function getEditUser(Request $oRequest) {

        if ($oRequest->has('delete_id')) {
            $result = $this->oUser->deleteUser($oRequest->delete_id);
            return Redirect::route('admins-list')->withErrors($result);
        }
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
                'gender'=> '',
                'zip_code'=> ''];
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
                'gender'=> $oResult['gender'],
                'zip_code'=> $oResult['zip_code'],
            ];
        }

        return view('admin/user/editUser')->with('userInfo', $userInfo);
    }

    public function postEditUser(EditUserRequsest $oRequest) {


        $result = false;
        $resultMessage = [];
        if ($oRequest->edit_id > 0) {


            $result = $this->oUser->updateUser($oRequest);
        } else {
            $admin_role = explode(',', Config::get('fxweb.admin_roles'));

            $result = $this->oUser->addUser($oRequest, $admin_role[0]);
        }



        if ($result >0) {
            return Redirect::to('/admin/settings/edit-user?edit_id='.$result);
        } else {
            return view('admin/user/addUser')
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
                                'country_array' => $this->oUser->getCountry(null),
                                'city' => $oRequest->city,
                'gender'=> $oRequest->gender,
                'zip_code'=> $oRequest->zip_code
            ]);
        }
    }
    
     public function postAddUser(AddUserRequest $oRequest) {


        $result = false;
        $resultMessage = [];
        if ($oRequest->edit_id > 0) {


            $result = $this->oUser->updateUser($oRequest);
        } else {
            $admin_role = explode(',', Config::get('fxweb.admin_roles'));

            $result = $this->oUser->addUser($oRequest, $admin_role[0]);
        }



        if ($result >0) {
            return Redirect::to('/admin/settings/edit-user?edit_id='.$result);
        } else {
            return view('admin/user/addUser')
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
                                'country_array' => $this->oUser->getCountry(null),
                                'city' => $oRequest->city,
                'gender'=> $oRequest->gender,
                'zip_code'=> $oRequest->zip_code
            ]);
        }
    }


    
    public function getUserDetails(Request $oRequest){
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
        
        return view('admin.user.detailsAccount')->with('user_details',$user_details);
    }
  
	public function getEmailTemplates(Request $oRequest)
	{
	
		$aTemplates= [
			'' => '',
			'external' => [
				'signUpWelcome' => 'Sign Up Welcome',
				'accountAssign' => 'accountAssign',
				'agentActivation' => 'agentActivation',
				'newAgent' => 'newAgent',
				'newPassword' => 'newPassword',
				'recoverPassword' => 'recoverPassword',
				'withdrawResult' => 'withdrawResult',
			],
			'internal' => [
				'newAgentNotify' => 'newAgentNotify',
				'withdrawRequest' => 'withdrawRequest'
			]
		];
		$sTemplate = $oRequest->name;
		$sLanguage = $oRequest->lang;
		$sContent = '';
                
		$aLanguages = ['ar' => 'Arabic','en'=>'English'] ;
	

		if (!empty($sTemplate) && !empty($sLanguage)) {
			$sPath = base_path() . '/resources/views/admin/email/templates/'.$sLanguage.'/'.$sTemplate.'.blade.php';
			
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


public function postEmailTemplates(Request $oRequest)
	{
		$sTemplate = $oRequest->name;
		$sLanguage = $oRequest->lang;
$sContent = $oRequest->template_body;
		if (!empty($sTemplate) && !empty($sLanguage) && !empty($sContent)) {
			$sPath = base_path() . '/resources/views/admin/email/templates/'.$sLanguage.'/'.$sTemplate.'.blade.php';
			
			if (file_exists($sPath)) {
				File::put($sPath, $sContent);
			}
		}

		return Redirect::to(route('admin.addEmailTemplates').'?name='.$sTemplate.'&lang='.$sLanguage);
	}

    
    
}
