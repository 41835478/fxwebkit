<?php namespace Modules\Tools\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ToolsHolidaySymbols extends Model {
    protected $table = 'tools_holiday_symbols';

    public $timestamps = false;
    protected $fillable = [
        'id',
        'securities_id',
        'holiday_id',
        'symbols_id',
        'start_hour',
        'end_hour',
        'date',

    ];

}