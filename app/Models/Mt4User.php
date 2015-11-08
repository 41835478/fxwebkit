<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class Mt4User extends Model
{
	protected $table = 'mt4_users';
	protected $primaryKey = 'LOGIN';
        
        public function account(){
            return $this->hasOne('\Modules\Accounts\Entities\mt4_users_users','mt4_users_id');
        }
           
        public function accounts(){
            return $this->belongsToMany('Fxweb\Models\User','mt4_users_users','mt4_users_id','users_id','login');
        }
        
}
