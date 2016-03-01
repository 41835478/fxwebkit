<?php namespace Modules\Request\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;

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
	public function updateInternalTransferRequest($logId,$fromLogin,$toLogin,$amount=0,$comment='',$reason='',$status=0){


	//	$this->RequestLog->updateInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);
		$log= InternalTransfer::find($logId);

		$log->from_login=$fromLogin;
		$log->to_login=$toLogin;
		$log->amount=$amount;
		$log->comment=$comment;
		$log->reason=$reason;
		$log->status=$status;

		return true;



	}


}