<?php namespace Fxweb\Repositories\Admin\Mt4Group;

use Fxweb\Models\Mt4Group;

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
	public function getAllGroups($sOrderBy = 'gid', $sSort = 'ASC')
	{
		return Mt4Group::orderBy($sOrderBy, $sSort)->get();
	}
}