<?php 

namespace Fxweb\Repositories\Admin\FullDetails;
/**
 * Interface Mt4UserContract
 * @package App\Repositories\Mt4User
 */
interface FullDetailsInterface
{
	/**
	 * @param mixed $aGroups
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return array
	 */
      

     
     public function getFullDetails($oRequest);
}