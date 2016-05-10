<?php namespace Fxweb\Repositories\Admin\Mt4Group;

use Fxweb\Models\Mt4Group;
use Fxweb\Models\Mt4User;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4GroupRepository implements Mt4GroupContract
{
	/**
	 */
	public function __construct()
	{
		//
	}

	/**
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return mixed
	 */
	public function getAllGroups($sOrderBy = 'symbol', $sSort = 'ASC')
	{
		$oGroups=Mt4User::distinct()->select('GROUP')->get();
        foreach ($oGroups as &$oGroup) {
           
            $oGroup->group = $oGroup->GROUP;
          
        }
		return $oGroups;
	}
}