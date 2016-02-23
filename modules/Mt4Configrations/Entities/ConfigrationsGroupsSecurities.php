<?php namespace Modules\Mt4Configrations\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ConfigrationsGroupsSecurities extends Model {

    protected $table = 'configrations_groups_securities';
    public $timestamps = false;
    protected $fillable = ['position',
        'show',
        'trade',
        'execution',
        'comm_base',
        'comm_type',
        'comm_lots',
        'comm_agent',
        'comm_agent_type',
        'spread_diff',
        'lot_min',
        'lot_max',
        'lot_step',
        'ie_deviation',
        'confirmation',
        'trade_rights',
        'ie_quick_mode',
        'autocloseout_mode',
        'comm_tax',
        'comm_agent_lots',
        'freemargin_mode',
        'reserved'];

}