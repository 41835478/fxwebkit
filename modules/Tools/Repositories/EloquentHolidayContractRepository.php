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

    public function getSymbols(){


        $oResults=ToolsSymbols::with('securities')->orderBy('id','desc');

$oResults=Securities::with('symbols')->orderBy('id','desc');

        return $oResults->paginate();
    }

    public function addSymbolsHoliday($aSymbols, $holiday_id, $start_hour, $end_hour, $date)
    {
        $result=false;
        foreach ($aSymbols as $symbol) {
            $row = ['holiday_id' => $holiday_id,
                'symbols_id' => $symbol,
                'start_hour' => $start_hour,
                'end_hour' => $end_hour,
                'date' => $date];
            $result = ToolsHolidaySymbols::create($row);
        }


        return ($result) ? true :false;
    }

    public function deleteHoliday($id)
    {

        $id = (is_array($id)) ? $id : [$id];
        $deleteResult = ToolsHoliday::whereIn('id', $id)->delete();

        if ($deleteResult) {
            return ['deleted successfully.'];
        } else {
            return ['deleted faild please try again later.'];
        }
    }

}
