<?php namespace Modules\Request\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Modules\Request\Entities\RequestWithdrawal as Withdrawal;
use Modules\Request\Entities\RequestChangeLeverage as ChangeLeverage;
use Modules\Request\Entities\RequestAddAccount as addAccount;


class RequestController extends Controller
{


    public function insertInternalTransferRequest($fromLogin, $toLogin, $amount = 0, $comment = '', $reason = '', $status = 0)
    {


        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = new InternalTransfer();

        $log->insert([
            'from_login' => $fromLogin,
            'to_login' => $toLogin,
            'amount' => $amount,
            'comment' => $comment,
            'reason' => $reason,
            'status' => $status
        ]);
        return true;


    }

    public function insertWithDrawalRequest($login, $amount = 0, $comment = '', $reason = '', $status = 0)
    {


        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);

        $log = new Withdrawal();

        $log->insert([
            'login' => $login,
            'amount' => $amount,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);

        return true;


    }

    public function updateInternalTransferRequest($logId, $fromLogin, $toLogin, $amount = 0, $comment = '', $reason = '', $status = 0)
    {


        //	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = InternalTransfer::find($logId);

        $log->from_login = $fromLogin;
        $log->to_login = $toLogin;
        $log->amount = $amount;
        //	$log->comment=$comment;
        //	$log->reason=$reason;
        $log->status = $status;
        $log->save();
        return true;


    }

    public function updateWithDrawalRequest($logId, $login, $amount = 0, $comment = '', $reason = '', $status = 0)
    {


        //	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = Withdrawal::find($logId);


        $log->login = $login;
        $log->amount = $amount;
        $log->status = $status;
        $log->save();
        return true;


    }


    public function insertChangeLeverageRequest($login, $leverage, $comment = '', $reason = '', $status = 0)
    {

        $log = new ChangeLeverage();

        $log->insert([
            'login' => $login,
            'leverage' => $leverage,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);

        return true;
    }

    public function updateChangeLeverageRequest($logId, $login, $leverage = 0, $comment = '', $reason = '', $status = 0)
    {


        //	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
        $log = ChangeLeverage::find($logId);


        $log->login = $login;
        $log->leverage = $leverage;
        $log->status = $status;
        $log->save();
        return true;


    }


    public function insertChangePasswordRequest($login, $newPassword, $comment = '', $reason = '', $status = 0)
    {

        $log = new ChangeLeverage();

        $log->insert([
            'login' => $login,
            'newPassword' => $newPassword,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);

        return true;
    }

    public function updateChangePasswordRequest($logId, $login, $newPassword = 0, $comment = '', $reason = '', $status = 0)
    {


        $log = ChangeLeverage::find($logId);


        $log->login = $login;
        $log->newPassword = $newPassword;
        $log->status = $status;
        $log->save();
        return true;


    }


    public function insertMt4UserFullDetailsRequest($mt4_user_details)
    {

        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);

        $log = new addAccount();

        $log->insert([
            'first_name' => $mt4_user_details[first_name],
            'last_name' => $mt4_user_details[last_name],
            'email' => $mt4_user_details[email],
            'password' => $mt4_user_details[password],
            'investor' => $mt4_user_details[investor],
            'birthday' => $mt4_user_details[birthday],
            'leverage' => $mt4_user_details[leverage],
            'array_deposit' => $mt4_user_details[array_deposit],
            'array_group' => $mt4_user_details[array_group],
            'phone' => $mt4_user_details[phone],
            'country' => $mt4_user_details[country],
            'city' => $mt4_user_details[city],
            'address' => $mt4_user_details[address],
            'zip_code' => $mt4_user_details[zip_code],
        ]);

        return true;


    }


    public function updateMt4UserFullDetailsRequest($mt4_user_details)
    {


        $log = addAccount::find($logId);

        $log->$mt4_user_details[first_name];
        $log->$mt4_user_details[last_name];
        $log->$mt4_user_details[email];
        $log->$mt4_user_details[password];
        $log->$mt4_user_details[investor];
        $log->$mt4_user_details[birthday];
        $log->$mt4_user_details[leverage];
        $log->$mt4_user_details[array_deposit];
        $log->$mt4_user_details[array_group];
        $log->$mt4_user_details[phone];
        $log->$mt4_user_details[country];
        $log->$mt4_user_details[city];
        $log->$mt4_user_details[address];
        $log->$mt4_user_details[zip_code];
        $log->save();
        return true;


    }

}