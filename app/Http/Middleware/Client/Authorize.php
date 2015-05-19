<?php namespace Fxweb\Http\Middleware\Client;

use Closure;

class Authorize
{
	public function handle($request, Closure $next)
	{
		/*
		if (Sentinel::hasAccess()) {

		}

		if ($this->auth->guest()) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			} else {
				return redirect()->guest('auth/login');
			}
		}
		*/
		return $next($request);
	}

}
