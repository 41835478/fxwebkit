<?php namespace Modules\Ibportal\Http\Controllers\admin;

use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;

use Fxweb\Repositories\Admin\User\UserContract as Users;
use Illuminate\Support\Facades\Config;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;

class IbportalController extends Controller
{

    public function index()
    {
        return view('Ibportal::index');
    }

    protected $Mt4Configrations;
    protected $Ibportal;
    protected $Users;

    public function __construct(
        Mt4Configrations $Mt4Configrations, Ibportal $Ibportal, Users $Users
    )
    {
        $this->Ibportal = $Ibportal;
        $this->Mt4Configrations = $Mt4Configrations;
        $this->Users = $Users;
    }


    public function getPlansList(Request $oRequest)
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
            return Redirect::route('admin.ibportal.plansList');
        } else {
            return redirect()->back()->withErrors(trans('ibportal::ibportal.no_thing_added'));
        }
    }


    public function getDeletePlan(Request $request)
    {
        $result = $this->Ibportal->deletePlan($request->delete_id);
        return Redirect::route('admin.ibportal.plansList')->withErrors($result);
    }

    public function getDetailPlan(Request $request)
    {


        $oPlanDetails = $this->Ibportal->getPlanDetails($request->edit_id);

        return view('ibportal::admin.detailsPlan')
            ->with('oPlanDetails', $oPlanDetails->first());
    }

    public function getAssignPlan(Request $request)
    {


        $oPlanDetails = $this->Ibportal->getPlanDetails($request->planId);
        $users = $this->Users->getUsersNames();
        $selectedUsers = $this->Ibportal->getPlanAssignedUsers($request->planId, $users);

        return view('ibportal::admin.assignPlan')
            ->with('planId', $request->planId)
            ->with('oPlanDetails', $oPlanDetails->first())
            ->with('users', $users)
            ->with('selectedUsers', $selectedUsers);
    }

    public function postAssignPlan(Request $request)
    {
        $selectedUsers = $request->selectedUsers;
        $planId = $request->planId;

        $assignResult = $this->Ibportal->assignUsersToPlan($planId, $selectedUsers);

        if ($assignResult) {
            return Redirect::route('admin.ibportal.plansList');
        } else {
            return redirect()->back()->withErrors(trans('ibportal::ibportal.error_please'));
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
            'value' => $oSymbolsResults
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

    public function getAgentList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->Users->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        }

        return view('ibportal::admin.agentList')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAgentUsers(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $agentId = ($oRequest->agentId) ? $oRequest->agentId : '';
        $oResults = null;
        $aFilterParams = [
            'agent_id' => $agentId,
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['agent_id'] = $agentId;
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->Users->getAgentUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role, $agentId);

        }

        return view('ibportal::admin.agent_users')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }

    public function getAgentPlans(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $agentId = ($oRequest->agentId) ? $oRequest->agentId : '';
        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
            'agentId' => $agentId,
        ];


        if ($oRequest->has('search')) {


            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Ibportal->getClientPlansByFilters($aFilterParams, false, $sOrder, $sSort, $agentId);


        }


        return view('ibportal::admin.agent_plan_list')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAssignAgentPlan(Request $request)
    {
        $oPlanDetails = $this->Ibportal->getPlanDetails($request->planId);
        $users = $this->Users->getUsersNames();
        $selectedUsers = $this->Ibportal->getAgentAssignedUsers($request->agentId, $users);

        return view('ibportal::admin.assignAgentPlan')
            ->with('planId', $request->planId)
            ->with('agentId', $request->agentId)
            ->with('oPlanDetails', $oPlanDetails->first())
            ->with('users', $users)
            ->with('selectedUsers', $selectedUsers);
    }

    public function postAssignAgentPlan(Request $request)
    {
        $selectedUsers = $request->selectedUsers;
        $planId = $request->planId;
        $agentId = $request->agentId;

        $assignResult = $this->Ibportal->assignUsersToAgent($agentId, $planId, $selectedUsers);

        if ($assignResult) {
            return Redirect::to(route('admin.ibportal.agentPlans') . '?agentId=' . $agentId);
        } else {

            return redirect()->back()->withErrors(trans('ibportal::ibportal.error_please'));
        }
    }


}