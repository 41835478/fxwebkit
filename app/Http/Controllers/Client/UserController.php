<?php namespace Fxweb\Http\Controllers\Client;

use Fxweb\Http\Controllers\Controller;

class UserController extends Controller
{
	public function getLogin()
	{
		return view('client.user.login')
			->with('random', rand(1, 8));
	}
}
