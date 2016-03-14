<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class Mt4OpenPending extends Model
{
    protected $table='mt4_open_pending';
    public function Mt4Prices() {
        // instead of hasMany
        return Mt4Prices::where('SYMBOL', $this->SYMBOL);
    }

    public function users(){
        $this->primaryKey='login';
        return $this->belongsToMany('Fxweb\Models\User', 'mt4_users_users', 'mt4_users_id','users_id','login' );
    }
}
