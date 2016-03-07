<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class UsersDetails extends Model
{
        protected $table = 'users_details';
       
        public $timestamps = false;
       
        protected $fillable = [
        'users_id',
        'nickname',
        'address',
        'birthday',
        'phone',
        'country',
        'city',
        'zip_code',
        'gender',
            ];
}
