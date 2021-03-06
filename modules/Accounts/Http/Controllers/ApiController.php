<?php namespace Modules\Accounts\Http\Controllers;

use Fxweb\Http\Controllers\Admin\Email;
use Fxweb\Http\Controllers\Admin\EmailController as Email2;
use Pingpong\Modules\Routing\Controller;
use Modules\Request\Http\Controllers\RequestController as RequestLog;
use Fxweb\Models\Mt4User;

class ApiController extends Controller
{

    private $apiReqiredConfirmMt4Password;
    private $apiMasterPassword;
    public $mt4Host;
    public $mt4Port;
    private $returnMessages = [
        '1' => 'Invalid Data',
        '2' => 'Internal Error',
        '3' => 'General Error',
        '4' => 'No Change',
        '5' => 'Invalid Login',
        '6' => 'No Enough Money',
        '7' => 'Client is not related to this agent',
        '8' => 'Client Credit is less than credit out amount',
        '9' => 'Simple password, should contain numbers and letters',
        '10' => 'Exsiting User',
        '11' => 'Faild To create account',
        '0' => 'Success',
        'error' => 'Internal Error,Please try again later'
    ];
    public $server_id;

    public $admin;
    public $directOrderToMt4Server;

    public function __construct()
    {
        $this->apiReqiredConfirmMt4Password = Config('accounts.apiReqiredConfirmMt4Password');
        $this->apiMasterPassword = Config('accounts.apiMasterPassword');
        $this->mt4Host =  config('fxweb.servers')[0]['mt4CheckHost'];
        $this->mt4Port =  config('fxweb.servers')[ 0]['mt4CheckPort'];
        $this->server_id = 0;
        $user = current_user()->getUser();
        $this->admin = ($user && $user->InRole('admin')) ? true : false;
        $this->directOrderToMt4Server = (Config('accounts.directOrderToMt4Server') || $this->admin);
    }

    public function changeServer($server_id)
    {
        $this->mt4Host =  config('fxweb.servers')[ $server_id]['mt4CheckHost'];
        $this->mt4Port =  config('fxweb.servers')[ $server_id]['mt4CheckPort'];
        $this->server_id = $server_id;


    }

    private function sendApiMessage($message)
    {

        $admin = ($this->admin) ? '|ADMIN=1' : '';


        $fp = @fsockopen($this->mt4Host, $this->mt4Port, $error, $error2, 10);
        $result = '';

        if ($fp) {
            fwrite($fp, $message . $admin . "\nQUIT\n");

            while (!feof($fp) ) {
                $result .= fgets($fp, 1024);

            }
            fclose($fp);
        }


        $result = preg_replace("#}[^}]*$#", '}', $result);
        $result = json_decode($result);

        return (is_object($result)) ? $result : json_decode('{"result":"error"}');/**/


    }

    public function changeMt4Password($login, $newPassword, $passwordType, $oldPassword = null)
    {

        $requestLog = new RequestLog();
        $email=new Email2();
        if ($this->directOrderToMt4Server == false) {
            $notExist = $requestLog->insertChangePasswordRequest($login, $this->server_id, $newPassword,$passwordType);

            return (!$notExist) ? trans('accounts::accounts.youHavePendingRequest') : trans('accounts::accounts.the_request');
        }
        $password = ($this->apiReqiredConfirmMt4Password) ? "CPASS=" . $oldPassword . "|" : "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=2|LOGIN=' . $login . '|' . $password . 'NPASS=' . $newPassword . '|TYPE=' . $passwordType . '|MANAGER=1';
        $result = $this->sendApiMessage($message);

        $logId=0;
        if ($result->result === 0) {
            /* TODO comment and reason should be from addmin not $result,$result  */

            $logId=$requestLog->insertChangePasswordRequest($login, $this->server_id, $newPassword, '', '', 1,$passwordType);
            \Session::flash('flash_success',trans('accounts::accounts.success'));


        } else {

            $requestLog->insertChangePasswordRequest($login, $this->server_id, $newPassword, '', '', 2,$passwordType);
        }
        $email->sendChangePassword($logId);
        return $this->getApiResponseMessage($result);
    }

