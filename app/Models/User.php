<?php namespace Fxweb\Models;

use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;

class User extends SentinelUser
{

    public function agentUsers(){
        return $this->hasMany('Modules\Ibportal\Entities\IbportalAgentUser','agent_id');
}

    public function plans(){
        return  $this->hasMany('Modules\Ibportal\Entities\IbportalPlanUsers',user_id);
    }
}
