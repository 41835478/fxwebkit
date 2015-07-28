<?php namespace Modules\Reports\Http\Controllers\Admin;

use Pingpong\Modules\Routing\Controller;

class ReportsController extends Controller {
	
	public function index()
	{
		return view('reports::index');
	}

	public function getClosedOrders()
	{

	}

	public function getOpenOrders()
	{

	}
	
}