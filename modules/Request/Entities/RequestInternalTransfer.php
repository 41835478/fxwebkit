<?php namespace Modules\Request\Entities;
   
use Illuminate\Database\Eloquent\Model;

class RequestInternalTransfer extends Model {

    protected $table='request_internal_transfer';
    protected $fillable = ['from_login','to_login','amount','comment','reason','status'];

}