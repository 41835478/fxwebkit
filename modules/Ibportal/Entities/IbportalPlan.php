<?php namespace Modules\Ibportal\Entities;
   
use Illuminate\Database\Eloquent\Model;

use Modules\Mt4configrations\Entities\ConfigrationsSymbols;
use Modules\Ibportal\Entities\IbportalPlanAliases;


class IbportalPlan extends Model {

    protected  $table='ibportal_plan';
    protected $fillable = ['id','name','type','public'];

    public function aliases(){
        return $this->belongsToMany('Modules\Ibportal\Entities\IbportalAliases','ibportal_plan_aliases','plan_id','alias_id')->withPivot('value','type');
    }
    public function users(){
        return $this->hasMany('Modules\Ibportal\Entities\IbportalPlanUsers','plan_id');
    }

}