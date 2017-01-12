<?php

namespace Fxweb\Http\Controllers\admin;

use Fxweb\Models\Mt4User;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Fxweb\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Fxweb\Models\AccountsBank;

use Modules\Request\Repositories\EloquentRequestContractRepository as RequestLog;
use Modules\Request\Entities\RequestAddAccount as AddAccount;

use Illuminate\Http\Request;

class GetEmailDataController extends Controller
{

    protected  $RequestLog;

    public function __construct()
    {
        $this->RequestLog = new RequestLog();
    }

    public function getClientInfo($users_id){

        $accountInfoResult=[];


        if($users_id>0){

            $accountInfoResult=User::find($users_id)->toArray();
        }else{
            $accountInfoResult = current_user()->getUser()->toArray();
        }

        $accountInfo = [];
        foreach ($accountInfoResult as $key => $value) {
            $accountInfo['accountInfo_' . $key] = $value;
        }
      return $accountInfo;
    }
public function convertRowToArray($tableName,$oResult){
    $returnData=[];

    if(count($oResult)){
        $aResult=(is_array($oResult))?$oResult:$oResult->toArray();
        foreach($aResult as $key => $value){
            $returnData[$tableName.'_'.$key]=$value;
        }
    }
    return $returnData;
}
    public function additionalAccountEmailInfo($request_id)
    {

        $mt4_user_details=AddAccount::find($request_id)->toArray();


        $usd = ($mt4_user_details['currency'] == 'usd') ? '&check;' : '';
        $eur = ($mt4_user_details['currency'] == 'eur') ? '&check;' : '';
        $gbp = ($mt4_user_details['currency'] == 'gbp') ? '&check;' : '';


        $leverage_20 = ($mt4_user_details['array_leverage'] == '20') ? '&check;' : '';
        $leverage_25 = ($mt4_user_details['array_leverage'] == '25') ? '&check;' : '';
        $leverage_50 = ($mt4_user_details['array_leverage'] == '50') ? '&check;' : '';
        $leverage_100 = ($mt4_user_details['array_leverage'] == '100') ? '&check;' : '';


        $mt4_user_details['platforms'] = (array_key_exists('platforms', $mt4_user_details)) ? $mt4_user_details['platforms'] : $mt4_user_details['platform'];
        $hob_mt4 = ($mt4_user_details['platforms'] == 'hob_mt4') ? '&check;' : '';
        $hob_multi_assets = ($mt4_user_details['platforms'] == 'hob_multi_assets') ? '&check;' : '';
        $both = ($mt4_user_details['platforms'] == 'both') ? '&check;' : '';

        $accountId = $mt4_user_details['accountId'];
        $newLogin = Mt4User::with('account')->whereHas('account', function ($query) use ($accountId) {
            $query->where('users_id', '=', $accountId);
        })->orderBy('REGDATE')->first();
        $newLogin = (count($newLogin)) ? $newLogin->LOGIN : 0;

        $accountInfo = User::find($accountId)->toArray();
       return  $accountInfo + $mt4_user_details +
            ['newLogin' => $newLogin] +
            [
                'usd' => $usd, 'eur' => $eur, 'gbp' => $gbp,
                'leverage_20' => $leverage_20, 'leverage_25' => $leverage_25,
                'leverage_50' => $leverage_50, 'leverage_100' => $leverage_100,
                'hob_mt4' => $hob_mt4,
                'hob_multi_assets' => $hob_multi_assets,
                'both' => $both,
                'reason' => $mt4_user_details['client_reason'],
            ]
           +$this->getClientInfo($accountId);
    }


    public  function internalTransferEmailInfo($request_id)
    {

            $logData=$this->RequestLog->getInternalTransferById($request_id);


        $data= ['server_id' => $logData->server_id,
            'login' => $logData->from_login,
            'login2' => $logData->to_login,
            'amount' => $logData->amount,
            'status' => $logData->status,
            'users_id' => $logData->users_id,];



        $loginDataResult = Mt4User::where(['LOGIN' => $data['login'], 'server_id' => $data['server_id']])->first();


        $login2DataResult = Mt4User::where(['LOGIN' => $data['login2'], 'server_id' => $data['server_id']])->first();

        if ($loginDataResult && $login2DataResult) {

            $loginDataResult = $loginDataResult->toArray();
            $login2DataResult = $login2DataResult->toArray();
        } else {
            return \Redirect::back()->with(trans('accounts::accounts.loginNotExist'));
        }
        $loginData = [];
        foreach ($loginDataResult as $key => $value) {
            $loginData['loginData' . $key] = $value;
        }
        $login2Data = [];
        foreach ($login2DataResult as $key => $value) {
            $login2Data['login2Data' . $key] = $value;
        }




        return $data + $loginData
            + $login2Data
        +$this->getClientInfo($data['users_id']);

    }

