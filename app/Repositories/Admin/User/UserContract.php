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
    public function getUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'LOGIN', $sSort = 'ASC', $role = 'admin');

    public function getUsersWithMassGroup($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin');

    public function getAgentUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin');

    public function getClientAgentUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin');

    public function getAllGroups();


    public function asignMt4UsersToAccount($account_id, $users_id);

    public function getUserDetails($userId);

    public function getCountry($iso2);

    public function getUsersEmail($last_user_id = 0, $limit = 0);

    public function addUser($oRequest, $role = 'admin');

    public function updateUser($oRequest);

    public function getDashboardStatistics();

    public function deleteUser($id);

    public function unsignMt4UsersToAccount($account_id, $users_id, $server_id = 1);

    public function getUsersNames();

    public function getMt4AssignedUsers($login, $server_id);

    public function getMassGroupsList($aFilters, $bFullSet = false, $sOrderBy = 'id', $sSort = 'ASC');

    public function addMassGroup($oRequest);

    public function getMassGroupDetails($groupId);

    public function updateGroup($oRequest);

    public function deleteGroup($id);

    public function assignMt4ToMassGroup($group_id, $users_id, $type = 1);

    public function unassignMt4ToMassGroup($group_id, $users_id, $type = 1);
}