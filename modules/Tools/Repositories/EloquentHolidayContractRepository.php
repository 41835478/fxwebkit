<?php

namespace Modules\Tools\Repositories;

use Modules\Tools\Entities\ToolsHoliday;
use Config;
class EloquentHolidayContractRepository implements HolidayContract {

    /**
     */
    public function __construct() {
        //
    }


    public function getHolidayByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC') {




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

    public function addHoliday($holiday_details){

        $result=ToolsHoliday::create($holiday_details);

        return ($result)? $result->id:0;
    }

    public function getHolidayDetails($holidayId){
        $result=ToolsHoliday::find($holidayId);

        return ($result)? $result:0;

    }
}
