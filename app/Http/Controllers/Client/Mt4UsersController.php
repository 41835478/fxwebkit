<?php

namespace Fxweb\Http\Controllers\client;

use Illuminate\Http\Request;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use Fxweb\Repositories\Admin\User\UserContract as Users;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Redirect;
class Mt4UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }
    protected $oUsers;
    public function __construct(Users $oUsers) {
    $this->oUsers=$oUsers;
}
    public function getAddMt4User(Request $oRequest) {

        $userInfo = [
            'login' => $oRequest['login'],
            'password' => $oRequest['password']
            ];

        return view('client.addMt4User')->with('userInfo', $userInfo);
    }

    public function postAddMt4User(Request $oRequest) {

        $fp = @fsockopen(config('fxweb.mt4CheckHost'),config('fxweb.mt4CheckPort'));
        $result = 'Invalid';
        if ($fp) {
            fwrite($fp, "WWAPUSER-" . $oRequest['login'] . "|" . $oRequest['password'] . "\nQUIT\n");
            $result = fgets($fp, 1024);
        fclose($fp);
        }
        if (preg_match('#^Balance: #', $result) === 1) {
           $asign_result= $this->oUsers->asignMt4UsersToAccount(Sentinel::getUser()->id,[$oRequest['login']]);
       return Redirect::route('clients.reports.accounts');
           }
           return view('client.addMt4User')
                   ->with('userInfo',['login' => $oRequest['login'],'password' => $oRequest['password']])
                   ->withErrors('Error, Please try again later!');
    }

}
