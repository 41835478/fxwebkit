<?php namespace Modules\Request\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Pingpong\Modules\Routing\Controller;

use Modules\Request\Repositories\RequestContract as RequestLog;
use Modules\Accounts\Http\Controllers\ApiController;
use Modules\Request\Entities\RequestInternalTransfer;
use Modules\Request\Entities\RequestWithdrawal;
use Modules\Request\Entities\RequestChangePassword;
use Modules\Request\Entities\RequestChangeLeverage;
use Modules\Request\Entities\RequestAssignAccount;
use Modules\Request\Entities\RequestAddAccount as AddAccount;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Illuminate\Support\Facades\Config;

use Fxweb\Http\Controllers\Admin\EmailController as Email;

class RequestController extends Controller
{

    protected $RequestLog;
    protected $oUsers;

    public function __construct(
        Users $oUsers,RequestLog $RequestLog
    )
    {
        $this->RequestLog = $RequestLog;
        $this->oUsers = $oUsers;

    }


    public function getIntenalTransferRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';


        $aRequestStatus =['-1'=>'All']+ config('fxweb.status_internalTransfer');

        $oResults = null;


        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status']=$status;

            $aFilterParams['login'] =  (isset($oRequest->login))? $oRequest->login:'';

            $oResults = $this->RequestLog->getInternalTransferRequestByFilters($aFilterParams, false, $sOrder, $sSort);



