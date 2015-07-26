<?php namespace Fxweb\Http\Controllers\Client;

use Fxweb\Http\Controllers\Controller;
use Sentinel;

class DashboardController extends Controller
{
	public function index()
	{
		return view('client.dashboard');
	}
}
