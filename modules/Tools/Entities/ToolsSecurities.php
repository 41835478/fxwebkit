<?php namespace Modules\Tools\Entities;
   
use Illuminate\Database\Eloquent\Model;


class ToolsSecurities extends Model {
    protected $table = 'tools_securities';

    protected $fillable = [];
    public function symbols(){
        return $this->hasMany('Modules\Tools\Entities\ToolsSymbols','securities_id');
    }

}