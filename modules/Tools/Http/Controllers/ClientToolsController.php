<?php

namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Tools\Repositories\FutureContract as Future;


class ClientToolsController extends Controller {

    public function index() {
        return view('tools::index');
    }

    protected $oFuture;

    public function __construct(
    Future $oFuture
    ) {
        $this->oFuture = $oFuture;
    }

    
           public function getMarketWatch() {
               
             return view('tools::client.marketWatch');
    }
    
    public function getFutureContract(Request $oRequest) {
     

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'all_groups' => true,
            'sort' => $sSort,
            'order' => $sOrder,
        ];

          if ($oRequest->has('deleteContract')) {
              
              $result = $this->oFuture->deleteContract($oRequest->contract_checkbox);
              
              return Redirect::route('tools.futureContract')->withErrors($result);
        }
        
        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['exchange'] = $oRequest->exchange;
            $aFilterParams['all_groups'] = (($oRequest->has('all_groups')) ? true : false);
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));
            $oResults = $this->oFuture->getContractByFilter($aFilterParams, false, $sOrder, $sSort, $role);
        }

        return view('tools::client.future_contract')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);

 
    }
}
