<?php namespace Fxweb\Repositories\Admin\Mt4Group;
/**
 * Interface Mt4GroupContract
 * @package App\Repositories\Mt4Group
 */
interface Mt4GroupContract
{
	/**
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return mixed
	 */
	public function getAllGroups($sOrderBy = 'gid', $sSort = 'ASC');
}