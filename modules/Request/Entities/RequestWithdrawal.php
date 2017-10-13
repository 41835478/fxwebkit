<?php namespace Modules\Request\Entities;
   
use Illuminate\Database\Eloquent\Model;

class RequestWithdrawal extends Model {
protected $table='request_withdrawal';
    protected $fillable = ['login','amount','comment','reason','status'];

}