<?php

namespace Modules\Ibportal\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\Ibportal\Entities\IbportalPlan as Plan;
use Modules\Ibportal\Entities\IbportalPlanAliases as PlanAliases;
use Modules\Ibportal\Entities\IbportalAliases as Aliases;
use Modules\Ibportal\Entities\IbportalPlanUsers as PlanUsers;
use Modules\Mt4Configrations\Entities\ConfigrationsSymbols as Symbols;
use Modules\Ibportal\Entities\IbportalUserIbid as UserIbid;
use Modules\Ibportal\Entities\IbportalAgentUser as AgentUser;

use Fxweb\Models\Mt4User;
use Fxweb\Models\User;
use Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Ibportal\Entities\IbportalAgentsCommission as AgentsCommission;
use Fxweb\Helpers\Fx;
use Fxweb\Models\Mt4ClosedBalance;
use Fxweb\Models\Mt4Closed;
use Fxweb\Models\Mt4ClosedActualBalance;
use Modules\Accounts\Entities\mt4_users_users;
use Illuminate\Support\Facades\DB;

class EloquentIbportalContractRepository implements IbportalContract
{

    /**
     */
    public function __construct()
    {
        //
    }


    function editConfigFile($filePath, $variables)
    {

//$config = new Larapack\ConfigWriter\Repository('modules/Accounts/Config/config.php'); // loading the config from config/app.php
//        $config = new Larapack\ConfigWriter\Repository('Config/fxweb.php'); // loading the config from config/app.php
        $config = new \Larapack\ConfigWriter\Repository($filePath);

        if (count($variables)) {
            foreach ($variables as $key => $value) {
                $config->set($key, $value);
            }
        }
        $config->save();
    }

