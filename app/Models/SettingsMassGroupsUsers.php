<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsMassGroupsUsers extends Model
{
    protected $table="settings_mass_groups_users";
    public $timestamps =false ;

    protected $guarded = ['id'];
}
