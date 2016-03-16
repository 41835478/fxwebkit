<?php namespace Modules\Accounts\Http\Controllers;

use Fxweb\Http\Controllers\admin\Email;
use Pingpong\Modules\Routing\Controller;
use Modules\Request\Http\Controllers\RequestController as RequestLog;
use Fxweb\Models\Mt4User;

class ApiController extends Controller {

	private $apiReqiredConfirmMt4Password;
	private $apiMasterPassword;
	public $mt4Host;
	public $mt4Port;
	private $returnMessages=[
		'1'=>'Invalid Data',
		'2'=>'Internal Error',
		'3'=>'General Error',
		'4'=>'No Change',
		'5'=>'Invalid Login',
		'6'=>'No Enough Money',
		'7'=>'Client is not related to this agent',
		'8'=>'Client Credit is less than credit out amount',
		'9'=>'Simple password, should contain numbers and letters',
		'10'=>'Exsiting User',
		'11'=>'Faild To create account',
		'0'=>'Success',
		'error'=>'Internal Error,Please try again later'
	];
	public $server_id;
	public function __construct()
	{
		$this->apiReqiredConfirmMt4Password=Config('accounts.apiReqiredConfirmMt4Password');
		$this->apiMasterPassword=Config('accounts.apiMasterPassword');
		$this->mt4Host=Config('fxweb.mt4CheckHost');
		$this->mt4Port=Config('fxweb.mt4CheckPort');
		$this->server_id=0;
	}
public function changeServer($server_id){
	if($server_id==1){
		$this->mt4Host=Config('fxweb.mt4CheckDemoHost');
		$this->mt4Port=Config('fxweb.mt4CheckDemoPort');
		$this->server_id=1;
	}else{
		$this->mt4Host=Config('fxweb.mt4CheckHost');
		$this->mt4Port=Config('fxweb.mt4CheckPort');
		$this->server_id=$server_id;

	}


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
/*
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket === false) return 'error';


		$result = socket_connect($socket, $this->mt4Host, $this->mt4Port);
		$string = '';
		if ($result === false) {
			return 'error';
		} else {

			socket_write($socket, $message . "\nQUIT\n", strlen($message . "\nQUIT\n"));
			while (socket_recv($socket, $data, 1024, 0)) {
				$string = $data;
			}
		}

		die(var_dump($string));
		return json_encode($string);
*/

		$fp =@fsockopen($this->mt4Host,$this->mt4Port,$error,$error2,10);
		$result = '';
		if ($fp) {
			fwrite($fp, $message. "\nQUIT\n");
		while(!feof($fp)){
		$result .= fgets($fp, 1024);
		}
			fclose($fp);
		}


	//	$result = mb_convert_encoding($result, 'UTF-8','auto');

		$result = preg_replace("#}[^}]*$#", '}', $result);
		$result=json_decode($result);


	return (is_object($result))? $result:json_decode('{"result":"error"}');/**/



	}

	public function changeMt4Password($login,$newPassword,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertChangePasswordRequest($login,$this->server_id,$newPassword);

			return trans('accounts::accounts.the_request');
		}
		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=2|LOGIN='.$login.'|'.$password.'NPASS='.$newPassword.'|TYPE=0|MANAGER=1';
		$result=$this->sendApiMessage($message);



