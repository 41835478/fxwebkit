<?php namespace Fxweb\Repositories\Admin\Mt4Trade;

use Fxweb\Helpers\Fx;
use Fxweb\Models\Mt4Trade;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Illuminate\Support\Facades\DB;
use Config;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4TradeRepository implements Mt4TradeContract
{
	protected $oUsers;

	/**
	 */
	public function __construct(Mt4User $oUsers)
	{
		$this->oUsers = $oUsers;
	}

	/**
	 * Gets the closed orders symbols
	 *
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return mixed
	 */
	public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC')
	{
		return Mt4Trade::distinct()
			->select('SYMBOL')
			->where('CLOSE_TIME', '!=', '1970-01-01')
			->where('CMD', '<', '6')
			->orderBy($sOrderBy, $sSort)
			->get();
	}

	/**
	 * Gets the open orders symbols
	 *
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return mixed
	 */
	public function getOpenTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC')
	{
		return Mt4Trade::distinct()
			->select('SYMBOL')
			->where('CLOSE_TIME', '=', '1970-01-01')
			->where('CMD', '<', '6')
			->orderBy($sOrderBy, $sSort)
			->get();
	}

	/**
	 * Gets the orders types
	 *
	 * @return array
	 */
	public function getTradesTypes()
	{
		return [
			1 => 'ACTUAL_TRADES',
			2 => 'PENDING_TRADES',
		];
	}

	/**
	 * Gets the closed orders by filters
	 *
	 * @param array $aFilters
	 * @param bool $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getClosedTradesByFilters($aFilters, $bFullSet=false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC')
	{
		$oFxHelper = new Fx();
		$oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');

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

		/* =============== Groups Filter  =============== */
		if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
			$aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
			$oResult = $oResult->whereIn('LOGIN', $aUsers);
		}

		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}

		/* =============== Symbols Filter  =============== */
		if (!isset($aFilters['all_symbols']) || !$aFilters['all_symbols']) {
			$oResult = $oResult->whereIn('SYMBOL', $aFilters['symbol']);
		}

		/* =============== Type Filter  =============== */
		if (isset($aFilters['type']) && !empty($aFilters['type'])) {
			if ($aFilters['type'] == 1) {
				$oResult = $oResult->where('CMD', '<', 2);
			} elseif ($aFilters['type'] == 2) {
				$oResult = $oResult->whereBetween('CMD', [2, 5]);
			}
		} else {
			$oResult = $oResult->where('CMD', '<', 6);
		}

		$oResult = $oResult->orderBy($sOrderBy, $sSort);

		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		foreach ($oResult as $dKey => $oValue) {
			// Set CMD type
			$oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
			$oResult[$dKey]->VOLUME = $oValue->VOLUME/100;
		}

		return $oResult;
	}

	/**
	 * Gets the closed orders by filters
	 *
	 * @param array $aFilters
	 * @param bool $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getOpenTradesByDate($aFilters, $bFullSet=false, $sOrderBy = 'TICKET', $sSort = 'ASC')
	{
		$oFxHelper = new Fx();
		$oResult = Mt4Trade::where('CLOSE_TIME', '=', '1970-01-01 00:00:00');

		/* =============== Login Filters =============== */
		//if ((isset($aFilters['login']) && !empty($aFilters['login'])) ) {

				$oResult = $oResult->where('LOGIN', '=', $aFilters['login']);
		//}
		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('OPEN_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('OPEN_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}
		

		$oResult = $oResult->orderBy($sOrderBy, $sSort);

		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		foreach ($oResult as $dKey => $oValue) {
			// Set CMD type
			$oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
			$oResult[$dKey]->VOLUME = $oValue->VOLUME/100;
		}

		return $oResult;
	}
        
        
        
        public function getClosedTradesByDate($aFilters, $bFullSet=false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC')
	{
		$oFxHelper = new Fx();
		$oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');

		/* =============== Login Filters =============== */
		//if ((isset($aFilters['login']) && !empty($aFilters['login'])) ) {

				$oResult = $oResult->where('LOGIN', '=', $aFilters['login']);
		//}
		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}

		$oResult = $oResult->orderBy($sOrderBy, $sSort);

		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		foreach ($oResult as $dKey => $oValue) {
			// Set CMD type
			$oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
			$oResult[$dKey]->VOLUME = $oValue->VOLUME/100;
		}

		return $oResult;
	}

	/**
	 * Gets the closed orders by filters
	 *
	 * @param array $aFilters
	 * @param bool $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getOpenTradesByFilters($aFilters, $bFullSet=false, $sOrderBy = 'TICKET', $sSort = 'ASC')
	{
		$oFxHelper = new Fx();
		$oResult = Mt4Trade::where('CLOSE_TIME', '=', '1970-01-01 00:00:00');

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

		/* =============== Groups Filter  =============== */
		if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
			$aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
			$oResult = $oResult->whereIn('LOGIN', $aUsers);
		}

		/* =============== Symbols Filter  =============== */
		if (!isset($aFilters['all_symbols']) || !$aFilters['all_symbols']) {
			$oResult = $oResult->whereIn('SYMBOL', $aFilters['symbol']);
		}

		/* =============== Type Filter  =============== */
		if (isset($aFilters['type']) && !empty($aFilters['type'])) {
			if ($aFilters['type'] == 1) {
				$oResult = $oResult->where('CMD', '<', 2);
			} elseif ($aFilters['type'] == 2) {
				$oResult = $oResult->whereBetween('CMD', [2, 5]);
			}
		} else {
			$oResult = $oResult->where('CMD', '<', 6);
		}

		$oResult = $oResult->orderBy($sOrderBy, $sSort);

		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		foreach ($oResult as $dKey => $oValue) {
			// Set CMD type
			$oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
			$oResult[$dKey]->VOLUME = $oValue->VOLUME/100;
		}

		return $oResult;
	}
              
    /**
	 * Gets Deposit/Withdrawal for login
	 *
	 * @param array $aFilters 
	 * @return integer
	 */    
