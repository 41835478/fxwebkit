<?php namespace Modules\Request\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Modules\Request\Entities\RequestWithdrawal as Withdrawal;
use Modules\Request\Entities\RequestChangeLeverage as ChangeLeverage;
use Modules\Request\Entities\RequestChangePassword as ChangePassword;
use Modules\Request\Entities\RequestAddAccount as addAccount;
use Modules\Request\Entities\RequestAssignAccount as AssignAccount;

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

        $log = new ChangePassword();

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


        $log = ChangePassword::find($logId);


        $log->login = $login;
        $log->newPassword = $newPassword;
        $log->status = $status;
        $log->save();
        return true;


    }


    public function insertMt4UserFullDetailsRequest($mt4_user_details,$status=0)
    {

        //$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);

        $log = new addAccount();

        $log->insert([
            'first_name' => $mt4_user_details['first_name'],
            'last_name' => $mt4_user_details['last_name'],
            'email' => $mt4_user_details['email'],
            'password' => $mt4_user_details['password'],
            'investor' => $mt4_user_details['investor'],
            'birthday' => $mt4_user_details['birthday'],
            'leverage' => $mt4_user_details['array_leverage'],
            'array_deposit' => $mt4_user_details['array_deposit'],
            'array_group' => $mt4_user_details['array_group'],
            'phone' => $mt4_user_details['phone'],
            'country' => $mt4_user_details['country'],
            'city' => $mt4_user_details['city'],
            'address' => $mt4_user_details['address'],
            'zip_code' => $mt4_user_details['zip_code'],
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status'=>$status
        ]);

        return true;


    }


    public function updateMt4UserFullDetailsRequest($logId,$mt4_user_details,$status)
    {


        $log = addAccount::find($logId);

        $log->first_name=$mt4_user_details['first_name'];
        $log->last_name=$mt4_user_details['last_name'];
        $log->email=$mt4_user_details['email'];
        $log->password=$mt4_user_details['password'];
        $log->investor=$mt4_user_details['investor'];
        $log->birthday=$mt4_user_details['birthday'];
        $log->leverage=$mt4_user_details['leverage'];
        $log->array_deposit=$mt4_user_details['array_deposit'];
        $log->array_group=$mt4_user_details['array_group'];
        $log->phone=$mt4_user_details['phone'];
        $log->country=$mt4_user_details['country'];
        $log->city=$mt4_user_details['city'];
        $log->address=$mt4_user_details['address'];
        $log->zip_code=$mt4_user_details['zip_code'];
        $log->status=$status;
        $log->save();
        return true;


    }

    public function insertAssignAccountRequest($login, $password, $comment = '', $reason = '', $status = 0)
    {
        $user = current_user()->getUser();
        $log = new AssignAccount();

        $log->insert([
            'accountId'=>$user->id,
            'name'=>$user->first_name,
            'login' => $login,

            'password' => $password,
            //	'comment'=>$comment,
            //	'reason'=>$reason,
            'status' => $status
        ]);

        return true;
    }

    public function updateAssignAccountRequest($logId, $login,$password, $comment = '', $reason = '', $status = 0)
    {


        $log = AssignAccount::find($logId);

        $log->login = $login;
        $log->password = $password;
        $log->status = $status;
        $log->save();
        return true;


    }

}