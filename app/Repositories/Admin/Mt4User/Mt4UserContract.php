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

    public function getAllUsers();
	/**
	 * @param mixed $aFilters
	 * @param boolean $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return array
	 */
         public function getUsersByFilters($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC');
         /**
	 * @param mixed $aFilters
	 * @param boolean $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return array
	 */
         public function getUsersMt4UsersByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC');

         public function getAllGroups();
         /**
	 * @param int $login
	 * @return array
	 */
        public function getUserInfo($login);


    public function getUsersMt4UsersWithMassGroup($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

    public function delete($id);

    public function getUsersMt4Users($account_id);

    public function getMt4UsersByEmail($user);

}