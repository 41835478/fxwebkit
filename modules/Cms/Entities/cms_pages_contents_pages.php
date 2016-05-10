<?php namespace Modules\Cms\Entities;
   
use Illuminate\Database\Eloquent\Model;

use Modules\Cms\Entities\cms_pages_contents;
class cms_pages_contents_pages extends Model {

    protected $fillable = [];
 public $timestamps = false;
     public function cms_pages_contents(){
        return $this->belongsTo('cms_pages_contents', 'pages_contents_id');
    }
    
     public function cms_pages(){
        return $this->belongsTo('cms_pages', 'pages_id');
    }
}