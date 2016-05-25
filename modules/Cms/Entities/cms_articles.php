<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;

class cms_articles extends Model {

    protected $fillable = [];

    public function menuItem(){
        return $this->hasOne('\Modules\Cms\Entities\cms_menus_items','page_id');
    }
}