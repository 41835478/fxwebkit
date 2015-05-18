<?php namespace Fxweb\Http\Middleware\Admin;

use Closure;

class Authenticate
{
	public function handle($oRequest, Closure $fNext)
	{
		// Check if the user is logged in
		if ($oUser = Sentinel::check()) {
			// User is logged in and assigned to the $oUser variable.
			// Check if the user has the right role
		} else {
			// User is not logged in
			if ($oRequest->ajax()) {
				return response('Needs Login', 401);
			} else {
				return Redirect::route('client.login');
			}
		}
		return $fNext($oRequest);
	}
}
