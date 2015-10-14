<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\mt4_users_users;
class Mt4User extends Model
{
	protected $table = 'mt4_users';
	protected $primaryKey = 'LOGIN';
        
        public function account(){
            return $this->hasMany('mt4_users_users');
        }
}
