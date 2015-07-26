<?php namespace Modules\Reports\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ReportsController extends Controller {
	
	public function index()
	{
		return view('reports::index');
	}
	
}