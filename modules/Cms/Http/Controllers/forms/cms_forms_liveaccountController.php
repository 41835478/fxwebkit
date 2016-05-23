<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_liveaccount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use modules\Cms\Http\Controllers\forms\Email;
class cms_forms_liveaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_liveaccount = cms_forms_liveaccount::paginate(15);

        return view('cms::forms.cms_forms_liveaccount.index', compact('cms_forms_liveaccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_liveaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {

        cms_forms_liveaccount::create($request->all());

        Session::flash('flash_message', 'cms_forms_liveaccount added!');

        return redirect('cms/cms_forms_liveaccount');
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
        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);

        return view('cms::forms.cms_forms_liveaccount.show', compact('cms_forms_liveaccount'));
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
        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);

        return view('cms::forms.cms_forms_liveaccount.edit', compact('cms_forms_liveaccount'));
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

        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);
        $cms_forms_liveaccount->update($request->all());

        Session::flash('flash_message', 'cms_forms_liveaccount updated!');

        return redirect('cms/cms_forms_liveaccount');
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
        cms_forms_liveaccount::destroy($id);

        Session::flash('flash_message', 'cms_forms_liveaccount deleted!');

        return redirect('cms/cms_forms_liveaccount');
    }



    /**
     * Show the form for  cms pages.
     *
     * @return void
     */
    public function cms_create()
    {
        $arrays=[];
        $arrays['default_platform']= ['MT4'=>'MT4','Multi-products'=>'Multi-products','Both'=>'Both'];
        $arrays['account_type']= ['Self-trading'=>'Self-trading','Managed investor'=>'Managed investor (managed account under a fund
                                        manager)s','Referring Partner'=>'Referring Partner','Fund manager'=>'Fund manager'];
        $arrays['base_currency_limit']= ['USD'=>'USD','EUR'=>'EUR','GBP'=>'GBP'];
        $arrays['nationality']= ['MT4'=>'MT4','Multi-products'=>'Multi-products','Both'=>'Both'];
        $arrays['gender']= [0=>'Select One','Male'=>'Male','Female'=>'Female'];
        $arrays['marital_status']= [0=>'Select One','Single'=>'Single','Married'=>'Married'];
        $arrays['resident_status']= ['Non Resident'=>'Non Resident','Resident Individual'=>'Resident Individual','Foreign National'=>'Foreign National'];
        //   $arrays['country']= ['Non Resident'=>'Non Resident','Resident Individual'=>'Resident Individual','Foreign National'=>'Foreign National'];
        $arrays['source_funds_deposited_joint']= ['Employment'=>'Employment inheritance investment','Previous'=>'Previous employment real state','Sale of'=>'Sale of investments savings','Other'=>'Other'];
        $arrays['proof_of_residence']= [0=>'Select One','Residence ID'=>'Residence ID','Utility Bill'=>'Utility Bill','Bank Statement'=>'Bank Statement'];
        $arrays['id_type']= [0=>'Select One','Driving Licence'=>'Driving Licence','Passport'=>'Passport','Residence ID'=>'Residence ID'];
        $arrays['number_of_years']= [0=>'Select One','None'=>'None','Less than 1 year'=>'Less than 1 year','1 to 3 years'=>'1 to 3 years','3 to 5 years'=>'3 to 5 years','More than 5 years'=>'More than 5 years'];
        $arrays['number_of_transactions']= [0=>'Select One','less than 10 transactions'=>'less than 10 transactions','10 to 20 transactions'=>'10 to 20 transactions','More than 20 transactions'=>'More than 20 transactions'];
        $arrays['average_trading']= [0=>'Select One','Less than 30,000 GBP'=>'Less than 30,000 GBP','30,000 to 60,000 GBP'=>'30,000 to 60,000 GBP','60,000 to 300,000 GBP'=>'60,000 to 300,000 GBP','More than 300,000 GBP'=>'More than 300,000 GBP'];
        $arrays['source_funds_deposited_joint']= ['Employment'=>'Employment','Inheritance'=>'Inheritance','Investment'=>'Investment','Previous Employment'=>'Previous Employment','Real Estate'=>'Real Estate','Sale of investments'=>'Sale of investments','Savings'=>'Savings','Other (specify below)'=>'Other (specify below)',];
        $arrays['source_funds_deposited']= ['Employment inheritance investment'=>'Employment inheritance investment','Previous employment real state'=>'Previous employment real state','Sale of investments savings'=>'Sale of investments savings','Other'=>'Other',];

        $arrays['country']=["AX"=>"Åland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","EE"=>"Estonia","ET"=>"Ethiopia","QU"=>"European Union","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GY"=>"Guyana","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LS"=>"Lesotho","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NC"=>"New Caledonia","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","QO"=>"Outlying Oceania","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","BL"=>"Saint Barthélemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"São Tomé and Príncipe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","AE"=>"United Arab Emirates","GB"=>"United Kingdom","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","ZM"=>"Zambia"];

        $arrays['years']=[];
        for($i=1940;$i<2016;$i++){ $arrays['years'][$i]=$i;}
        $arrays['months']=[];
        for($i=1;$i<13;$i++){ $arrays['months'][$i]=$i;}
        $arrays['days']=[];
        for($i=1;$i<32;$i++){ $arrays['days'][$i]=$i;}
        return View::make('cms::forms.cms_forms_liveaccount.cms_form',['arrays'=>$arrays])->render();

    }

    /**
     * Store a newly created resource in cms pages.
     *
     * @return void
     */
    public function cms_store(Request $request)
    {
        $errors=$this->validateFrequencyFields($request);
        if(!empty($errors)){
            return Redirect::back()->withErrors($errors);
        }

        $date_of_birth=$request->date_of_birth_d.'/'.$request->date_of_birth_m.'/'.$request->date_of_birth_y;
        $date_of_birth_joint=$request->date_of_birth_joint_d.'/'.$request->date_of_birth_joint_m.'/'.$request->date_of_birth_joint_y;

        $request->merge(array('date_of_birth' => $date_of_birth));
        $request->merge(array('date_of_birth_joint' => $date_of_birth_joint));

        $htmlPath=tempnam(public_path().'/tempHtml/', 'fxwebkit');
        $htmlPath=preg_replace('/tmp$/','html',$htmlPath);

        $html=View::make('cms::forms.cms_forms_liveaccount.pdfForm',['var'=>$request])->render();
        file_put_contents($htmlPath,$html);

        $pdfPath=public_path().'/pdf/'.explode('.',basename($htmlPath))[0].'.pdf';

        exec('"'.Config('fxweb.htmlToPdfPath').'" "'.$htmlPath.'" "'.$pdfPath.'"');
        unlink($htmlPath);
        cms_forms_liveaccount::create($request->all());

        $email=new Email();
        @$email->userLiveAccount($request->all(),$request->primary_email);

        return view('cms::forms.cms_forms_liveaccount.pdfForm',['var'=>$request])->render();

        Session::flash('flash_message', 'cms_forms_liveaccount added!');
        return Redirect::back();
        //    return redirect('cms/cms_forms_liveaccount');
    }

    public function addErrorMessage(&$errors,$key,$value){
        $errors [$key]=$value;
    }
    public function validateFrequencyFields($request)
    {
        $errors=[];
        $sole_joint = $request->sole_joint_account;

        if ($sole_joint == 'joint account') {


            $sourceFunds_joint = $request->source_funds_deposited_joint;
            $otherSourceFunds_joint = $request->other_source_funds_deposited_joint;

            if ($sourceFunds_joint == 7 && $otherSourceFunds_joint == '') {
                $this->addErrorMessage($errors,'other_source_funds_deposited_joint', 'Required Field');
            }


            $number_of_years_cfd_joint = $request->number_of_years_cfd_joint;
            $number_of_transactions_cfd_joint = $request->number_of_transactions_cfd_joint;
            $average_trading_cfd_joint = $request->average_trading_cfd_joint;
            if (!is_numeric($number_of_years_cfd_joint)) {
                $this->addErrorMessage($errors,'number_of_years_cfd_joint', 'Required Field');
            } else if ($number_of_years_cfd_joint != 'None') {
                if (is_numeric($number_of_transactions_cfd_joint)) {
                    $this->addErrorMessage($errors,'number_of_transactions_cfd_joint', 'Required Field');
                }

                if (is_numeric($average_trading_cfd_joint)) {
                    $this->addErrorMessage($errors,'average_trading_cfd_joint', 'Required Field');
                }
            }
            if( $number_of_years_cfd_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_cfd_joint', 'Required Field');

            }




            $number_of_years_commodities_joint = $request->number_of_years_commodities_joint;
            $number_of_transactions_commodities_joint = $request->number_of_transactions_commodities_joint;
            $average_trading_commodities_joint = $request->average_trading_commodities_joint;
            if (!is_numeric($number_of_years_commodities_joint)) {
                $this->addErrorMessage($errors,'number_of_years_commodities_joint', 'Required Field');
            } else if ($number_of_years_commodities_joint!= 'None') {
                if (is_numeric($number_of_transactions_commodities_joint)) {
                    $this->addErrorMessage($errors,'number_of_transactions_commodities_joint', 'Required Field');
                }

                if (is_numeric($average_trading_commodities_joint)) {
                    $this->addErrorMessage($errors,'average_trading_commodities_joint', 'Required Field');
                }
            }
            if( $number_of_years_commodities_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_commodities_joint', 'Required Field');

            }




            $number_of_years_forex_joint = $request->number_of_years_forex_joint;
            $number_of_transactions_forex_joint = $request->number_of_transactions_forex_joint;
            $average_trading_forex_joint = $request->average_trading_forex_joint;

            if ($number_of_years_forex_joint != 'None') {
                if (is_numeric($number_of_transactions_forex_joint)) {
                    $this->addErrorMessage($errors,'number_of_transactions_forex_joint', 'Required Field');
                }

                if (is_numeric($average_trading_forex_joint)) {
                    $this->addErrorMessage($errors,'average_trading_forex_joint', 'Required Field');
                }
            }
            if( $number_of_years_forex_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_forex_joint', 'Required Field');

            }




            $number_of_years_futures_joint = $request->number_of_years_futures_joint;
            $number_of_transactions_futures_joint = $request->number_of_transactions_futures_joint;
            $average_trading_futures_joint = $request->average_trading_futures_joint;
            if ($number_of_years_futures_joint != 'None') {
                if (is_numeric($number_of_transactions_futures_joint)) {
                    $this->addErrorMessage($errors,'number_of_transactions_futures_joint', 'Required Field');
                }

                if (is_numeric($average_trading_futures_joint)) {
                    $this->addErrorMessage($errors,'average_trading_futures_joint', 'Required Field');
                }
            }
            if( $number_of_years_forex_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_forex_joint', 'Required Field');

            }



            $number_of_years_options_joint = $request->number_of_years_options_joint;
            $number_of_transactions_options_joint = $request->number_of_transactions_options_joint;
            $average_trading_options_joint = $request->average_trading_options_joint;

            if ($number_of_years_options_joint != 'None') {
                if (is_numeric($number_of_transactions_options_joint)) {
                    $this->addErrorMessage($errors,'number_of_transactions_options_joint', 'Required Field');
                }

                if (is_numeric($average_trading_options_joint)) {
                    $this->addErrorMessage($errors,'average_trading_options_joint', 'Required Field');
                }
            }
            if( $number_of_years_options_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_options_joint', 'Required Field');

            }



            $number_of_years_securities_joint = $request->number_of_years_securities_joint;
            $number_of_transactions_securities_joint = $request->number_of_transactions_securities_joint;
            $average_trading_securities_joint = $request->average_trading_securities_joint;
            if ($number_of_years_securities_joint != 'None') {
                if (is_numeric($number_of_transactions_securities_joint)) {
                    $this->addErrorMessage($errors,'number_of_transactions_securities_joint', 'Required Field');
                }

                if (is_numeric($average_trading_securities_joint)) {
                    $this->addErrorMessage($errors,'average_trading_securities_joint', 'Required Field');
                }
            }
            if( $number_of_years_securities_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_securities_joint', 'Required Field');

            }


            $understand_market_cfd_joint = $request->understand_market_cfd_joint;
            $understand_market_years_cfd_joint = $request->understand_market_years_cfd_joint;
            if ($understand_market_cfd_joint == '1' && empty($understand_market_years_cfd_joint)) {
                $this->addErrorMessage($errors,'understand_market_years_cfd_joint', 'Required Field');
            }


            $understand_market_commodities_joint = $request->understand_market_commodities_joint;
            $understand_market_years_commodities_joint = $request->understand_market_years_commodities_joint;
            if ($understand_market_commodities_joint == '1' && empty($understand_market_years_commodities_joint)) {
                $this->addErrorMessage($errors,'understand_market_years_commodities_joint', 'Required Field');
            }


            $understand_market_futures_joint = $request->understand_market_futures_joint;
            $understand_market_years_futures_joint = $request->understand_market_years_futures_joint;
            if ($understand_market_futures_joint == '1' && empty($understand_market_years_futures_joint)) {
                $this->addErrorMessage($errors,'understand_market_years_futures_joint', 'Required Field');
            }


            $understand_market_forex_joint = $request->understand_market_forex_joint;
            $understand_market_years_forex_joint = $request->understand_market_years_forex_joint;
            if ($understand_market_forex_joint == '1' && empty($understand_market_years_forex_joint)) {
                $this->addErrorMessage($errors,'understand_market_years_forex_joint', 'Required Field');
            }


            $understand_market_options_joint = $request->understand_market_options_joint;
            $understand_market_years_options_joint = $request->understand_market_years_options_joint;
            if ($understand_market_options_joint == '1' && empty($understand_market_years_options_joint)) {
                $this->addErrorMessage($errors,'understand_market_years_options_joint', 'Required Field');
            }


            $understand_market_securities_joint = $request->understand_market_securities_joint;
            $understand_market_years_securities_joint = $request->understand_market_years_securities_joint;
            if ($understand_market_securities_joint == '1' && empty($understand_market_years_securities_joint)) {
                $this->addErrorMessage($errors,'understand_market_years_securities_joint', 'Required Field');
            }


        }
        /*_____________________________________________end_joint_validation*/


        $sourceFunds = $request->source_funds_deposited;
        $otherSourceFunds = $request->other_source_funds_deposited;

        if ($sourceFunds == 3 && $otherSourceFunds == '') {
            $this->addErrorMessage($errors,'other_source_funds_deposited', 'Required Field');
        }

        $number_of_years_cfd = $request->number_of_years_cfd;
        $number_of_transactions_cfd = $request->number_of_transactions_cfd;
        $average_trading_cfd = $request->average_trading_cfd;

        if ($number_of_years_cfd != 'None') {//dd(is_numeric($number_of_transactions_cfd));
            if (is_numeric($number_of_transactions_cfd)) {
                $this->addErrorMessage($errors,'number_of_transactions_cfd', 'Required Field');
            }

            if (is_numeric($average_trading_cfd)) {
                $this->addErrorMessage($errors,'average_trading_cfd', 'Required Field');
            }
        }
        if( $number_of_years_cfd==="0"){
            $this->addErrorMessage($errors,'number_of_years_cfd', 'Required Field');

        }




        $number_of_years_commodities = $request->number_of_years_commodities;
        $number_of_transactions_commodities = $request->number_of_transactions_commodities;
        $average_trading_commodities = $request->average_trading_commodities;
        if ($number_of_years_commodities != 'None') {
            if (is_numeric($number_of_transactions_commodities)) {
                $this->addErrorMessage($errors,'number_of_transactions_commodities', 'Required Field');
            }

            if (is_numeric($average_trading_commodities)) {
                $this->addErrorMessage($errors,'average_trading_commodities', 'Required Field');
            }
        }
        if($number_of_years_commodities ==="0"){
            $this->addErrorMessage($errors,'number_of_years_commodities', 'Required Field');

        }



        $number_of_years_forex = $request->number_of_years_forex;
        $number_of_transactions_forex = $request->number_of_transactions_forex;
        $average_trading_forex = $request->average_trading_forex;
        if ($number_of_years_forex != 'None') {
            if (is_numeric($number_of_transactions_forex)) {
                $this->addErrorMessage($errors,'number_of_transactions_forex', 'Required Field');
            }

            if (is_numeric($average_trading_forex)) {
                $this->addErrorMessage($errors,'average_trading_forex', 'Required Field');
            }
        }
        if( $number_of_years_forex==="0"){
            $this->addErrorMessage($errors,'number_of_years_forex', 'Required Field');

        }



        $number_of_years_futures = $request->number_of_years_futures;
        $number_of_transactions_futures = $request->number_of_transactions_futures;
        $average_trading_futures = $request->average_trading_futures;
        if ($number_of_years_futures != 'None') {
            if (is_numeric($number_of_transactions_futures)) {
                $this->addErrorMessage($errors,'number_of_transactions_futures', 'Required Field');
            }

            if (is_numeric($average_trading_futures)) {
                $this->addErrorMessage($errors,'average_trading_futures', 'Required Field');
            }
        }
        if($number_of_years_futures ==="0"){
            $this->addErrorMessage($errors,'number_of_years_futures', 'Required Field');

        }



        $number_of_years_options = $request->number_of_years_options;
        $number_of_transactions_options = $request->number_of_transactions_options;
        $average_trading_options = $request->average_trading_options;
        if ($number_of_years_options != 'None') {
            if (is_numeric($number_of_transactions_options)) {
                $this->addErrorMessage($errors,'number_of_transactions_options', 'Required Field');
            }

            if (is_numeric($average_trading_options)) {
                $this->addErrorMessage($errors,'average_trading_options', 'Required Field');
            }
        }
        if( $number_of_years_options==="0"){
            $this->addErrorMessage($errors,'number_of_years_options', 'Required Field');

        }


        $number_of_years_securities = $request->number_of_years_securities;
        $number_of_transactions_securities = $request->number_of_transactions_securities;
        $average_trading_securities = $request->average_trading_securities;
        if ($number_of_years_securities != 'None') {
            if (is_numeric($number_of_transactions_securities)) {
                $this->addErrorMessage($errors,'number_of_transactions_securities', 'Required Field');
            }

            if (is_numeric($average_trading_securities)) {
                $this->addErrorMessage($errors,'average_trading_securities', 'Required Field');
            }
        }

        if($number_of_years_securities ==="0"){
            $this->addErrorMessage($errors,'number_of_years_securities', 'Required Field');

        }


        $understand_market_cfd = $request->understand_market_cfd;
        $understand_market_years_cfd = $request->understand_market_years_cfd;
        if ($understand_market_cfd == '1' && empty($understand_market_years_cfd)) {
            $this->addErrorMessage($errors,'understand_market_years_cfd', 'Required Field');
        }


        $understand_market_commodities = $request->understand_market_commodities;
        $understand_market_years_commodities = $request->understand_market_years_commodities;
        if ($understand_market_commodities == '1' && empty($understand_market_years_commodities)) {
            $this->addErrorMessage($errors,'understand_market_years_commodities', 'Required Field');
        }


        $understand_market_futures = $request->understand_market_futures;
        $understand_market_years_futures = $request->understand_market_years_futures;
        if ($understand_market_futures == '1' && empty($understand_market_years_futures)) {
            $this->addErrorMessage($errors,'understand_market_years_futures', 'Required Field');
        }


        $understand_market_forex = $request->understand_market_forex;
        $understand_market_years_forex = $request->understand_market_years_forex;
        if ($understand_market_forex == '1' && empty($understand_market_years_forex)) {
            $this->addErrorMessage($errors,'understand_market_years_forex', 'Required Field');
        }


        $understand_market_options = $request->understand_market_options;
        $understand_market_years_options = $request->understand_market_years_options;
        if ($understand_market_options == '1' && empty($understand_market_years_options)) {
            $this->addErrorMessage($errors,'understand_market_years_options', 'Required Field');
        }


        $understand_market_securities = $request->understand_market_securities;
        $understand_market_years_securities = $request->understand_market_years_securities;
        if ($understand_market_securities == '1' && empty($understand_market_years_securities)) {
            $this->addErrorMessage($errors,'understand_market_years_securities', 'Required Field');
        }

        return $errors;

    }

}
