<?php namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ApiController extends Controller {

	private $apiReqiredConfirmMt4Password;
	private $apiMasterPassword;

	public function __construct()
	{
		$this->apiReqiredConfirmMt4Password=Config('accounts.apiReqiredConfirmMt4Password');
		$this->apiMasterPassword=Config('accounts.apiMasterPassword');
	}

	private function sendApiMessage($message){


	}

	public function changeMt4Password($login,$newPassword,$oldPassword=null){

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=2|LOGIN='.$login.'|'.$password.'NPASS='.$newPassword.'|TYPE=0|MANAGER=1';
	}

	private function getApiRespond
	public function index()
	{
		return view('accounts::index');
	}
	
}