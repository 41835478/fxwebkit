<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;
use Fxweb\Models\User;
use Fxweb\Models\Mt4Prices;
class Mt4Trade extends Model
{
	protected $table = 'mt4_trades';
	protected $primaryKey = 'TICKET';
        
            public function Mt4Prices() {
        // instead of hasMany
                return $this->hasOne('Fxweb\Models\Mt4Prices','SYMBOL','SYMBOL');
    }
    
   public function users(){
       $this->primaryKey='login';
       return $this->belongsToMany('Fxweb\Models\User', 'mt4_users_users', 'mt4_users_id','users_id','login' );
   }
}
