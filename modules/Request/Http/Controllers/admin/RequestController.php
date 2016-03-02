<?php namespace Modules\Request\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Pingpong\Modules\Routing\Controller;

use Modules\Request\Repositories\RequestContract as RequestLog;
use Modules\Accounts\Http\Controllers\ApiController;
use Modules\Request\Entities\RequestInternalTransfer;

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




        return Redirect::route('admin.request.internalTransfer')->withErrors($forwordResult);
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


    public function getWithDrawalList()
    {
        dd(21645);
    }
}