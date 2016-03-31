<?php namespace Fxweb\Repositories\Admin\User;
/**
 * Interface Mt4UserContract
 * @package App\Repositories\Mt4User
 */
interface UserContract
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
         public function getUsersByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC',$role='admin');
         
	
         public function getAllGroups();
         
         
        public function asignMt4UsersToAccount($account_id,$users_id);
        
        public function getUserDetails($userId);
        public function getCountry($iso2);
        public function getUsersEmail($last_user_id=0,$limit=0);
}