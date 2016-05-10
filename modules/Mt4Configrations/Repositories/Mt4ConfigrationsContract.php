<?php 
namespace Modules\Mt4Configrations\Repositories;


interface Mt4ConfigrationsContract
{
    
   public function getSymbolsByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

   public function getSecuritiesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

   public function getGroupsByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

   public function addGroups();

   public function addSecurities();

   public function synchronizeSymbols();

}