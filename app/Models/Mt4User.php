<?php

namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class Mt4User extends Model {

    protected $table = 'mt4_users';
    protected $primaryKey = 'LOGIN';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'phone_password',
        'address',
        'email',
        'phone',
        'country',
        'city',
        'zip_code',
        'password',
        'status',
        'id_number',
        'state',
        'group',
    ];

    public function account() {
        return $this->hasOne('\Modules\Accounts\Entities\mt4_users_users', 'mt4_users_id');
    }

    public function accounts() {
        return $this->belongsToMany('Fxweb\Models\User', 'mt4_users_users', 'mt4_users_id', 'users_id', 'login');
    }


    public function agents() {

        return $this->belongsToMany('Modules\Ibportal\Entities\IbportalAgentUser', 'mt4_users_users', 'mt4_users_id', 'users_id', 'login');
    }


}
