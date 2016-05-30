<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use modules\Cms\Http\Controllers\forms\Email;
class cms_forms_paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_payment = cms_forms_payment::paginate(15);

        return view('cms::forms.cms_forms_payment.index', compact('cms_forms_payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_payment::create($request->all());

        Session::flash('flash_message', 'cms_forms_payment added!');

        return redirect('cms/cms_forms_payment');
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
        $cms_forms_payment = cms_forms_payment::findOrFail($id);

        return view('cms::forms.cms_forms_payment.show', compact('cms_forms_payment'));
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
        $cms_forms_payment = cms_forms_payment::findOrFail($id);

        return view('cms::forms.cms_forms_payment.edit', compact('cms_forms_payment'));
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
        
        $cms_forms_payment = cms_forms_payment::findOrFail($id);
        $cms_forms_payment->update($request->all());

        Session::flash('flash_message', 'cms_forms_payment updated!');

        return redirect('cms/cms_forms_payment');
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
        cms_forms_payment::destroy($id);

        Session::flash('flash_message', 'cms_forms_payment deleted!');

        return redirect('cms/cms_forms_payment');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            $arrays['country']=["AX"=>"Åland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","EE"=>"Estonia","ET"=>"Ethiopia","QU"=>"European Union","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GY"=>"Guyana","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LS"=>"Lesotho","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NC"=>"New Caledonia","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","QO"=>"Outlying Oceania","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","BL"=>"Saint Barthélemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"São Tomé and Príncipe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","AE"=>"United Arab Emirates","GB"=>"United Kingdom","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","ZM"=>"Zambia"];

            $payment=cms_forms_payment::find(\Session::get('payment_id'));




            return View::make('cms::forms.cms_forms_payment.cms_form',compact('payment'))->with('arrays',$arrays)->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {


            $payment=cms_forms_payment::create($request->all());

            \Session::flash('payment_id',$payment->id);
            $result='';
            $status=0;



                $CurrencyCode=$request->get('CURRENCY');//get
                if($CurrencyCode=="GBP") {
                    $PSPID = "epdq3017148";//fixed
                }
                else {
                    $PSPID = "mc3017148";//fixed
                }

                $PW="Wbe^2Zp#FXj";//f
                $USERID="hobapi";//f
                $OPERATION="RES";//f


                $PaymentAmount =$request->get('AMOUNT') * 100;//
                $OrderID = $request->get('ORDERID').'-'.rand(100000,999999);//get login + hash random six char
                $CARDNO=$request->get('CARDNO');
                // $ED=$request->get('ED');//expiry mmyy
                $CN=$request->get('CN');//Client holder name
                $CVC=$request->get('CVC');


                $EMAIL=$request->get('EMAIL');
                $OWNERTELNO=$request->get('OWNERTELNO');
                $OWNERADDRESS=$request->get('OWNERADDRESS');
                $OWNERADDRESS2=$request->get('OWNERADDRESS2');
                $OWNERCTY=$request->get('OWNERCTY');
                $OWNERZIP=$request->get('OWNERZIP');
                $EDM=$request->get('EDM');
                $EDY=$request->get('EDY');
                $COM=$request->get('COM');
                $BRAND=$request->get('BRAND');
                $OWNER_NAME=$request->get('OWNER_NAME');
                $COM=$COM." (".substr($CARDNO,0,6).")";


                $ED=(($EDM < 10)? '0'.$EDM:$EDM).$EDY;//expiry mmyy
                $DigestivePlain =
                    "EMAIL=" . $EMAIL. $PW .
                    "OWNERTELNO=" . $OWNERTELNO. $PW .
                    "OWNERADDRESS=" . $OWNERADDRESS. $PW .
                    "OWNERADDRESS2=" . $OWNERADDRESS2. $PW .
                    "OWNERCTY=" . $OWNERCTY. $PW .
                    "OWNERZIP=" . $OWNERZIP. $PW .
                    "AMOUNT=" . $PaymentAmount . $PW .
                    "CN=" . $CN . $PW .
                    "CURRENCY=" . $CurrencyCode . $PW .
                    "ORDERID=" . $OrderID . $PW .
                    "PSPID=" . $PSPID . $PW .
                    "USERID=" . $USERID . $PW .
                    "OPERATION=" . $OPERATION . $PW .
                    "CVC=" . $CVC . $PW .
                    "ED=" . $ED . $PW .
                    "CARDNO=" . $CARDNO . $PW .
                    "COM=" . $COM . $PW .
                    "BRAND=" . $BRAND . $PW .


                    "";
                $strHashedString_plain = strtoupper(sha1($DigestivePlain));

                $SHASign=$strHashedString_plain;


                $sentData=
                    "EMAIL=" . $EMAIL. '&' .
                    "OWNERTELNO=" . $OWNERTELNO. '&' .
                    "OWNERADDRESS=" . $OWNERADDRESS. '&' .
                    "OWNERADDRESS2=" . $OWNERADDRESS2. '&' .
                    "OWNERCTY=" . $OWNERCTY. '&' .
                    "OWNERZIP=" . $OWNERZIP. '&' .
                    "AMOUNT=" . $PaymentAmount . '&' .
                    "CN=" . $CN . '&' .
                    "CURRENCY=" . $CurrencyCode . '&' .
                    "ORDERID=" . $OrderID . '&' .
                    "PSPID=" . $PSPID . '&' .
                    "USERID=" . $USERID . '&' .
                    "PSWD=" . $PW . '&' .
                    "CVC=" . $CVC . '&' .
                    "OPERATION=" . $OPERATION . '&' .
                    "ED=" . $ED . '&' .
                    "CARDNO=" . $CARDNO . '&' .
                    "COM=" . $COM . '&' .
                    "BRAND=" . $BRAND . '&' .

                    "SHASign=" . $SHASign .
                    "";


                $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, 'https://payments.epdq.co.uk/ncol/prod/orderdirect.asp');
            //curl_setopt($ch, CURLOPT_URL, 'f');
            curl_setopt($ch,CURLOPT_URL,'https://payments.epdg.co.uk/ncol/prod/orderdirect.asp');

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                curl_setopt($ch, CURLOPT_POSTFIELDS,$sentData);
                curl_setopt($ch, CURLOPT_POST, 1);
                $response = curl_exec($ch);

            $xml=['STATUS'=>0,'NCERRORPLUS'=>'Internal Error , please try again'];
try{
               @$xml = new \SimpleXMLElement($response);dd();
}catch(\Exception $e){}
                if($xml['STATUS']==0){
                    $status=1;
                    $result=$xml['NCERRORPLUS'];

                    return Redirect::back()->withErrors($result);






                }else{
//                    $status=2;
//                    $result='Successful Payment,';

                    Session::flash('flash_success', 'Successful Payment,');

                    //$emails = $this->container->getParameter('emails');

                    $email_params = array(
                        'EMAIL'        => $EMAIL,
                        'OWNERTELNO'        => $OWNERTELNO,
                        'OWNERADDRESS'        => $OWNERADDRESS,
                        'OWNERADDRESS2'        => $OWNERADDRESS2,
                        'OWNERCTY'        =>$OWNERCTY,
                        'OWNERZIP'        =>$OWNERZIP,
                        "BRAND"   => $BRAND ,
                        'COM'        =>$COM,
                        'cn'        => $request->CN,
                        'login'       => $request->ORDERID,
                        'amount'           => $request->AMOUNT,
                        'currency'  => $request->CURRENCY,
                        'OWNER_NAME'  => $request->OWNER_NAME,
                    );

                    $email=new Email();
                    @$email->paymentSuccess($email_params);

            }






return Redirect::back();
        //    return redirect('cms/cms_forms_payment');
        }

}
