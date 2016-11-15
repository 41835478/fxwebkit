<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class MT4Daily extends Model
{
        protected $table = 'mt4_daily';
       
        public $timestamps = false;
       
        protected $fillable = [
        'LOGIN',
        'server_id',
        'TIME',
        'GROUP',
        'BANK',
        'BALANCE_PREV',
        'BALANCE',
        'DEPOSIT',
        'CREDIT',
        'PROFIT_CLOSED',
        'PROFIT',
        'EQUITY',
        'MARGIN',
        'MARGIN_FREE',
        'MODIFY_TIME',
            ];


        public function users(){
                $this->primaryKey='login';
                return $this->belongsToMany('Fxweb\Models\User', 'mt4_users_users', 'mt4_users_id','users_id','login' );
        }

}
