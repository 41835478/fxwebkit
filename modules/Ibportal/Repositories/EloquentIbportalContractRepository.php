<?php

namespace Modules\Ibportal\Repositories;

use Modules\Ibportal\Entities\IbportalPlan as Plan;
use Modules\Ibportal\Entities\IbportalPlanAliases as PlanAliases;
use Modules\Ibportal\Entities\IbportalAliases as Aliases;

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

    public function addPlan($planName,$planType){
        $planId=Plan::create([
            'name'=>$planName,
            'type'=>$planType
        ]);

        return $planId->id;

    }
    public function addPlanSymbols($planId,$symbols=[],$symbolsType=0,$symbolsValue=0){
        for($i=0;$i<count($symbols);$i++){
            PlanAliases::create([
                'plan_id'=>$planId,
                'alias_id'=>$symbols[$i],
                'type'=>$symbolsType[$i],
                'value'=>$symbolsValue[$i],
            ]);
        }

    }

    public function getAliases(){
        $oAliases=Aliases::select(['id','alias'])->get();
        $aAliases=[];
        foreach($oAliases as $alias){
            $aAliases[$alias->id]=$alias->alias;
        }
        return $aAliases;
    }


    public function deletePlan($id) {

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

        $planDetails = Plan::where('id', $planId)->first();

        return $planDetails;
    }

    public function getAliasesDetails($planId)
    {
        $aliasesDetails = PlanAliases::where('plan_id', $planId)->get();

       // $comments = Aliases::find($aliasesDetails->plan_id)->comments()->where('alias_id', '=',$aliasesDetails->alias_id)->first();
        $comments = Aliases::find(1)->comments;

        dd($comments);
    }

    public function getAliasesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Aliases();

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


}
