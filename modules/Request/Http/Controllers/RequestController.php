<?php namespace Modules\Request\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

use Modules\Request\Repositories\RequestContract as RequestLog;

class RequestController extends Controller {

	protected $RequestLog;

	public function __construct(
		RequestLog $RequestLog
	)
	{
		$this->RequestLog = $RequestLog;

	}


	public function insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment='',$reason='',$status=0){


		$this->RequestLog->insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status);




	}
}