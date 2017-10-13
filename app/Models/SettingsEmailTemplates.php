<?php

namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsEmailTemplates extends Model
{
    protected $table="settings_email_templates";
    public $timestamps =true ;
    //protected $fillable = [];
    protected $guarded = ['id'];
}
