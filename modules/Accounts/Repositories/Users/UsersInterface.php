<?php namespace Fxweb\Repositories\Admin\Mt4User;
/**
 * Interface Mt4UserContract
 * @package App\Repositories\Mt4User
 */
interface Mt4UserContract
{
	/**
	 * @param mixed $aGroups
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return array
	 */
	public function getLoginsInGroup($aGroups, $sOrderBy = 'LOGIN', $sSort = 'ASC');
	/**
	 * @param mixed $aFilters
	 * @param boolean $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return array
	 */
         public function getUsersByFilters($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC');
         public function getAllGroups();
         /**
	 * @param int $login
	 * @return array
	 */
        public function getUserInfo($login);
        

}