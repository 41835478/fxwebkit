<?php namespace Modules\Request\Http\Controllers\admin;

use Illuminate\Http\Request;
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


	public function getIntenalTransferRequestList(Request $oRequest){

		$sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
		$sOrder = ($oRequest->order) ? $oRequest->order : 'id';

		$oResults = null;

		$aFilterParams = [
			'login' => '',
			'sort' => $sSort,
			'order' => $sOrder,
		];

		if ($oRequest->has('search')) {

			$aFilterParams['login'] = $oRequest->login;

			$oResults = $this->RequestLog->getInternalTransferRequestByFilters($aFilterParams, false, $sOrder, $sSort);


		}


		return view('request::admin/intenalTransferRequestList')->with('oResults', $oResults)->with('aFilterParams', $aFilterParams);
	}
}