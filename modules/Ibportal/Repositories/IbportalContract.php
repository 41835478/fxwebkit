<?php 
namespace Modules\Ibportal\Repositories;


interface IbportalContract
{


   public function addPlan($planName,$planName);
   public function addPlanSymbols($planId,$symbols=[],$symbolsType=0,$symbolsValue=0);

}