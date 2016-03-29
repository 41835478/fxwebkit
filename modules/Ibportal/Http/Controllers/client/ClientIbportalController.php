<?php namespace Modules\Ibportal\Http\Controllers\client;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;
use Fxweb\Repositories\Admin\User\UserContract as Users;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4Users;
use Illuminate\Support\Facades\Config;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Ibportal\Entities\IbportalUserIbid as UserIbid;

class ClientIbportalController extends Controller
{

    public function index()
    {
        return view('Ibportal::index');
    }

    protected $Mt4Configrations;
    protected $Ibportal;
    protected $Users;
    protected $oMt4Trade;
    protected $oMt4User;

    public function __construct(
        Mt4Configrations $Mt4Configrations, Ibportal $Ibportal, Users $Users, Mt4Trade $oMt4Trade,Mt4Users $oMt4User
    )
    {
        $this->Ibportal = $Ibportal;
        $this->Mt4Configrations = $Mt4Configrations;
        $this->Users = $Users;
        $this->oMt4Trade = $oMt4Trade;
        $this->oMt4User=$oMt4User;
    }


    public function getPlanList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $aFilterParams['name'] = $oRequest->name;


        $oResults = $this->Ibportal->getClientPlansByFilters($aFilterParams, false, $sOrder, $sSort, current_user()->getUser()->id);


        $userIbid = UserIbid::where('user_id', current_user()->getUser()->id)->first();


