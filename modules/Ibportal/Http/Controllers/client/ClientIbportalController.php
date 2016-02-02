<?php namespace Modules\Ibportal\Http\Controllers\client;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;
use Fxweb\Repositories\Admin\User\UserContract as Users;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;
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
    public function __construct(
        Mt4Configrations $Mt4Configrations,Ibportal $Ibportal,Users $Users
    )
    {
        $this->Ibportal=$Ibportal;
        $this->Mt4Configrations = $Mt4Configrations;
        $this->Users=$Users;
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


        if ($oRequest->has('search')) {


            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Ibportal->getClientPlansByFilters($aFilterParams, false, $sOrder, $sSort,current_user()->getUser()->id);


        }

// TODO[moaid] change Sentinel::getUser() to current_user()->getUser()

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
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->Users->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        }

        return view('ibportal::client.agent_users')  ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }



}