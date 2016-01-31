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


}
