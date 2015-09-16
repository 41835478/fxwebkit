<?php namespace Fxweb\Repositories\Admin\Mt4User;

use Fxweb\Models\Mt4User;

use Fxweb\Helpers\Fx;
use Config;
/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4UserRepository implements Mt4UserContract
{
	/**
	 */
	public function __construct()
	{
		//
	}

	/**
	 * @param mixed $aGroups
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return array
	 */
        public function getAllUsers(){
           return  Mt4User::all();
            
        }
	public function getLoginsInGroup($aGroups, $sOrderBy = 'LOGIN', $sSort = 'ASC')
	{
		if (is_string($aGroups)) {
                    
			$aGroups = explode(',', $aGroups);
		}

		$oUsers = Mt4User::whereIn('GROUP', $aGroups)->select('LOGIN')->get();
		$aUsers = [];

		foreach ($oUsers as $oUser) {
			$aUsers[] = $oUser->LOGIN;
		}

		return $aUsers;
	}
        
	/**
	 * 
	 */
        public function getAllGroups(){
            return Mt4User::select('group')->get();
        }
	/**
	 * @param int $login
	 * @return array
	 */
        public function getUserInfo($login){
            return Mt4User::where('LOGIN','=',$login)->get()[0];
        }
	public function getUsersByFilters($aFilters, $bFullSet=false, $sOrderBy = 'login', $sSort = 'ASC')
	{
		$oResult =  new Mt4User();
                
		/* =============== Login Filters =============== */
		if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
			(isset($aFilters['to_login']) && !empty($aFilters['to_login']))) {

			if (!empty($aFilters['from_login'])) {
				$oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
			}

			if (!empty($aFilters['to_login'])) {
				$oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
			}
		}
		/* =============== Nmae Filter  =============== */
		if (isset($aFilters['name']) && !empty($aFilters['name'])) {
			$oResult = $oResult->where('name','like','%'. $aFilters['name'] .'%');
		}

		/* =============== Groups Filter  =============== */
		if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
			$aUsers = $this->getLoginsInGroup($aFilters['group']);
			$oResult = $oResult->whereIn('LOGIN', $aUsers);
		}


		$oResult = $oResult->orderBy($sOrderBy, $sSort);

		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		return $oResult;
	}
}