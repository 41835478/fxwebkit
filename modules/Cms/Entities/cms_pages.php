<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;

class cms_pages extends Model {

    protected $fillable = [];
public function cms_menus_items(){
    return $this->hasMany('Modules\Cms\Entities\cms_menus_items','page_id');
}

}