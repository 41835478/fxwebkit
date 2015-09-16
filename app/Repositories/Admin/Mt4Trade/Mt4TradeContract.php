<?php

namespace Fxweb\Repositories\Admin\Mt4Trade;

/**
 * Interface Mt4TradeContract
 * @package App\Repositories\Mt4Trade
 */
interface Mt4TradeContract {

    /**
     * Gets the closed orders symbols
     *
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC');

    /**
     * Gets the open orders symbols
     *
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getOpenTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC');

    /**
     * Gets the orders types
     *
     * @return array
     */
    public function getTradesTypes();

    /**
     * Gets the closed orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getClosedTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC');

    /**
     * Gets the open orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getOpenTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC');/**
     * Gets the closed orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */

    public function getClosedTradesByDate($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC');

    /**
     * Gets the open orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getOpenTradesByDate($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC');

    /**
     * Gets Deposit/Withdrawal for login
     *
     * @param integer $login
     * @return integer
     */
    public function getDepositByLogin($login);

    /**
     * Gets Credit Facility for login
     *
     * @param integer $login
     * @return integer
     */
    public function getCreditFacilityByLogin($login);

    /**
     * Gets ClosedTrade for login
     *
     * @param integer $login
     * @return integer
     */
    public function getClosedTradeByLogin($login);

    /**
     * Gets Floating  P/L for login
     *
     * @param integer $login
     * @return integer
     */
    public function getFloatingByLogin($login);
}
