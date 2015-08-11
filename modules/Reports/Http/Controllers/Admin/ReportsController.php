<?php namespace Modules\Reports\Http\Controllers\Admin;

use Fxweb\Helpers\Export;
use Pingpong\Modules\Routing\Controller;
use Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract as Mt4Group;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Modules\Reports\Http\Requests\Admin\ClosedTradesRequest;

class ReportsController extends Controller
{
	/**
	 * @var Mt4Group
	 */
	protected $oMt4Group;
	protected $oMt4Trade;

	public function __construct(
		Mt4Group $oMt4Group,
		Mt4Trade $oMt4Trade
	)
	{
		$this->oMt4Group = $oMt4Group;
		$this->oMt4Trade = $oMt4Trade;
	}

	public function getClosedOrders(ClosedTradesRequest $oRequest)
	{
		$oGroups = $this->oMt4Group->getAllGroups();
		$oSymbols = $this->oMt4Trade->getClosedTradesSymbols();
		$aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getClosedTradesTypes();
		$aGroups = [];
		$aSymbols = [];
		$oResults = null;
		$aFilterParams = [
			'from_login' => '',
			'to_login' => '',
			'from_date' => '',
			'to_date' => '',
			'all_groups' => true,
			'group' => '',
			'all_symbols' => true,
			'symbol' => '',
			'type' => '',
		];

		foreach ($oGroups as $oGroup) {
			$aGroups[$oGroup->group] = $oGroup->group;
		}

		foreach ($oSymbols as $oSymbol) {
			$aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
		}

		foreach ($aTradeTypes as $sKey => $sValue) {
			$aTradeTypes[$sKey] = trans('general.' . $sValue);
		}

		if ($oRequest->has('search')) {
			$aFilterParams['from_login'] = $oRequest->from_login;
			$aFilterParams['to_login'] = $oRequest->to_login;
			$aFilterParams['from_date'] = $oRequest->from_date;
			$aFilterParams['to_date'] = $oRequest->to_date;
			$aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
			$aFilterParams['group'] = $oRequest->group;
			$aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
			$aFilterParams['symbol'] = $oRequest->symbol;
			$aFilterParams['type'] = $oRequest->type;
		}

		if ($oRequest->has('export')) {
			$oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, true);
			$sOutput = $oRequest->export;
			$aData = [];
			$aHeaders = [
				trans('general.Order#'),
				trans('general.Login'),
				trans('general.Symbol'),
				trans('general.Type'),
				trans('general.Lots'),
				trans('general.OpenPrice'),
				trans('general.SL'),
				trans('general.TP'),
				trans('general.Commission'),
				trans('general.Swaps'),
				trans('general.Price'),
				trans('general.Profit'),
			];
			
			foreach ($oResults as $oResult) {
				$aData[] = [
					$oResult->TICKET,
					$oResult->LOGIN,
					$oResult->SYMBOL,
					$oResult->TYPE,
					$oResult->VOLUME,
					$oResult->OPEN_PRICE,
					$oResult->SL,
					$oResult->TP,
					$oResult->COMMISSION,
					$oResult->SWAPS,
					$oResult->CLOSE_PRICE,
					$oResult->PROFIT,
				];
			}
			$oExport = new Export($aHeaders, $aData);
			return $oExport->export($sOutput);
		}

		$oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams);

		return view('reports::closedOrders')
			->with('aGroups', $aGroups)
			->with('aSymbols', $aSymbols)
			->with('aTradeTypes', $aTradeTypes)
			->with('oResults', $oResults)
			->with('aFilterParams', $aFilterParams);
	}

	public function getOpenOrders()
	{

	}

}