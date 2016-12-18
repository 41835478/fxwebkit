<?php namespace Fxweb\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {


	protected $except_urls = [
		'cms_forms_demoaccount/form'

    ];
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$regex = '#' . implode('|', $this->except_urls) . '#';

		if ($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path()))
		{
			return $this->addCookieToResponse($request, $next($request));
		}

		//throw new TokenMismatchException;
	}

	protected function tokensMatch($request)
	{
		// If request is an ajax request, then check to see if token matches token provider in
		// the header. This way, we can use CSRF protection in ajax requests also.
		$token = $request->ajax() ? $request->header('X-CSRF-Token') : $request->input('_token');

		return $request->session()->token() == $token;
	}

}
