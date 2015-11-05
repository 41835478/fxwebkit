<?php namespace Modules\Accounts\Repositories\Users;

//use Fxweb\Models\Mt4User;
//
//use Fxweb\Helpers\Fx;
//use Config;
/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */

use Modules\Accounts\Entities\mt4_users_users;
class EloquentUsersRepository implements Mt4UserContract
{
	/**
	 */
	public function __construct()
	{
		//
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
		foreach ($oResult as $dKey => $oValue) {
			$oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE,2) ;
			$oResult[$dKey]->EQUITY = round($oResult[$dKey]->EQUITY,2) ;
                        $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT,2) ;
			$oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN,2) ;
                        $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE,2) ;
			$oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE,2) ;
                        
                        
                }
		/* =============== Preparing Output  =============== */
		return $oResult;
	}
        
        public function asignMt4UsersToAccount($account_id,$users_id){

        foreach($users_id as $id=>$user_id){
            
            $asign=mt4_users_users::where(['users_id'=>$account_id,'mt4_users_id'=>$user_id])->first();
            if($asign){
                $asign->users_id=$account_id;
               $asign->mt4_users_id=$user_id;
                $asign->save();
            }else{
                $translate=new mt4_users_users;

                $asign->users_id=$account_id;
               $asign->mt4_users_id=$user_id;
                $asign->save();
            }
        }
            
        }
        
      
}