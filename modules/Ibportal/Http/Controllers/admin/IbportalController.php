<?php namespace Modules\Ibportal\Http\Controllers\admin;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
class IbportalController extends Controller {
	
	public function index()
	{
		return view('Ibportal::index');
	}

	protected $Mt4Configrations;

	public function __construct(
		Mt4Configrations $Mt4Configrations
	)
	{

		$this->Mt4Configrations = $Mt4Configrations;
	}


	public function getPlanList(Request $oRequest){




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


			$oResults = $this->Mt4Configrations->getGroupsByFilters($aFilterParams, false, $sOrder, $sSort);



		}
		return view('ibportal::plan_list')->with('oResults', $oResults)
			->with('aFilterParams', $aFilterParams);
	}

	public function getAddPlan()
	{

		$Result = Config('ibportal.type');

		$type = [
			'name'=>'',
			'type_array' => $Result,
			'type' => ''];

		return view('ibportal::addPlan')->with('type',$type);
	}


	
}