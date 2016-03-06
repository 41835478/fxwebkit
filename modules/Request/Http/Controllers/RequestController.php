<?php namespace Modules\Request\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Modules\Request\Entities\RequestWithdrawal as Withdrawal;
use Modules\Request\Entities\RequestChangeLeverage as ChangeLeverage;

class RequestController extends Controller {




	public function insertInternalTransferRequest($fromLogin,$toLogin,$amount=0,$comment='',$reason='',$status=0){


		//$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
		$log= new InternalTransfer();

		$log->insert([
			'from_login'=>$fromLogin,
			'to_login'=>$toLogin,
			'amount'=>$amount,
			'comment'=>$comment,
			'reason'=>$reason,
			'status'=>$status
		]);
		return true;



	}

	public function insertWithDrawalRequest($login,$amount=0,$comment='',$reason='',$status=0){


		//$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);

		$log= new Withdrawal();

		$log->insert([
			'login'=>$login,
			'amount'=>$amount,
		//	'comment'=>$comment,
		//	'reason'=>$reason,
			'status'=>$status
		]);

		return true;



	}
	public function updateInternalTransferRequest($logId,$fromLogin,$toLogin,$amount=0,$comment='',$reason='',$status=0){


	//	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
		$log= InternalTransfer::find($logId);

		$log->from_login=$fromLogin;
		$log->to_login=$toLogin;
		$log->amount=$amount;
	//	$log->comment=$comment;
	//	$log->reason=$reason;
		$log->status=$status;
		$log->save();
		return true;



	}

	public function updateWithDrawalRequest($logId,$login,$amount=0,$comment='',$reason='',$status=0){


		//	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
		$log= Withdrawal::find($logId);


		$log->login=$login;
		$log->amount=$amount;
		$log->status=$status;
		$log->save();
		return true;



	}


	public function insertChangeLeverageRequest($login,$leverage,$comment='',$reason='',$status=0){

		$log= new ChangeLeverage();

		$log->insert([
			'login'=>$login,
			'leverage'=>$leverage,
			//	'comment'=>$comment,
			//	'reason'=>$reason,
			'status'=>$status
		]);

		return true;
	}

	public function updateChangeLeverageRequest($logId,$login,$leverage=0,$comment='',$reason='',$status=0){


		//	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
		$log= ChangeLeverage::find($logId);


		$log->login=$login;
		$log->leverage=$leverage;
		$log->status=$status;
		$log->save();
		return true;



	}


	public function insertChangePasswordRequest($login,$newPassword,$comment='',$reason='',$status=0){

		$log= new ChangeLeverage();

		$log->insert([
			'login'=>$login,
			'newPassword'=>$newPassword,
			//	'comment'=>$comment,
			//	'reason'=>$reason,
			'status'=>$status
		]);

		return true;
	}

	public function updateChangePasswordRequest($logId,$login,$newPassword=0,$comment='',$reason='',$status=0){


		$log= ChangeLeverage::find($logId);


		$log->login=$login;
		$log->newPassword=$newPassword;
		$log->status=$status;
		$log->save();
		return true;



	}

}