<?php

namespace Modules\Reports\Http\Controllers\Client;

use Fxweb\Helpers\Export;
use Pingpong\Modules\Routing\Controller;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Modules\Reports\Http\Requests\Admin\ClosedTradesRequest;
use Modules\Reports\Http\Requests\Admin\OpenTradesRequest;
use Modules\Reports\Http\Requests\Admin\AccountsRequest;
use Modules\Reports\Http\Requests\Admin\AccountStatementRequest;
use Modules\Reports\Http\Requests\Admin\CommissionRequest;
use Modules\Reports\Http\Requests\Admin\AccountantRequest;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract as Mt4Group;

class ReportsController extends Controller
{

    /**
     * @var Mt4Group
     */
    protected $oMt4Trade;
    protected $oMt4User;
    protected $oMt4Group;

    public function __construct(
        Mt4Trade $oMt4Trade, Mt4User $oMt4User,Mt4Group $oMt4Group
    )
    {
        $this->oMt4Trade = $oMt4Trade;
        $this->oMt4User = $oMt4User;
        $this->oMt4Group = $oMt4Group;
    }

    public function getClosedOrders(ClosedTradesRequest $oRequest)
    {
        $oSymbols = $this->oMt4Trade->getClosedTradesSymbols();

        $aTradeTypes =  $this->oMt4Trade->getTradesTypes();
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $sSort = (isset($oRequest->sort))? $oRequest->sort:'ASC';
        $sOrder = (isset($oRequest->order))? $oRequest->order:'TICKET';
        $aSymbols = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'from_date' => '',
            'to_date' => '',
            'all_groups' => true,
            'group' => '',
            'all_symbols' => true,
            'symbol' => '',
            'type' => '',
            'server_id' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        foreach ($oSymbols as $oSymbol) {
            $aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
        }

        foreach ($aTradeTypes as $sKey => $sValue) {
            $aTradeTypes[$sKey] = trans('general.' . $sValue);
        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = [];
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
            $aFilterParams['server_id'] = $oRequest->server_id;
        }

        if ($oRequest->has('export')) {
            $oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, true, $sOrder, $sSort);
            $sOutput = $oRequest->export;
            $aData = [];
            $aHeaders = [
                trans('reports::reports.Order#'),
                trans('reports::reports.Login'),
                trans('reports::reports.Symbol'),
                trans('reports::reports.Type'),
                trans('reports::reports.Lots'),
                trans('reports::reports.OpenPrice'),
                trans('reports::reports.SL'),
                trans('reports::reports.TP'),
                trans('reports::reports.Commission'),
                trans('reports::reports.Swaps'),
                trans('reports::reports.Price'),
                trans('reports::reports.Profit'),
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


            $oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];

        return view('reports::client.closedOrders')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getOpenOrders(OpenTradesRequest $oRequest)
    {
        $oSymbols = $this->oMt4Trade->getOpenTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getTradesTypes();
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $aSymbols = [];
        $oResults = null;
        $sSort = (isset($oRequest->sort))? $oRequest->sort:'ASC';
        $sOrder = (isset($oRequest->order))? $oRequest->order:'TICKET';
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'all_groups' => true,
            'group' => '',
            'all_symbols' => true,
            'symbol' => '',
            'type' => '',
            'server_id' => '',
            'sort' => $sSort,
            'order' => $sOrder
        ];


        foreach ($oSymbols as $oSymbol) {
            $aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
        }

        foreach ($aTradeTypes as $sKey => $sValue) {
            $aTradeTypes[$sKey] = trans('general.' . $sValue);
        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = [];
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
            $aFilterParams['server_id'] = $oRequest->server_id;
        }

        if ($oRequest->has('export')) {
            $oResults = $this->oMt4Trade->getOpenTradesByFilters($aFilterParams, true, $sOrder, $sSort);
            $sOutput = $oRequest->export;
            $aData = [];
            $aHeaders = [
                trans('reports::reports.Order#'),
                trans('reports::reports.Login'),
                trans('reports::reports.Symbol'),
                trans('reports::reports.Type'),
                trans('reports::reports.Lots'),
                trans('reports::reports.OpenPrice'),
                trans('reports::reports.SL'),
                trans('reports::reports.TP'),
                trans('reports::reports.Commission'),
                trans('reports::reports.Swaps'),
                trans('reports::reports.Price'),
                trans('reports::reports.Profit'),
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

            $oResults = $this->oMt4Trade->getOpenTradesByFilters($aFilterParams, false, $sOrder, $sSort);

        return view('reports::client.openOrders')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('serverTypes', $serverTypes)
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAccounts(AccountsRequest $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'name' => '',
            'all_groups' => true,
            'group' => '',
            'server_id' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $aFilterParams['from_login'] = $oRequest->from_login;
        $aFilterParams['to_login'] = $oRequest->to_login;
        $aFilterParams['exactLogin'] = $oRequest->exactLogin;
        $aFilterParams['login'] = $oRequest->login;
        $aFilterParams['name'] = $oRequest->name;
        $aFilterParams['all_groups'] = true;
        $aFilterParams['group'] = [];
        $aFilterParams['server_id'] = $oRequest->server_id;
        $aFilterParams['sort'] = $oRequest->sort;
        $aFilterParams['order'] = $oRequest->order;
        $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);


        if ($oRequest->has('export')) {
            $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, true, $sOrder, $sSort);
            $sOutput = $oRequest->export;
            $aData = [];
            $aHeaders = [
                trans('reports::reports.Login'),
                trans('reports::reports.Name'),
                trans('reports::reports.Group'),
                trans('reports::reports.Equity'),
                trans('reports::reports.Balance'),
                trans('reports::reports.Comments')
            ];

            foreach ($oResults as $oResult) {
                $aData[] = [
                    $oResult->LOGIN,
                    $oResult->NAME,
                    $oResult->GROUP,
                    $oResult->EQUITY,
                    $oResult->BALANCE,
                    $oResult->COMMENTS,
                ];
            }
            $oExport = new Export($aHeaders, $aData);
            return $oExport->export($sOutput);
        }

        return view('reports::client.accounts')
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAccountStatement(AccountStatementRequest $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $oResults = null;
        $oOpenResults = null;
        $oCloseResults = null;
        $aFilterParams = [
            'login' => '',
            'from_date' => '',
            'to_date' => '',

            'sort' => $sSort,
            'order' => $sOrder,
        ];
        $aSummery = [
            'deposit' => 0,
            'credit_facility' => 0,
            'closed_trade' => 0,
            'floating' => 0,
        ];

        if ($oRequest->has('search')) {

            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['server_id'] = $oRequest->server_id;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

        }

            $oOpenActualResults = $this->oMt4Trade->getOpenTradesByDate($aFilterParams, false, $sOrder, $sSort,'page','mt4_open_actual');
            $oOpenPendingResults = $this->oMt4Trade->getOpenTradesByDate($aFilterParams, false, $sOrder, $sSort,'first_page','mt4_open_pending');

            $oCloseActualResults = $this->oMt4Trade->getClosedTradesByDate($aFilterParams, false, $sOrder, $sSort,'second_page','mt4_closed_actual');
            $oCloseBalanceResults =$this->oMt4Trade->getClosedTradesByDate($aFilterParams, false, $sOrder, $sSort,'third_page','mt4_closed_balance');
            $oClosePendingResults = $this->oMt4Trade->getClosedTradesByDate($aFilterParams, false, $sOrder, $sSort,'forth_page','mt4_closed_pending');
            $oResults = $this->oMt4User->getUserInfo($aFilterParams['login']);

            $aSummery = [
                'deposit' => $this->oMt4Trade->getDepositByLogin($aFilterParams),
                'credit_facility' => $this->oMt4Trade->getCreditFacilityByLogin($aFilterParams),
                'closed_trade' => $this->oMt4Trade->getClosedTradeByLogin($aFilterParams),
                'floating' => $this->oMt4Trade->getFloatingByLogin($aFilterParams),
            ];



        return view('reports::client.accountStatement')
            ->with('oResults', $oResults)
            ->with('oOpenActualResults',$oOpenActualResults)
            ->with('oOpenPendingResults',$oOpenPendingResults)
            ->with('oCloseActualResults',$oCloseActualResults)
            ->with('oCloseBalanceResults',$oCloseBalanceResults )
            ->with('oClosePendingResults',$oClosePendingResults)
            ->with('aSummery', $aSummery)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getCommission(CommissionRequest $oRequest)
    {
        $sSort = (isset($oRequest->sort))? $oRequest->sort:'ASC';
        $sOrder = (isset($oRequest->order))? $oRequest->order:'TICKET';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'from_date' => '',
            'to_date' => '',
            'all_groups' => true,
            'group' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = [];
        }

        $chartData=[];
        $chartData2=[];

            $oResults = $this->oMt4Trade->getCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];


            foreach($oResults[0] as $resutl){
                $chartData[]=['name'=>$resutl->SYMBOL,'y'=>$resutl->COMMISSION*-1];
                $chartData2[]=[$resutl->SYMBOL,$resutl->VOLUME];

            }


        return view('reports::client.commission')
            ->with('oResults', $oResults)
            ->with('chartData', $chartData)
            ->with('chartData2', $chartData2)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAccountant(AccountantRequest $oRequest)
    {
        $oSymbols = $this->oMt4Trade->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getAccountantTypes();
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $sSort = (isset($oRequest->sort))? $oRequest->sort:'ASC';
        $sOrder = (isset($oRequest->order))? $oRequest->order:'TICKET';
        $aGroups = [];
        $aSymbols = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'from_date' => '',
            'to_date' => '',
            'all_groups' => true,
            'group' => '',
            'all_symbols' => true,
            'symbol' => '',
            'type' => '',
            'server_id' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        foreach ($oSymbols as $oSymbol) {
            $aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
        }

        foreach ($aTradeTypes as $sKey => $sValue) {
            $aTradeTypes[$sKey] = trans('general.' . $sValue);
        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = [];
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
            $aFilterParams['server_id'] = $oRequest->server_id;
        }

            $oResults = $this->oMt4Trade->getAccountantByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];


        return view('reports::client.accountant')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getDailyReport(Request $oRequest)
    {
        $oGroups = $this->oMt4Group->getAllGroups();
        $sSort = (isset($oRequest->sort))? $oRequest->sort:'ASC';
        $sOrder = (isset($oRequest->order))? $oRequest->order:'login';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'from_date' => '',
            'to_date' => '',
            'all_groups' => true,
            'group' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        foreach ($oGroups as $oGroup) {
            $aGroups[$oGroup->group] = $oGroup->group;
        }

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
        }

            $oResults = $this->oMt4Trade->getDailyReportByFilters($aFilterParams, false, $sOrder, $sSort);

        return view('reports::client.dailyReport')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

}
