<?php namespace Modules\Request\Http\Controllers\client;

use Pingpong\Modules\Routing\Controller;

class RequestController extends Controller {
	
	public function index()
	{
		return view('Request::index');
	}
	
}