    public function getPlansByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Plan();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function getClientPlansByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $clientID)
    {

        $oResult = Plan::with('users')->whereHas('users', function ($query) use ($clientID) {
            $query->where('user_id', $clientID);
        });

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function addPlan($planName, $planType, $public)
    {
        $planId = Plan::create([
            'name' => $planName,
            'type' => $planType,
            'public' => $public
        ]);

        if ($public) {
            $agents = UserIbid::select('user_id')->get();
            $assignPlanUsers = [];
            foreach ($agents as $agent) {
                $assignPlanUsers[] = ['user_id' => $agent->user_id, 'plan_id' => $planId->id];
            }
            PlanUsers::insert($assignPlanUsers);
        }
        return $planId->id;

    }

    public function addPlanSymbols($planId, $symbols = [], $symbolsType = 0, $symbolsValue = 0)
    {
        for ($i = 0; $i < count($symbols); $i++) {
            PlanAliases::create([
                'plan_id' => $planId,
                'alias_id' => $symbols[$i],
                'type' => $symbolsType[$i],
                'value' => $symbolsValue[$i],
            ]);
        }

    }

    public function getAliases()
    {
        $oAliases = Aliases::select(['id', 'alias'])->get();
        $aAliases = [];
        foreach ($oAliases as $alias) {
            $aAliases[$alias->id] = $alias->alias;
        }
        return $aAliases;
    }


    public function deletePlan($id)
    {

        $id = (is_array($id)) ? $id : [$id];
        $plan = Plan::whereIn('id', $id)->delete();


        if ($plan) {
            return [trans('ibportal::ibportal.deleted_successfully_message')];
        } else {
            return [trans('ibportal::ibportal.deleted_faild_message')];
        }
    }

    public function getPlanDetails($planId)
    {

        $planDetails = Plan::with('aliases')->where('id', $planId)->get();

        return $planDetails;
    }


    public function getAliasesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Aliases();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('alias', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function addAlias($alias, $operand, $value)
    {

        $result = Aliases::create(['alias' => $alias,
            'operand' => $operand,
            'value' => $value]);

        return ($result) ? true : false;
    }

    public function getPlanAssignedUsers($planId, &$users)
    {

        $oResult = PlanUsers::select('user_id')->where('plan_id', $planId)->get();

        $assignedUsers = [];
        foreach ($oResult as $result) {
            if (!isset($users[$result->user_id])) continue;
            $assignedUsers[$result->user_id] = $users[$result->user_id];
            unset($users[$result->user_id]);
        }
        return $assignedUsers;
    }

    public function getAgentAssignedUsers($agentId, &$users)
    {

        $oResult = AgentUser::select('user_id')->where('agent_id', $agentId)->get();

        $assignedUsers = [];
        foreach ($oResult as $result) {
            if (!isset($users[$result->user_id])) continue;
            $assignedUsers[$result->user_id] = $users[$result->user_id];
            unset($users[$result->user_id]);
        }
        return $assignedUsers;
    }

    public function assignUsersToPlan($planId, $selectedUsers)
    {
        $deleteResult = PlanUsers::where('plan_id', $planId)->delete();
        $insertResult = false;
        if (!empty($selectedUsers)) {
            $users = [];
            foreach ($selectedUsers as $user) {
                $users[] = ['plan_id' => $planId, 'user_id' => $user];
            }

            $insertResult = PlanUsers::insert($users);
        } else {
            $insertResult = true;
        }

        return ($insertResult) ? true : false;
    }

    public function assignUsersToAgent($agentId, $planId, $selectedUsers)
    {

        $deleteResult = AgentUser::where('agent_id', $agentId)->delete();
        $insertResult = false;
        if (!empty($selectedUsers)) {
            $users = [];
            foreach ($selectedUsers as $user) {
                $users[] = ['agent_id' => $agentId, 'user_id' => $user, 'plan_id' => $planId];
            }

            $insertResult = AgentUser::insert($users);
        } else {
            $insertResult = true;
        }

        return ($insertResult) ? true : false;
    }


    public function getSymbols()
    {

        $aSymbols = Symbols::select('symbol')->distinct()->get()->toArray();

        $symbolsJavaArray = [];
        foreach ($aSymbols as $key => $symbols) {

            $symbolsJavaArray[] = '"' . $symbols['symbol'] . '"';
        }

        $symbolsJavaArray = join(',', $symbolsJavaArray);

        return $symbolsJavaArray;
    }

    public function generateUserIbId($userId)
    {
        $IbId = Hash::make($userId);

        $insertResult = UserIbid::create(['user_id' => $userId, 'user_ibid' => $IbId]);


        if (count($insertResult)) {
            $planResult = Plan::where('public', true)->get();
            $aPublicPlans = [];
            foreach ($planResult as $plan) {
                $aPublicPlans[] = ['plan_id' => $plan->id, 'user_id' => $userId];
            }
            $assignPublicPlansResult = PlanUsers::insert($aPublicPlans);

        }
        return $insertResult;
    }

    public function getAgentName()
    {
        $oResult = User::get();
        $aPublicUsers = [];
        foreach ($oResult as $Users) {
            $aPublicUsers[$Users->id] = $Users->first_name . $Users->last_name;
        }
        return ($aPublicUsers);

    }

    public function getPlansName($agents = [])
    {
        $oResult = Plan::with('users')->whereHas('users', function ($query) use ($agents) {
            $query->whereIn('user_id', $agents);
        });

        $oResult = $oResult->get();

        $aPublicPlans = [];
        if ($oResult) {
            foreach ($oResult as $plan) {
                $aPublicPlans[$plan->id] = $plan->name;
            }
        }
        return $aPublicPlans;
    }


    public function getUsersName($agents = [], $plans = [])
    {
        $oResult = User::with('agentPlan')->whereHas('agentPlan', function ($query) use ($plans, $agents) {
            $query->whereIn('plan_id', $plans);
            $query->whereIn('agent_id', $agents);
        });

        $oResult = $oResult->get();

        $aPublicUsers = [];
        foreach ($oResult as $Users) {
            $aPublicUsers[$Users->id] = $Users->first_name . $Users->last_name;
        }
        return ($aPublicUsers);
    }

    public function getMt4UsersName($users = [])
    {
        $oResult = Mt4User::with('accounts')->whereHas('accounts', function ($query) use ($users) {
            $query->whereIn('id', $users);
        });

        $oResult = $oResult->get();

        $aPublicMt4Users = [];
        foreach ($oResult as $mt4Users) {
            $aPublicMt4Users[$mt4Users->LOGIN] = $mt4Users->NAME;
        }
        return ($aPublicMt4Users);
    }


    public function getAgentCommissionByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC')
    {

        $oResult = AgentsCommission::with('trade');


        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('id_mt4_user', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('id_mt4_user', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('id_mt4_user', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

//        if (isset($aFilters['server_id']) &&in_array($aFilters['server_id'],[0,1])) {
//
//            $oResult = $oResult->where('server_id',$aFilters['server_id']);
//        }

        /*=================== agents=================*/
        if (isset($aFilters['agentName']) && count($aFilters['agentName'])) {
            $oResult->whereIn('agent_id', $aFilters['agentName']);
        }
        /*=================== agents=================*/
        if (isset($aFilters['planName']) && count($aFilters['planName'])) {
            $oResult->whereIn('plan_id', $aFilters['planName']);
        }
        /*=================== agents=================*/
        if (isset($aFilters['usresName']) && count($aFilters['usresName'])) {
            $oResult->whereIn('id_user', $aFilters['usresName']);
        }
        /*=================== agents=================*/
        if (isset($aFilters['mt4UsresName']) && count($aFilters['mt4UsresName'])) {
            $oResult->whereIn('id_mt4_user', $aFilters['mt4UsresName']);
        }

        $totalCommission = clone $oResult;


        $totalCommission = $totalCommission->sum('commission_agent');
        $oFxHelper = new Fx();


        $oResult = $oResult->orderBy($sOrderBy, $sSort);



        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

        } else {
            $oResult = $oResult->get();

        }


        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type

            $commission = $oValue->commission_agent;
            $oResult[$dKey] = $oResult[$dKey]->trade->first();
            $oValue = $oResult[$dKey];
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($commission, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $digits = 5;//$oResult[$dKey]->Mt4Prices()->first()->DIGITS;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);

        }

        return [$oResult, $totalCommission];
    }

    public function getClientAgentName()
    {
        $oResult = User::get();
        $aPublicUsers = [];
        foreach ($oResult as $Users) {
            $aPublicUsers[$Users->id] = $Users->first_name . $Users->last_name;
        }
        return ($aPublicUsers);

    }

    public function getClientPlansName($agents = [])
    {
        $oResult = Plan::with('users')->whereHas('users', function ($query) use ($agents) {
            $query->whereIn('user_id', $agents);
        });

        $oResult = $oResult->get();

        $aPublicPlans = [];
        if ($oResult) {
            foreach ($oResult as $plan) {
                $aPublicPlans[$plan->id] = $plan->name;
            }
        }
        return $aPublicPlans;
    }


    public function getClientUsersName($agents = [], $plans = [])
    {
        $oResult = User::with('agentPlan')->whereHas('agentPlan', function ($query) use ($plans, $agents) {
            $query->whereIn('plan_id', $plans);
            $query->whereIn('agent_id', $agents);
        });

        $oResult = $oResult->get();

        $aPublicUsers = [];
        foreach ($oResult as $Users) {
            $aPublicUsers[$Users->id] = $Users->first_name . $Users->last_name;
        }
        return ($aPublicUsers);
    }

    public function getClientMt4UsersName($users = [])
    {
        $oResult = Mt4User::with('accounts')->whereHas('accounts', function ($query) use ($users) {
            $query->whereIn('id', $users);
        });

        $oResult = $oResult->get();

        $aPublicMt4Users = [];
        foreach ($oResult as $mt4Users) {
            $aPublicMt4Users[$mt4Users->LOGIN] = $mt4Users->NAME;
        }
        return ($aPublicMt4Users);
    }

    public function editPlan($planId, $planName, $planType, $public)
    {
        $plan = Plan::find($planId);
        $plan->name = $planName;
        $plan->type = $planType;
        $plan->public = $public;

        $plan->save();


        if ($public) {
            $agents = UserIbid::select('user_id')->get();
            $assignPlanUsers = [];
            foreach ($agents as $agent) {
                $assignPlanUsers[] = ['user_id' => $agent->user_id, 'plan_id' => $plan->id];
            }
            PlanUsers::insert($assignPlanUsers);
        } else {
            PlanUsers::where('plan_id', $plan->id)->delete();
        }
        return $plan->id;

    }


    public function editPlanSymbols($planId, $symbols = [], $symbolsType = 0, $symbolsValue = 0)
    {
        PlanAliases::where('plan_id', $planId)->delete();

        for ($i = 0; $i < count($symbols); $i++) {
            PlanAliases::create([
                'plan_id' => $planId,
                'alias_id' => $symbols[$i],
                'type' => $symbolsType[$i],
                'value' => $symbolsValue[$i],
            ]);
        }

    }



    public function getAgentUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin')
    {

        $oRole = Sentinel::findRoleBySlug($role);
        $role_id = $oRole->id;
        $oResult = User::with('roles')->whereHas('roles', function ($query) use ($role_id) {
            $query->where('id', $role_id);
        });


        /* =============== id Filter  =============== */
        if (isset($aFilters['id']) && !empty($aFilters['id'])) {
            $oResult = $oResult->where('id', $aFilters['id']);
        }

        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['first_name']) && !empty($aFilters['first_name'])) {
            $oResult = $oResult->where('first_name', 'like', '%' . $aFilters['first_name'] . '%');
        }

        if (isset($aFilters['last_name']) && !empty($aFilters['last_name'])) {
            $oResult = $oResult->where('last_name', 'like', '%' . $aFilters['last_name'] . '%');
        }

        /* =============== email Filter  =============== */
        if (isset($aFilters['email']) && !empty($aFilters['email'])) {
            $oResult = $oResult->where('email', 'like', '%' . $aFilters['email'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);


        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

        } else {
            $oResult = $oResult->get();

        }
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {

        }
        /* =============== Preparing Output  =============== */

        return $oResult;
    }


    public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC') {
        /* TODO[Galya] we will delete this table where we should get symbols */
        return Mt4Closed::distinct()
            ->select('SYMBOL')
            ->where('CLOSE_TIME', '!=', '1970-01-01')
            ->where('CMD', '<', '6')
            ->orderBy($sOrderBy, $sSort)
            ->get();
    }


    public function getAccountantTypes() {

        return [
            1 => 'BalanceOperations',
            2 => 'CreditOperations',
            3 => 'Deposits',
            4 => 'Withdraws',
            5 => 'CreditIn',
            6 => 'CreditOut',
        ];
    }

    public function getAgentCommissionTypes() {

        return [
            6 => 'Commission',
            7 => 'Withdraws'
        ];
    }


    public function getServerTypes() {
        return [
            -1=>'All',
            0 => config('fxweb.liveServerName'),
            1 => config('fxweb.demoServerName'),
        ];
    }

    public function getAgentsAccountantByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC') {
        $oFxHelper = new Fx();
        $oResult = new Mt4ClosedBalance();
        $aSummury = [];


        /* =================================== */

        $oResult = $oResult->where('LOGIN',$aFilters['login']);


        $oResult = $oResult->where('server_id',0);



        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Get sum info and others =============== */
        $depositResult = clone $oResult;
        $withdrawsResult = clone $oResult;

        $aSummury ['deposits'] = $depositResult->where('CMD', 6)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['withdraws'] = $withdrawsResult->where('CMD', 6)->where('PROFIT', '<', 0)->sum('PROFIT');

        /* =============== Type Filter  ===============

          1=> 'Commission',
          2 => 'Withdraws',
         */

        if (isset($aFilters['type']) && !empty($aFilters['type'])) {
if($aFilters['type'] == 6){

    $oResult = $oResult->where('PROFIT', '>', 0);
}else if($aFilters['type'] == 7){

    $oResult = $oResult->where('PROFIT', '<', 0);
}


        }

        $oResult = $oResult->where('CMD', '=', 6);


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getAccountantType($oValue->CMD, $oValue->PROFIT);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);
        }

        return [$oResult, $aSummury];
    }

    public function getAgentCommissionChart($login){


        $oGrowthResults = Mt4ClosedBalance::select([DB::raw('PROFIT+COMMISSION+SWAPS as netProfit'), 'CMD'])
            ->where('login', $login)
            ->where('server_id', 0)
            ->where('cmd','=', 6)
            ->where('PROFIT','>', 0)
            ->orderBy('CLOSE_TIME')
            ->get();

        $commission_array = [];
        $commission_horizontal_line_numbers = [];

        $pastCommission = 0;
        $i = 0;
        $commission=0;
        foreach ($oGrowthResults as $row) {


            $pastCommission+=$row->netProfit;
            $commission=round($pastCommission, 2);
            $commission_array[] = $commission;
            $i++;
            $commission_horizontal_line_numbers[] =   $i;
        }


        return [ $commission_horizontal_line_numbers,
            $commission_array
        ];
    }

