<?php namespace Modules\Request\Entities;

use Illuminate\Database\Eloquent\Model;

class RequestAddDemoAccount extends Model
{
    protected $table = 'request_add_demo_account';
    protected $fillable = ['id',
        'first_name',
        'last_name',
        'email',
        'password',
        'investor',
        'birthday',
        'leverage',
        'array_deposit',
        'array_group',
        'phone',
        'country',
        'city',
        'address',
        'zip_code',
    ];

}