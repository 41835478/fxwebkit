<?php 
namespace Modules\Ibportal\Repositories;


interface IbportalContract
{



   public function addPlanSymbols($planId,$symbols=[],$symbolsType=0,$symbolsValue=0);

   public function getPlansByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

   public function getAssignAgents($agnetId);

   public function getClientPlansByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $clientID);

   public function addPlan($planName, $public);

   public function getAliases();

   public function deletePlan($id);

   public function getPlanDetails($planId);

   public function getAliasesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

   public function addAlias($alias, $operand, $value);

   public function getPlanAssignedUsers($planId, &$users);

   public function getAgentAssignedUsers($agentId, &$users);

   public function assignUsersToPlan($planId, $selectedUsers);

   public function assignUsersToAgent($agentId, $planId, $selectedUsers);

   public function getSymbols();

   public function generateUserIbId($userId);

   public function getAgentName();

   public function getPlansName($agents = []);

   public function getUsersName($agents = [], $plans = []);

   public function getMt4UsersName($users = []);

   public function getAgentCommissionByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC');

   public function getClientAgentName();

   public function getClientPlansName($agents = []);

   public function getClientUsersName($agents = [], $plans = []);

   public function getClientMt4UsersName($users = []);

   public function editPlan($planId, $planName, $planType, $public);

   public function editPlanSymbols($planId, $symbols = [], $symbolsType = 0, $symbolsValue = 0);

   public function getAgentUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin');

   public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC');

   public function getAccountantTypes();

   public function getAgentCommissionTypes();

   public function getServerTypes();

   public function getAgentsAccountantByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC');

   public function getAgentCommissionChart($login);

   public function getAgentStatistics($agentId);

   public function assignMt4Agents($agentId, $login);

   public function getAgents();

   public function getAssignUsresToAgent($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

}