    public function adminForwordChangeMt4Password($logId, $login, $server_id, $newPassword,$passwordType, $oldPassword = null)
    {

        $this->changeServer($server_id);
        $requestLog = new RequestLog();

        /* TODO[Galya] when the admin forword the request allows there will be no password  please tell me if this logic is right */
        $password = "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=2|LOGIN=' . $login . '|' . $password . 'NPASS=' . $newPassword . '|TYPE=' . $passwordType . '|MANAGER=1';
        $result = $this->sendApiMessage($message);


        if ($result->result === 0) {

            /* TODO comment and reason should be from addmin not $result,$result  */
            $requestLog->updateChangePasswordRequest($logId, $login, $newPassword, '', '', 1,$passwordType);
            \Session::flash('flash_success',trans('accounts::accounts.success'));

        } else {

            $requestLog->updateChangePasswordRequest($logId, $login, $newPassword, '', '', 2,$passwordType);
        }

        $email=new Email2();
        $email->sendChangePassword($logId);

        return $this->getApiResponseMessage($result);
    }

    public function changeMt4Leverage($login, $leverage, $oldPassword = null)
    {

        $requestLog = new RequestLog();
        if ($this->directOrderToMt4Server == false) {

            $notExist = $requestLog->insertChangeLeverageRequest($login, $this->server_id, $leverage);
            return (!$notExist) ? trans('accounts::accounts.youHavePendingRequest') : trans('accounts::accounts.the_request');
        }
        $password = ($this->apiReqiredConfirmMt4Password) ? "CPASS=" . $oldPassword . "|" : "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=1|LOGIN=' . $login . '|' . $password . 'LEVERAGE=' . $leverage . '|MANAGER=1';

        $result = $this->sendApiMessage($message);

        $logId=0;
        if ($result->result === 0) {
            /* TODO comment and reason should be from addmin not $result,$result  */
            $logId=$requestLog->insertChangeLeverageRequest($login, $this->server_id, $leverage, '', '', 1);

            \Session::flash('flash_success',trans('accounts::accounts.success'));



        } else {

            $logId= $requestLog->insertChangeLeverageRequest($login, $this->server_id, $leverage, '', '', 2);
        }
        $email=new Email2();
        $email->sendChangeLeverage($logId);
        return $this->getApiResponseMessage($result);
    }

    public function adminForwordChangeMt4Leverage($logId, $login, $server_id, $leverage, $oldPassword = null)
    {
        $this->changeServer($server_id);
        $requestLog = new RequestLog();

        $password = "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=1|LOGIN=' . $login . '|' . $password . 'LEVERAGE=' . $leverage . '|MANAGER=1';

        $result = $this->sendApiMessage($message);


        if ($result->result === 0) {
            /* TODO comment and reason should be from admin not $result,$result  */
            $requestLog->updateChangeLeverageRequest($logId, $login, $leverage, '', '', 1);
            \Session::flash('flash_success',trans('accounts::accounts.success'));

            $email = new Email();
            $email->changeLeverage(['email' => config('fxweb.adminEmail'), 'login' => $login, 'leverage' => $leverage]);

            $mt4User = Mt4User::select('EMAIL')->where('LOGIN', $login)->where('server_id', $this->server_id)->first();
            $sendToEmail = ($mt4User && $mt4User->EMAIL != '') ? $mt4User->EMAIL : current_user()->getUser()->email;
            $email->changeLeverage(['email' => $sendToEmail, 'login' => $login, 'leverage' => $leverage]);
        } else {

            $requestLog->updateChangeLeverageRequest($logId, $login, $leverage, '', '', 2);
        }

        $email=new Email2();
        $email->sendChangeLeverage($logId);
        return $this->getApiResponseMessage($result);
    }

