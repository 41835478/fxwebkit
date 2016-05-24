<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_demoaccount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use modules\Cms\Http\Controllers\forms\Email;
class cms_forms_demoaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_demoaccount = cms_forms_demoaccount::paginate(15);

        return view('cms::forms.cms_forms_demoaccount.index', compact('cms_forms_demoaccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_demoaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_demoaccount::create($request->all());

        Session::flash('flash_message', 'cms_forms_demoaccount added!');

        return redirect('cms/cms_forms_demoaccount');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $cms_forms_demoaccount = cms_forms_demoaccount::findOrFail($id);

        return view('cms::forms.cms_forms_demoaccount.show', compact('cms_forms_demoaccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $cms_forms_demoaccount = cms_forms_demoaccount::findOrFail($id);

        return view('cms::forms.cms_forms_demoaccount.edit', compact('cms_forms_demoaccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $cms_forms_demoaccount = cms_forms_demoaccount::findOrFail($id);
        $cms_forms_demoaccount->update($request->all());

        Session::flash('flash_message', 'cms_forms_demoaccount updated!');

        return redirect('cms/cms_forms_demoaccount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        cms_forms_demoaccount::destroy($id);

        Session::flash('flash_message', 'cms_forms_demoaccount deleted!');

        return redirect('cms/cms_forms_demoaccount');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.cms_forms_demoaccount.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_demoaccount::create($request->all());

            Session::flash('flash_message', 'cms_forms_demoaccount added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_demoaccount');
        }



    protected function createMt4Demo($request) {


        $host ='85.25.207.30';
        $port = '443';

        $mt4_create_arr = $this->getMt4APIParams($request);

        $logger = $this->get('logger');

        try {
            $api_response = $this->openAccSocket($host, $port, $mt4_create_arr);

            if (strpos($api_response, 'LOGIN=') !== false) {
                $login_number = str_replace('LOGIN=', '', $api_response);
                $login_number = trim(str_replace('OK', '', $login_number));
                $password = $mt4_create_arr['PASSWORD'];

                return array(
                    'login' => $login_number,
                    'password' => $password,
                    'investor'=>$mt4_create_arr['INVESTOR'],
                    'agent'=>$mt4_create_arr['AGENT'],
                    'deposit'=>$mt4_create_arr['DEPOSIT'],
                );
            }

        } catch (\Exception $ex) {
            $logger->error('cannot create mt4 demo account, error: ' . $ex->getMessage());
            $email=new Email();
            @$email->sendDemoError($request->all());

        }

        return '';
    }








    /**
     * getting API parameters to be used in demo API account opening
     * @param PortalUser
     * @return array
     */
    protected function getMt4APIParams($request) {

        $deposit=5000;
        $agent=0;

        // TODO please, tell me what is this variable and where it come from.
        $IP=0;

        if($request->get('deposit')) $deposit=$request->get('deposit');
        if($request->get('agent')) $agent=$request->get('agent');
        if($request->get('IP')) $IP=$request->get('IP');

        return array(
            'MASTER' => 'ComplexPass1234',
            'IP' => $IP,
            'GROUP' => 1, //'demoforex-usd',
            'NAME' => $request->Firstname .' '. $request->Lastname,
            'PASSWORD' => $this->generateRandomPassword(),
            'INVESTOR' => $this->generateRandomPassword(),
            'EMAIL' => $request->email,
            'COUNTRY' => $request->Country,
            'STATE' => 'state',
            'CITY' => 'city',
            'ADDRESS' => 'address',
            'COMMENT' => 'creating automatic demo from website',
            'PHONE' => $request->Mobilenumber,
            'PHONE_PASSWORD' => $this->generateRandomPassword(),
            'STATUS' => 'status',
            'ZIPCODE' => '0000',
            // TODO please, tell me what is this variable and where it come from.
            'ID' => (isset($request->id))? $request->id: 0,
            'LEVERAGE' => '100',
            'AGENT' => $agent,
            'SEND_REPORTS' => 1,
            'DEPOSIT' => $deposit,
            //'enable' => true,
            //'enableReadonly' => false,
            //'enableChangePassword' => true,
        );
    }



    protected function openAccSocket($host, $port, $mt4_create_arr) {
        $logger = $this->get('logger');

        $socket_parameters = "WNEWACCOUNT ";
        foreach ($mt4_create_arr as $k => $val) {
            $socket_parameters .= $k . '=' . $val . '|';
        }
        $socket_parameters = trim($socket_parameters, '|');
        $socket_parameters .= " \nQUIT\n";

        $logger->info('MT4_API_REQUEST=' . $socket_parameters);

        $errno = '';
        $errstr = '';
        $socket = fsockopen($host, $port, $errno, $errstr, 0.4);

        $ret = '';
        if ($socket) {
            if (fputs($socket, $socket_parameters) != false) {
                while (!feof($socket)) {
                    $line = fgets($socket, 128);
                    if ($line == "end\r\n")
                        break;
                    $ret.= $line;
                }
            }else {
                throw new \Exception('cannot write data to the open socket');
            }
        } else {
            throw new \Exception('cannot open socket');
        }
        $logger->info('MT4_API_RESPONSE=' . $ret);

        return $ret;
    }

    protected function generateRandomPassword($length = 9) {
        $letters1 = 'bdghjmnpqrstvz';
        $letters2 = 'BDGHJLMNPQRSTVWXZ';
        $numbers = '123456789';

        $ret = array();
        $ret += array(-1 => $letters1[rand(0, strlen($letters1) - 1)], 0 => $letters1[rand(0, strlen($letters1) - 1)], 1 => $letters1[rand(0, strlen($letters1) - 1)]);
        $ret += array(2 => $letters2[rand(0, strlen($letters2) - 1)], 3 => $letters2[rand(0, strlen($letters2) - 1)]);
        $ret += array(4 => $numbers[rand(0, strlen($numbers) - 1)], 5 => $numbers[rand(0, strlen($numbers) - 1)]);


        shuffle($ret);
        $password = substr(implode('', $ret), 0, $length);

        return $password;
    }
}
