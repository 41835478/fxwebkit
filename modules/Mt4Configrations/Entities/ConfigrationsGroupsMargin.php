<?php namespace Modules\Mt4Configrations\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ConfigrationsGroupsMargin extends Model {

    protected $table = 'configrations_groups_margin';
    public $timestamps = false;
    protected $fillable = [  'position',
        'symbol',
        'swap_long',
        'swap_short',
        'margin_divider',
        'reserved'];

}