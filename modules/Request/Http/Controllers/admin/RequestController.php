<?php namespace Modules\Request\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Pingpong\Modules\Routing\Controller;

use Modules\Request\Repositories\RequestContract as RequestLog;
use Modules\Accounts\Http\Controllers\ApiController;
use Modules\Request\Entities\RequestInternalTransfer;
use Modules\Request\Entities\RequestWithdrawal;
use Modules\Request\Entities\RequestAddAccount as AddAccount;



use Modules\Request\Entities\RequestAssignAccount as AssignAccount;

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
        $aRequestStatus = config('request.requestStatus');

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


    public function getChangeLeverageRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        /* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
        $aRequestStatus = config('request.requestStatus');

        $oResults = null;


        if ($oRequest->has('search')) {

            $aFilterParams['login'] = $oRequest->login;

            $oResults = $this->RequestLog->getChangeLeverageRequestByFilters($aFilterParams, false, $sOrder, $sSort);


        }


        return view('request::admin/changeLeverageRequestList')->with('oResults', $oResults)->with('aRequestStatus', $aRequestStatus);
    }


    public function getForwordChangeLeverageRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestInternalTransfer = RequestChangeLeverage::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordChangeLeverage(
            $logId,
            $requestInternalTransfer->login,
            $requestInternalTransfer->leverage,
            $requestInternalTransfer->comment,
            $requestInternalTransfer->reason,
            $requestInternalTransfer->status);


        /* TODO with success */

        return Redirect::route('admin.request.changeLeverage')->withErrors($forwordResult);
    }

    public function getChangeLeverageEdit(Request $oRequest)
    {
        $oResults = $this->RequestLog->getChangeLeverageById($oRequest->logId);
        $aRequestStatus = config('request.requestStatus');

        $changeLeverage = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.changeLeverageEdit')->with('changeLeverage', $changeLeverage);
    }

    public function postChangeLeverageEdit(Request $oRequest)
    {


        $changeLeverage = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->changeLeverageEdit($changeLeverage);


        return Redirect::route('admin.request.changeLeverage');


    }



    public function getChangePasswordRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        /* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
        $aRequestStatus = config('request.requestStatus');

        $oResults = null;


        if ($oRequest->has('search')) {

            $aFilterParams['login'] = $oRequest->login;

            $oResults = $this->RequestLog->getChangePasswordRequestByFilters($aFilterParams, false, $sOrder, $sSort);


        }


        return view('request::admin/changePasswordRequestList')->with('oResults', $oResults)->with('aRequestStatus', $aRequestStatus);
    }


    public function getForwordChangePasswordRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestInternalTransfer = RequestChangePassword::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordChangeLeverage(
            $logId,
            $requestInternalTransfer->login,
            $requestInternalTransfer->newPassword,
            $requestInternalTransfer->comment,
            $requestInternalTransfer->reason,
            $requestInternalTransfer->status);


        /* TODO with success */

        return Redirect::route('admin.request.changePassword')->withErrors($forwordResult);
    }


    public function getChangePasswordEdit(Request $oRequest)
    {
        $oResults = $this->RequestLog->getChangePasswordById($oRequest->logId);
        $aRequestStatus = config('request.requestStatus');

        $changePassword = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.changePasswordEdit')->with('changePassword', $changePassword);
    }

    public function postChangePasswordEdit(Request $oRequest)
    {


        $changePassword = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->changePasswordEdit($changePassword);


        return Redirect::route('admin.request.changePassword');


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
        $aRequestStatus = config('request.requestStatus');

        $intenalTransfer = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.internalTransferEdit')->with('intenalTransfer', $intenalTransfer);
    }

    public function postIntenalTransferEdit(Request $oRequest)
    {


        $intenalTransfer = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->internalTransferEdit($intenalTransfer);


        return Redirect::route('admin.request.internalTransfer');


    }


    public function getWithDrawalList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        /* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
        $aRequestStatus = config('request.requestStatus');

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
        $aRequestStatus = config('request.requestStatus');

        $withDrawal = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.withDrawalEdit')->with('withDrawal', $withDrawal);
    }

    public function postWithDrawalEdit(Request $oRequest)
    {


        $withDrawal = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->withDrawalEdit($withDrawal);


        return Redirect::route('admin.request.withDrawal');


    }


    public function getAddAccountList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        /* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
        $aRequestStatus = config('request.requestStatus');

        $oResults = null;


        if ($oRequest->has('search')) {

            $aFilterParams['first_name'] = $oRequest->first_name;


            $oResults = $this->RequestLog->getAddAccountRequestByFilters($aFilterParams, false, $sOrder, $sSort);

        }

        return view('request::admin/addAccountRequestList')->with('oResults', $oResults)->with('aRequestStatus', $aRequestStatus);
    }


    public function getForwordAddAccountRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestAddAccount = RequestAddAccount::find($logId);

        $apiController = new ApiController();

        $forwordResult = $apiController->adminForwordMt4UserFullDetails(
            $logId,
            [
                'first_name' => $requestAddAccount->first_name,
                'last_name' => $requestAddAccount->last_name,
                'email' => $requestAddAccount->email,
                'password' => $requestAddAccount->password,
                'investor' => $requestAddAccount->investor,
                'birthday' => $requestAddAccount->birthday,
                'leverage' => $requestAddAccount->leverage,
                'array_deposit' => $requestAddAccount->array_deposit,
                'array_group' => $requestAddAccount->array_group,
                'phone' => $requestAddAccount->phone,
                'country' => $requestAddAccount->country,
                'city' => $requestAddAccount->city,
                'address' => $requestAddAccount->address,
                'zip_code' => $requestAddAccount->zip_code,

            ]);



        /* TODO with success */
        return Redirect::route('admin.request.addAccount')->withErrors($forwordResult);
    }


    public function getAddAccountEdit(Request $oRequest)
    {

        $oResults = $this->RequestLog->getAddAccountById($oRequest->logId);
        $aRequestStatus = config('request.requestStatus');

        $addAccount = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.addAccountEdit')->with('addAccount', $addAccount);
    }

    public function postAddAccountEdit(Request $oRequest)
    {


        $addAccount = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->addAccountEdit($addAccount);


        return Redirect::route('admin.request.addAccount');


    }


    public function getAssignAccountRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        /* TODO[moaid]  translate this array in language file then in the .blade.php file insert trans() method */
        $aRequestStatus=config('request.requestStatus');

        $oResults = null;


        if ($oRequest->has('search')) {

            $aFilterParams['login'] = $oRequest->login;

            $oResults = $this->RequestLog->getAssignAccountRequestByFilters($aFilterParams, false, $sOrder, $sSort);


        }


        return view('request::admin/assignAccountRequestList')->with('oResults', $oResults)->with('aRequestStatus', $aRequestStatus);
    }


    public function getForwordAssignAccountRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestAssignAccount = AssignAccount::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordAssignAccount(
            $logId,
            $requestAssignAccount->login,
            $requestAssignAccount->password);


        /* TODO with success */

        return Redirect::route('admin.request.assignAccount')->withErrors($forwordResult);
    }

}