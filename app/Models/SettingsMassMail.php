<?php
    
    namespace Fxweb\Models;
    
    use Illuminate\Database\Eloquent\Model;
    
    class SettingsMassMail extends Model
    {
        protected $table="settings_mass_mail";
        public $timestamps =true ;
        //protected $fillable = [];
        protected $guarded = ['id'];
    }

