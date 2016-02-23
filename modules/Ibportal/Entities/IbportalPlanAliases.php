<?php namespace Modules\Ibportal\Entities;
   
use Illuminate\Database\Eloquent\Model;

class IbportalPlanAliases extends Model {

    protected  $table='ibportal_plan_aliases';
    protected $fillable = ['plan_id','alias_id','type','value'];

    public function plan(){
        return $this->belongsTo('Modules\Ibportal\Entities\IbportalPlan');
    }
    public function aliases(){
        return $this->belongsTo('Modules\Ibportal\Entities\IbportalAliases');
    }

}