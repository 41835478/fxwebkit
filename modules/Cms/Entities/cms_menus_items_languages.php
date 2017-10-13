<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;

class cms_menus_items_languages extends Model {

    protected $fillable = [];

   public function cms_menus_items(){
       return $thes->belongTo('cms_menus_items','cms_menus_items_id');
   }

}