        return view('request::admin/internalTransferRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams', $aFilterParams)
            ->with('status',$status);
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
            $requestInternalTransfer->server_id,
            $requestInternalTransfer->amount,
            $requestInternalTransfer->comment,
            $requestInternalTransfer->reason,
            $requestInternalTransfer->status);

        /* TODO with success */

        return Redirect::back()->withErrors($forwordResult);
    }


    public function getChangeLeverageRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus =['-1'=>'All']+ config('fxweb.status_changeLeverage');

        $oResults = null;


        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status']=$status;

            $aFilterParams['login'] =  (isset($oRequest->login))? $oRequest->login:'';

            $oResults = $this->RequestLog->getChangeLeverageRequestByFilters($aFilterParams, false, $sOrder, $sSort);




        return view('request::admin/changeLeverageRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams', $aFilterParams)
            ->with('status',$status);
    }


    public function getForwordChangeLeverageRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestChangeLeverage = RequestChangeLeverage::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordChangeMt4Leverage(
            $logId,
            $requestChangeLeverage->login,
            $requestChangeLeverage->server_id,
            $requestChangeLeverage->leverage,
            $requestChangeLeverage->comment,
            $requestChangeLeverage->reason,
            $requestChangeLeverage->status);


        /* TODO with success */

        return Redirect::route('admin.request.changeLeverage')->withErrors($forwordResult);
    }

    public function getChangeLeverageEdit(Request $oRequest)
    {
        $oResults = $this->RequestLog->getChangeLeverageById($oRequest->logId);
        $aRequestStatus = config('fxweb.status_changeLeverage');

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

        if(isset($oRequest->saveAndSend)){
            $email=new Email();

            $email->sendChangeLeverage($oRequest->logId);
        }

        return Redirect::route('admin.request.changeLeverage');


    }



    public function getChangePasswordRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = ['-1'=>'All']+config('fxweb.status_changePassword');

        $oResults = null;


        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status']=$status;

            $aFilterParams['login'] =  (isset($oRequest->login))? $oRequest->login:'';

            $oResults = $this->RequestLog->getChangePasswordRequestByFilters($aFilterParams, false, $sOrder, $sSort);


        $loginPasswordType=Config('accounts.loginPasswordType');


        return view('request::admin/changePasswordRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams', $aFilterParams)
            ->with('loginPasswordType', $loginPasswordType)
            ->with('status',$status);
    }


    public function getForwordChangePasswordRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestChangePassword = RequestChangePassword::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordChangeMt4Password(
            $logId,
            $requestChangePassword->login,
            $requestChangePassword->server_id,
            $requestChangePassword->newPassword,
            $requestChangePassword->password_type,
            $requestChangePassword->comment,
            $requestChangePassword->reason,
            $requestChangePassword->status);


        /* TODO with success */

        return Redirect::route('admin.request.changePassword')->withErrors($forwordResult);
    }


    public function getChangePasswordEdit(Request $oRequest)
    {
        $oResults = $this->RequestLog->getChangePasswordById($oRequest->logId);
        $aRequestStatus = config('fxweb.status_changePassword');

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


        if(isset($oRequest->saveAndSend)){
            $email=new Email();

            $email->sendChangePassword($oRequest->logId);
        }



        return Redirect::route('admin.request.changePassword');


    }
    public function getForwordWithdrawalRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestWithdrawal = RequestWithdrawal::find($logId);

        $apiController = new ApiController();

        $forwordResult = $apiController->adminForwordWithDrawal(
            $logId,
            $requestWithdrawal->login,
            $requestWithdrawal->server_id,
            $requestWithdrawal->amount,
            $requestWithdrawal->comment,
            $requestWithdrawal->reason,
            $requestWithdrawal->status);

        /* TODO with success */
        return Redirect::route('admin.request.withdrawal')->withErrors($forwordResult);
    }


    public function getIntenalTransferEdit(Request $oRequest)
    {


        $oResults = $this->RequestLog->getInternalTransferById($oRequest->logId);
        $aRequestStatus = config('fxweb.status_internalTransfer');

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


        if(isset($oRequest->saveAndSend)){
            $email=new Email();

            $email->sendInternalTransfer($oRequest->logId);
        }

        return Redirect::route('admin.request.internalTransfer');


    }


    public function getWithdrawalList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = ['-1'=>'All']+config('fxweb.status_withdrawal');

        $oResults = null;


        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status']=$status;

            $aFilterParams['id'] =  (isset($oRequest->id))? $oRequest->id:'';


            $oResults = $this->RequestLog->getWithdrawalRequestByFilters($aFilterParams, false, $sOrder, $sSort);



        return view('request::admin/withdrawalRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams', $aFilterParams)
            ->with('status',$status);
    }

    public function getWithdrawalEdit(Request $oRequest)
    {
        $oResults = $this->RequestLog->getWithdrawalById($oRequest->logId);
        $aRequestStatus = config('fxweb.status_withdrawal');

        $withdrawal = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.withdrawalEdit')->with('withdrawal', $withdrawal);
    }

    public function postWithdrawalEdit(Request $oRequest)
    {
        $withdrawal = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->withdrawalEdit($withdrawal);


        if(isset($oRequest->saveAndSend)){
            $email=new Email();

            $email->sendWithdrawal($oRequest->logId);
        }
        return Redirect::route('admin.request.withDrawal');



    }


    public function getAddAccountList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = ['-1'=>'All']+config('fxweb.status_additionalAccount');

        $oResults = null;



        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status']=$status;

            $aFilterParams['first_name'] = (isset($oRequest->first_name))? $oRequest->first_name:'';


            $oResults = $this->RequestLog->getAddAccountRequestByFilters($aFilterParams, false, $sOrder, $sSort);



        return view('request::admin/addAccountRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams', $aFilterParams)
            ->with('status',$status);
    }


    public function getForwordAddAccountRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestAddAccount = AddAccount::find($logId);

        $apiController = new ApiController();

        $forwordResult = $apiController->adminForwordMt4UserFullDetails(
            $logId,
            $requestAddAccount->server_id,
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
                'accountId'=>$requestAddAccount->accountId,

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


        $oResults = $this->RequestLog->addAccountEdit($addAccount);


        if(isset($oRequest->saveAndSend)){
            $email=new Email();

            $email->sendAdditionalAccountEmail($oRequest->logId);
        }

        return Redirect::route('admin.request.addAccount');


    }


    public function getAssignAccountRequestList(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus=['-1'=>'All']+config('fxweb.status_additionalAccount');

        $oResults = null;

        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status']=$status;

            $aFilterParams['login'] =  (isset($oRequest->login))? $oRequest->login:'';
            $oResults = $this->RequestLog->getAssignAccountRequestByFilters($aFilterParams, false, $sOrder, $sSort);





        return view('request::admin/assignAccountRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('status',$status);
    }


    public function getForwordAssignAccountRequest(Request $oRequest)
    {
        $logId = $oRequest->logId;


        $requestAssignAccount = RequestAssignAccount::find($logId);

        $apiController = new ApiController();
        $forwordResult = $apiController->adminForwordAssignAccount(
            $logId,
            $requestAssignAccount->login,
            $requestAssignAccount->server_id,
            $requestAssignAccount->password);


        /* TODO with success */
        return Redirect::route('admin.request.assignAccount')->withErrors($forwordResult);
    }


    public function getAssignAccountEdit(Request $oRequest)
    {

        $oResults = $this->RequestLog->getAssignAccountById($oRequest->logId);
        $aRequestStatus = config('fxweb.status_additionalAccount');

        $assignAccount = [
            'logId' => $oRequest->logId,
            'status'=>$oResults['status'],
            'status_array'=>$aRequestStatus,
            'comment' => $oResults->comment,
            'reason' => $oResults->reason
        ];


        return view('request::admin.assignAccountEdit')->with('assignAccount', $assignAccount);
    }

    public function postAssignAccountEdit(Request $oRequest)
    {

$oResult= $this->RequestLog->getAssignAccountById($oRequest->logId);
        if($oRequest->status ==1){
            $this->oUsers->asignMt4UsersToAccount($oResult->accountId,[$oResult->login],$oResult->server_id);
        }else{
            $this->oUsers->unsignMt4UsersToAccount($oResult->accountId,[$oResult->login],$oResult->server_id);
        }
        $assignAccount = [
            'logId' => $oRequest->logId,
            'comment' => $oRequest->comment,
            'status'=>$oRequest->status,
            'reason' => $oRequest->reason,
        ];

        $oResults = $this->RequestLog->assignAccountEdit($assignAccount);


        return Redirect::route('admin.request.assignAccount');


    }

    public function getActivateUser(Request $oRequest){

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $aRequestStatus = config('fxweb.generalStatus');

        $oResults = null;


        $status = (isset($oRequest->status))? $oRequest->status : -1;

            $aFilterParams['status'] = $status;

            $aFilterParams['id'] = (isset($oRequest->id))? $oRequest->id:'';

            $aFilterParams['active'] = 2;
            $role = explode(',', Config::get('fxweb.client_default_role'));

            $oResults = $this->oUsers->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);



        return view('request::admin.activateUserRequestList')
            ->with('oResults', $oResults)
            ->with('aRequestStatus', $aRequestStatus)
            ->with('aFilterParams', $aFilterParams)
            ->with('status',$status);
    }

}