    public function internalTransfer($login1, $login2, $oldPassword = null, $amount)
    {

        $requestLog = new RequestLog();
        if ($this->directOrderToMt4Server == false) {
            $notExist = $requestLog->insertInternalTransferRequest($login1, $login2, $this->server_id, $amount);


            return (!$notExist) ? trans('accounts::accounts.youHavePendingRequest') : trans('accounts::accounts.the_request');
        }


        $password = ($this->apiReqiredConfirmMt4Password) ? "CPASS=" . $oldPassword . "|" : "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=4|LOGIN=' . $login1 . '|' . $password . 'TOACC=' . $login2 . '|AMOUNT=' . $amount . '|MANAGER=1';


        $result = $this->sendApiMessage($message);

        $logId=0;
        if ($result->result === 0) {
            /* TODO comment and reason should be from addmin not $result,$result  */
            $logId=$requestLog->insertInternalTransferRequest($login1, $login2, $this->server_id, $amount, '', '', 1);

            \Session::flash('flash_success',trans('accounts::accounts.success'));

        } else {

            $logId= $requestLog->insertInternalTransferRequest($login1, $login2, $this->server_id, $amount, '', '', 2);
        }

        $email=new Email2();
        $email->sendInternalTransfer($logId);
        return $this->getApiResponseMessage($result);


    }


    public function adminForwordInternalTransfer($logId, $login1, $login2, $server_id, $amount, $oldPassword = null)
    {
        $this->changeServer($server_id);
        $requestLog = new RequestLog();
        /* TODO check oldpassword and insert it in log InternalTransfer to re send it to this function */

        $password = "";


        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=4|LOGIN=' . $login1 . '|' . $password . 'TOACC=' . $login2 . '|AMOUNT=' . $amount . '|MANAGER=1';

        $result = $this->sendApiMessage($message);

        if ($result->result === 0) {

            $requestLog->updateInternalTransferRequest($logId, $login1, $login2, $amount, '', '', 1);
            \Session::flash('flash_success',trans('accounts::accounts.success'));

        } else {
            $requestLog->updateInternalTransferRequest($logId, $login1, $login2, $amount, '', '', 2);


        }


        $email=new Email2();
        $email->sendInternalTransfer($logId);

        return $this->getApiResponseMessage($result);


    }

    public function withdrawal($login1, $amount, $oldPassword = null)
    {

        $requestLog = new RequestLog();
        if ($this->directOrderToMt4Server == false) {

            $notExist = $requestLog->insertWithdrawalRequest($login1, $this->server_id, $amount);

            return (!$notExist) ? trans('accounts::accounts.youHavePendingRequest') : trans('accounts::accounts.the_request');
        }

        $password = ($this->apiReqiredConfirmMt4Password) ? "CPASS=" . $oldPassword . "|" : "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=3|LOGIN=' . $login1 . '|' . $password . '|AMOUNT=' . '-' . $amount . '|COMMENT=ONLINE' . '|MANAGER=1';


        $result = $this->sendApiMessage($message);

        $logId=0;
        if ($result->result === 0) {
            /* TODO comment and reason should be from addmin not $result,$result  */

            $requestLog->insertWithdrawalRequest($login1, $this->server_id, $amount, '', '', 1);

            \Session::flash('flash_success',trans('accounts::accounts.success'));

            $email = new Email();
            $email->withdrawal(['email' => config('fxweb.adminEmail'), 'login' => $login1, 'amount' => $amount]);
        } else {
            $requestLog->insertWithdrawalRequest($login1, $this->server_id, $amount, '', '', 2);
        }

        $email=new Email2();
        $email->sendWithdrawal($logId);

        return $this->getApiResponseMessage($result);

    }

