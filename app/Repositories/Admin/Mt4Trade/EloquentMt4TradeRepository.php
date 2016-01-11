<?php

namespace Fxweb\Repositories\Admin\Mt4Trade;

use Fxweb\Helpers\Fx;
use Fxweb\Models\Mt4Trade;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Illuminate\Support\Facades\DB;
use Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use \YaLinqo\Enumerable;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4TradeRepository implements Mt4TradeContract {

    protected $oUsers;

    /**
     */
    public function __construct(Mt4User $oUsers) {
        $this->oUsers = $oUsers;
    }

    /**
     * Gets the closed orders symbols
     *
     * @param string $sOrderBy
     * @param string $sSort
     * @return mixed
     */
    public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC') {
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
    public function getOpenTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC') {
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
    public function getTradesTypes() {
        return [
            1 => 'ACTUAL_TRADES',
            2 => 'PENDING_TRADES',
        ];
    }

    /**
     * Gets the accountant types
     *
     * @return array
     */
    public function getAccountantTypes() {

        return [
            1 => 'BalanceOperations',
            2 => 'CreditOperations',
            3 => 'Deposits',
            4 => 'Withdraws',
            5 => 'CreditIn',
            6 => 'CreditOut',
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
    public function getClosedTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC') {
        $oFxHelper = new Fx();
        

        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
          
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                   
                            $query->where('users_id', $account_id);
                        })->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
            } else {
       
                $oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00'); 
               
            }
        }


        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
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
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $digits = $oResult[$dKey]->Mt4Prices()->first()->DIGITS;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    public function getOpenTradesByDate($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC') {
        
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
                $oResult = $oResult->where('OPEN_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('OPEN_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $digits = $oResult[$dKey]->Mt4Prices()->first()->DIGITS;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
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
    public function getClosedTradesByDate($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC') {
        
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
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $digits = $oResult[$dKey]->Mt4Prices()->first()->DIGITS;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
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
    public function getOpenTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC') {
        $oFxHelper = new Fx();
        //$oResult = Mt4Trade::where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
            } else {
                $oResult = Mt4Trade::where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
            }
        }
        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
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
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $digits = $oResult[$dKey]->Mt4Prices()->first()->DIGITS;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    /**
     * Gets Deposit/Withdrawal for login
     *
     * @param array $aFilters 
     * @return integer
     */
    public function getDepositByLogin($aFilters) {

        // $oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 6);
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->select('PROFIT')->where('CMD', '=', 6);
            } else {
                $oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 6);
            }
        }
        $oResult->where('LOGIN', '=', $aFilters['login']);


        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
                (isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
    public function getCreditFacilityByLogin($aFilters) {

        //$oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 7);
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->select('PROFIT')->where('CMD', '=', 7);
            } else {
                $oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 7);
            }
        }

        /* =================================== */



        $oResult->where('LOGIN', '=', $aFilters['login']);


        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
                (isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
        //$oResult = Mt4Trade::select('PROFIT')->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->select('PROFIT')->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
            } else {
                $oResult = Mt4Trade::select('PROFIT')->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
            }
        }

        /* =================================== */

        $oResult->where('LOGIN', '=', $aFilters['login']);
        $oResult->where('CMD', '<', 2);

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
                (isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
    public function getFloatingByLogin($aFilters) {

        // $oResult = Mt4Trade::select('PROFIT')->where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->select('PROFIT')->where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
            } else {
                $oResult = Mt4Trade::select('PROFIT')->where('CLOSE_TIME', '=', '1970-01-01 00:00:00');
            }
        }

        /* =================================== */
        $oResult->where('LOGIN', '=', $aFilters['login']);
        $oResult->where('CMD', '<', 2);

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
                (isset($aFilters['to_date']) && !empty($aFilters['to_date']))) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
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
    public function getCommissionByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC') {
        $oFxHelper = new Fx();
        // $oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
            } else {
                $oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00');
            }
        }

        /* =================================== */
        $oResult->select(['SYMBOL',
            DB::raw('sum(COMMISSION) as COMMISSION'),
            DB::raw('sum(VOLUME) as VOLUME')
        ]);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
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
        /* =============== get sum of volume  =============== */
        $totalResult = clone $oResult;
        $totalLotsResult = clone $oResult;
        $totalCommission = $totalResult->where('COMMISSION', '!=', 0)->sum('COMMISSION');
        $totalLots = $totalLotsResult->where('COMMISSION', '!=', 0)->sum('VOLUME');


        /* =============== $oResult = $oResult; ===================== */
        $oResult->groupBy('SYMBOL');
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
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;
        }

        return [$oResult, $totalCommission, $totalLots];
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
    public function getAgentCommissionByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC') {
        $oFxHelper = new Fx();
        //$oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')->where('COMMISSION_AGENT', '!=', 0);
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                            $query->where('users_id', $account_id);
                        })->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')->where('COMMISSION_AGENT', '!=', 0);
            } else {
                $oResult = Mt4Trade::where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')->where('COMMISSION_AGENT', '!=', 0);
            }
        }

        /* =================================== */
        $oResult->select(['SYMBOL',
            DB::raw('sum(COMMISSION_AGENT) as COMMISSION'),
            DB::raw('sum(VOLUME) as VOLUME')
        ]);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
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
        /* =============== get sum of volume  =============== */
        $totalResult = clone $oResult;
        $totalLotsResult = clone $oResult;
        $totalCommission = $totalResult->where('COMMISSION', '!=', 0)->sum('COMMISSION');
        $totalLots = $totalLotsResult->where('COMMISSION', '!=', 0)->sum('VOLUME');

        $oResult->groupBy('SYMBOL');
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
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;
        }

        return [$oResult, $totalCommission, $totalLots];
    }

    /**
     * Gets Accountant by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return array
     */
    public function getAccountantByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC') {
        $oFxHelper = new Fx();
        $oResult = new Mt4Trade();
        $aSummury = [];
        /* ===============================check admin or user================ */
        $oResult = new Mt4Trade();
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4Trade::with('users')->whereHas('users', function($query) use($account_id) {
                    $query->where('users_id', $account_id);
                });
            } else {
                $oResult = new Mt4Trade();
                
            }
        }

        /* =================================== */
        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
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
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Get sum info and others =============== */
        $depositResult = clone $oResult;
        $withdrawsResult = clone $oResult;
        $creditInResult = clone $oResult;
        $creditOutResult = clone $oResult;


        $aSummury ['deposits'] = $depositResult->where('CMD', 6)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['withdraws'] = $withdrawsResult->where('CMD', 6)->where('PROFIT', '<', 0)->sum('PROFIT');
        $aSummury ['creditIn'] = $creditInResult->where('CMD', 7)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['creditOut'] = $creditOutResult->where('CMD', 7)->where('PROFIT', '<', 0)->sum('PROFIT');

        /* =============== Type Filter  ===============

          1 => 'BalanceOperations',
          2 => 'CreditOperations',
          3 => 'Deposits',
          4 => 'Withdraws',
          5 => 'CreditIn',
          6 => 'CreditOut',
         */
        if (isset($aFilters['type']) && !empty($aFilters['type'])) {
            if ($aFilters['type'] == 1) {
                $oResult = $oResult->where('CMD', 6);
            } elseif ($aFilters['type'] == 2) {
                $oResult = $oResult->where('CMD', 7);
            } elseif ($aFilters['type'] == 3) {
                $oResult = $oResult->where('CMD', 6)->where('PROFIT', '>', 0);
            } elseif ($aFilters['type'] == 4) {
                $oResult = $oResult->where('CMD', 6)->where('PROFIT', '<', 0);
            } elseif ($aFilters['type'] == 5) {
                $oResult = $oResult->where('CMD', 7)->where('PROFIT', '>', 0);
            } elseif ($aFilters['type'] == 6) {
                $oResult = $oResult->where('CMD', 7)->where('PROFIT', '<', 0);
            }
        } else {
            $oResult = $oResult->where('CMD', '=', 6)->Orwhere('CMD', '=', 7);
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
            $oResult[$dKey]->TYPE = $oFxHelper->getAccountantType($oValue->CMD, $oValue->PROFIT);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->EQUITY     = round($oResult[$dKey]->EQUITY, 2);
            $oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE, 2);
            $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT, 2);
            $oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN, 2);
            $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE, 2);
            $oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE, 2);
        }

        return [$oResult, $aSummury];
    }

    
    public function getClinetGrowthChart($login)
    {


       // $horizontal_line_numbers = [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000];


        $oGrowthResults=Mt4Trade::select([DB::raw('PROFIT+COMMISSION+SWAPS as netProfit'),'CMD'])
            ->whereIn('cmd',[0,1,6])
            ->where('login',$login)
            ->orderBy('CLOSE_TIME')
            ->get();

       // $growth_array = [0.00, 590.00, 100.00, 150.00, 200.00, 250.00, 300.00, 350.00, 400.00, 450.00];
        $growth_array = [];
        $horizontal_line_numbers=[];
        $pastK=1;
        $lastBalance=0;
        $pastBalance=0;$i=0;
        foreach($oGrowthResults as $row){
            if($row->CMD !=6 && $lastBalance!=0){$i++;


                $growth_array[]=(($pastK * $pastBalance/$lastBalance) -1)*100;
                $horizontal_line_numbers[]=$i;
            }else if($row->CMD ==6){


                $pastK *=($lastBalance !=0)? ($pastBalance+$lastBalance/($lastBalance*$lastBalance)):1;
                $pastK/=($lastBalance !=0)? $lastBalance:1;

                    //$pastBalance+=$row->netProfit;

                $lastBalance= $pastBalance + $row->netProfit;

            }

            $pastBalance+=$row->netProfit;
        }

        $averages_array = [];

        /*
         * $result=Enumerable::from(array(1, 2, 3));
         * dd($result);
        */
        //Trades: Profit Trades:  Loss Trade: Best Trade: Worst Trade: Gross Profit: Gross Loss: Maximum consecutive wins: Maximal consecutive profit: Sharpe Ratio: Recovery Factor: Long Trades: Shart Trades: Profits Factor: Expected Payoff: Average Profit: Average Loss: Maximum consecutive losses: Maximal consecutive loss: Monthly grouth: Annual Farecast:
        //trades profit_trades loss_trade best_trade worst_trade gross_profit gross_loss maximum__consecutive_wins maximal_consecutive_profit sharpe_ratio recovery_factor long_trades shart_trades profits_factor expected_payoff average_profit average_loss maximum_consecutive_losses maximal_consecutive_loss monthly_grouth annual_farecast

        /*==== trades ====*/
        $trades = Mt4Trade::where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->where('login',$login)
            ->count();
        $statistics['trades'] = $trades;


        /*==== profit_trades ====*/

        $profit_trades_number = Mt4Trade::select(DB::raw('PROFIT+COMMISSION+SWAPS as total'))
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '>=', '0')
            ->get()
            ->count();
        $profit_trades_per =($trades>0)? round(($profit_trades_number / $trades * 100), 5):0;
        $statistics['profit_trades'] = $profit_trades_number . ' ( ' . $profit_trades_per . ' % ) ';


        /*==== loss_trade ====*/
        $loss_trade_number = $trades - $profit_trades_number;
        $loss_trade_per =($trades>0)? round($loss_trade_number / $trades * 100, 5):0;
        $statistics['loss_trade'] = $loss_trade_number . ' ( ' . $loss_trade_per . ' % ) ';


        /*==== best_trade ====*/

        $oBest_trade = Mt4Trade::select(['SYMBOL', 'PROFIT'])
            ->where('login',$login)
            ->orderBy('PROFIT', 'desc')
            ->first();

        $statistics['best_trade'] =(count($oBest_trade))?  $oBest_trade->PROFIT . ' ' . $oBest_trade->SYMBOL:0;



        /*==== worst_trade ====*/

        $oWorst_trade = Mt4Trade::select(['SYMBOL', 'PROFIT'])
            ->where('login',$login)
            ->orderBy('PROFIT', 'asc')
            ->first();
        $statistics['worst_trade']=(count($oWorst_trade))?  $oWorst_trade->PROFIT . ' ' . $oWorst_trade->SYMBOL:0;


        /*==== gross_profit ====*/

        $gross_profit_result =  Mt4Trade::select(['PROFIT',DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '>', '0')
            ->get()
            ->sum('PROFIT');

        //dd($gross_profit_result);
        $statistics['gross_profit']=$gross_profit_result;



        /*==== gross_loss ====*/

        $gross_loss_result =  Mt4Trade::select(['PROFIT',DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '<', '0')
            ->get()
            ->sum('PROFIT');
        $statistics['gross_loss']=$gross_loss_result;


        $statistics['maximum_consecutive_wins']=00;
        $statistics['maximal_consecutive_profit']=00;
        $statistics['sharpe_ratio']=00;
        $statistics['recovery_factor']=00;

        /*=== long_trades ====*/

        $long_trades = Mt4Trade::where('cmd', '=', '0')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['long_trades']=$long_trades;



        /*=== short_trades ====*/

        $short_trades = Mt4Trade::where('cmd', '=', '1')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['short_trades']=$short_trades;


        /*=== profits_factor ====*/
        $statistics['profits_factor']=($gross_loss_result !=0)? $gross_profit_result/$gross_loss_result * 100 :0;
        $statistics['profits_factor']=($gross_profit_result >= $gross_loss_result)? abs($statistics['profits_factor']):abs($statistics['profits_factor']) * -1;


        $statistics['expected_payoff']=00;
        $statistics['average_profit']=00;
        $statistics['average_loss']=00;
        $statistics['maximum_consecutive_losses']=00;
        $statistics['maximal_consecutive_loss']=00;
        $statistics['monthly_grouth']=00;
        $statistics['annual_farecast']=00;
      
        
        return [ $horizontal_line_numbers ,$growth_array, $averages_array,$statistics];
        
    }


    public function getClinetBalanceChart($login)
    {


        // $horizontal_line_numbers = [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000];


        $oGrowthResults=Mt4Trade::select([DB::raw('PROFIT+COMMISSION+SWAPS as netProfit'),'CMD'])
            ->where('login',$login)
            ->whereIn('cmd',[0,1,6])
            ->orderBy('CLOSE_TIME')
            ->get();


        $balance_array = [];
        $horizontal_line_numbers=[];

        $pastBalance=0;
        $i=0;
        foreach($oGrowthResults as $row){


            $pastBalance+=$row->netProfit;
                $balance_array[]=$pastBalance;
            $i++;
                $horizontal_line_numbers[]=$i;

        }



        /*==== trades ====*/
        $trades = Mt4Trade::where('cmd', '<', '2')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['trades'] = $trades;


        /*==== profit_trades ====*/

        $profit_trades_number = Mt4Trade::select(DB::raw('PROFIT+COMMISSION+SWAPS as total'))
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '>=', '0')
            ->get()
            ->count();
        $profit_trades_per =($trades>0)? round(($profit_trades_number / $trades * 100), 5):0;
        $statistics['profit_trades'] = $profit_trades_number . ' ( ' . $profit_trades_per . ' % ) ';


        /*==== loss_trade ====*/
        $loss_trade_number = $trades - $profit_trades_number;
        $loss_trade_per =($trades>0)?  round($loss_trade_number / $trades * 100, 5):0;
        $statistics['loss_trade'] = $loss_trade_number . ' ( ' . $loss_trade_per . ' % ) ';


        /*==== best_trade ====*/

        $oBest_trade = Mt4Trade::select(['SYMBOL', 'PROFIT'])
            ->where('login',$login)
            ->orderBy('PROFIT', 'desc')
            ->first();

        $statistics['best_trade'] =(count($oBest_trade))?  $oBest_trade->PROFIT . ' ' . $oBest_trade->SYMBOL:0;



        /*==== worst_trade ====*/

        $oWorst_trade = Mt4Trade::select(['SYMBOL', 'PROFIT'])
            ->where('login',$login)
            ->orderBy('PROFIT', 'asc')
            ->first();
        $statistics['worst_trade']=(count($oWorst_trade))?  $oWorst_trade->PROFIT . ' ' . $oWorst_trade->SYMBOL:0;


        /*==== gross_profit ====*/

        $gross_profit_result =  Mt4Trade::select(['PROFIT',DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '>', '0')
            ->get()
            ->sum('PROFIT');

        //dd($gross_profit_result);
        $statistics['gross_profit']=$gross_profit_result;



        /*==== gross_loss ====*/

        $gross_loss_result =  Mt4Trade::select(['PROFIT',DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '<', '0')
            ->get()
            ->sum('PROFIT');
        $statistics['gross_loss']=$gross_loss_result;


        $statistics['maximum_consecutive_wins']=00;
        $statistics['maximal_consecutive_profit']=00;
        $statistics['sharpe_ratio']=00;
        $statistics['recovery_factor']=00;

        /*=== long_trades ====*/

        $long_trades = Mt4Trade::where('cmd', '=', '0')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['long_trades']=$long_trades;



        /*=== short_trades ====*/

        $short_trades = Mt4Trade::where('cmd', '=', '1')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['short_trades']=$short_trades;


        /*=== profits_factor ====*/
        $statistics['profits_factor']=($gross_loss_result !=0)? $gross_profit_result/$gross_loss_result * 100 :0;
        $statistics['profits_factor']=($gross_profit_result >= $gross_loss_result)? abs($statistics['profits_factor']):abs($statistics['profits_factor']) * -1;

        $statistics['expected_payoff']=00;
        $statistics['average_profit']=00;
        $statistics['average_loss']=00;
        $statistics['maximum_consecutive_losses']=00;
        $statistics['maximal_consecutive_loss']=00;
        $statistics['monthly_grouth']=00;
        $statistics['annual_farecast']=00;
        

        return [ $horizontal_line_numbers ,$balance_array,$statistics];

    }

    public function getClinetSymbolsChart($login){
        // $horizontal_line_numbers = [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900, 3000];



        $oGrowthResults=Mt4Trade::select([DB::raw('sum(VOLUME) as valume'),'SYMBOL'])
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->whereIn('cmd',[0,1])
            ->groupBy('SYMBOL')
            ->orderBy('CLOSE_TIME')
            ->get();


        $symbols_pie_array = [];
        $horizontal_line_numbers=[];
//$totalValume=0;

        $i=0;

        //foreach($oGrowthResults as $row){$totalValume+=$row->valume;}
        foreach($oGrowthResults as $row){

//$valume=($totalValume!=0)? $row->valume/$totalValume:0;

            $symbols_pie_array[]=['name'=>[$row->SYMBOL],'y'=>$row->valume*1];


        }



        $oGrowthResults=Mt4Trade::select([DB::raw('sum(VOLUME) as valume'),'SYMBOL','CMD'])
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->whereIn('cmd',[0,1])
            ->groupBy(['SYMBOL','CMD'])
            ->orderBy('SYMBOL')
            ->get();

        $sell_array=[];
        $buy_array=[];

        foreach($oGrowthResults as $row){
            if(!in_array($row->SYMBOL,$horizontal_line_numbers)){$horizontal_line_numbers[]=$row->SYMBOL;}
            if($row->CMD==1){
            $sell_array[]=$row->valume*-1;
        }else if($row->CMD==0){
                $buy_array[]=$row->valume*1;
            }

        }
        /*==== trades ====*/
        $trades = Mt4Trade::where('cmd', '<', '2')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['trades'] = $trades;


        /*==== profit_trades ====*/

        $profit_trades_number = Mt4Trade::select(DB::raw('PROFIT+COMMISSION+SWAPS as total'))
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '>=', '0')
            ->get()
            ->count();
        $profit_trades_per =($trades>0)? round(($profit_trades_number / $trades * 100), 5):0;
        $statistics['profit_trades'] = $profit_trades_number . ' ( ' . $profit_trades_per . ' % ) ';


        /*==== loss_trade ====*/
        $loss_trade_number = $trades - $profit_trades_number;
        $loss_trade_per =($trades>0)?  round($loss_trade_number / $trades * 100, 5):0;
        $statistics['loss_trade'] = $loss_trade_number . ' ( ' . $loss_trade_per . ' % ) ';


        /*==== best_trade ====*/

        $oBest_trade = Mt4Trade::select(['SYMBOL', 'PROFIT'])
            ->where('login',$login)
            ->orderBy('PROFIT', 'desc')
            ->first();

        $statistics['best_trade'] =(count($oBest_trade))?  $oBest_trade->PROFIT . ' ' . $oBest_trade->SYMBOL:0;



        /*==== worst_trade ====*/

        $oWorst_trade = Mt4Trade::select(['SYMBOL', 'PROFIT'])
            ->where('login',$login)
            ->orderBy('PROFIT', 'asc')
            ->first();
        $statistics['worst_trade']=(count($oWorst_trade))?  $oWorst_trade->PROFIT . ' ' . $oWorst_trade->SYMBOL:0;


        /*==== gross_profit ====*/

        $gross_profit_result =  Mt4Trade::select(['PROFIT',DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '>', '0')
            ->get()
            ->sum('PROFIT');

        //dd($gross_profit_result);
        $statistics['gross_profit']=$gross_profit_result;



        /*==== gross_loss ====*/

        $gross_loss_result =  Mt4Trade::select(['PROFIT',DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login',$login)
            ->where('cmd', '<', '2')
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->having('total', '<', '0')
            ->get()
            ->sum('PROFIT');
        $statistics['gross_loss']=$gross_loss_result;


        $statistics['maximum_consecutive_wins']=00;
        $statistics['maximal_consecutive_profit']=00;
        $statistics['sharpe_ratio']=00;
        $statistics['recovery_factor']=00;

        /*=== long_trades ====*/

        $long_trades = Mt4Trade::where('cmd', '=', '0')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['long_trades']=$long_trades;



        /*=== short_trades ====*/

        $short_trades = Mt4Trade::where('cmd', '=', '1')
            ->where('login',$login)
            ->where('CLOSE_TIME', '!=', '1970-01-01 00:00:00')
            ->count();
        $statistics['short_trades']=$short_trades;


        /*=== profits_factor ====*/
        $statistics['profits_factor']=($gross_loss_result !=0)? $gross_profit_result/$gross_loss_result * 100 :0;
        $statistics['profits_factor']=($gross_profit_result >= $gross_loss_result)? abs($statistics['profits_factor']):abs($statistics['profits_factor']) * -1;

        $statistics['expected_payoff']=00;
        $statistics['average_profit']=00;
        $statistics['average_loss']=00;
        $statistics['maximum_consecutive_losses']=00;
        $statistics['maximal_consecutive_loss']=00;
        $statistics['monthly_grouth']=00;
        $statistics['annual_farecast']=00;


        return [ $horizontal_line_numbers ,$symbols_pie_array,$sell_array,$buy_array,$statistics];


    }
}
