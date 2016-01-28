<?php namespace Modules\Ibportal\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class IbportalController extends Controller {
	
	public function index()
	{
		return view('Ibportal::index');
	}
	
}