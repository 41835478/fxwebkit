<?php

namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsMassTemplates extends Model
{
    protected $table="settings_mass_templates";
    public $timestamps =true ;
    //protected $fillable = [];
    protected $guarded = ['id'];
}
