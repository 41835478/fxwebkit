<?php namespace Modules\Ibportal\Http\Controllers\client;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;
use Fxweb\Repositories\Admin\User\UserContract as Users;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;
use Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract as Mt4Trade;
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
    public function __construct(
        Mt4Configrations $Mt4Configrations,Ibportal $Ibportal,Users $Users, Mt4Trade $oMt4Trade
    )
    {
        $this->Ibportal=$Ibportal;
        $this->Mt4Configrations = $Mt4Configrations;
        $this->Users=$Users;
        $this->oMt4Trade = $oMt4Trade;
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


            $oResults = $this->Ibportal->getClientPlansByFilters($aFilterParams, false, $sOrder, $sSort,current_user()->getUser()->id);




        $userIbid=UserIbid::where('user_id',current_user()->getUser()->id)->first();



        if(count($userIbid)){
        return view('ibportal::client.plan_list')
            ->with('oResults', $oResults)
            ->with('ibid',$userIbid->user_ibid)
            ->with('aFilterParams', $aFilterParams);
        }else{
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

        if($request->has('agree')){
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
            'agent_id'=>$agentId,
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

            $oResults = $this->Users->getAgentUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role,$agentId);

        }


        $userIbid=UserIbid::where('user_id',current_user()->getUser()->id)->first();

        if(count($userIbid)){
            return view('ibportal::client.agent_users')  ->with('oResults', $oResults)
                ->with('aFilterParams', $aFilterParams);
        }else{
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
            'server_id'=>'',
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

        $totalCommission=0;

        if ($oRequest->has('search')) {
            list($oResults,$totalCommission) = $this->Ibportal->getAgentCommissionByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults->order = $aFilterParams['order'];
            $oResults->sorts = $aFilterParams['sort'];
        }
        $data = [
            'agentName' => $this->Ibportal->getClientAgentName(),
            'planName' => $this->Ibportal->getClientPlansName([current_user()->getUser()->id]),
            'mt4UsresName' => [],
            'usresName' =>[],
        ];


        $userIbid=UserIbid::where('user_id',current_user()->getUser()->id)->first();

        if(count($userIbid)){
            return view('ibportal::client.agentCommission')
                ->with('oResults', $oResults)
                ->with('agent_id',$oRequest->agentId)
                ->with('data', $data)
                ->with('serverTypes',$serverTypes)
                ->with('totalCommission',$totalCommission)
                ->with('aFilterParams', $aFilterParams);
        }else{
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

        if(isset($oRequest['agents']) ){
            $oResults= $this->Ibportal->getClientPlansName($oRequest['agents']);

            foreach($oResults as $key=>$result){
                echo '<option value="'.$key.'">'.$result.'</option>';
            }
        }
        dd();
    }

    public function postMt4UsersName(Request $oRequest)
    {

        if(isset($oRequest['users']) ){
            $oResults= $this->Ibportal->getClientMt4UsersName($oRequest['users']);

            foreach($oResults as $key=>$result){
                echo '<option value="'.$key.'">'.$result.'</option>';
            }
        }
        dd();

    }


    public function postUsersName(Request $oRequest)
    {

        if(isset($oRequest['plans']) && isset($oRequest['agents']) ){
            $oResults= $this->Ibportal->getClientUsersName($oRequest['agents'],$oRequest['plans']);

            foreach($oResults as $key=>$result){
                echo '<option value="'.$key.'">'.$result.'</option>';
            }
        }
        dd();

    }

    public function getAccountant(Request $oRequest)
    {
        $oSymbols = $this->Ibportal->getClosedTradesSymbols();
        $aTradeTypes = ['' => 'ALL'] + $this->Ibportal->getAccountantTypes();
        $serverTypes = $this->Ibportal->getServerTypes();
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
            $oResults = $this->Ibportal->getClientAccountantByFilters($aFilterParams, false, $sOrder, $sSort);
            $oResults[0]->order = $aFilterParams['order'];
            $oResults[0]->sorts = $aFilterParams['sort'];
        }

        return view('ibportal::client.ibportalAccountant')
            ->with('aSymbols', $aSymbols)
            ->with('aTradeTypes', $aTradeTypes)
            ->with('oResults', $oResults)
            ->with('serverTypes', $serverTypes)
            ->with('aFilterParams', $aFilterParams);
    }




}