    public function withdrawalEmailInfo($request_id)
    {

        $logData=$this->RequestLog->getWithdrawalById($request_id);

        $data=[
            'login'=>$logData->login,
            'users_id'=>$logData->users_id,
            'amount'=>$logData->amount,
            'oldPassword'=> '',
            'server_id'=>$logData->server_id,
            'cardNumber'=>$logData,
            'bankId'=>$logData->bankId,
            'status'=>$logData->status
        ];



        $bankId = (array_key_exists('bankId', $data)) ? $data['bankId'] : 0;

        $beneficiary_bank = '';
        $swift_code = '';
        $bank_name = '';
        $bank_address = '';
        $beneficiary_name = '';
        $bank_account = '';
            $bankInfo=AccountsBank::find($bankId);
        if(count($bankInfo)){
            $beneficiary_bank = $bankInfo->beneficiary_bank;
            $swift_code = $bankInfo->swift_code;
            $bank_name = $bankInfo->bank_name;
            $bank_address = $bankInfo->bank_address;
            $beneficiary_name = $bankInfo->beneficiary_name;
            $bank_account = $bankInfo->bank_account;
        }

        $loginDataResult=Mt4User::where(['LOGIN'=>$data['login'],'server_id'=>$data['server_id']])->first();

        $loginData=[];
        if(count($loginDataResult)){
            $loginDataResult=$loginDataResult->toArray();
        foreach($loginDataResult as $key=>$value){
            $loginData['loginData'.$key]=$value;
        }
        }


        return  ['login' => $data['login'],
            'amount' => $data['amount'],
            'status' => $data['status'],
                'beneficiary_bank' => $beneficiary_bank,
                'swift_code' => $swift_code,
                'bank_name' => $bank_name,
                'bank_address' => $bank_address,
                'beneficiary_name' => $beneficiary_name,
                'bank_account' => $bank_account,
                'cardNumber' => $data['cardNumber']

            ] + $loginData
        +$this->getClientInfo($data['users_id']);
    }

    public function changeLeverageEmailInfo($request_id)
    {

        $logData=$this->RequestLog->getChangeLeverageById($request_id);

        return  [
            "login"=> $logData->login,
            'users_id'=>$logData->users_id,
            "server_id"=> $logData->server_id,
            "leverage"=> $logData->leverage,
            "oldPassword"=> '',
            'users_id'=>$logData->users_id,
            "status"=>$logData->status
        ]
        +$this->getClientInfo($logData->users_id);


    }

    public function changePasswordEmailInfo($request_id)
    {

            $oResults = $this->RequestLog->getChangePasswordById($request_id);

            return [
                "login"=> $oResults->login,
                "newPassword"=>$oResults->newPassword,
                "passwordType"=> $oResults->passwordType,
                "oldPassword"=> '',
                'users_id'=>$oResults->users_id,
                'status'=>$oResults->status
            ]
            +$this->getClientInfo($oResults->users_id);



    }


    public function signUpEmailInfo($templateInfo){

        $oUser=\Fxweb\Models\User::find($templateInfo['id']);
        $oUserDetails=\Fxweb\Models\User::find($templateInfo['id']);
        $oActivation=\Activation::where('user_id','=',$templateInfo['id'])->first();
        $oRequest=new Request();


        if($oUser){
            return     $this->convertRowToArray('user',$oUser)
                    +  $this->convertRowToArray('detail',$oUserDetails)
                    +  $this->convertRowToArray('activation',$oActivation)
                    +  ['website'=>$oRequest->root(),
            "activeLink"=>'/client/activateAccount/' .$oUser->id . '/' . $oActivation->code]
                    +  $this->getClientInfo($templateInfo['id']);
        }
        return [];

    }

    public function forgetPasswordEmailInfo($templateInfo){

        $oReminder=\Cartalyst\Sentinel\Laravel\Facades\Reminder::find($templateInfo['id']);
        $oRequest=new Request();

        if($oReminder){
            return   $this->convertRowToArray('reminder',$oReminder)
            +$this->getClientInfo($oReminder->user_id)
            +     ['website'=>$oRequest->root(),
                "resetLink"=>'/client/resetForgetPassword/' .$oReminder->user_id . '/' . $oReminder->code];
        }
        return [];

    }


    public function bankAccountEmailInfo($templateInfo){

        $oResult=\Fxweb\Models\AccountsBank::find($templateInfo['id']);
        $oRequest=new Request();

        if($oResult){
            return   $this->convertRowToArray('bank',$oResult)
            +$this->getClientInfo($oResult->users_id);
        }
        return [];

    }




}
