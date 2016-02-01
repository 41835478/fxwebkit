<?php

namespace Modules\Ibportal\Repositories;

use Modules\Ibportal\Entities\IbportalPlan as Plan;
use Modules\Ibportal\Entities\IbportalPlanAliases as PlanAliases;
use Modules\Ibportal\Entities\IbportalAliases as Aliases;
use Modules\Ibportal\Entities\IbportalPlanUsers as PlanUsers;
use Modules\Mt4configrations\Entities\ConfigrationsSymbols as Symbols;

use Config;

class EloquentIbportalContractRepository implements IbportalContract
{

    /**
     */
    public function __construct()
    {
        //
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

    public function addPlan($planName, $planType, $public)
    {
        $planId = Plan::create([
            'name' => $planName,
            'type' => $planType,
            'public' => $public
        ]);

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

    return ($result)? true:false;
}

    public function getPlanAssignedUsers($planId,&$users){

       $oResult= PlanUsers::select('user_id')->where('plan_id',$planId)->get();

        $assignedUsers=[];
        foreach($oResult as $result){
            if(!isset($users[$result->user_id])) continue;
            $assignedUsers[$result->user_id]=$users[$result->user_id];
            unset($users[$result->user_id]);
        }
        return $assignedUsers;
    }

    public function assignUsersToPlan($planId,$selectedUsers){
        $deleteResult=PlanUsers::where('plan_id',$planId)->delete();
        $insertResult=false;
        if(!empty($selectedUsers)){
            $users=[];
            foreach($selectedUsers as $user){
                $users[]=['plan_id'=>$planId,'user_id'=>$user];
            }

            $insertResult=PlanUsers::insert($users);
        }else{
            $insertResult=true;
        }

        return ($insertResult)?true:false;
    }



    public function getSymbols() {

        $aSymbols = Symbols::select('name')->distinct()->get()->toArray();

        $symbolsJavaArray = [];
        foreach ($aSymbols as $key => $symbols) {

            $symbolsJavaArray[] = '"' . $symbols['name'] . '"';
        }

        $symbolsJavaArray = join(',', $symbolsJavaArray);

        return $symbolsJavaArray;
    }
}
