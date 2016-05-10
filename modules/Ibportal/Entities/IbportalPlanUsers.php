<?php namespace Modules\Ibportal\Entities;
   
use Illuminate\Database\Eloquent\Model;

class IbportalPlanUsers extends Model {

    protected $table='ibportal_plan_users';
    protected $fillable = ['plan_id','user_id'];

}