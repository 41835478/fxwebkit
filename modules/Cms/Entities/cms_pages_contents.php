<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\cms_pages_contents_pages;
class cms_pages_contents extends Model {

    protected $fillable = [];
  public function cms_pages_contents_pages()
    {
       return $this->hasMany('cms_pages_contents_pages','pages_contents_id');
    }

}