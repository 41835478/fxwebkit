<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_emailtemplate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Mail;
class Email extends Controller
{


    protected $fromEmail = '';
    protected $fromName = '';

    public function __construct() {
        $this->fromEmail = env('FromEmail');
        $this->fromName = env('FromName');
    }

    public function sendEmail($sTemplate, $aTemplateVariables, $toEmail, $subject) {



        $mail=cms_forms_emailtemplate::where(['alias'=>$sTemplate])->first();

        $emailBody='';
        if(count($mail)){

            $emailBody=$mail->template;

            foreach($aTemplateVariables as $key=>$value){

                $emailBody=preg_replace('/\{\{[\s]*\$'.$key.'[\s]*\}\}/i',
                    $value,
                    $emailBody);
            }
        }else{

            foreach($aTemplateVariables as $key=>$value){
                $emailBody.=$key.' : '.$value .'<br>' ;
            }
        }


        $info = [
            'to' => $toEmail,
            'subject' => $subject,
            'from' => $this->fromEmail,
            'fromName' => $this->fromName,
            'content'=>$emailBody
        ];

        Mail::raw($info['subject'], function ($message) use ($info)
        {
            $message->from(config('fxweb.senderEmail'), config('fxweb.displayName'));

            $message->getHeaders()->addTextHeader('Content-type', 'text/html');
            $message->to($info['to']);
            $message->subject($info['subject']);
            if(array_key_exists('bcc' ,$info)){
                $message->bcc($info['bcc']);
            }
            $message ->setBody($info['content'], 'text/html');
        });


    }


    function userLiveAccount($variables,$toEmail){

        $this->sendEmail('liveaccount', $variables, $toEmail, 'Live Account');
    }

    function userDemoAccount($variables,$toEmail){

        $this->sendEmail('demoaccount', $variables, $toEmail, 'Demo Account');
    }

    function adminDemoAccount($variables,$toEmail)
    {
        $this->sendEmail('registrationdemoaccount', $variables, $toEmail, 'Registration Demo Account');
    }

    function adminLiveAccount($variables,$toEmail)
    {
        $this->sendEmail('registrationliveaccount', $variables, $toEmail, 'Registration Live Account');
    }
}
