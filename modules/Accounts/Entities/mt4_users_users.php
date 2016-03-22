<?php namespace Modules\Accounts\Entities;
   
use Illuminate\Database\Eloquent\Model;

class mt4_users_users extends Model {

    protected $fillable = [];

    public function agentUsers(){

        return $this->belongsTo('Modules\Ibportal\Entities\IbportalAgentUser','users_id','user_id');
    }

}