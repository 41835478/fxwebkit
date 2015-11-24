<?php

namespace Modules\Reports\Http\Controllers\Admin;

use Fxweb\Helpers\Export;
use Pingpong\Modules\Routing\Controller;
use Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract as Mt4Group;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Modules\Reports\Http\Requests\Admin\ClosedTradesRequest;
use Modules\Reports\Http\Requests\Admin\OpenTradesRequest;
use Modules\Reports\Http\Requests\Admin\AccountsRequest;
use Modules\Reports\Http\Requests\Admin\AccountStatementRequest;
use Modules\Reports\Http\Requests\Admin\CommissionRequest;
use Modules\Reports\Http\Requests\Admin\AccountantRequest;
class ReportsController extends Controller {

    /**
     * @var Mt4Group
     */
    protected $oMt4Group;
    protected $oMt4Trade;
    protected $oMt4User;

    public function __construct(
    Mt4Group $oMt4Group, Mt4Trade $oMt4Trade, Mt4User $oMt4User
    ) {
        $this->oMt4Group = $oMt4Group;
        $this->oMt4Trade = $oMt4Trade;
        $this->oMt4User = $oMt4User;
    }

    public function getClosedOrders(ClosedTradesRequest $oRequest) {
        $oGroups = $this->oMt4Group->getAllGroups();
        $oSymbols = $this->oMt4Trade->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getTradesTypes();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
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
            'sort' => 'ASC',
            'order' => 'TICKET',
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
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
        }

        if ($oRequest->has('export')) {
            $oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, true, $sOrder, $sSort);
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

        if ($oRequest->has('search')) {
            $oResults = $this->oMt4Trade->getClosedTradesByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }

        return view('reports::closedOrders')
                        ->with('aGroups', $aGroups)
                        ->with('aSymbols', $aSymbols)
                        ->with('aTradeTypes', $aTradeTypes)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getOpenOrders(OpenTradesRequest $oRequest) {
        $oGroups = $this->oMt4Group->getAllGroups();
        $oSymbols = $this->oMt4Trade->getOpenTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getTradesTypes();
        $aGroups = [];
        $aSymbols = [];
        $oResults = null;
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
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
            'sort' => 'ASC',
            'order' => 'TICKET'
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
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
        }

        if ($oRequest->has('export')) {
            $oResults = $this->oMt4Trade->getOpenTradesByFilters($aFilterParams, true, $sOrder, $sSort);
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

        if ($oRequest->has('search')) {
            $oResults = $this->oMt4Trade->getOpenTradesByFilters($aFilterParams, false, $sOrder, $sSort);
        }

        return view('reports::openOrders')
                        ->with('aGroups', $aGroups)
                        ->with('aSymbols', $aSymbols)
                        ->with('aTradeTypes', $aTradeTypes)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getAccounts(AccountsRequest $oRequest) {
        $oGroups = $this->oMt4User->getAllGroups();
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'name' => '',
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
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);
        }


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

        return view('reports::accounts')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getAccountStatement(AccountStatementRequest $oRequest) {
        $oGroups = $this->oMt4User->getAllGroups();
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'asc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'login';
        $aGroups = [];
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
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            $oOpenResults = $this->oMt4Trade->getOpenTradesByDate($aFilterParams, true, $sOrder, $sSort);
            $oCloseResults = $this->oMt4Trade->getClosedTradesByDate($aFilterParams, true, $sOrder, $sSort);
            $oResults = $this->oMt4User->getUserInfo($aFilterParams['login']);

            $aSummery = [
                'deposit' => $this->oMt4Trade->getDepositByLogin($aFilterParams),
                'credit_facility' => $this->oMt4Trade->getCreditFacilityByLogin($aFilterParams),
                'closed_trade' => $this->oMt4Trade->getClosedTradeByLogin($aFilterParams),
                'floating' => $this->oMt4Trade->getFloatingByLogin($aFilterParams),
            ];
        }



        return view('reports::accountStatement')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('oOpenResults', $oOpenResults)
                        ->with('oCloseResults', $oCloseResults)
                        ->with('aSummery', $aSummery)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getCommission(CommissionRequest $oRequest) {
       $oGroups = $this->oMt4Group->getAllGroups();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
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
            'sort' => 'ASC',
            'order' => 'TICKET',
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

        if ($oRequest->has('search')) {
            $oResults = $this->oMt4Trade->getCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
        //  dd($oResults[0]);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];
        }

        return view('reports::commission')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    
    
    public function getAgentCommission(CommissionRequest $oRequest) {
       $oGroups = $this->oMt4Group->getAllGroups();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
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
            'sort' => 'ASC',
            'order' => 'TICKET',
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

        if ($oRequest->has('search')) {
            $oResults = $this->oMt4Trade->getAgentCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];
        }

        return view('reports::agentCommission')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    
    
    public function getAccountant(AccountantRequest $oRequest) {
        $oGroups = $this->oMt4Group->getAllGroups();
        $oSymbols = $this->oMt4Trade->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getAccountantTypes();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
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
            'sort' => 'ASC',
            'order' => 'TICKET',
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
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['type'] = $oRequest->type;
        }

      
        if ($oRequest->has('search')) {
            $oResults = $this->oMt4Trade->getAccountantByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];
        }
        
        return view('reports::accountant')
                        ->with('aGroups', $aGroups)
                        ->with('aSymbols', $aSymbols)
                        ->with('aTradeTypes', $aTradeTypes)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

}
