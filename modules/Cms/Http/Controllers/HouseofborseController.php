<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\View;



class HouseofborseController extends Controller
{

    public function index()
    {
    }
public function getSymbolsSpreads(){



    $symbols=[
        'AUDUSD',
    'EURUSD',
    'GBPUSD',
    'NZDUSD',
    'USDCAD',
    'USDCHF',
    'USDJPY'];

    $spreads = DB::table('mt4_prices')->whereIn('SYMBOL',$symbols)->distinct('SYMBOL')->get();


    $multiplier = array(1,10,100,1000,10000,100000);
    $symbol_spread_array = array();
    foreach ($spreads as $val) {
        // Spread =  (ASK-BID) * (Multiplier[DIGITS])/10
      $symbol_spread_array[$val->SYMBOL] = array(( $val->ASK - $val->BID) * ($multiplier[$val->DIGITS])/10,$val->ASK,$val->BID);
    }
     return View::make('cms::houseofborse.modules_view.spreads',
        [
            'spreads' => $symbol_spread_array
        ])->render();

}
}
