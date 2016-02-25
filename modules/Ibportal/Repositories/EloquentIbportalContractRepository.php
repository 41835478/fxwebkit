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
use Modules\Ibportal\Entities\IbportalAgentsCommission as AgentsCommission;
use Fxweb\Helpers\Fx;

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

        $aSymbols = Symbols::select('name')->distinct()->get()->toArray();

        $symbolsJavaArray = [];
        foreach ($aSymbols as $key => $symbols) {

            $symbolsJavaArray[] = '"' . $symbols['name'] . '"';
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

}
