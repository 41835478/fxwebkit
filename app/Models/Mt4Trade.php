<?php namespace Fxweb\Models;

use Illuminate\Database\Eloquent\Model;
use Fxweb\Models\Mt4Prices;
class Mt4Trade extends Model
{
	protected $table = 'mt4_trades';
	protected $primaryKey = 'TICKET';
        
            public function Mt4Prices() {
        // instead of hasMany
        return Mt4Prices::where('SYMBOL', $this->SYMBOL);
    }
}
