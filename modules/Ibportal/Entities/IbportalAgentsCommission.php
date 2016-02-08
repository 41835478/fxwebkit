<?php namespace Modules\Ibportal\Entities;
   
use Illuminate\Database\Eloquent\Model;


class IbportalAgentsCommission extends Model {
protected $table='ibportal_agents_commission';
    protected $fillable = ['id_rebate',
        'ticket',
        'id_mt4_user',
        'id_user',
        'rebate_agent',
        'rebate_usd',
        'commission_agent',
        'commission_usd',
        'conversion_rate',
        'conversion_usd'
];

    public function trade(){

        return $this->hasMany('Fxweb\Models\Mt4Trade','TICKET','ticket');
    }

}