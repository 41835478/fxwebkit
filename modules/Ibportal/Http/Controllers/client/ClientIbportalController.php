<?php namespace Modules\Ibportal\Http\Controllers\client;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;

use Modules\Ibportal\Repositories\IbportalContract as Ibportal;

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

    public function __construct(
        Mt4Configrations $Mt4Configrations, Ibportal $Ibportal
    )
    {
        $this->Ibportal = $Ibportal;
        $this->Mt4Configrations = $Mt4Configrations;
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


            $oResults = $this->Ibportal->getPlansByFilters($aFilterParams, false, $sOrder, $sSort);


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



}