<?php

namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Modules\Accounts\Http\Controllers\ApiController;

class ClientAccountsController extends Controller {

    /**
     * @var Mt4Group
     */
    protected $oUsers;
    protected $oMt4Trade;
    protected $oMt4User;

    public function __construct(
    Users $oUsers, Mt4User $oMt4User, Mt4Trade $oMt4Trade
    ) {
        $this->oUsers = $oUsers;

        $this->oMt4Trade = $oMt4Trade;
        $this->oMt4User = $oMt4User;
    }

    public function getMt4UsersList(Request $oRequest) {

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

        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = $oRequest->group;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;
            $oResults = $this->oMt4User->getUsersByFilters($aFilterParams, false, $sOrder, $sSort);
        }

        return view('accounts::client.mt4Accounts')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getMt4UserDetails(Request $oRequest) {

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
            $oResults = $this->oMt4User->getUserInfo($aFilterParams['login']);

            $aSummery = [
                'deposit' => $this->oMt4Trade->getDepositByLogin($aFilterParams),
                'credit_facility' => $this->oMt4Trade->getCreditFacilityByLogin($aFilterParams),
                'closed_trade' => $this->oMt4Trade->getClosedTradeByLogin($aFilterParams),
                'floating' => $this->oMt4Trade->getFloatingByLogin($aFilterParams),
            ];
        }



        return view('accounts::client.accountStatement')
                        ->with('aGroups', $aGroups)
                        ->with('oResults', $oResults)
                        ->with('aSummery', $aSummery)
                        ->with('aFilterParams', $aFilterParams);
    }

    public function getMt4Leverage(Request $oRequest) {

        $Result = Config('accounts.leverage');
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage' => ''];

        return view('accounts::client.addLeverage')
                        ->with('Pssword', $Pssword)
                        ->with('changeleverage', $changeleverage)
                        ->with('login', $oRequest->login);
    }

    public function postMt4Leverage(Request $oRequest) {

        $Result = Config('accounts.leverage');
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');


        $changeleverage = [
            'login' => '',
            'oldPassword' => '',
            'leverage' => ''];

        $oApiController = new ApiController();
        $result = $oApiController->changeMt4Leverage($oRequest['login'], $oRequest['leverage'], $oRequest['oldPassword']);


        return view('accounts::client.addLeverage')
                        ->with('Result', $Result)
                        ->with('Pssword', $Pssword)
                        ->with('login', $oRequest->login)
                        ->withErrors($result);
    }

    public function getMt4ChangePassword(Request $oRequest) {
        $Password = Config('accounts.apiReqiredConfirmMt4Password');

        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => ''];

        return view('accounts::client.changePassword')
                        ->with('Password', $Password)
                        ->with('changePassword', $changePassword)
                        ->with('login', $oRequest->login);
    }

    public function postMt4ChangePassword(Request $oRequest) {
        $Password = Config('accounts.apiReqiredConfirmMt4Password');

        $changePassword = [
            'login' => '',
            'oldPassword' => '',
            'newPassword' => ''];

        $mT4ChangePassword = new ApiController();
        $result = $mT4ChangePassword->changeMt4Password($oRequest['login'], $oRequest['newPassword'], $oRequest['oldPassword']);

        return view('accounts::client.changePassword')
                        ->withErrors($result)
                        ->with('Password', $Password)
                        ->with('changePassword', $changePassword)
                        ->with('login', $oRequest->login);
    }

    public function getMt4InternalTransfer(Request $oRequest) {
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');
$allowTransferToUnsignedMT4=Config('accounts.allowTransferToUnsignedMT4');
        if(!$allowTransferToUnsignedMT4){
            $aFilterParams = [
                'from_login' => '',
                'to_login' => '',
                'exactLogin' => true,
                'login' =>$oRequest->login2,
                'name' => '',
                'all_groups' => true,
                'group' => '',
                'sort' => "",
                'order' => '',
                'signed' => 1,
                'account_id' => Sentinel::user()->id,
            ];
            $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, $sOrder, $sSort);
        }
        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        return view('accounts::client.internalTransfer')
                        ->with('Pssword', $Pssword)
                        ->with('internalTransfer', $internalTransfer)
                        ->with('login', $oRequest->login);
    }
    
    public function postMt4InternalTransfer(Request $oRequest) {

       
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');


         $internalTransfer = [
            'login' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        $oApiController = new ApiController();
        $result = $oApiController->internalTransfer($oRequest['login'], $oRequest['login2'], $oRequest['oldPassword'], $oRequest['amount']);


        return view('accounts::client.internalTransfer')
                        ->withErrors($result)
                        ->with('Pssword', $Pssword)
                        ->with('internalTransfer', $internalTransfer)
                        ->with('login', $oRequest->login);
    }

}
