<?php namespace Modules\Mt4configrations\Http\Controllers\admin;

use Pingpong\Modules\Routing\Controller;
use Modules\Tools\Repositories\HolidayContract as Holiday;

class Mt4ConfigrationsController extends Controller {
	
	public function index()
	{
		return view('Mt4configrations::index');
	}


	protected $oHoliday;
	public function __construct(
		Holiday $oHoliday
	) {

		$this->oHoliday = $oHoliday;
	}



	public function getSymbolsList(){

		$oResults = $this->oHoliday->getSymbols();
		//dd($oResults);

		return view('mt4configrations::symbol_list')->with('oResults',$oResults);
	}
	public function getSecuritiesList(){
		return 'getSecuritiesList';
	}
	public function getGroupsList(){
		return 'getGroupsList';
	}
}