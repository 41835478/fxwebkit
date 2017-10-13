<?php

namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Tools\Repositories\FutureContract as Future;
use Modules\Tools\Repositories\HolidayContract as Holiday;


class ClientToolsController extends Controller {

    public function index() {
        return view('tools::index');
    }

    protected $oFuture;
    protected $oHoliday;

    public function __construct(
    Future $oFuture,Holiday $oHoliday
    ) {
        $this->oFuture = $oFuture;
        $this->oHoliday = $oHoliday;
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
        }

        $role = explode(',', Config::get('fxweb.client_default_role'));
        $oResults = $this->oFuture->getContractByFilter($aFilterParams, false, $sOrder, $sSort, $role);
        return view('tools::client.future_contract')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);

 
    }


    public function getHoliday(Request $oRequest){
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'id' => '',
            'name' => '',
            'start_date' => '',
            'end_date' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];



        if ($oRequest->has('search')) {

            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['start_date'] = $oRequest->start_date;
            $aFilterParams['end_date'] = $oRequest->end_date;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
        }

        $oResults = $this->oHoliday->getHolidayByFilter($aFilterParams, false, $sOrder, $sSort);

        return view('tools::client.holiday')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }

    public function getHolidayDetails(Request $oRequest){

        $holiday_id=($oRequest->has('holiday_id'))? $oRequest->holiday_id:0;
        $oResult = $this->oHoliday->getHolidayDetails($holiday_id);


        $holidayInfo = [
            'id' => $holiday_id,
            'name' => $oResult['name'],
            'start_date' => $oResult['start_date'],
            'end_date' => $oResult['start_date'],

        ];
        $date=($oRequest->has('date'))? $oRequest->date:'';
        list($aSymbolsHours,$aDates,$date)=$this->oHoliday->getHolidaySymbolsDetails($holiday_id,$date);

        return view('tools::client.holidayDetails')
            ->with('holidayInfo', $holidayInfo)
            ->with('aSymbolsHours', $aSymbolsHours)
            ->with('aDates', $aDates)
            ->with('date', $date);
    }

}
