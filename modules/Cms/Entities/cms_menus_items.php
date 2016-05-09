<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;
class cms_menus_items extends Model {

    protected $fillable = [];
    
    public function cms_menus_items(){
       return $this->hasOne('Modules\Cms\Entities\cms_menus_items', 'id','parent_item_id');
    }
    
    public function page(){
       return $this->belongsTo('Modules\Cms\Entities\cms_pages','page_id');
    }
    public function article(){
      return  $this->belongsTo('Modules\Cms\Entities\cms_articles','page_id');
    }
    
    public function cms_menus_items_languages(){
        return $this->hasMany('Modules\Cms\Entities\cms_menus_items_languages','cms_menus_items_id');
    }

}