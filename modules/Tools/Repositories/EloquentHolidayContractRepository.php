<?php

namespace Modules\Tools\Repositories;

use Modules\Tools\Entities\ToolsHoliday;
use Modules\Tools\Entities\ToolsSymbols;
use Modules\Tools\Entities\ToolsSecurities as Securities;
use Modules\Tools\Entities\ToolsHolidaySymbols;
use Config;
class EloquentHolidayContractRepository implements HolidayContract
{

    /**
     */
    public function __construct()
    {
        //
    }


    public function getHolidayByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {


        $oResult = new ToolsHoliday();


        if (isset($aFilters['id']) && !empty($aFilters['id'])) {
            $oResult = $oResult->where('id', $aFilters['id']);
        }


        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }

        if (isset($aFilters['start_date']) && !empty($aFilters['start_date'])) {
            $oResult = $oResult->where('start_date', 'like', '%' . $aFilters['start_date'] . '%');
        }


        if (isset($aFilters['end_date']) && !empty($aFilters['end_date'])) {
            $oResult = $oResult->where('expiry_date', 'like', '%' . $aFilters['end_date'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }


        return $oResult;
    }

    public function addHoliday($holiday_details)
    {

        $result = ToolsHoliday::create($holiday_details);

        return ($result) ? $result->id : 0;
    }

    public function getHolidayDetails($holidayId)
    {

        $result = ToolsHoliday::find($holidayId);



        return ($result) ? $result : 0;

    }


    public function getUpdateholiday($oRequest) {


        $result = ToolsHoliday::find($oRequest->edit_id);


        $aCredentials = [
            'name' => $oRequest->name,
            'start_date' => $oRequest->start_date,
            'end_date' => $oRequest->end_date
        ];

            $result->update($aCredentials);

        return $result->id;
    }

    public function getSymbols(){

        $oResults=ToolsSymbols::with('securities')->orderBy('id','desc');


        $oResults=Securities::with('symbols')->orderBy('id','desc');

        return $oResults->paginate();
    }

    public function addSymbolsHoliday($aSymbols, $holiday_id, $start_hour, $end_hour, $date)
    {
        $result=false;
        if(count($aSymbols)){
            foreach ($aSymbols as $symbol) {
                $symbol=explode(',',$symbol);
                $row = ['holiday_id' => $holiday_id,
                    'securities_id' => $symbol[0],
                    'symbols_id' => $symbol[1],
                    'start_hour' => $start_hour,
                    'end_hour' => $end_hour,
                    'date' => $date];
                $result = ToolsHolidaySymbols::create($row);
            }
        }


        return ($result) ? true :false;
    }

    public function deleteHoliday($id)
    {

        $id = (is_array($id)) ? $id : [$id];
        $deleteResult = ToolsHoliday::whereIn('id', $id)->delete();

        if ($deleteResult) {
            return [trans('tools::tools.deleted_successfully_message')];
        } else {
            return [trans('tools::tools.deleted_faild_message')];
        }
    }


    private function convertHourToPercent($hour){
        $aHour=explode(':',$hour);
        $percent=$aHour[0]*1/24+($aHour[1]*1/(60*24))+($aHour[2]*1/(60*24*24));
        return round($percent,7)*100;
    }

    public function getHolidaySymbolsDetails($holiday_id,$date=''){

        $oHolidayDaysResults=ToolsHolidaySymbols::select('date')->distinct('date')->where('holiday_id',$holiday_id)->get();

        $firstDate='';
        $aDates=[];

        foreach($oHolidayDaysResults as $result){
            if($firstDate ==''){$firstDate=$result->date;}
            $aDates[]=$result->date;
        }
        $date=($date=='')? $firstDate:$date;

        $oResults=ToolsHolidaySymbols::with('symbols')
            ->where('holiday_id',$holiday_id)
            ->where('date',$date)
            ->orderBy('symbols_id','desc')
        ->paginate();

        $aSymbolsHours=[];


        foreach($oResults as $result) {
            $aSymbolsHours[$result->symbols->name][] =
                [
                    $this->convertHourToPercent($result->start_hour),
                    $this->convertHourToPercent($result->end_hour),
                    $result->start_hour,
                    $result->end_hour,
                    $result->symbols->id,
                ];

        }

        return [$aSymbolsHours,$aDates,$date];
    }

    public function deleteSymbol($id)
    {
        $id = (is_array($id)) ? $id : [$id];
        $deleteResult = ToolsHolidaySymbols::whereIn('symbols_id', $id)->delete();
        if ($deleteResult) {
            // todo[moaid] translate messages and all messages like this
            return [trans('tools::tools.deleted_successfully_message')];
        } else {
            return [trans('tools::tools.deleted_faild_message')];
        }
    }



}
