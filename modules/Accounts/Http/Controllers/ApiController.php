<?php namespace Modules\Accounts\Http\Controllers;

use Fxweb\Http\Controllers\admin\Email;
use Pingpong\Modules\Routing\Controller;
use Modules\Request\Http\Controllers\RequestController as RequestLog;

class ApiController extends Controller {

	private $apiReqiredConfirmMt4Password;
	private $apiMasterPassword;
	public $mt4Host;
	public $mt4Port;
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
		'NOK10'=>'Exsiting User',
		'NOK11'=>'Faild To create account',
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
		//	echo('<div style="position:fixed; bottom:0px; left:0px; background:#ccc; color:#fff; width:100%; text-align:right; padding:10px;">'.$message.'</div>');



//
//		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
//		if ($socket === false) {
//			echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
//		} else {
//			echo "OK.\n";
//		}
//
//
//		$result = socket_connect($socket, $this->mt4Host, $this->mt4Port);
//$string='';
//		if ($result === false) {
//
//		} else {
//			echo "OK.\n".socket_strerror(socket_last_error());
//			socket_write($socket, $message. "\nQUIT\n", strlen($message. "\nQUIT\n"));
//			while (socket_recv($socket, $data, 8192, 0)) {
//				$string .= $data;
//			}
//		}
//return $string;
		$fp =@fsockopen($this->mt4Host,$this->mt4Port,$error,$error2,10);
		$result = 'error';
		if ($fp) {
			fwrite($fp, $message. "\nQUIT\n");
			$result= fgets($fp, 1024);

			fclose($fp);
		}

