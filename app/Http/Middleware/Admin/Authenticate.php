<?php namespace Fxweb\Http\Middleware\Admin;

use Closure, Sentinel, Redirect,App;

/**
 * Class Authenticate
 * @package Fxweb\Http\Middleware\Admin
 *
 * Checks if the user logged in and is in admin group
 */
class Authenticate
{
	public function handle($oRequest, Closure $fNext)
	{
		// Check if the user is logged in
		if ($oUser = Sentinel::check() && Sentinel::inRole('admin')) {
                    
		} else {
			// User is not logged in
			if ($oRequest->ajax()) {
				return response('Needs Login', 401);
			} else {
				return Redirect::route('admin.auth.login');
			}
		}

			App::setLocale('ar');
		return $fNext($oRequest);
	}
}
