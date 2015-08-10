<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;

class Mt4Trade extends Model
{
	protected $table = 'mt4_trades';
	protected $primaryKey = 'TICKET';
}