        if (count($userIbid)) {
            return view('ibportal::client.plan_list')
                ->with('oResults', $oResults)
                ->with('ibid', $userIbid->user_ibid)
                ->with('aFilterParams', $aFilterParams);
        } else {
            return $this->getAgreemmentPlan();
        }
    }


    public function getDetailsPlan(Request $request)
    {


        $oPlanDetails = $this->Ibportal->getPlanDetails($request->edit_id);


        return view('ibportal::client.detailsPlan')
            ->with('oPlanDetails', $oPlanDetails->first());
    }

    public function getAgreemmentPlan()
    {
        return view('ibportal::client.agreemment_plan');
    }


    public function postAgreemmentPlan(Request $request)
    {

        if ($request->has('agree')) {
            $this->Ibportal->generateUserIbId(current_user()->getUser()->id);
        }

        return Redirect::route('client.ibportal.planList');
    }

    public function getAgentUsers(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $agentId = current_user()->getUser()->id;
        $oResults = null;
        $aFilterParams = [
            'agent_id' => $agentId,
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['agent_id'] = $agentId;
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->Users->getClientAgentUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role, $agentId);

        }


        $userIbid = UserIbid::where('user_id', current_user()->getUser()->id)->first();

        if (count($userIbid)) {
            return view('ibportal::client.agent_users')->with('oResults', $oResults)
                ->with('aFilterParams', $aFilterParams);
        } else {
            return $this->getAgreemmentPlan();
        }


    }


    public function getAgentCommission(Request $oRequest)
    {

        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $oResults = null;
        $aFilterParams = [
            'from_login' => '',
            'to_login' => '',
            'exactLogin' => false,
            'login' => '',
            'agentName' => [current_user()->getUser()->id],
            'planName' => [],
            'usresName' => [],
            'mt4UsresName' => [],
            'server_id' => '',
            'sort' => 'ASC',
            'order' => 'TICKET',
        ];


        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['agentName'] = [current_user()->getUser()->id];
            $aFilterParams['planName'] = $oRequest->planName;
            $aFilterParams['usresName'] = $oRequest->usresName;
            $aFilterParams['mt4UsresName'] = $oRequest->mt4UsresName;
            $aFilterParams['server_id'] = $oRequest->server_id;

        }

        $totalCommission = 0;

        if ($oRequest->has('search')) {
            list($oResults, $totalCommission) = $this->Ibportal->getAgentCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }
        $data = [
            'agentName' => $this->Ibportal->getClientAgentName(),
            'planName' => $this->Ibportal->getClientPlansName([current_user()->getUser()->id]),
            'mt4UsresName' => [],
            'usresName' => [],
        ];


        $userIbid = UserIbid::where('user_id', current_user()->getUser()->id)->first();

        if (count($userIbid)) {
            return view('ibportal::client.agentCommission')
                ->with('oResults', $oResults)
                ->with('agent_id', $oRequest->agentId)
                ->with('data', $data)
                ->with('serverTypes', $serverTypes)
                ->with('totalCommission', $totalCommission)
                ->with('aFilterParams', $aFilterParams);
        } else {
            return $this->getAgreemmentPlan();
        }


    }


    public function postAgentName(Request $oRequest)
    {
        $oResults = $this->Ibportal->getClientAgentName();
        dd($oResults);
    }

    public function postPlanName(Request $oRequest)

    {

        if (isset($oRequest['agents'])) {
            $oResults = $this->Ibportal->getClientPlansName($oRequest['agents']);

            foreach ($oResults as $key => $result) {
                echo '<option value="' . $key . '">' . $result . '</option>';
            }
        }
        dd();
    }

    public function postMt4UsersName(Request $oRequest)
    {

        if (isset($oRequest['users'])) {
            $oResults = $this->Ibportal->getClientMt4UsersName($oRequest['users']);

            foreach ($oResults as $key => $result) {
                echo '<option value="' . $key . '">' . $result . '</option>';
            }
        }
        dd();

    }


    public function postUsersName(Request $oRequest)
    {

        if (isset($oRequest['plans']) && isset($oRequest['agents'])) {
            $oResults = $this->Ibportal->getClientUsersName($oRequest['agents'], $oRequest['plans']);

            foreach ($oResults as $key => $result) {
                echo '<option value="' . $key . '">' . $result . '</option>';
            }
        }
        dd();

    }

    public function getAgentMoney(Request $oRequest)
    {

        $login=UserIbid::select('login')->where('user_id', current_user()->getUser()->id)->first();

            $login=($login)?$login->login:-1;

        $oSymbols = $this->Ibportal->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->Ibportal->getAgentCommissionTypes();
        $serverTypes = $this->Ibportal->getServerTypes();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
        $aGroups = [];
        $aSymbols = [];
        $oResults = null;
        $aFilterParams = [
            'login' => $login,
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


        foreach ($oSymbols as $oSymbol) {
            $aSymbols[$oSymbol->SYMBOL] = $oSymbol->SYMBOL;
        }

        foreach ($aTradeTypes as $sKey => $sValue) {
            $aTradeTypes[$sKey] = trans('general.' . $sValue);
        }

        if ($oRequest->has('search')) {
            $aFilterParams['login'] = $login;
            $aFilterParams['from_date'] = $oRequest->from_date;
            $aFilterParams['to_date'] = $oRequest->to_date;
            $aFilterParams['type'] = $oRequest->type;
            $aFilterParams['all_groups'] = true;
            $aFilterParams['group'] = [];
            $aFilterParams['all_symbols'] = ($oRequest->has('all_symbols') ? true : false);
            $aFilterParams['symbol'] = $oRequest->symbol;

        }


        if ($oRequest->has('search')) {

            $oResults = $this->Ibportal->getAgentsAccountantByFilters($aFilterParams, false, $sOrder, $sSort);

            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];
        }

        return view('ibportal::client.ibportalAgentMoney')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAgentSummary()
    {

        $clientId = current_user()->getUser()->id;

        list($horizontal_line_numbers, $balance_array, $balance, $statistics,$commission_horizontal_line_numbers,
            $commission_array) = $this->Ibportal->getAgentStatistics($clientId);

        return view('ibportal::client.agentSummary',
            [
                'horizontal_line_numbers' => $horizontal_line_numbers,
                'balance_array' => $balance_array,
                'balance' => $balance,
                'commission_horizontal_line_numbers'=> $commission_horizontal_line_numbers,
                'commission_array'=>$commission_array])->withStatistics($statistics);
    }

    public function getAgentUserMt4Users(Request $oRequest)
    {


        $account_id = $oRequest->account_id;


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
            'signed' => 1,
            'account_id' => $account_id,
        ];




        if ($oRequest->has('search')) {
            $aFilterParams['from_login'] = $oRequest->from_login;
            $aFilterParams['to_login'] = $oRequest->to_login;
            $aFilterParams['exactLogin'] = $oRequest->exactLogin;
            $aFilterParams['login'] = $oRequest->login;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['all_groups'] = true;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['signed'] =1;
            $aFilterParams['account_id'] = $account_id;
            $aFilterParams['order'] = $oRequest->order;

           }


        $oResults = $this->oMt4User->getUsersMt4UsersByFilter($aFilterParams, false, $sOrder, $sSort);



        return view('ibportal::client.agentUserMt4Users')
            ->with('aGroups', $aGroups)
            ->with('oResults', $oResults)
            ->with('account_id', $account_id)
            ->with('aFilterParams', $aFilterParams);
    }



    public function getClosedOrders(Request $oRequest)
    {


        $oSymbols = $this->oMt4Trade->getAgentSymbols();

        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getTradesTypes();
        $serverTypes = $this->oMt4Trade->getServerTypes();
        $sSort = $oRequest->sort;
        $sOrder = $oRequest->order;
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
            'sort' => 'ASC',
            'order' => 'TICKET',
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


        if ($oRequest->has('search')) {

            $oResults = $this->oMt4Trade->getAgentClosedTradesByFilters($aFilterParams, false, $sOrder, $sSort,current_user()->getUser()->id);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }

        return view('reports::client.closedOrders')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getOpenOrders(Request $oRequest)
    {
        $oSymbols = $this->oMt4Trade->getAgentSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->oMt4Trade->getTradesTypes();
        $serverTypes = $this->oMt4Trade->getServerTypes();
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
            'server_id' => '',
            'sort' => 'ASC',
            'order' => 'TICKET'
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

            $oResults = $this->oMt4Trade->getAgentOpenTradesByFilters($aFilterParams, false, $sOrder, $sSort,current_user()->getUser()->id);
        }

        return view('reports::client.openOrders')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('serverTypes', $serverTypes)
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getAgentInternalTransfer()
    {
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        return view('ibportal::client.internalTransfer')->with('internalTransfer', $internalTransfer)  ->with('Pssword', $Pssword);
    }

    public function getAgentwithDrawal()
    {
        $Pssword = Config('accounts.apiReqiredConfirmMt4Password');

        $internalTransfer = [
            'login1' => '',
            'oldPassword' => '',
            'login2' => '',
            'amount' => ''];

        return view('ibportal::client.withDrawal')->with('internalTransfer', $internalTransfer)  ->with('Pssword', $Pssword);
    }

}