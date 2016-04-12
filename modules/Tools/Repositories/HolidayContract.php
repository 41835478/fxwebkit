<?php 
namespace Modules\Tools\Repositories;


interface HolidayContract
{
    
   public function getHolidayByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC');

   public function addHoliday($holiday_details);

   public function getHolidayDetails($holidayId);

   public function getUpdateholiday($oRequest);

   public function getSymbols();

   public function addSymbolsHoliday($aSymbols, $holiday_id, $start_hour, $end_hour, $date);

   public function deleteHoliday($id);

   public function getHolidaySymbolsDetails($holiday_id, $date = '');

   public function deleteSymbol($id);
}