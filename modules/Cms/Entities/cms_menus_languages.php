<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;

class cms_menus_languages extends Model {

    protected $fillable = [];
    
   public function CmsMenus(){
       return $thes->belongTo('CmsMenus','cms_menus_id');
   }

}