public function getDepositByLogin($aFilters){

        $oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 6);
        $oResult->where('LOGIN', '=', $aFilters['login']);
        
        
		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}

        return $oResult->sum('PROFIT');
}       
    /**
	 * Gets Credit Facility for login
	 *
	 * @param array $aFilters
	 * @return integer
	 */    
public function getCreditFacilityByLogin($aFilters){
    
        $oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 7);
        $oResult->where('LOGIN', '=', $aFilters['login']);
        
        
		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}

        return $oResult->sum('PROFIT');
}       
    /**
	 * Gets ClosedTrade for login
	 *
	 * @param array $aFilters
	 * @return integer
	 */
    public function getClosedTradeByLogin($aFilters) {
        $oResult = Mt4Trade::select('PROFIT')->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
        $oResult->where('LOGIN', '=', $aFilters['login']);
        $oResult->where('CMD', '<', 2);
        
		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}

        return $oResult->sum('PROFIT');
    }        
    /**
	 * Gets Floating  P/L for login
	 *
	 * @param array $aFilters
	 * @return integer
	 */    
    public function getFloatingByLogin($aFilters){
        
        $oResult = Mt4Trade::select('PROFIT')->where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
        $oResult->where('LOGIN', '=', $aFilters['login']);
        $oResult->where('CMD', '<', 2);
        
		/* =============== Date Filter  =============== */
		if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
			(isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

			if (!empty($aFilters['from_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'].' 00:00:00');
			}

			if (!empty($aFilters['to_date'])) {
				$oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'].' 23:59:59');
			}
		}

        return $oResult->sum('PROFIT');
    }
    
    	/**
	 * Gets the Commission by filters
	 *
	 * @param array $aFilters
	 * @param bool $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getCommissionByFilters($aFilters, $bFullSet=false, $sOrderBy = 'TICKET', $sSort = 'ASC')
	{
		$oFxHelper = new Fx();
        $oResult = Mt4Trade::groupBy('SYMBOL')->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
        $oResult->select(['SYMBOL',
            DB::raw('sum(COMMISSION) as COMMISSION'),
            DB::raw('sum(VOLUME) as VOLUME')
        ]);

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

		/* =============== Groups Filter  =============== */
		if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
			$aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
			$oResult = $oResult->whereIn('LOGIN', $aUsers);
		}

		//$oResult = $oResult;
		$oResult = $oResult->orderBy($sOrderBy, $sSort);
		
		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		foreach ($oResult as $dKey => $oValue) {
			// Set CMD type
			$oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
			$oResult[$dKey]->VOLUME = $oValue->VOLUME/100;
		}

		return $oResult;
	}
      
    	/**
	 * Gets the Agent Commission by filters
	 *
	 * @param array $aFilters
	 * @param bool $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getAgentCommissionByFilters($aFilters, $bFullSet=false, $sOrderBy = 'TICKET', $sSort = 'ASC')
	{
		$oFxHelper = new Fx();
		$oResult = Mt4Trade::groupBy('SYMBOL')->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
                $oResult ->select(['SYMBOL',
        DB::raw('sum(COMMISSION_AGENT) as COMMISSION'),
        DB::raw('sum(VOLUME) as VOLUME')
        ]);

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

		/* =============== Groups Filter  =============== */
		if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
			$aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
			$oResult = $oResult->whereIn('LOGIN', $aUsers);
		}

		//$oResult = $oResult;
		$oResult = $oResult->orderBy($sOrderBy, $sSort);
		
		if (!$bFullSet) {
			$oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
		} else {
			$oResult = $oResult->get();
		}

		/* =============== Preparing Output  =============== */
		foreach ($oResult as $dKey => $oValue) {
			// Set CMD type
			$oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
			$oResult[$dKey]->VOLUME = $oValue->VOLUME/100;
		}

		return $oResult;
	}
              
}