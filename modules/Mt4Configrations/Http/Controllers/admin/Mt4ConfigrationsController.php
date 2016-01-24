<?php namespace Modules\Mt4configrations\Http\Controllers\admin;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;

use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

class Mt4ConfigrationsController extends Controller {



	public function index()
	{
		return view('Mt4configrations::index');
	}


	protected $Mt4Configrations;
	public function __construct(
		Mt4Configrations $Mt4Configrations
	) {

		$this->Mt4Configrations = $Mt4Configrations;
	}



	public function getSymbolsList(Request $oRequest){

		$sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
		$sOrder = ($oRequest->order) ? $oRequest->order : 'id';

		$oResults = null;

		$aFilterParams = [
			'name' => '',
			'sort' => $sSort,
			'order' => $sOrder,
		];

		if ($oRequest->has('search')) {

			$aFilterParams['name'] = $oRequest->name;


			$oResults = $this->Mt4Configrations->getSymbolsByFilters($aFilterParams, false, $sOrder, $sSort);
		}


		return view('mt4configrations::symbol_list')->with('oResults',$oResults)
			->with('aFilterParams',$aFilterParams);
	}
	public function getSecuritiesList(){
		return 'getSecuritiesList';
	}
	public function getGroupsList(){
		return 'getGroupsList';
	}
}