<?php namespace Modules\Ibportal\Http\Controllers\admin;

use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;
use Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract as Mt4Group;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;

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
    protected $oMt4Group;
    protected $oMt4Trade;

    public function __construct(
        Mt4Configrations $Mt4Configrations, Ibportal $Ibportal, Users $Users, Mt4Group $oMt4Group, Mt4Trade $oMt4Trade
    )
    {
        $this->Ibportal = $Ibportal;
        $this->Mt4Configrations = $Mt4Configrations;
        $this->Users = $Users;
        $this->oMt4Group = $oMt4Group;
        $this->oMt4Trade = $oMt4Trade;
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
            // TODO [mohammad] get agent list

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

    public function getAgentCommission(Request $oRequest)
    {
        $oGroups = $this->oMt4Group->getAllGroups();
        $oSymbols = $this->oMt4Trade->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getTradesTypes();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
        $aGroups = [];
        $aSymbols = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'from_date' => '',
            'to_date' => '',
            'all_groups' => true,
            'group' => '',
            'all_symbols' => true,
            'symbol' => '',
            'type' => '',
            'sort' => 'ASC',
            'order' => 'TICKET',
        ];

        foreach ($oGroups as $oGroup) {
            $aGroups[$oGroup->group] = $oGroup->group;
        }

        foreach ($oSymbols as $oSymbol) {
            $aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
        }

        foreach ($aTradeTypes as $sKey => $sValue) {
            $aTradeTypes[$sKey] = trans('general.' . $sValue);
        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
        }

        if ($oRequest->has('export')) {
            $oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, true, $sOrder, $sSort);
            $sOutput = $oRequest->export;
            $aData = [];
            $aHeaders = [
                trans('reports::reports.Order#'),
                trans('reports::reports.Login'),
                trans('reports::reports.Symbol'),
                trans('reports::reports.Type'),
                trans('reports::reports.Lots'),
                trans('reports::reports.OpenPrice'),
                trans('reports::reports.SL'),
                trans('reports::reports.TP'),
                trans('reports::reports.Commission'),
                trans('reports::reports.Swaps'),
                trans('reports::reports.Price'),
                trans('reports::reports.Profit'),
            ];

            foreach ($oResults as $oResult) {
                $aData[] = [
                    $oResult->TICKET,
                    $oResult->LOGIN,
                    $oResult->SYMBOL,
                    $oResult->TYPE,
                    $oResult->VOLUME,
                    $oResult->OPEN_PRICE,
                    $oResult->SL,
                    $oResult->TP,
                    $oResult->COMMISSION,
                    $oResult->SWAPS,
                    $oResult->CLOSE_PRICE,
                    $oResult->PROFIT,
                ];
            }
            $oExport = new Export($aHeaders, $aData);
            return $oExport->export($sOutput);
        }

        if ($oRequest->has('search')) {
            $oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }

        $data = [
            'agentName' => $this->Ibportal->getAgentName(),
            'planName' => [],
            'mt4UsresName' => [],
            'usresName' =>[],


        ];


        return view('ibportal::admin.closedOrders')
            ->with('aGroups', $aGroups)
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('data', $data)
            ->with('aFilterParams', $aFilterParams);
    }

    public function postAgentName(Request $oRequest)
    {
        $oResults = $this->Ibportal->getAgentName();
        dd($oResults);
    }

    public function postPlanName(Request $oRequest)

    {

        if(isset($oRequest['aData']) ){
            $oResults= $this->Ibportal->getPlansName($oRequest['aData']);

            foreach($oResults as $key=>$result){
                echo '<option value="'.$key.'">'.$result.'</option>';
            }
        }
        dd();
    }

    public function postMt4UsersName(Request $oRequest)
    {

        if(isset($oRequest['aData']) ){
            $oResults= $this->Ibportal->getMt4UsersName($oRequest['aData']);

            foreach($oResults as $key=>$result){
                echo '<option value="'.$key.'">'.$result.'</option>';
            }
        }
        dd();

    }


    public function postUsersName(Request $oRequest)
    {

        if(isset($oRequest['aData']) ){
            $oResults= $this->Ibportal->getUsersName($oRequest['aData']);

            foreach($oResults as $key=>$result){
                echo '<option value="'.$key.'">'.$result.'</option>';
            }
        }
        dd();

    }


}