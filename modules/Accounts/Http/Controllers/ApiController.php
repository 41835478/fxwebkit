<?php namespace Modules\Accounts\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ApiController extends Controller {

	private $apiReqiredConfirmMt4Password;
	private $apiMasterPassword;
	private $mt4Host;
	private $mt4Port;
        private $returnMessages=[
	'NOK01'=>'Invalid Data',
	'NOK02'=>'Internal Error',
	'NOK03'=>'General Error',
	'NOK04'=>'No Change',
	'NOK05'=>'Invalid Login',
	'NOK06'=>'No Enough Money',
	'NOK07'=>'Client is not related to this agent',
	'NOK08'=>'Client Credit is less than credit out amount',
	'NOK09'=>'Simple password, should contain numbers and letters',
	'OK'=>'Success',
	'error'=>'Internal Error,Please try again later'
];
	public function __construct()
	{
		$this->apiReqiredConfirmMt4Password=Config('accounts.apiReqiredConfirmMt4Password');
		$this->apiMasterPassword=Config('accounts.apiMasterPassword');
		$this->mt4Host=Config('fxweb.mt4CheckHost');
		$this->mt4Port=Config('fxweb.mt4CheckPort');
	}

	private function sendApiMessage($message){


		$fp = @fsockopen($this->mt4Host,$this->mt4Port,$error,$error2,10);
		$result = 'error';
		if ($fp) {
			fwrite($fp, $message. "\nQUIT\n");
			$result = fgets($fp, 1024);
			fclose($fp);
		}

		return trim($result);

	}

	public function changeMt4Password($login,$newPassword,$oldPassword=null){

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=2|LOGIN='.$login.'|'.$password.'NPASS='.$newPassword.'|TYPE=0|MANAGER=1';
		echo('<div style="position:fixed; bottom:0px; left:0px; background:#ccc; color:#fff; width:100%; text-align:right; padding:10px;">'.$message.'</div>');
                return $this->getApiResponseMessage($this->sendApiMessage($message));
	}

	public function changeMt4Leverage($login,$leverage,$oldPassword=null){

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=1|LOGIN='.$login.'|'.$password.'LEVERAGE='.$leverage.'|MANAGER=1';
		echo('<div style="position:fixed; bottom:0px; left:0px; background:#ccc; color:#fff; width:100%; text-align:right; padding:10px;">'.$message.'</div>');
               
                return $this->getApiResponseMessage($this->sendApiMessage($message));
	}

	public function internalTransfer($login1,$login2,$amount,$oldPassword=null){

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=4|LOGIN='.$login1.'|'.$password.'TOACC='.$login2.'|AMOUNT='.$amount.'|MANAGER=1';
		echo('<div style="position:fixed; bottom:0px; left:0px; background:#ccc; color:#fff; width:100%; text-align:right; padding:10px;">'.$message.'</div>');
               
                return $this->getApiResponseMessage($this->sendApiMessage($message));
	}

	private function getApiResponseMessage($result){
            
            
		return (isset($this->returnMessages[$result]))? $this->returnMessages[$result]:$this->returnMessages['error'];
	}

}