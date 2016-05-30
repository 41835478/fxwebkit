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
        dd($request);



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
            $arrays['country']=["AX"=>"Åland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","EE"=>"Estonia","ET"=>"Ethiopia","QU"=>"European Union","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GY"=>"Guyana","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LS"=>"Lesotho","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NC"=>"New Caledonia","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","QO"=>"Outlying Oceania","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","BL"=>"Saint Barthélemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"São Tomé and Príncipe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","AE"=>"United Arab Emirates","GB"=>"United Kingdom","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","ZM"=>"Zambia"];

            return View::make('cms::forms.cms_forms_demoaccount.cms_form',['arrays'=>$arrays])->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {

            $demoAccount=cms_forms_demoaccount::create($request->all());
          $request->merge(['id'=>$demoAccount->id]);
            $demoInfo=$this->createMt4Demo($request) ;


            $request->merge($demoInfo);


            if(isset($demoInfo['Error Message'])){

                return Redirect::back()->withErrors('Error , please try again ');
            }else{


                $email=new Email();
                @$email->userDemoAccount($request->all(),$request->email);
                @$email->adminDemoAccount($request->all(),config('fxweb.adminEmail'));

                if($request->jsonRespond){
                    return view('cms::forms.cms_forms_demoaccount.jsonRespond',['demoInfo'=>json_encode($demoInfo)]);
                }


                Session::flash('flash_success', 'Demo Account Has been created successfully <p><b> LOGIN :</b>'.$demoInfo['login'].'</p><p><b>PASSWORD :</b>'.$demoInfo['password'].'</p>');
            }
                return Redirect::back()->withErrors('Error , please try again ');
        //    return redirect('cms/cms_forms_demoaccount');
        }



    protected function createMt4Demo($request) {


        $host ='85.25.207.30';
        $port = '443';

        $mt4_create_arr = $this->getMt4APIParams($request);

      //  $logger = $this->get('logger');

        try {
           // dd($mt4_create_arr);
            $api_response = $this->openAccSocket($host, $port, $mt4_create_arr);
//dd($api_response);
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
            }else{

            $request->merge(['Error Message'=>'Invalid Data']);
            $email=new Email();
            @$email->sendDemoError($request->all());
            }

        } catch (\Exception $ex) {
            //$logger->error('cannot create mt4 demo account, error: ' . $ex->getMessage());
            $request->merge(['Error Message'=>$ex->getMessage()]);
            $email=new Email();
            @$email->sendDemoError($request->all());

        }

        return ['Error Message'=>'Invalid Data'];
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
      //  $logger = $this->get('logger');

        $socket_parameters = "WNEWACCOUNT ";
        foreach ($mt4_create_arr as $k => $val) {
            $socket_parameters .= $k . '=' . $val . '|';
        }
        $socket_parameters = trim($socket_parameters, '|');
        $socket_parameters .= " \nQUIT\n";

      //  $logger->info('MT4_API_REQUEST=' . $socket_parameters);

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
       // $logger->info('MT4_API_RESPONSE=' . $ret);

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
