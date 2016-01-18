<?php 
namespace Modules\Tools\Repositories;


interface HolidayContract
{
    
   public function getHolidayByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC');


   public function addHoliday($holiday_details);

   public function getSymbols();
}