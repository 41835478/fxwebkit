<?php 
namespace Modules\Tools\Repositories;


interface HolidayContract
{
    
   public function getHolidayByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC',$role='admin');

}