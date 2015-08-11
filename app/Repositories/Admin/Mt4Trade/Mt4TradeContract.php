<?php namespace Fxweb\Repositories\Admin\Mt4Trade;
/**
 * Interface Mt4TradeContract
 * @package App\Repositories\Mt4Trade
 */
interface Mt4TradeContract
{
	/**
	 * Gets the closed orders symbols
	 *
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC');

	/**
	 * Gets the closed orders types
	 *
	 * @return array
	 */
	public function getClosedTradesTypes();

	/**
	 * Gets the closed orders by filters
	 *
	 * @param array $aFilters
	 * @param bool $bFullSet
	 * @param string $sOrderBy
	 * @param string $sSort
	 * @return object
	 */
	public function getClosedTradesByFilters($aFilters, $bFullSet=false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC');
}