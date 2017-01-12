<?php

namespace Modules\Request\Entities;

use Illuminate\Database\Eloquent\Model;

class SettingsEmailTemplates extends Model
{
    protected $table="request_email_templates";
    public $timestamps =true ;
    //protected $fillable = [];
    protected $guarded = ['id'];
}
