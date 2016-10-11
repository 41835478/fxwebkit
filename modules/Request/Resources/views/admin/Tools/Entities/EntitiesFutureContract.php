<?php namespace Modules\Tools\Entities;

use Illuminate\Database\Eloquent\Model;


class EntitiesFutureContract extends Model
{
        protected $table = 'tools_future_contract';
       
        public $timestamps = false;
       
        protected $fillable = [
        'id',
        'name',
        'symbol',
        'exchange',
        'month',
        'year',
        'start_date',
        'expiry_date',

            ];
}
