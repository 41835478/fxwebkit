<?php namespace Modules\Ibportal\Http\Controllers\admin;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
class IbportalController extends Controller {
	
	public function index()
	{
		return view('Ibportal::index');
	}

	public function getAddPlan(Request $oRequest){


		return view('ibportal::admin.addPlan');
	}
	
}