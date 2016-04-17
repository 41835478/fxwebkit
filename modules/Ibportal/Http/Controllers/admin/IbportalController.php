<?php namespace Modules\Ibportal\Http\Controllers\admin;

use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;
use Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract as Mt4Group;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Modules\Accounts\Http\Controllers\ApiController;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Illuminate\Support\Facades\Config;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Fxweb\Http\Controllers\admin\EditConfigController as EditConfig;
use Modules\Ibportal\Entities\IbportalUserIbid as UserIbid;
use Modules\Ibportal\Entities\IbportalAgentUser as AgentUser;

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
            'symbolTypes' => ['Money' => 'Money', 'Point' => 'Point', 'Percentage' => 'Percentage'],
            'aliases' => $this->Ibportal->getAliases(),
        ];


        return view('ibportal::admin.addPlan')->with('data', $data);
    }

    public function postAddPlan(Request $request)
    {
        // TODO check validation
        $planName = $request->planName;
        $planPublic = ($request->has('public')) ? true : false;

        $planId = $this->Ibportal->addPlan($planName,  $planPublic);

        if ($request->has('selectedSymbols') && $planId > 0) {
            $selectedSymbols = $request->selectedSymbols;
            $symbolsValue = $request->symbolsValue;
            $symbolsType = $request->symbolsType;
            $this->Ibportal->addPlanSymbols($planId, $selectedSymbols,  $symbolsValue,$symbolsType);
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
        /* TODO with success */
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
        /* TODO with success */
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
        $agents= $this->Ibportal->getAgents();
        $agent=($oRequest->agents)?$oRequest->agents:1;

        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'agents' => 1,
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        if ($oRequest->has('search')) {

            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['agents'] = $agent;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

               }
        $role = explode(',', Config::get('fxweb.client_default_role'));
        $oResults = $this->Users->getAgentUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        return view('ibportal::admin.agentList')
            ->with('oResults', $oResults)
            ->with('agents',$agents)
            ->with('agent',$agent)
            ->with('aFilterParams', $aFilterParams);
    }



    public function getPlanUserstList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $plan_id=($oRequest->plan_id)?$oRequest->plan_id:1;

        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'plan_id' => $plan_id,
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        if ($oRequest->has('search')) {

            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['plan_id'] = $plan_id;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

        }

        $oResults = $this->Users->getPlanUsersByFilter($aFilterParams, false, $sOrder, $sSort, 'client');

        return view('ibportal::admin.planUsersList')
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

            $oResults = $this->Users->getClientAgentUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

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
            /* TODO with success */
            return redirect()->back()->withErrors(trans('ibportal::ibportal.error_please'));
        }
    }

    public function getAgentCommission(Request $oRequest)
    {

        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'agentName' => [],
            'planName' => [],
            'usresName' => [],
            'mt4UsresName' => [],
            'server_id' => '',
            'sort' => 'ASC',
            'order' => 'TICKET',
        ];


        if ($oRequest->has('search')) {

            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['agentName'] = $oRequest->agentName;
            $aFilterParams['planName'] = $oRequest->planName;
            $aFilterParams['usresName'] = $oRequest->usresName;
            $aFilterParams['mt4UsresName'] = $oRequest->mt4UsresName;
            $aFilterParams['server_id'] = $oRequest->server_id;

        }

        $totalCommission = 0;

        if ($oRequest->has('search')) {

            list($oResults, $totalCommission) = $this->Ibportal->getAgentCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }
        $data = [
            'agentName' => $this->Ibportal->getAgentName(),
            'planName' => [],
            'mt4UsresName' => [],
            'usresName' => [],
        ];

        return view('ibportal::admin.agentCommission')
            ->with('oResults', $oResults)
            ->with('agent_id', $oRequest->agentId)
            ->with('data', $data)
            ->with('serverTypes', $serverTypes)
            ->with('totalCommission', $totalCommission)
            ->with('aFilterParams', $aFilterParams);
    }

    public function postAgentName(Request $oRequest)
    {
        $oResults = $this->Ibportal->getAgentName();
        dd($oResults);
    }

    public function postPlanName(Request $oRequest)

    {

        if (isset($oRequest['agents'])) {
            $oResults = $this->Ibportal->getPlansName($oRequest['agents']);

            foreach ($oResults as $key => $result) {
                echo '<option value="' . $key . '">' . $result . '</option>';
            }
        }
        dd();
    }

    public function postMt4UsersName(Request $oRequest)
    {

        if (isset($oRequest['users'])) {
            $oResults = $this->Ibportal->getMt4UsersName($oRequest['users']);

            foreach ($oResults as $key => $result) {
                echo '<option value="' . $key . '">' . $result . '</option>';
            }
        }
        dd();

    }


    public function postUsersName(Request $oRequest)
    {

        if (isset($oRequest['plans']) && isset($oRequest['agents'])) {
            $oResults = $this->Ibportal->getUsersName($oRequest['agents'], $oRequest['plans']);

            foreach ($oResults as $key => $result) {
                echo '<option value="' . $key . '">' . $result . '</option>';
            }
        }
        dd();

    }


    public function getAgentsCommission(Request $oRequest)
    {

        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'agentName' => [],
            'planName' => [],
            'usresName' => [],
            'mt4UsresName' => [],
            'server_id' => '',
            'sort' => 'ASC',
            'order' => 'TICKET',
        ];


        if ($oRequest->has('search')) {

            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['agentName'] = $oRequest->agentName;
            $aFilterParams['planName'] = $oRequest->planName;
            $aFilterParams['usresName'] = $oRequest->usresName;
            $aFilterParams['mt4UsresName'] = $oRequest->mt4UsresName;
            $aFilterParams['server_id'] = $oRequest->server_id;

        }

        $totalCommission = 0;

        if ($oRequest->has('search')) {

            list($oResults, $totalCommission) = $this->Ibportal->getAgentCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }
        $data = [
            'agentName' => $this->Ibportal->getAgentName(),
            'planName' => [],
            'mt4UsresName' => [],
            'usresName' => [],
        ];

        return view('ibportal::admin.agentsCommission')
            ->with('oResults', $oResults)
            ->with('data', $data)
            ->with('totalCommission', $totalCommission)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);

    }

    public function getEditPlan(Request $request)
    {
        $oPlanDetails = $this->Ibportal->getPlanDetails($request->edit_id);

        $aliases = $this->Ibportal->getAliases();

        foreach ($oPlanDetails->first()->aliases as $aliase) {

            if (!isset($aliases[$aliase->id])) continue;
            unset($aliases[$aliase->id]);
        }


        $data = [
            'name' => '',
            'planTypes' => ['Commission' => 'Commission', 'Rebate' => 'Rebate'],
            'symbolTypes' => ['Money' => 'Money', 'Point' => 'Point', 'Percentage' => 'Percentage'],
            'aliases' => $aliases,
        ];


        return view('ibportal::admin.editPlan')
            ->with('oPlanDetails', $oPlanDetails->first())->with('data', $data);
    }

    public function postEditPlan(Request $request)
    {
        // TODO check validation
        $planId = $request->plan_id;
        $planName = $request->planName;
        $planType = $request->planType;
        $planPublic = ($request->has('public')) ? true : false;

        $editResult = $this->Ibportal->editPlan($planId, $planName, $planType, $planPublic);

        if ($request->has('selectedSymbols') && $editResult) {
            $selectedSymbols = $request->selectedSymbols;
            $symbolsType = $request->symbolsType;
            $symbolsValue = $request->symbolsValue;
            $this->Ibportal->editPlanSymbols($planId, $selectedSymbols, $symbolsType, $symbolsValue);
        }

        if ($planId > 0) {
            return Redirect::route('admin.ibportal.plansList');
        } else {
            return redirect()->back()->withErrors(trans('ibportal::ibportal.no_thing_added'));
        }
    }

    public function getIbportalSettings(Request $oRequest)
    {

        $ibportalSetting = [

            'agreemment' => Config('ibportal.agreemment'),
            'is_client' => Config('ibportal.is_client'),
            'allowAgentTransferToAll'=> Config('ibportal.allowAgentTransferToAll'),
            'allowAgentTransferToHisAgentUsers'=> Config('ibportal.allowAgentTransferToHisAgentUsers'),
            'allowAgentTransferToHisAgent'=> Config('ibportal.allowAgentTransferToHisAgent')

        ];

        return view('ibportal::admin.ibportalSetting')->with('ibportalSetting', $ibportalSetting);

    }

    public function postIbportalSettings(Request $oRequest)
    {
        $is_client = ($oRequest->is_client) ? 1 : 0;
        $ibportalSetting = [

            'agreemment' => $oRequest->agreemment,
            'is_client' => $is_client,
            'allowAgentTransferToAll'=> ($oRequest->allowAgentTransferToAll)? 1:0,
            'allowAgentTransferToHisAgentUsers'=> ($oRequest->allowAgentTransferToHisAgentUsers)? 1:0,
            'allowAgentTransferToHisAgent'=> ($oRequest->allowAgentTransferToHisAgent)? 1:0


        ];

        $editConfig = new EditConfig();
        $editConfig->editConfigFile('modules/Ibportal/Config/config.php', $ibportalSetting);

        return view('ibportal::admin.ibportalSetting')->with('ibportalSetting', $ibportalSetting);

    }

    public function getAddAgents(Request $oRequest)
    {

        $assAgents = $this->Ibportal->generateUserIbId($oRequest->agentId);
        if ($assAgents) {
            return Redirect::route('admin.ibportal.agentList')->withErrors(trans('ibportal::ibportal.the_account'));
        } else {
            return Redirect::route('admin.ibportal.agentList')->withErrors('ibportal::ibportal.error_please');
        }


    }

    /*TODO [moayd] please do the same for client area*/
    public function getAssignAgents(Request $oRequest)
    {

        $agentId = $oRequest->agentId;

        $result=$this->Ibportal->getAssignAgents($agentId);

        $userInfo = [
            'login' => $result,
            'password' => '',
        ];


        return view('ibportal::admin.addAgents')->with('userInfo', $userInfo)->with('agentId', $agentId);
    }

    public function postAssignAgents(Request $oRequest)
    {

//        $oApiController = new ApiController();

//        $result = $oApiController->AssignAgents($oRequest['login'], $oRequest['password']);

//        if ($result === true) {
            $asign_result = $this->Ibportal->assignMt4Agents($oRequest->agentId, $oRequest->login);
            return $this->getAssignAgents($oRequest)->withErrors('The User has been assigned successfully');

//        } else {
//            return view('ibportal::admin.addAgents')
//                ->with('agentId', $oRequest->agentId)
//                ->with('userInfo', ['login' => $oRequest['login'], 'password' => $oRequest['password']])->withErrors($result);
//        }
    }

    public function getAgentMoney(Request $oRequest)
    {
       $agentId=($oRequest->has('agentId'))?  $oRequest->agentId:'';
        $login=UserIbid::select('login')->where('user_id',$agentId)->first();

    $login=($login)? $login->login:0;

        $oSymbols = $this->Ibportal->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->Ibportal->getAgentCommissionTypes();
        $serverTypes = $this->Ibportal->getServerTypes();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
        $aGroups = [];
        $aSymbols = [];
        $oResults = null;
        $aFilterParams = [
            'login' => $login,
            'from_date' => '',
            'to_date' => '',
            'type' => '',
            'all_groups' => true,
            'group' => '',
            'all_symbols' => true,
            'symbol' => '',
            'sort' => 'ASC',
            'order' => 'TICKET',
            'agentId' => $agentId
        ];


        foreach ($oSymbols as $oSymbol) {
            $aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
        }

        foreach ($aTradeTypes as $sKey => $sValue) {
            $aTradeTypes[$sKey] = trans('general.' . $sValue);
        }
        if ($oRequest->has('search')) {
            $aFilterParams['login'] = $login;
            $aFilterParams['agentId'] = $agentId;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = [];
            $aFilterParams['type'] = $oRequest->type;
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
        }

        if ($oRequest->has('search') ) {

            $oResults = $this->Ibportal->getAgentsAccountantByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];
        }

        return view('ibportal::admin.ibportalAgentMoney')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);

    }

    public function getSummary(Request $oRequest)
    {
        $clientId = $oRequest->agentId;

        list($horizontal_line_numbers, $balance_array, $balance, $statistics,$commission_horizontal_line_numbers,
        $commission_array) = $this->Ibportal->getAgentStatistics($clientId);

        return view('ibportal::admin.summary',
            [
                'horizontal_line_numbers' => $horizontal_line_numbers,
                'balance_array' => $balance_array,
                'balance' => $balance,
           'commission_horizontal_line_numbers'=> $commission_horizontal_line_numbers,
                'commission_array'=>$commission_array
            ])->withStatistics($statistics);
    }



    public function getAssignUsresAgent(Request $oRequest)
    {
        $agent_id = ($oRequest->agent_id) ? $oRequest->agent_id : '';



        $aPlansFilterParams = ['name' => '','sort' => 'desc','order' =>  'id','agentId' => $agent_id,'plan_id'];

        $oPlans = $this->Ibportal->getClientPlansByFilters($aPlansFilterParams, false, 'id', 'desc', $agent_id);

        $aPlans=[];
        $firstPlan=0;

        foreach($oPlans as $plan){
            if($firstPlan==0){$firstPlan=$plan->id;}
            $aPlans[$plan->id]=$plan->name;

        }

        $plan_id = ($oRequest->plan_id) ? $oRequest->plan_id : $firstPlan;

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;



        $aFilterParams = [
            'id'=>'',
            'agent_id' => $agent_id,
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
            'signed' => 0,
            'plan_id'=>$plan_id
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['agent_id'] =$agent_id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['signed'] = $oRequest->signed;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;



        }

        $oResults = $this->Ibportal->getAssignUsresToAgent($aFilterParams, false, $sOrder, $sSort);





        return view('ibportal::admin.assignUsresToAgent')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams)
            ->with('aPlans',$aPlans)
            ->with('plan_id',$plan_id)
            ->with('aActive',[
                    trans('accounts::accounts.all'),
                    trans('accounts::accounts.active'),
                    trans('accounts::accounts.notActive')
                ]
            );
    }

    public function postAssignUsresAgent(Request $oRequest)
    {

        if ($oRequest->has('asign_mt4_users_submit') || $oRequest->has('asign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('asign_mt4_users_submit_id')) ? [$oRequest->get('asign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $agent_id = $oRequest->agent_id;

            $this->assignNewUserToAgent($agent_id, $users_checkbox,$oRequest->plan_id);



        }

        if ($oRequest->has('un_sign_mt4_users_submit') || $oRequest->has('un_sign_mt4_users_submit_id')) {

            $users_checkbox = ($oRequest->has('un_sign_mt4_users_submit_id')) ? [$oRequest->get('un_sign_mt4_users_submit_id')] : $oRequest->users_checkbox;

            $agent_id = $oRequest->agent_id;
            $this->unassignNewUserToAgent($agent_id, $users_checkbox,$oRequest->plan_id);




        }

        return $this->getAssignUsresAgent($oRequest);
    }


    private function assignNewUserToAgent($agentId, $aUserId, $planId)
    {
if(empty($aUserId)) return false;
        $aUserId=(is_array($aUserId))?$aUserId:[$aUserId];

        $rows=[];
        foreach($aUserId as $userId){

            $exist=AgentUser::where([
                'agent_id' => $agentId,
                'user_id' => $userId])->first();


            if(!$exist){

                $data=[
                'agent_id' => $agentId,
                'user_id' => $userId,
                'plan_id' => $planId];
                AgentUser::create($data);
            }
        }






    }


    private function unassignNewUserToAgent($agentId, $aUserId, $planId)
    {
        if(empty($aUserId)) return false;
        $aUserId=(is_array($aUserId))?$aUserId:[$aUserId];


        foreach($aUserId as $userId){
//            $result= AgentUser::where(['agent_id'=>$agentId,'user_id'=>$userId,'plan_id'=>$planId])->first();
            $result= AgentUser::where(['agent_id'=>$agentId,'user_id'=>$userId])->first();
            if($result){
                $result->delete();
            }
        }





    }



}