<?php namespace Fxweb\Http\Controllers\Client;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Fxweb\Http\Controllers\Controller;
use Fxweb\Http\Requests\Client\LoginRequest;
use Illuminate\Support\Facades\Log;
use Exception, Sentinel, Lang, Redirect;

class AuthController extends Controller
{
	public function getLogin()
	{
		return view('client.user.login')
			->with('random', rand(1, 8));
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
				->route('client.auth.login')
				->withErrors([Lang::get('user.LoginSuspended')]);
		} catch (NotActivatedException $e) {
			return redirect()
				->route('client.auth.login')
				->withErrors([Lang::get('user.LoginNotActive')]);
		} catch (Exception $e) {
			Log::error('Login', ['context' => __FILE__.' : '.__LINE__.' : '.$e->getMessage()]);
			return redirect()
				->route('client.auth.login')
				->withErrors([Lang::get('user.InvalidLogin')]);
		}

		if ($oUser) {
			return Redirect::intended('/');
		} else {
			return redirect()
				->route('client.auth.login')
				->withErrors([Lang::get('user.InvalidLogin')]);
		}
	}

	public function getRegister()
	{
		//
	}

	public function getRecover()
	{
		//
	}
}
