<?php namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ToolsController extends Controller {
	
	public function index()
	{
		return view('tools::index');
	}
        
        public function getFutureContract()
        {
            return 'FutureContract';
        }
        
	public function getMarketWatch()
        {
            return 'MarketWatch';
        }
}