<?php namespace Modules\Tools\Repositories;


use Modules\Tools\Entities\EntitiesFutureContract;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Config;




class EloquentFutureContractRepository implements FutureContract
{
	/**
	 */
	public function __construct()
	{
		//
        }
       public function getUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin') {

   
        $oRole = Sentinel::findRoleBySlug($role);
       
        $role_id = $oRole->id;
       
        $oResult = EntitiesFutureContract::all();


       
        if (isset($aFilters['id']) && !empty($aFilters['id'])) {
            $oResult = $oResult->where('id', $aFilters['id']);
        }

       
        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }

        if (isset($aFilters['symbol']) && !empty($aFilters['symbol'])) {
            $oResult = $oResult->where('symbol', 'like', '%' . $aFilters['symbol'] . '%');
        }

   
        if (isset($aFilters['exchange']) && !empty($aFilters['exchange'])) {
            $oResult = $oResult->where('exchange', 'like', '%' . $aFilters['exchange'] . '%');
        }
        
          if (isset($aFilters['month']) && !empty($aFilters['month'])) {
            $oResult = $oResult->where('month', $aFilters['month']);
        }

       
        if (isset($aFilters['year']) && !empty($aFilters['year'])) {
            $oResult = $oResult->where('year', 'like', '%' . $aFilters['year'] . '%');
        }

        if (isset($aFilters['start_date']) && !empty($aFilters['start_date'])) {
            $oResult = $oResult->where('start_date', 'like', '%' . $aFilters['start_date'] . '%');
        }

   
        if (isset($aFilters['expiry_date']) && !empty($aFilters['expiry_date'])) {
            $oResult = $oResult->where('expiry_date', 'like', '%' . $aFilters['expiry_date'] . '%');
        }

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }
      
        foreach ($oResult as $dKey => $oValue) {
            
        }

        return $oResult;
        
    }
}