<?php

namespace Modules\Tools\Repositories;

use Modules\Tools\Entities\EntitiesFutureContract;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Config;
use Carbon\Carbon;

class EloquentFutureContractRepository implements FutureContract {

    /**
     */
    public function __construct() {
        //
    }

    public function addContract($oRequest) {

        $oAddContract = new EntitiesFutureContract();


        $oAddContract->id = $oRequest->id;
        $oAddContract->name = $oRequest->name;
        $oAddContract->symbol = $oRequest->symbol;
        $oAddContract->exchange = $oRequest->exchange;
        $oAddContract->month = $oRequest->month;
        $oAddContract->year = $oRequest->year;
        $oAddContract->start_date = $oRequest->start_date;
        $oAddContract->expiry_date = $oRequest->expiry_date;

        $oAddContract->save();

        return $oAddContract->id;
    }

    public function getContractByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin') {


        $oContract = Sentinel::findRoleBySlug($role);

        $contract_id = $oContract->id;


        $oResult = new EntitiesFutureContract();


        if (isset($aFilters['id']) && !empty($aFilters['id'])) {
            $oResult = $oResult->where('id', $aFilters['id']);
        }


        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }

        if (isset($aFilters['symbol']) && !empty($aFilters['symbol'])) {
            $oResult = $oResult->where('symbol', 'like', '%' . $aFilters['symbol'] . '%');
        }


        if (isset($aFilters['exchange']) && !empty($aFilters['exchange'])) {
            $oResult = $oResult->where('exchange', 'like', '%' . $aFilters['exchange'] . '%');
        }

        if (isset($aFilters['month']) && !empty($aFilters['month'])) {
            $oResult = $oResult->where('month', $aFilters['month']);
        }


        if (isset($aFilters['year']) && !empty($aFilters['year'])) {
            $oResult = $oResult->where('year', 'like', '%' . $aFilters['year'] . '%');
        }

        if (isset($aFilters['start_date']) && !empty($aFilters['start_date'])) {
            $oResult = $oResult->where('start_date', 'like', '%' . $aFilters['start_date'] . '%');
        }


        if (isset($aFilters['expiry_date']) && !empty($aFilters['expiry_date'])) {
            $oResult = $oResult->where('expiry_date', 'like', '%' . $aFilters['expiry_date'] . '%');
        }
        if ($aFilters['all_groups']== true) {
         
            $carbon = new Carbon();
            $dt = $carbon->now();
            $oResult = $oResult->where('expiry_date', '>=', $dt->format('Y-m-d'));
              
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
         
        }
        
        foreach ($oResult as $dKey => $oValue) {         
        }
       
        return $oResult;
    }

     public function sendExpiryNotificationsEmail() {

        $oResult = new EntitiesFutureContract();
        
         $carbon = new Carbon();
            $dt = $carbon->now();
         Carbon::setWeekStartsAt(Carbon::SATURDAY);
        
           $startOfWeek=$dt->startOfWeek();
            $oResult = EntitiesFutureContract::where('expiry_date', '>', $startOfWeek->addWeek(0)->format('Y-m-d'));
            $oResult =$oResult->where('expiry_date', '<', $startOfWeek->addWeek(1)->format('Y-m-d'));
            
            $oResult = $oResult->select('expiry_date','symbol');
          
            $oResult = $oResult->get()->toArray();    
        return $oResult;
    }
    
    
    public function deleteContract($id) {

        $id = (is_array($id)) ? $id : [$id];
        $contract = EntitiesFutureContract::whereIn('id', $id)->delete();

        if ($contract) {
            return [trans('tools::tools.deleted_successfully_message')];
        } else {
            return [trans('tools::tools.deleted_faild_message')];
        }
    }

    public function getContractDetails($contractId) {

        $contract = EntitiesFutureContract::find($contractId);

        $fullDetails = EntitiesFutureContract::where('id', $contractId)->first();

        $contractDetails = [
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
        ];
        if ($fullDetails) {
            $contractDetails ['name'] = $fullDetails['name'];
            $contractDetails ['symbol'] = $fullDetails['symbol'];
            $contractDetails ['exchange'] = $fullDetails['exchange'];
            $contractDetails ['month'] = $fullDetails['month'];
            $contractDetails ['year'] = $fullDetails['year'];
            $contractDetails ['start_date'] = $fullDetails['start_date'];
            $contractDetails ['expiry_date'] = $fullDetails['expiry_date'];
        }
        return $contractDetails;
    }

    public function updateContract($oRequest) {

        $contract = EntitiesFutureContract::find($oRequest->id);
        $fullDetails = EntitiesFutureContract::where('id', $contract->id)->first();

        if ($fullDetails) {
            $fullDetails->name = $oRequest->name;
            $fullDetails->symbol = $oRequest->symbol;
            $fullDetails->exchange = $oRequest->exchange;
            $fullDetails->month = $oRequest->month;
            $fullDetails->year = $oRequest->year;
            $fullDetails->start_date = $oRequest->start_date;
            $fullDetails->expiry_date = $oRequest->expiry_date;

            $fullDetails->save();
        } else {
            $fullDetails = new EntitiesFutureContract();

            $fullDetails->name = $oRequest->name;
            $fullDetails->symbol = $oRequest->symbol;
            $fullDetails->exchange = $oRequest->exchange;
            $fullDetails->month = $oRequest->month;
            $fullDetails->year = $oRequest->year;
            $fullDetails->start_date = $oRequest->start_date;
            $fullDetails->expiry_date = $oRequest->expiry_date;
            $fullDetails->save();
        }
        return $contract->id;
    }

    public function getExchange() {

        $aExchange = EntitiesFutureContract::select('exchange')->distinct()->get()->toArray();

        $exchangeJavaArray = [];
        foreach ($aExchange as $key => $exchange) {

            $exchangeJavaArray[] = '"' . $exchange['exchange'] . '"';
        }

        $exchangeJavaArray = join(',', $exchangeJavaArray);

        return $exchangeJavaArray;
    }

    public function getName() {

        $aName = EntitiesFutureContract::select('name')->distinct()->get()->toArray();

        $nameJavaArray = [];
        foreach ($aName as $key => $name) {

            $nameJavaArray[] = '"' . $name['name'] . '"';
        }

        $nameJavaArray = join(',', $nameJavaArray);

        return $nameJavaArray;
    }

    public function getMonth($iso2) {

        $month_arr = [
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => " April ",
            "5" => "May",
            "6" => "June ",
            "7" => "July",
            "8" => "August ",
            "9" => "September ",
            "10" => "October ",
            "11" => "November",
            "12" => "December ",
        ];
        if ($iso2 === null) {
            return $month_arr;
        }if (isset($month_arr[$iso2])) {
            return $month_arr[$iso2];
        } else {
           
            return $iso2;
        }
    }

}