		if( $result->result ==0 ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertChangePasswordRequest($login,$this->server_id,$newPassword,'','',1);

			$email=new Email();
			$email->changeMt4Password(['email'=>config('fxweb.adminEmail'),'login'=>$login,'newPassword'=>$newPassword]);

		}else{

			$requestLog->insertChangePasswordRequest($login,$this->server_id,$newPassword,'','',2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function adminForwordChangeMt4Password($logId,$login,$server_id,$newPassword,$oldPassword=null){

		$this->changeServer($server_id);
		$requestLog =new RequestLog();

		/* TODO[Galya] when the admin forword the request allows there will be no password  please tell me if this logic is right */
		$password="";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=2|LOGIN='.$login.'|'.$password.'NPASS='.$newPassword.'|TYPE=0|MANAGER=1';
		$result=$this->sendApiMessage($message);




		if($result->result ==0  ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->updateChangePasswordRequest($logId,$login,$newPassword,'','',1);

		}else{

			$requestLog->updateChangePasswordRequest($logId,$login,$newPassword,'','',2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function changeMt4Leverage($login,$leverage,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){

			$requestLog->insertChangeLeverageRequest($login,$this->server_id,$leverage);
			/* TODO[moaid] please translate this message */
			return trans('accounts::accounts.the_request');
		}
		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=1|LOGIN='.$login.'|'.$password.'LEVERAGE='.$leverage.'|MANAGER=1';

		$result=$this->sendApiMessage($message);



		if($result->result ==0  ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertChangeLeverageRequest($login,$this->server_id,$leverage,'','',1);

			$email=new Email();
			$email->changeLeverage(['email'=>config('fxweb.adminEmail'),'login'=>$login,'leverage'=>$leverage]);

			$mt4User=Mt4User::select('EMAIL')->where('LOGIN',$login)->where('server_id',$this->server_id)->get();
			$sendToEmail=(isset($mt4User->EMAIL) && $mt4User->EMAIL !='')? $mt4User->EMAIL :current_user()->getUser()->email;
			$email->changeLeverage(['email'=>$sendToEmail,'login'=>$login,'leverage'=>$leverage]);

		}else{

			$requestLog->insertChangeLeverageRequest($login,$this->server_id,$leverage,'','',2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function adminForwordChangeMt4Leverage($logId,$login,$server_id,$leverage,$oldPassword=null){
$this->changeServer($server_id);
		$requestLog =new RequestLog();

		$password="";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=1|LOGIN='.$login.'|'.$password.'LEVERAGE='.$leverage.'|MANAGER=1';

		$result=$this->sendApiMessage($message);



		if($result->result ==0  ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->updateChangeLeverageRequest($logId,$login,$leverage,'','',1);

			$email=new Email();
			$email->changeLeverage(['email'=>config('fxweb.adminEmail'),'login'=>$login,'leverage'=>$leverage]);

			$mt4User=Mt4User::select('EMAIL')->where('LOGIN',$login)->where('server_id',$this->server_id)->get();
			$sendToEmail=($mt4User && $mt4User->EMAIL !='')? $mt4User->EMAIL :current_user()->getUser()->email;
			$email->changeLeverage(['email'=>$sendToEmail,'login'=>$login,'leverage'=>$leverage]);
		}else{

			$requestLog->updateChangeLeverageRequest($logId,$login,$leverage,'','',2);
		}
		return $this->getApiResponseMessage($result);
	}

	public function internalTransfer($login1,$login2,$oldPassword=null,$amount){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertInternalTransferRequest($login1,$login2,$this->server_id,$amount);
			/* TODO[moaid] please translate this message */
			return trans('accounts::accounts.the_request');
		}


		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=4|LOGIN='.$login1.'|'.$password.'TOACC='.$login2.'|AMOUNT='.$amount.'|MANAGER=1';


		$result=$this->sendApiMessage($message);

		if($result->result ==0  ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertInternalTransferRequest($login1,$login2,$this->server_id,$amount,'','',1);

			$email=new Email();
			$email->internalTransfers(['email'=>config('fxweb.adminEmail'),'login1'=>$login1,'login2'=>$login2,'amount'=>$amount]);

		}else{

			$requestLog->insertInternalTransferRequest($login1,$login2,$this->server_id,$amount,'','',2);
		}
		return $this->getApiResponseMessage($result);


	}


	public function adminForwordInternalTransfer($logId,$login1,$login2,$server_id,$amount,$oldPassword=null){
$this->changeServer($server_id);
		$requestLog =new RequestLog();
		/* TODO check oldpassword and insert it in log InternalTransfer to re send it to this function */

		$password="";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=4|LOGIN='.$login1.'|'.$password.'TOACC='.$login2.'|AMOUNT='.$amount.'|MANAGER=1';

		$result=$this->sendApiMessage($message);

		if($result->result ==0  ){

			$requestLog->updateInternalTransferRequest($logId,$login1,$login2,$amount,'','',1);

		}else{
			$requestLog->updateInternalTransferRequest($logId,$login1,$login2,$amount,'','',2);


		}
		return $this->getApiResponseMessage($result);


	}

	public function withDrawal($login1,$amount,$oldPassword=null){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){

			$requestLog->insertWithDrawalRequest($login1,$this->server_id,$amount);

			return trans('accounts::accounts.the_request');
		}

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";

		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=3|LOGIN='.$login1.'|'.$password.'|AMOUNT='.'-'.$amount.'|COMMENT=ONLINE'.'|MANAGER=1';


		$result=$this->sendApiMessage($message);


		if($result->result ==0  ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertWithDrawalRequest($login1,$this->server_id,$amount,'','',1);

			$email=new Email();
			$email->withDrawal(['email'=>config('fxweb.adminEmail'),'login'=>$login1,'amount'=>$amount]);

		}else{

			$requestLog->insertWithDrawalRequest($login1,$this->server_id,$amount,'','',2);
		}
		return $this->getApiResponseMessage($result);


	}

	public function adminForwordWithDrawal($logId,$login1,$server_id,$amount,$oldPassword=null){
$this->changeServer($server_id);
		$requestLog =new RequestLog();
		/* TODO check oldpassword and insert it in log InternalTransfer to re send it to this function */

		$password="";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=3|LOGIN='.$login1.'|'.$password.'|AMOUNT='.'-'.$amount.'|COMMENT=ONLINE'.'|MANAGER=1';

		$result=$this->sendApiMessage($message);

		if($result->result ==0  ){

			$requestLog->updateWithDrawalRequest($logId,$login1,$amount,'','',1);

		}else{
			$requestLog->updateWithDrawalRequest($logId,$login1,$amount,'','',2);


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
				$requestLog->insertMt4UserFullDetailsRequest($this->server_id,$mt4_user_details);

				return trans('accounts::accounts.the_request');
			}

		$password=($this->apiReqiredConfirmMt4Password)? "CPASS=".$oldPassword."|":"";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=6'.'|'.'GROUP='.$mt4_user_details['array_group'].'|NAME='.$mt4_user_details['first_name'].' '.$mt4_user_details['last_name']
			.'|PASSWORD='.$mt4_user_details['password'].'|INVESTOR='.$mt4_user_details['investor'].'|EMAIL='.$mt4_user_details['email'].'|COUNTRY='.$mt4_user_details['country']
			.'|CITY='.$mt4_user_details['city'].'|ADDRESS='.$mt4_user_details['address'].'|COMMENT='.'|PHONE='.$mt4_user_details['phone'].'|ZIPCODE='.$mt4_user_details['phone']
			.'|LEVERAGE='.$mt4_user_details['array_leverage'].'|SEND_REPORTS=1'.'|DEPOSIT='.$mt4_user_details['array_deposit'];

			$result=$this->sendApiMessage($message);

			if($result->result ==0 ){
				/* TODO comment and reason should be from addmin not $result,$result  */
				$requestLog->insertMt4UserFullDetailsRequest($this->server_id,$mt4_user_details,1);


			}else{

				$requestLog->insertMt4UserFullDetailsRequest($this->server_id,$mt4_user_details,2);
			}
			return $this->getApiResponseMessage($result);


		return $this->getApiResponseMessage($this->sendApiMessage($message));
	}

	public function adminForwordMt4UserFullDetails($logId,$server_id,$mt4_user_details){
$this->changeServer($server_id);



		$requestLog =new RequestLog();


		$password="";


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=6'.'|'.'GROUP='.$mt4_user_details['array_group'].'|NAME='.$mt4_user_details['first_name'].' '.$mt4_user_details['last_name']
			.'|PASSWORD='.$mt4_user_details['password'].'|INVESTOR='.$mt4_user_details['investor'].'|EMAIL='.$mt4_user_details['email'].'|COUNTRY='.$mt4_user_details['country']
			.'|CITY='.$mt4_user_details['city'].'|ADDRESS='.$mt4_user_details['address'].'|COMMENT='.'|PHONE='.$mt4_user_details['phone'].'|ZIPCODE='.$mt4_user_details['phone']
			.'|LEVERAGE='.$mt4_user_details['leverage'].'|SEND_REPORTS=1'.'|DEPOSIT='.$mt4_user_details['array_deposit'];

		$result=$this->sendApiMessage($message);

		if($result->result ==0  ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->updateMt4UserFullDetailsRequest($logId,$mt4_user_details,1);


		}else{

			$requestLog->updateMt4UserFullDetailsRequest($logId,$mt4_user_details,2);
		}
		return $this->getApiResponseMessage($result);


		return $this->getApiResponseMessage($this->sendApiMessage($message));
	}





	private function getApiResponseMessage($result){

if(is_object($result) &&  property_exists ($result ,'result')){

		return (array_key_exists($result->result,$this->returnMessages))? $this->returnMessages[$result->result]:$this->returnMessages['error'];
}
	$this->returnMessages['error'];

	}


	public function AssignAccount($login,$password){

		$requestLog =new RequestLog();
		if(Config('accounts.directOrderToMt4Server')==false){
			$requestLog->insertAssignAccountRequest($login,$this->server_id,$password);
			return trans('accounts::accounts.the_request');
		}



		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=7|LOGIN='.$login.'|CPASS='.$password;
		$result=$this->sendApiMessage($message);





		if($result->result ==0 ){
			/* TODO comment and reason should be from addmin not $result,$result  */
			$requestLog->insertAssignAccountRequest($login,$this->server_id,$password,'','',1);

			/* TODO[moaid]  please translate messages in this page every where */
			return true;
		}else{

			$requestLog->insertAssignAccountRequest($login,$this->server_id,$password,'','',2);

			/* TODO[moaid]  please translate messages in this page every where */
			return 'Error, Please try again later.';
		}

	}

	public function adminForwordAssignAccount($logId,$login,$server_id,$password){
$this->changeServer($server_id);
		$requestLog =new RequestLog();


		$message='WMQWEBAPI MASTER='.$this->apiMasterPassword.'|MODE=7|LOGIN='.$login.'|CPASS='.$password;

		$result=$this->sendApiMessage($message);


		if($result->result ==0){
			$requestLog->updateAssignAccountRequest($logId,$login,$password,'','',1);

			/* TODO please trans() */
			return 'This user has been assigned successfully';
		}else{

			$requestLog->updateAssignAccountRequest($logId,$login,$password,'','',2);
return 'error please try again.';
		}

	}

}