    public function adminForwordWithdrawal($logId, $login1, $server_id, $amount, $oldPassword = null)
    {
        $this->changeServer($server_id);
        $requestLog = new RequestLog();
        /* TODO check oldpassword and insert it in log InternalTransfer to re send it to this function */

        $password = "";
        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=3|LOGIN=' . $login1 . '|' . $password . '|AMOUNT=' . '-' . $amount . '|COMMENT=ONLINE' . '|MANAGER=1';
        $result = $this->sendApiMessage($message);

        if ($result->result === 0) {

            $requestLog->updateWithdrawalRequest($logId, $login1, $amount, '', '', 1);
            \Session::flash('flash_success',trans('accounts::accounts.success'));

            $email = new Email();

            $mt4User = Mt4User::select('EMAIL')->where('LOGIN', $login1)->where('server_id', $this->server_id)->first();
            $sendToEmail = ($mt4User && $mt4User->EMAIL != '') ? $mt4User->EMAIL : current_user()->getUser()->email;
            $email->withdrawal(['email' => $sendToEmail, 'login' => $login1, 'amount' => $amount]);

        } else {
            $requestLog->updateWithdrawalRequest($logId, $login1, $amount, '', '', 2);
        }


        $email=new Email2();
        $email->sendWithdrawal($logId);

        return $this->getApiResponseMessage($result);
    }

    public function operation($login, $amount, $mode, $oldPassword = null)
    {
        $password = ($this->apiReqiredConfirmMt4Password) ? "CPASS=" . $oldPassword . "|" : "";
        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=' . $mode . '|' . 'LOGIN=' . $login . '|' . $password . 'AMOUNT=' . $amount . '|COMMENT=ONLINE';
        return $this->getApiResponseMessage($this->sendApiMessage($message));
    }

    public function mt4UserFullDetails($accountId, $mt4_user_details, $oldPassword = null)
    {
        $requestLog = new RequestLog();
        if ($this->directOrderToMt4Server == false) {
            $notExist = $requestLog->insertMt4UserFullDetailsRequest($this->server_id, $mt4_user_details, 0, $accountId);
            return (!$notExist) ? trans('accounts::accounts.youHavePendingRequest') : trans('accounts::accounts.the_request');
        }

        $password = ($this->apiReqiredConfirmMt4Password) ?     "CPASS=" . $oldPassword . "|" : "";

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=6' . '|' . 'GROUP=' . $mt4_user_details['array_group'] . '|NAME=' . $mt4_user_details['first_name'] . ' ' . $mt4_user_details['last_name']
            . '|PASSWORD=' . $mt4_user_details['password'] . '|INVESTOR=' . $mt4_user_details['investor'] . '|EMAIL=' . $mt4_user_details['email'] . '|COUNTRY=' . $mt4_user_details['country']
           . '|CITY=' . $mt4_user_details['city'] . '|ADDRESS=' . $mt4_user_details['address'] . '|COM

ENT=' . '|PHONE=' . $mt4_user_details['phone'] . '|ZIPCODE=' . $mt4_user_details['phone']
            . '|LEVERAGE=' . $mt4_user_details['array_leverage'] . '|SEND_REPORTS=1' . '|DEPOSIT=' . $mt4_user_details['array_deposit'];

        $result = $this->sendApiMessage($message);

        $email=new Email2();
        $logId=0;
        if ($result->result === 0) {

            /* TODO comment and reason should be from addmin not $result,$result  */
            $logId=$requestLog->insertMt4UserFullDetailsRequest($this->server_id, $mt4_user_details, 1, $accountId);
            $email->sendAdditionalAccountEmail($logId);
            return ($result->data[0]->login);

        } else {

            $logId=$requestLog->insertMt4UserFullDetailsRequest($this->server_id, $mt4_user_details, 2, $accountId);
        }


        $email->sendAdditionalAccountEmail($logId);

        return $this->getApiResponseMessage($result);


        return $this->getApiResponseMessage($this->sendApiMessage($message));
    }

