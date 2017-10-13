<?php namespace Fxweb\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;


class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'Fxweb\Http\Middleware\VerifyCsrfToken',


	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		/*
		 * Admin Middlewares
		 */
		'authenticate.admin' => 'Fxweb\Http\Middleware\Admin\Authenticate',
		'authorize.admin' => 'Fxweb\Http\Middleware\Admin\Authorize',
		'ACLAdmin.admin' => 'Fxweb\Http\Middleware\Admin\ACLAdmin',

		/*
		 * Client Middlewares
		 */
		'authenticate.client' => 'Fxweb\Http\Middleware\Client\Authenticate',
		'authorize.client' => 'Fxweb\Http\Middleware\Client\Authorize',
	];

}
