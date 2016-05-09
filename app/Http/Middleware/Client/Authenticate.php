<?php namespace Fxweb\Http\Middleware\Client;

use Closure, Sentinel, Redirect,App,Session;

class Authenticate
{
	public function handle($oRequest, Closure $fNext)
	{
		// Check if the user is logged in
		if ($oUser = Sentinel::check()  && Sentinel::inRole('client') ) {
			// User is logged in and assigned to the $oUser variable.
			// Check if the user has the right role


			if(current_user()->getUser()->hasAnyAccess(['user.block']) ){


				return Redirect::route('client.auth.login')->withErrors([trans('user.userBlock')]);
			}
		} else {
			// User is not logged in
			if ($oRequest->ajax()) {
				return response('Needs Login', 401);
			} else {
				return Redirect::route('client.auth.login')->withErrors([trans('user.InvalidLogin')]);
			}
		}
		$locale = ($oRequest->has('locale')) ? $oRequest->locale : false;
		$back = $this->setLocale($locale);

		if ($back == 'back') {
			return Redirect::back();
		}
		return $fNext($oRequest);

	}

	private function setLocale($locale)
	{
		if ($locale) {
			Session::put('locale', $locale);
			return 'back';
		} else if (!Session::has('locale')) {
			Session::put('locale', 'en');
		}


		App::setLocale(Session::get('locale'));

	}
}
