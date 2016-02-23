<?php namespace Modules\Ibportal\Entities;
   
use Illuminate\Database\Eloquent\Model;

class IbportalAgentUser extends Model {
protected $table='ibportal_agent_user';
    protected $fillable = ['agent_id','user_id','plan_id'];

}