public function getAgentStatistics($agentId){
    
    $login=UserIbid::select('login')->where('user_id',$agentId)->first();
    if($login){
        $login=$login->login;
    }else{
        $login=0;
        }

    $oGrowthResults = Mt4ClosedBalance::select([DB::raw('sum(PROFIT+COMMISSION+SWAPS) as netProfit,concat(YEAR(CLOSE_TIME),concat("-",MONTH(CLOSE_TIME))) as month'), 'CMD'])
        ->where('login', $login)
        ->where('server_id', 0)
        ->where('cmd','=', 6)
        ->where('PROFIT','>', 0)
        ->groupby('month')
        ->orderBy('CLOSE_TIME')
        ->get();

    $balance_array = [];
    $horizontal_line_numbers = [];

    $pastBalance = 0;
    $i = 0;
    $balance=0;
    foreach ($oGrowthResults as $row) {


        $pastBalance=$row->netProfit;
        $balance=round($pastBalance, 2);
        $balance_array[] = $balance;
        $i++;
        $horizontal_line_numbers[] = date('M, Y',strtotime($row->month));
    }
    $statistics['users_number']=AgentUser::where('agent_id',$agentId)->count();
    $statistics['mt4_users_number']=mt4_users_users::with('agentUsers')->whereHas('agentUsers',function ($query) use($agentId){
        $query->where('agent_id',$agentId);
    })->where('server_id',0)->count();

    $statistics['planes_number']=PlanUsers::where('user_id',$agentId)->count();

    list($commission_horizontal_line_numbers,
        $commission_array
    )=$this->getAgentCommissionChart($login);
    return [ $horizontal_line_numbers,
        $balance_array,
        $balance,
        $statistics,
        $commission_horizontal_line_numbers,
        $commission_array
       ];
}


    public function assignMt4Agents($agentId, $login){
        $userIbid=UserIbid::where('user_id',$agentId)->update(['login' =>$login]);

    }

    public function getAgents() {
        return [
            0=>trans('ibportal::ibportal.all'),
            1 => trans('ibportal::ibportal.agents'),
            2 => trans('ibportal::ibportal.nonAgents'),
        ];
    }

}
