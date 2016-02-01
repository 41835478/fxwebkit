<?php namespace Modules\Ibportal\Http\Controllers\admin;

use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;

use Fxweb\Repositories\Admin\User\UserContract as Users;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;

class IbportalController extends Controller {
	
	public function index()
	{
		return view('Ibportal::index');
	}

	protected $Mt4Configrations;
	protected $Ibportal;
	protected $Users;
	public function __construct(
		Mt4Configrations $Mt4Configrations,Ibportal $Ibportal,Users $Users
	)
	{
		$this->Ibportal=$Ibportal;
		$this->Mt4Configrations = $Mt4Configrations;
		$this->Users=$Users;
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


            $oResults = $this->Ibportal->getPlansByFilters($aFilterParams, false, $sOrder, $sSort);


        }
        return view('ibportal::admin.plan_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAddPlan()
    {


        $data = [
            'name' => '',
            'planTypes' => ['Commission' => 'Commission', 'Rebate' => 'Rebate'],
            'symbolTypes' => ['Money' => 'Money', 'Point' => 'Point', 'Percentage' => 'Percentage'],
            'aliases' => $this->Ibportal->getAliases(),
        ];


        return view('ibportal::admin.addPlan')->with('data', $data);
    }

    public function postAddPlan(Request $request)
    {
        // TODO check validation
        $planName = $request->planName;
        $planType = $request->planType;
        $planPublic = ($request->has('public')) ? true : false;

        $planId = $this->Ibportal->addPlan($planName, $planType, $planPublic);

        if ($request->has('selectedSymbols') && $planId > 0) {
            $selectedSymbols = $request->selectedSymbols;
            $symbolsType = $request->symbolsType;
            $symbolsValue = $request->symbolsValue;
            $this->Ibportal->addPlanSymbols($planId, $selectedSymbols, $symbolsType, $symbolsValue);
        }

        if ($planId > 0) {
            return Redirect::route('admin.ibportal.planeList');
        } else {
            return redirect()->back()->withErrors(trans('ibportal::ibportal.no_thing_added'));
        }
    }


    public function getDeletePlan(Request $request)
    {


        $result = $this->Ibportal->deletePlan($request->delete_id);
        return Redirect::route('admin.ibportal.planeList')->withErrors($result);

    }

    public function getDetailsPlan(Request $request)
    {


        $oPlanDetails = $this->Ibportal->getPlanDetails($request->edit_id);

        return view('ibportal::admin.detailsPlan')
            ->with('oPlanDetails', $oPlanDetails->first());
    }

    public function getAssignPlan(Request $request)
    {


		$oPlanDetails = $this->Ibportal->getPlanDetails($request->planId);
		$users= $this->Users->getUsersNames();
		$selectedUsers=$this->Ibportal->getPlanAssignedUsers($request->planId,$users);
		return view('ibportal::admin.assignPlan')
			->with('planId',$request->planId)
			->with('oPlanDetails',$oPlanDetails->first())
			->with('users',$users)
			->with('selectedUsers',$selectedUsers);
	}

	public function postAssignPlan(Request $request)
	{
		$selectedUsers=$request->selectedUsers;
		$planId=$request->planId;

		$assignResult=$this->Ibportal->assignUsersToPlan($planId,$selectedUsers);

		if($assignResult){
			return Redirect::route('admin.ibportal.planeList');
		}else{
// TODO translate this error
			return redirect()->back()->withErrors('Error, please try again.');
		}
	}


    public function getAliasesList(Request $oRequest)
    {


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


            $oResults = $this->Ibportal->getAliasesByFilters($aFilterParams, false, $sOrder, $sSort);


        }
        return view('ibportal::admin.aliasesList')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAddAliases()
    {

        $oSymbolsResults = $this->Ibportal->getSymbols();

        $data = [
            'symbols' => $oSymbolsResults,
            'operands' => ['Equals' => 'Equals', 'Starts With' => 'Starts With', 'Ends With' => 'Ends With', 'Contains' => 'Contains'],
            'aliases' => $this->Ibportal->getAliases(),
        ];


        return view('ibportal::admin.addAliases')->with('data', $data);

    }


    public function postAddAliases(Request $oRequest)
    {
        $alias = $oRequest->alias;
        $operand = $oRequest->operand;
        $value = $oRequest->value;
        $bResults = $this->Ibportal->addAlias($alias, $operand, $value);

        if ($bResults) {
            return Redirect::route('admin.ibportal.aliasesList');
        } else {
            return redirect()->back()->withErrors(trans('ibportal::ibportal.no_thing_added'));
        }
    }

}