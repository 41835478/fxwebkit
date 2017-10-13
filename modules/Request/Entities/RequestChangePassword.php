<?php namespace Modules\Request\Entities;
   
use Illuminate\Database\Eloquent\Model;

class RequestChangePassword extends Model {
    protected $table='request_change_password';
    protected $fillable = [ "users_id", "login", "server_id", "password_type", "newPassword", "admin_id", "respond_date", "comment", "reason", "status", "created_at", "updated_at"];


}