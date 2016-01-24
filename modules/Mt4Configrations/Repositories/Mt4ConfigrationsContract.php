<?php 
namespace Modules\Mt4Configrations\Repositories;


interface Mt4ConfigrationsContract
{
    
   public function getSymbolsByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

}