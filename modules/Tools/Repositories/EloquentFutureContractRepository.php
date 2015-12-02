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
        
        
    public function addContract($oRequest) {

        $oClientRole = new EntitiesFutureContract();
        
        $aCredentials = [
           'name'=>$oRequest->name,
           'symbol'=>$oRequest->symbol,
            'exchange'=>$oRequest->exchange,
            'month'=>$oRequest->month,
           'year'=>$oRequest->year,
           'start_date'=>$oRequest->start_date,
            'expiry_date'=>$oRequest->expiry_date,
        ];

          $oClientRole->create($aCredentials);
          $oClientRole->save();
        return $oClientRole->id;
    }

        
       public function getUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin') {

   
        $oRole = Sentinel::findRoleBySlug($role);
       
        $role_id = $oRole->id;
       
        
        $oResult = new EntitiesFutureContract();
        
       
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
    
    
     public function deleteContract($id) {
        
        $user = EntitiesFutureContract::find($id);
       
        try {
            $user->delete();
        } catch (Exception $e) {
            return ['error! please try again later.'];
        }
        return ['deleted successfully.'];
    }
    
    
      public function getUserDetails($userId)
        {

           $user = EntitiesFutureContract::find($userId);
           
           $fullDetails=  EntitiesFutureContract::where('id',$userId)->first();
         
            $userDetails = [
         
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
        ];
            if($fullDetails){
           
            $userDetails ['name'] = $fullDetails['name'];
            $userDetails ['symbol'] = $fullDetails['symbol'];
            $userDetails ['exchange'] = $fullDetails['exchange'];
            $userDetails ['month'] = $fullDetails['month'];
            $userDetails ['year'] = $fullDetails['year'];
            $userDetails ['start_date'] = $fullDetails['start_date'];
            $userDetails ['expiry_date'] = $fullDetails['expiry_date'];
            }
             
            return $userDetails;
        }
        
        public function updateContract($oRequest) {
            
       
       // $user = EntitiesFutureContract::getUser();
        $user = EntitiesFutureContract::find($oRequest->id);
      
        $fullDetails=  EntitiesFutureContract::where('id',$user->id)->first();

        
     if($fullDetails){
            $fullDetails->name=$oRequest->name;
            $fullDetails->symbol=$oRequest->symbol;
            $fullDetails->exchange=$oRequest->exchange;
            $fullDetails->month=$oRequest->month;
            $fullDetails->year=$oRequest->year;
            $fullDetails->start_date=$oRequest->start_date;
            $fullDetails->expiry_date=$oRequest->expiry_date;
         
             $fullDetails->save();
     }else{
         $fullDetails=new EntitiesFutureContract();
   
            $fullDetails->name=$oRequest->name;
            $fullDetails->symbol=$oRequest->symbol;
            $fullDetails->exchange=$oRequest->exchange;
            $fullDetails->month=$oRequest->month;
            $fullDetails->year=$oRequest->year;
            $fullDetails->start_date=$oRequest->start_date;
            $fullDetails->expiry_date=$oRequest->expiry_date;
             $fullDetails->save();
     }

      /*
        try {
            $user = EntitiesFutureContract::update($user);
            $fullDetails->save();
            
        } catch (\Illuminate\Database\QueryException $e) {
            return 'The email has already been taken.';
        }
       */
 
        return $user->id;
    }
}