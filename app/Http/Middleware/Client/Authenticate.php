<?php namespace Fxweb\Http\Middleware\Client;

use Closure, Sentinel, Redirect,App;

class Authenticate
{
	public function handle($oRequest, Closure $fNext)
	{
		// Check if the user is logged in
		if ($oUser = Sentinel::check()  && Sentinel::inRole('client') ) {
			// User is logged in and assigned to the $oUser variable.
			// Check if the user has the right role
		} else {
			// User is not logged in
			if ($oRequest->ajax()) {
				return response('Needs Login', 401);
			} else {
				return Redirect::route('client.auth.login');
			}
		}
		App::setLocale('ar');
		return $fNext($oRequest);
	}
}
