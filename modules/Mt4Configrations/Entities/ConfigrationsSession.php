<?php namespace Modules\Mt4configrations\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ConfigrationsSession extends Model {
protected $table='configrations_session';

    protected $fillable = ['symbol','quote','trade','quote_overnight','trade_overnight'];

}