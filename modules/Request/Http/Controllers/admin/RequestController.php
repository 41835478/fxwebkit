<?php namespace Modules\Request\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Pingpong\Modules\Routing\Controller;

use Modules\Request\Repositories\RequestContract as RequestLog;
use Modules\Accounts\Http\Controllers\ApiController;
use Modules\Request\Entities\RequestInternalTransfer;
use Modules\Request\Entities\RequestWithdrawal;

class RequestController extends Controller
{

    protected $RequestLog;

    public function __construct(
        RequestLog $RequestLog
    )
    {
        $this->RequestLog = $RequestLog;

    }


    public function getIntenalTransferRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

		/* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
		$aRequestStatus=config('request.requestStatus');

		$oResults = null;


        if ($oRequest->has('search')) {

            $aFilterParams['login'] = $oRequest->login;

            $oResults = $this->RequestLog->getInternalTransferRequestByFilters($aFilterParams, false, $sOrder, $sSort);


        }


        return view('request::admin/internalTransferRequestList')->with('oResults', $oResults)->with('aRequestStatus', $aRequestStatus);
    }


    public function getForwordIntenalTransferRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestInternalTransfer = RequestInternalTransfer::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordInternalTransfer(
            $logId,
            $requestInternalTransfer->from_login,
            $requestInternalTransfer->to_login,
            $requestInternalTransfer->amount,
            $requestInternalTransfer->comment,
            $requestInternalTransfer->reason,
            $requestInternalTransfer->status);


        /* TODO with success */

        return Redirect::route('admin.request.internalTransfer')->withErrors($forwordResult);
    }

    public function getForwordWithDrawalRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;



        $requestWithDrawal = RequestWithdrawal::find($logId);

        $apiController = new ApiController();

        $forwordResult = $apiController->adminForwordWithDrawal(
            $logId,
            $requestWithDrawal->login,
            $requestWithDrawal->amount,
            $requestWithDrawal->comment,
            $requestWithDrawal->reason,
            $requestWithDrawal->status);



        /* TODO with success */
        return Redirect::route('admin.request.withDrawal')->withErrors($forwordResult);
    }


    public function getIntenalTransferEdit(Request $oRequest)
    {


        $oResults = $this->RequestLog->getInternalTransferById($oRequest->logId);

        $intenalTransfer=[
            'logId'=>$oRequest->logId,
            'comment'=>$oResults->comment,
            'reason'=>$oResults->reason
        ];


       return view('request::admin.internalTransferEdit')->with('intenalTransfer',$intenalTransfer);
    }

    public function postIntenalTransferEdit(Request $oRequest)
    {



        $intenalTransfer=[
            'logId'=>$oRequest->logId,
            'comment'=>$oRequest->comment,
            'reason'=>$oRequest->reason,
        ];

        $oResults = $this->RequestLog->internalTransferEdit($intenalTransfer);



        return Redirect::route('admin.request.internalTransfer');


    }


    public function getWithDrawalList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        /* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
        $aRequestStatus=config('request.requestStatus');

        $oResults = null;


        if ($oRequest->has('search')) {

            $aFilterParams['id'] = $oRequest->id;


            $oResults = $this->RequestLog->getWithDrawalRequestByFilters($aFilterParams, false, $sOrder, $sSort);

        }


        return view('request::admin/withDrawalRequestList')->with('oResults', $oResults)->with('aRequestStatus', $aRequestStatus);
    }

    public function getWithDrawalEdit(Request $oRequest)
    {


        $oResults = $this->RequestLog->getWithDrawalById($oRequest->logId);

        $withDrawal=[
            'logId'=>$oRequest->logId,
            'comment'=>$oResults->comment,
            'reason'=>$oResults->reason
        ];


        return view('request::admin.withDrawalEdit')->with('intenalTransfer',$withDrawal);
    }

    public function postWithDrawalEdit(Request $oRequest)
    {



        $withDrawal=[
            'logId'=>$oRequest->logId,
            'comment'=>$oRequest->comment,
            'reason'=>$oRequest->reason,
        ];

        $oResults = $this->RequestLog->withDrawalEdit($withDrawal);



        return Redirect::route('admin.request.withDrawal');


    }
}