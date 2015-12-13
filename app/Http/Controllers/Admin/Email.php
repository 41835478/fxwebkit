<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;
use Mail;

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
            $message->from('m.hashim@mqplanet.com', 'Mqplanet');
            $message->to($info['to'])->subject($info['subject']);
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

}
