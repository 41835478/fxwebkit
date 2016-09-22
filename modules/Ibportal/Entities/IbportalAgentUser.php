<?php namespace Modules\Ibportal\Entities;
   
use Illuminate\Database\Eloquent\Model;

class IbportalAgentUser extends Model {
protected $table='ibportal_agent_user';
    protected $fillable = ['agent_id','user_id','plan_id'];

    public function plan(){

        return $this->hasOne('Modules\Ibportal\Entities\IbportalPlan','id','plan_id');
    }

    public function mt4_users_users(){

        return $this->hasMany("Modules\Accounts\Entities\mt4_users_users","users_id","user_id");
    }
}