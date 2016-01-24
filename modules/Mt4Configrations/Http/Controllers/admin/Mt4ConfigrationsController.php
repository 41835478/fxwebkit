<?php namespace Modules\Mt4configrations\Http\Controllers\admin;

use Pingpong\Modules\Routing\Controller;

class Mt4ConfigrationsController extends Controller {
	
	public function index()
	{
		return view('Mt4configrations::index');
	}


	public function getSymbolsList(){
		return 'getSymbolsList';
	}
	public function getSecuritiesList(){
		return 'getSecuritiesList';
	}
	public function getGroupsList(){
		return 'getGroupsList';
	}
}