		return preg_replace('/\s+/', '', $result);

	}

	public function changeMt4Password($login,$newPassword,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertChangePasswordRequest($login,$newPassword);
			/* TODO[moaid] please translate this message */
			return trans('accounts::accounts.the_request');
		}
		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=2|LOGIN='.$login.'|'.$password.'NPASS='.$newPassword.'|TYPE=0|MANAGER=1';
		$result=$this->sendApiMessage($message);




		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertChangePasswordRequest($login,$newPassword,$result,$result,1);

			$email=new Email();
			$email->changeMt4Password(['email'=>config('fxweb.adminEmail'),'login'=>$login,'newPassword'=>$newPassword]);

		}else{

			$requestLog->insertChangePasswordRequest($login,$newPassword,$result,$result,2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function adminForwordChangeMt4Password($login,$newPassword,$oldPassword=null){

		$requestLog =new RequestLog();

		/* TODO[Galya] when the admin forword the request allows there will be no password  please tell me if this logic is right */
		$password="";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=2|LOGIN='.$login.'|'.$password.'NPASS='.$newPassword.'|TYPE=0|MANAGER=1';
		$result=$this->sendApiMessage($message);




		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->updateChangePasswordRequest($login,$newPassword,$result,$result,1);

		}else{

			$requestLog->updateChangePasswordRequest($login,$newPassword,$result,$result,2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function changeMt4Leverage($login,$leverage,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertChangeLeverageRequest($login,$leverage);
			/* TODO[moaid] please translate this message */
			return trans('accounts::accounts.the_request');
		}
		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=1|LOGIN='.$login.'|'.$password.'LEVERAGE='.$leverage.'|MANAGER=1';

		$result=$this->sendApiMessage($message);



		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertChangeLeverageRequest($login,$leverage,$result,$result,1);

			$email=new Email();
			$email->changeLeverage(['email'=>config('fxweb.adminEmail'),'login'=>$login,'leverage'=>$leverage]);
			$email->changeLeverage(['email'=>current_user()->getUser()->email,'login'=>$login,'leverage'=>$leverage]);

		}else{

			$requestLog->insertChangeLeverageRequest($login,$leverage,$result,$result,2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function adminForwordChangeMt4Leverage($login,$leverage,$oldPassword=null){

		$requestLog =new RequestLog();

		$password="";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=1|LOGIN='.$login.'|'.$password.'LEVERAGE='.$leverage.'|MANAGER=1';

		$result=$this->sendApiMessage($message);



		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->updateChangeLeverageRequest($login,$leverage,$result,$result,1);


		}else{

			$requestLog->updateChangeLeverageRequest($login,$leverage,$result,$result,2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function internalTransfer($login1,$login2,$amount,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertInternalTransferRequest($login1,$login2,$amount);
			/* TODO[moaid] please translate this message */
			return trans('accounts::accounts.the_request');
		}

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=4|LOGIN='.$login1.'|'.$password.'TOACC='.$login2.'|AMOUNT='.$amount.'|MANAGER=1';


		$result=$this->sendApiMessage($message);

		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertInternalTransferRequest($login1,$login2,$amount,$result,$result,1);

			$email=new Email();
			$email->internalTransfers(['email'=>config('fxweb.adminEmail'),'login1'=>$login1,'login2'=>$login2,'amount'=>$amount]);

		}else{

			$requestLog->insertInternalTransferRequest($login1,$login2,$amount,$result,$result,2);
		}
		return $this->getApiResponseMessage($result);


	}


	public function adminForwordInternalTransfer($logId,$login1,$login2,$amount,$oldPassword=null){

		$requestLog =new RequestLog();
		/* TODO check oldpassword and insert it in log InternalTransfer to re send it to this function */

		$password="";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=4|LOGIN='.$login1.'|'.$password.'TOACC='.$login2.'|AMOUNT='.$amount.'|MANAGER=1';

		$result=$this->sendApiMessage($message);

		if($result =='OK' ){

			$requestLog->updateInternalTransferRequest($logId,$login1,$login2,$amount,$result,$result,1);

		}else{
			$requestLog->updateInternalTransferRequest($logId,$login1,$login2,$amount,$result,$result,2);


		}
		return $this->getApiResponseMessage($result);


	}

	public function withDrawal($login1,$amount,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertWithDrawalRequest($login1,$amount);

			return trans('accounts::accounts.the_request');
		}

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=3|LOGIN='.$login1.'|'.$password.'|AMOUNT='.'-'.$amount.'|COMMENT=ONLINE'.'|MANAGER=1';


		$result=$this->sendApiMessage($message);


		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertWithDrawalRequest($login1,$amount,$result,$result,1);

			$email=new Email();
			$email->withDrawal(['email'=>config('fxweb.adminEmail'),'login'=>$login1,'amount'=>$amount]);

		}else{

			$requestLog->insertWithDrawalRequest($login1,$amount,$result,$result,2);
		}
		return $this->getApiResponseMessage($result);


	}

	public function adminForwordWithDrawal($logId,$login1,$amount,$oldPassword=null){

		$requestLog =new RequestLog();
		/* TODO check oldpassword and insert it in log InternalTransfer to re send it to this function */

		$password="";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=3|LOGIN='.$login1.'|'.$password.'|AMOUNT='.'-'.$amount.'|COMMENT=ONLINE'.'|MANAGER=1';

		$result=$this->sendApiMessage($message);

		if($result =='OK' ){

			$requestLog->updateWithDrawalRequest($logId,$login1,$amount,$result,$result,1);

		}else{
			$requestLog->updateWithDrawalRequest($logId,$login1,$amount,$result,$result,2);


		}
		return $this->getApiResponseMessage($result);


	}

	public function operation($login,$amount,$mode,$oldPassword=null){

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE='.$mode.'|'.'LOGIN='.$login.'|'.$password.'AMOUNT='.$amount.'|COMMENT=ONLINE';


		return $this->getApiResponseMessage($this->sendApiMessage($message));
	}


	public function mt4UserFullDetails($mt4_user_details,$oldPassword=null){




			$requestLog =new RequestLog();
			if(Config('accounts.directOrderToMt4Server')==false){

				$requestLog->insertMt4UserFullDetailsRequest($mt4_user_details);

				return trans('accounts::accounts.the_request');
			}

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=6'.'|'.'GROUP='.$mt4_user_details['array_group'].'|NAME='.$mt4_user_details['first_name'].' '.$mt4_user_details['last_name']
			.'|PASSWORD='.$mt4_user_details['password'].'|INVESTOR='.$mt4_user_details['investor'].'|EMAIL='.$mt4_user_details['email'].'|COUNTRY='.$mt4_user_details['country']
			.'|CITY='.$mt4_user_details['city'].'|ADDRESS='.$mt4_user_details['address'].'|COMMENT='.'|PHONE='.$mt4_user_details['phone'].'|ZIPCODE='.$mt4_user_details['phone']
			.'|LEVERAGE='.$mt4_user_details['array_leverage'].'|SEND_REPORTS=1'.'|DEPOSIT='.$mt4_user_details['array_deposit'];

			$result=$this->sendApiMessage($message);

			if($result =='OK' ){
				/* TODO comment and reason should be from addmin not $result,$result  */
				$requestLog->insertMt4UserFullDetailsRequest($mt4_user_details,1);


			}else{

				$requestLog->insertMt4UserFullDetailsRequest($mt4_user_details,2);
			}
			return $this->getApiResponseMessage($result);


		return $this->getApiResponseMessage($this->sendApiMessage($message));
	}

	public function adminForwordMt4UserFullDetails($logId,$mt4_user_details){




		$requestLog =new RequestLog();


		$password="";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=6'.'|'.'GROUP='.$mt4_user_details['array_group'].'|NAME='.$mt4_user_details['first_name'].' '.$mt4_user_details['last_name']
			.'|PASSWORD='.$mt4_user_details['password'].'|INVESTOR='.$mt4_user_details['investor'].'|EMAIL='.$mt4_user_details['email'].'|COUNTRY='.$mt4_user_details['country']
			.'|CITY='.$mt4_user_details['city'].'|ADDRESS='.$mt4_user_details['address'].'|COMMENT='.'|PHONE='.$mt4_user_details['phone'].'|ZIPCODE='.$mt4_user_details['phone']
			.'|LEVERAGE='.$mt4_user_details['leverage'].'|SEND_REPORTS=1'.'|DEPOSIT='.$mt4_user_details['array_deposit'];

		$result=$this->sendApiMessage($message);

		if($result =='OK' ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->updateMt4UserFullDetailsRequest($logId,$mt4_user_details,1);


		}else{

			$requestLog->updateMt4UserFullDetailsRequest($logId,$mt4_user_details,2);
		}
		return $this->getApiResponseMessage($result);


		return $this->getApiResponseMessage($this->sendApiMessage($message));
	}





	private function getApiResponseMessage($result){


		return (isset($this->returnMessages[$result]))? $this->returnMessages[$result]:$this->returnMessages['error'];
	}


	public function AssignAccount($login,$password){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertAssignAccountRequest($login,$password);
			/* TODO[moaid] please translate this message */
			return trans('accounts::accounts.the_request');
		}


		$message="WWAPUSER-" . $login. "|" . $password;

		$result=$this->sendApiMessage($message);




		if(preg_match('#^Balance:#', $result) === 1){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertAssignAccountRequest($login,$password,$result,$result,1);

			/* TODO[moaid]  please translate messages in this page every where */
			return true;
		}else{

			$requestLog->insertAssignAccountRequest($login,$password,$result,$result,2);

			/* TODO[moaid]  please translate messages in this page every where */
			return 'Error, Please try again later.';
		}

	}

	public function adminForwordAssignAccount($logId,$login,$password){

		$requestLog =new RequestLog();


		$message="WWAPUSER-" . $login. "|" . $password;

		$result=$this->sendApiMessage($message);


		if(preg_match('#^Balance:#', $result) === 1){
			$requestLog->updateAssignAccountRequest($logId,$login,$password,$result,$result,1);

			/* TODO please trans() */
			return 'This user has been assigned successfully';
		}else{

			$requestLog->updateAssignAccountRequest($logId,$login,$password,$result,$result,2);
return 'error please try again.';
		}

	}

}