    public function adminForwordMt4UserFullDetails($logId, $server_id, $mt4_user_details)
    {
        $this->changeServer($server_id);
        $mt4_user_details['server_id'] = $server_id;


        $requestLog = new RequestLog();


        $password = "";


        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=6' . '|' . 'GROUP=' . $mt4_user_details['array_group'] . '|NAME=' . $mt4_user_details['first_name'] . ' ' . $mt4_user_details['last_name']
            . '|PASSWORD=' . $mt4_user_details['password'] . '|INVESTOR=' . $mt4_user_details['investor'] . '|EMAIL=' . $mt4_user_details['email'] . '|COUNTRY=' . $mt4_user_details['country']
            . '|CITY=' . $mt4_user_details['city'] . '|ADDRESS=' . $mt4_user_details['address'] . '|COMMENT=' . '|PHONE=' . $mt4_user_details['phone'] . '|ZIPCODE=' . $mt4_user_details['phone']
            . '|LEVERAGE=' . $mt4_user_details['leverage'] . '|SEND_REPORTS=1' . '|DEPOSIT=' . $mt4_user_details['array_deposit'];

        $result = $this->sendApiMessage($message);

        if ($result->result === 0) {
            /* TODO comment and reason should be from addmin not $result,$result  */

            $requestLog->updateMt4UserFullDetailsRequest($logId, $mt4_user_details, 1, $result->data[0]->login, $mt4_user_details['accountId']);
            \Session::flash('flash_success',trans('accounts::accounts.success'));


        } else {

            $requestLog->updateMt4UserFullDetailsRequest($logId, $mt4_user_details, 2, 0, $mt4_user_details['accountId']);
        }

        $email=new Email2();
        $email->sendAdditionalAccountEmail($logId);

        return $this->getApiResponseMessage($result);


        return $this->getApiResponseMessage($this->sendApiMessage($message));
    }


    private function getApiResponseMessage($result)
    {

        if (is_object($result) && property_exists($result, 'result')) {

            return (array_key_exists($result->result, $this->returnMessages)) ? $this->returnMessages[$result->result] : $this->returnMessages['error'];
        }
        $this->returnMessages['error'];
    }


    public function AssignAccount($login, $password, $server_id = 1)
    {
        $this->changeServer($server_id);
        $requestLog = new RequestLog();
        if ($this->directOrderToMt4Server == false) {
            $notExist = $requestLog->insertAssignAccountRequest($login, $this->server_id, $password);
            return (!$notExist) ? trans('accounts::accounts.youHavePendingRequest') : trans('accounts::accounts.the_request');
        }


        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=7|LOGIN=' . $login . '|CPASS=' . $password;
        $result = $this->sendApiMessage($message);


        if ($result->result === 0) {
            /* TODO comment and reason should be from addmin not $result,$result  */
            $requestLog->insertAssignAccountRequest($login, $this->server_id, $password, '', '', 1);

            /* TODO[moaid]  please translate messages in this page every where */
            return true;
        } else {

            $requestLog->insertAssignAccountRequest($login, $this->server_id, $password, '', '', 2);

            return   $this->getApiResponseMessage($result);

        }

    }

    public function adminForwordAssignAccount($logId, $login, $server_id, $password)
    {
        $this->changeServer($server_id);
        $requestLog = new RequestLog();


        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=7|LOGIN=' . $login . '|CPASS=' . $password;

        $result = $this->sendApiMessage($message);


        if ($result->result === 0) {
            $requestLog->updateAssignAccountRequest($logId, $login, $password, '', '', 1);
            \Session::flash('flash_success',trans('accounts::accounts.the_user_has'));
            /* TODO please trans() */
            return trans('accounts::accounts.this_user_has');
        } else {

            $requestLog->updateAssignAccountRequest($logId, $login, $password, '', '', 2);
            return trans('accounts::accounts.error_please_try_again');
        }

    }


    public function AssignAgents($login, $password)
    {


        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=7|LOGIN=' . $login . '|CPASS=' . $password;
        $result = $this->sendApiMessage($message);

        if ($result->result === 0) {


            return true;
        } else {

            return $this->getApiResponseMessage($result);
        }


    }


    public function checkLoginPassword($login, $password,$server_id=0)
    {

        $this->changeServer($server_id);

        $message = 'WMQWEBAPI MASTER=' . $this->apiMasterPassword . '|MODE=7|LOGIN=' . $login . '|CPASS=' . $password;
        $result = $this->sendApiMessage($message);

        if ($result->result === 0) {


            return true;
        } else {

            return $this->getApiResponseMessage($result);
        }


    }

}