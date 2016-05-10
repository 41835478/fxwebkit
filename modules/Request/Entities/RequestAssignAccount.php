<?php namespace Modules\Request\Entities;

use Illuminate\Database\Eloquent\Model;

class RequestAssignAccount extends Model {
    protected $table='request_assign_account';
    protected $fillable = ['accountId','name','login','password','comment','reason','status'];

}