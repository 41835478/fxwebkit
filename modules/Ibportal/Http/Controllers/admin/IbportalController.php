<?php namespace Modules\Ibportal\Http\Controllers\admin;
use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;
use Modules\Ibportal\Repositories\IbportalContract as Ibportal;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
class IbportalController extends Controller {
	
	public function index()
	{
		return view('Ibportal::index');
	}

	protected $Mt4Configrations;
	protected $Ibportal;
	public function __construct(
		Mt4Configrations $Mt4Configrations,Ibportal $Ibportal
	)
	{
		$this->Ibportal=$Ibportal;
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


		$data = [
			'name'=>'',
			'planTypes' => ['Commission'=>'Commission','Rebate'=>'Rebate'],
			'symbolTypes'=>['Money'=>'Money','Point'=>'Point','Percentage'=>'Percentage'],
			'aliases'=>$this->Ibportal->getAliases(),
			];

		return view('ibportal::admin.addPlan')->with('data',$data);
	}

	public function postAddPlan(Request $request)
	{
		// TODO check validation
		$planName=$request->planName;
		$planType=$request->planType;
		$planId=$this->Ibportal->addPlan($planName,$planType);

		if($request->has('selectedSymbols') && $planId >0) {
			$selectedSymbols = $request->selectedSymbols;
			$symbolsType = $request->symbolsType;
			$symbolsValue = $request->symbolsValue;
			$this->Ibportal->addPlanSymbols($planId,$selectedSymbols,$symbolsType,$symbolsValue);
		}

		if($planId > 0){
		return Redirect::route('admin.ibportal.planeList');
		}else{
// TODO translate this error
			return redirect()->back()->withErrors('No thing added, please try again.');
		}
	}

public function getAliasesList(Request $oRequest){


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
	
}