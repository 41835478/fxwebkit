<?php

namespace Fxweb\Http\Controllers\admin;

use Fxweb\Models\Mt4User;
use Illuminate\Http\Request;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Mail;
use Fxweb\Models\SettingsMassMail;
use Fxweb\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Email extends Controller {

    protected $fromEmail = '';
    protected $fromName = '';

    public function __construct() {
        $this->fromEmail = env('FromEmail');
        $this->fromName = env('FromName');
    }

    public function sendEmail($sTemplate, $aTemplateVariables, $toEmail, $subject) {
        $info = [
            'to' => $toEmail,
            'subject' => $subject,
            'from' => $this->fromEmail,
            'fromName' => $this->fromName,
        ];
        Mail::send($sTemplate, $aTemplateVariables, function ($message) use ($info) {
            $message->from(config('fxweb.senderEmail'), config('fxweb.displayName'));
            $message->to($info['to'])->subject($info['subject']);
            $message->getHeaders()->addTextHeader('Content-type', 'text/html');
        });
    }

    public function signUpWelcome($aUserInfo) {

        $this->sendEmail('admin.email.templates.en.signUpWelcome',
                [
                    'first_name' => $aUserInfo['first_name'],
                    'last_name' => $aUserInfo['last_name']
                ],
                $aUserInfo['email'], 
                'Welcome in Fxwebkit');
    }

    public function newContract($info) {

        $this->sendEmail('admin.email.templates.en.newContract',
            [
                'name' => $info['name'],
                'expiryHtml'=>$info['expiryHtml']
            ],
            $info['email'],
            'expiry symbols details');
    }

    public function massMailler($info) {


        Mail::raw($info['subject'], function ($message) use ($info)
        {

            $message->from(config('fxweb.senderEmail'), config('fxweb.displayName'));

            $message->getHeaders()->addTextHeader('Content-type', 'text/html');
            $message->to($info['email']);
            $message->subject($info['subject']);
            if(array_key_exists('bcc' ,$info)){
                $message->bcc($info['bcc']);
            }
            $message ->setBody($info['content'], 'text/html');
        });



    }


    public function newUserSignUp($info) {


        $this->sendEmail('admin.email.templates.en.newUserSignUp',
            [
                'first_name' => $info['first_name'],
                'last_name' => $info['last_name']
            ],
            $info['adminEmail'],
            'New User Sign Up');


    }


    public function activeAccount($info) {


        $this->sendEmail('admin.email.templates.en.activeAccount',
            [
              'code'=>$info['code'],
                'userId'=>$info['userId'],
                'website'=>$info['website']
            ],
            $info['email'],
            'Active Account');


    }

    public function forgetPassword($info) {


        $this->sendEmail('admin.email.templates.en.forgetPassword',
            [
                'userEmail' =>$info['userEmail'],
                'code'=>$info['code'],
                'website'=>$info['website'],
                'userId'=>$info['userId']
            ],
            $info['userEmail'],
            'Reset Password');


    }



    public function changeLeverage($info) {


        $this->sendEmail('admin.email.templates.en.changeLeverage',
            [
                'login' =>$info['login'],
                'leverage'=>$info['leverage']
            ],
            $info['email'],
            'User change leverage');


    }



    public function changeMt4Password($info) {


        $this->sendEmail('admin.email.templates.en.changeMt4Password',
            [
                'login'=>$info['login'],
                'newPassword'=>$info['newPassword']

            ],
            $info['email'],
            'Change Mt4 Password');


    }


    public function internalTransfers($info) {


        $this->sendEmail('admin.email.templates.en.internalTransfers',
            [
                'login1'=>$info['login1'],
                'login2'=>$info['login2'],
                'amount'=>$info['amount']
            ],
            $info['email'],
            'Internal Transfers');


    }

    public function withDrawal($info) {


        $this->sendEmail('admin.email.templates.en.withDrawal',
            [
                'login'=>$info['login'],
                'amount'=>$info['amount']
            ],
            $info['email'],
            'With Drawal');


    }


    public function autoSendMassMail($limit=2,$mailId=0,$last_user_id=0,$last_mt4_user_id=0){



        $massMail=[];
        if($mailId >0){
            $massMail=SettingsMassMail::find($mailId);
        }else{
            $massMail=SettingsMassMail::where('completed',0)->first();
        }

        if(!count($massMail)){return  'completed';}

        $last_user_id=($last_user_id > $massMail->last_user_id)? $last_user_id : $massMail->last_user_id;
        $last_mt4_user_id=($last_mt4_user_id > $massMail->last_mt4_user_id)? $last_mt4_user_id : $massMail->last_mt4_user_id;

        $userResults = $this->getUsersEmail($last_user_id,$limit,$massMail->group_id);
        $userMt4Results = $this->getMt4UsersEmail($last_mt4_user_id,$limit,$massMail->group_id);

        $bcc=[];

        foreach ($userResults as $user) {

           if($user['email'] != ''){$bcc[]=$user['email'];}

            $last_user_id=$user['id'];
        }

        foreach ($userMt4Results as $user) {

            if($user['EMAIL'] != ''){$bcc[]=$user['EMAIL'];}

            $last_mt4_user_id=$user['uid'];
        }



        if(count($userResults) || count($userMt4Results)){
        $this->massMailler([
            'subject'=>$massMail->subject,
            'email' => config('fxweb.adminEmail'),
            'content' => $massMail->mail,
            'bcc'=>$bcc
        ]);
    }else{
            $massMail->completed=1;
        }

        $massMail->last_user_id=$last_user_id;
        $massMail->last_mt4_user_id=$last_mt4_user_id;
        $massMail->save();

    }

    public function getUsersEmail($last_user_id=0,$limit=0,$massGroup=0)
    {
        $oResult=[];

        if($massGroup == 0){
        $oResult = User::select(['first_name', 'email','id'])->where('id','>',$last_user_id);
        }elseif($massGroup == -1){
            $oRole = Sentinel::findRoleBySlug('admin');
            $role_id = $oRole->id;
            $oResult = User::select(['first_name', 'email','id'])->with('roles')->whereHas('roles', function ($query) use ($role_id) {
                $query->where('id', $role_id);
            })->where('id','>',$last_user_id);

        }elseif($massGroup == -2){
            $oRole = Sentinel::findRoleBySlug('client');
            $role_id = $oRole->id;
            $oResult = User::select(['first_name', 'email','id'])->with('roles')->whereHas('roles', function ($query) use ($role_id) {
                $query->where('id', $role_id);
            })->where('id','>',$last_user_id);

        }else{

            $oResult = User::select(['first_name', 'email','id'])->with('massGroup')->whereHas('massGroup', function ($query) use ($massGroup) {
                $query->where('group_id', $massGroup);
                $query->where('type', 0);

            })->where('id','>',$last_user_id);

        }


        if($limit > 0){
            $oResult = $oResult->limit($limit);
        }
        $oResult = $oResult->get();
        return $oResult->toArray();
    }



    public function getMt4UsersEmail($last_user_id=0,$limit=0,$massGroup=0)
    {
        $oResult=[];


            $oResult = Mt4User::select(['EMAIL','uid'])->with('massGroup')->whereHas('massGroup', function ($query) use ($massGroup) {
                $query->where('group_id', $massGroup);
                $query->where('type', 1);

            })->where('uid','>',$last_user_id);




        if($limit > 0){
            $oResult = $oResult->limit($limit);
        }
        $oResult = $oResult->get();
        return $oResult->toArray();
    }


//
//Leverage
//Change Password
//Internal Transfer

}
