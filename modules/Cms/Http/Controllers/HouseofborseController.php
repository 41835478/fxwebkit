<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
/* dinamic *
  use Modules\Module1\Http\Controllers\Module1Controller;
  use Modules\Blog\Http\Controllers\BlogController;
  use Modules\cms\Http\Controllers\MenusController;
  /* End dinamic */

class HouseofborseController extends Controller
{

    public function index()
    {
    }
public function getSymbolsSpreads(){
    $ret = $this->getDoctrine()->getRepository('\Main\CoreBundle\Entity\MT4Prices', 'reporting_real');
    $spreads_ret = $ret->getSpreads();

    $multiplier = array(1,10,100,1000,10000,100000);
    $symbol_spread_array = array();
    foreach ($spreads_ret as $key => $val) {
        // Spread =  (ASK-BID) * (Multiplier[DIGITS])/10
        $symbol_spread_array[$val['symbol']] = array(($val['ask']-$val['bid']) * ($multiplier[$val['digits']])/10,$val['ask'],$val['bid']);
    }

    return $this->render('WebitForexCoreBundle::Default/spreads.html.twig', array('spreads' => $symbol_spread_array));

}
}
