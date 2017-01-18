<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class AccountsBank extends Model
{
        protected $table = 'accounts_bank';
       
        public $timestamps = false;
       
        protected $fillable = [
        'id',
        'users_id',
        'beneficiary_bank',
        'swift_code',
        'bank_name',
        'bank_address',
        'beneficiary_name',
        'bank_account',
        'activate',
            ];


        public function users(){

                return $this->belongsTo('Fxweb\Models\User','users_id');
        }
}
