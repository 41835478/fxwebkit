<?php namespace Fxweb\Repositories\Admin\Mt4User;

use Fxweb\Models\Mt4User;

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
	public function getLoginsInGroup($aGroups, $sOrderBy = 'LOGIN', $sSort = 'ASC')
	{
		if (is_string($aGroups)) {
			$aGroups = [$aGroups];
		}

		$oUsers = Mt4User::whereIn('GROUP', $aGroups)->select('LOGIN')->get();
		$aUsers = [];

		foreach ($oUsers as $oUser) {
			$aUsers[] = $oUser->LOGIN;
		}

		return $aUsers;
	}
	
}