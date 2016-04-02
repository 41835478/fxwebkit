<?php namespace Fxweb\Models;

use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;
use Modules\Accounts\Entities\mt4_users_users;


class User extends SentinelUser
{

    public function agentUsers(){
        return $this->hasMany('Modules\Ibportal\Entities\IbportalAgentUser','agent_id');
}

    public function plans(){
        return  $this->hasMany('Modules\Ibportal\Entities\IbportalPlanUsers','user_id');
    }

    public function agentPlan(){
     return $this->hasOne('Modules\Ibportal\Entities\IbportalAgentUser','user_id');
    }

    public function isAgent(){
        return $this->hasOne('Modules\Ibportal\Entities\IbportalUserIbid','user_id');
    }


    public function isActive(){
        return $this->hasOne('Modules\Ibportal\Entities\IbportalUserIbid','user_id');
    }

    public function mt4Users(){

       return $this->hasMany('Modules\Accounts\Entities\mt4_users_users','users_id');
    }
}
