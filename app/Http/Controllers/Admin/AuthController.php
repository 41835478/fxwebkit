<?php namespace Fxweb\Http\Controllers\Admin;

use Fxweb\Http\Controllers\Controller;
use Fxweb\Http\Requests\Admin\LoginRequest;
use Sentinel, Redirect,Auth;

class AuthController extends Controller
{
	public function getLogin()
	{
		return view('admin.user.login')
			->with('random', rand(1, 3));
	}

	public function postLogin(LoginRequest $oRequest)
	{ 

            try {
			$oUser = Sentinel::authenticate([
				'email' => $oRequest->email,
				'password' => $oRequest->password,
			]);
		} catch (ThrottlingException $e) {
			return redirect()
				->route('admin.auth.login')
				->withErrors([trans('user.LoginSuspended')]);
		} catch (NotActivatedException $e) {
			return redirect()
				->route('admin.auth.login')
				->withErrors([trans('user.LoginNotActive')]);
		} catch (Exception $e) {
			Log::error('Login', ['context' => __FILE__.' : '.__LINE__.' : '.$e->getMessage()]);
			return redirect()
				->route('admin.auth.login')
				->withErrors([trans('user.InvalidLogin')]);
		}

		if ($oUser) {
		$user_columns_info=\Fxweb\Models\columnsInfo::where(['users_id'=>$oUser->id])->first();
			if(count($user_columns_info)){
			\Session::flash('columns_info',$user_columns_info->columns_info);


			}else{
				\Session::flash('columns_info','{}');
			}

			$aAllowedRoles = explode(',', config('fxweb.admin_roles'));
			foreach($aAllowedRoles as $sAllowedRole) {
				if ($oUser->inRole($sAllowedRole)) {
					return Redirect::intended(route('admin.index'));
				}
			}
			return redirect()
				->route('admin.auth.login')
				->withErrors([trans('user.InvalidLogin')]);
		} else {
			return redirect()
				->route('admin.auth.login')
				->withErrors([trans('user.InvalidLogin')]);
		}
	}

        
	public function getLogout()
	{
		Sentinel::logout(null, true);
		return redirect()->route('admin.auth.login');
	}
        
        
        
}
