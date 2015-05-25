<?php namespace Fxweb\Http\Controllers\Client;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Fxweb\Http\Controllers\Controller;
use Fxweb\Http\Requests\Client\LoginRequest;
use Fxweb\Http\Requests\Client\RegisterRequest;
use Exception, Sentinel, Lang, Redirect, Config, Log, Activation;

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

	public function getLogout()
	{
		Sentinel::logout(null, true);
		return redirect()->route('client.auth.login');
	}

	public function getRegister()
	{
		return view('client.user.register')
			->with('random', rand(1, 8));
	}

	public function postRegister(RegisterRequest $oRequest)
	{
		$oClientRole	= Sentinel::findRoleBySlug(Config::get('fxweb.client_default_role'));
		$bAutoActivate	= Config::get('fxweb.auto_activate_client');
		$aCredentials	= [
			'first_name'	=> $oRequest->first_name,
			'last_name'		=> $oRequest->last_name,
			'email'			=> $oRequest->email,
			'password'		=> $oRequest->password,
		];

		if ($bAutoActivate) {
			$oUser = Sentinel::registerAndActivate($aCredentials);
			$oClientRole->users()->attach($oUser);
			return redirect()->route('client.index');
		} else {
			$oUser = Sentinel::register($aCredentials);
			$oClientRole->users()->attach($oUser);
			$oActivation = Activation::create($oUser);
			dd($oActivation);
			return redirect()->route('client.auth.login');
		}
	}

	public function getRecover()
	{
		//
	}
}
