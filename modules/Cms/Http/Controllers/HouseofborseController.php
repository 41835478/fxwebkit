<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\View;

use Fxweb\Models\Mt4ClosedActual;


class HouseofborseController extends Controller
{
    private $symbols;
    public function __construct(){
        $this->symbols=[
            'AUDUSD',
            'EURUSD',
            'GBPUSD',
            'NZDUSD',
            'USDCAD',
            'USDCHF',
            'USDJPY'];
    }

    public function index()
    {
    }
public function getSymbolsSpreads(){





    $spreads = DB::table('mt4_prices')->whereIn('SYMBOL',$this->symbols)->distinct('SYMBOL')->get();


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

    public function getSellBuyChart(){

        $oResults=Mt4ClosedActual::select(DB::raw('SYMBOL ,CMD, sum(VOLUME) as total'))->whereIn('SYMBOL',$this->symbols)->groupBy(['SYMBOL','CMD'])->get();

        $aResults=[];

        $sell_sum =0;
        $buy_sum = 0;

        foreach($oResults as $result){
            $aResults[$result->SYMBOL][$result->CMD]=$result->total;

            $sell_sum +=($result->CMD == 0)? $result->total: 0;
            $buy_sum += ($result->CMD == 1)? $result->total: 0;

        }

        return View::make('cms::houseofborse.modules_view.sellBuyChart', array(
            'sell_sum'  => $sell_sum,
            'buy_sum'   => $buy_sum,
            'aResults'=>$aResults,
        'chartData'=>$this->getMostTradedInstruments()))->render();
    }



    public function getMostTradedInstruments() {


        $oResults=Mt4ClosedActual::select(DB::raw('SYMBOL , sum(VOLUME) as total'))->whereIn('SYMBOL',$this->symbols)->groupBy('SYMBOL')->get();
        $aResults=[];
        foreach($oResults as $result){
            $aResults[]=[$result->SYMBOL,$result->total];
        }
        return json_encode($aResults, JSON_NUMERIC_CHECK);

    }
}
