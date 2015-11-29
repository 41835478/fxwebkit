<?php 
namespace Modules\Tools\Repositories;
/**
 * Interface Mt4UserContract
 * @package App\Repositories\Mt4User
 */
interface FutureContract
{
    
   public function getUsersByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC',$role='admin');
}