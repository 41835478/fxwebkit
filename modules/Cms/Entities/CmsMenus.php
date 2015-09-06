<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\cms_menus_languages;

class CmsMenus extends Model {
    protected $table='cms_menus';
    protected $fillable = [];

    public function cms_menus_languages(){
        return $this->hasMany('Modules\Cms\Entities\cms_menus_languages','cms_menus_id');
    }
}