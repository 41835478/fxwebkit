<?php namespace Modules\Tools\Entities;
   
use Illuminate\Database\Eloquent\Model;


class ToolsSymbols extends Model {

    protected $table = 'tools_symbols';
    protected $fillable = [];
public function securities(){
    return $this->belongsto('Modules\Tools\Entities\ToolsSecurities','securities_id');
}
}