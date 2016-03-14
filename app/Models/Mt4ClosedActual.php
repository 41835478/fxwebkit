<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class Mt4ClosedActual extends Model
{
    protected $table='mt4_closed_actual';

    public function users(){
        $this->primaryKey='login';
        return $this->belongsToMany('Fxweb\Models\User', 'mt4_users_users', 'mt4_users_id','users_id','login' );
    }
}
