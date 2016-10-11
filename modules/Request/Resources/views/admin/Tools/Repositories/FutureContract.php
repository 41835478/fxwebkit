<?php 
namespace Modules\Tools\Repositories;
/**
 * Interface Mt4UserContract
 * @package App\Repositories\Mt4User
 */
interface FutureContract
{
    
   public function getContractByFilter($aFilters, $bFullSet=false, $sOrderBy = 'LOGIN', $sSort = 'ASC',$role='admin');

   public function getMonth($iso2);

   public function addContract($oRequest);

   public function sendExpiryNotificationsEmail();

   public function deleteContract($id);

   public function getContractDetails($contractId);

   public function updateContract($oRequest);

   public function getExchange();

   public function getName();
}