<?php namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Accounts\Http\Requests\AccountsRequest;

use Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract as Mt4Group;

class AccountsController extends Controller {
	
    /**
     * @var Mt4Group
     */
    protected $oUsers;
    
    
    public function __construct(
    Users $oUsers
    ) {
        $this->oUsers = $oUsers;
    }
	public function index()
	{
		return view('accounts::index');
	}
	
        

    public function getAccountsList(AccountsRequest $oRequest) {
      
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

}