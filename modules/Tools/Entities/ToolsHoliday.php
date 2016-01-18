<?php namespace Modules\Tools\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ToolsHoliday extends Model {
    protected $table = 'tools_holiday';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'start_date',
        'end_date',

    ];

}