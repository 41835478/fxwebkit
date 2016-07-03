<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;


use  Modules\Cms\Entities\forms\cms_forms_liveaccount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Modules\Cms\Http\Requests\LiveAccountRequest;
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
        $arrays=[];
        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);

        $arrays['number_of_years']= [0=>'Select One','None'=>'None','Less than 1 year'=>'Less than 1 year','1 to 3 years'=>'1 to 3 years','3 to 5 years'=>'3 to 5 years','More than 5 years'=>'More than 5 years'];
        $arrays['number_of_transactions']= [0=>'Select One','less than 10 transactions'=>'less than 10 transactions','10 to 20 transactions'=>'10 to 20 transactions','More than 20 transactions'=>'More than 20 transactions'];
        $arrays['average_trading']= [0=>'Select One','Less than 30,000 GBP'=>'Less than 30,000 GBP','30,000 to 60,000 GBP'=>'30,000 to 60,000 GBP','60,000 to 300,000 GBP'=>'60,000 to 300,000 GBP','More than 300,000 GBP'=>'More than 300,000 GBP'];
        $arrays['proof_of_residence']= [0=>'Select One','Residence ID'=>'Residence ID','Utility Bill'=>'Utility Bill','Bank Statement'=>'Bank Statement'];
        $arrays['id_type']= [0=>'Select One','Driving Licence'=>'Driving Licence','Passport'=>'Passport','Residence ID'=>'Residence ID'];

        return view('cms::forms.cms_forms_liveaccount.show', compact('cms_forms_liveaccount'),['arrays'=>$arrays])->render();
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
        $arrays=[];
        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);

        $arrays['number_of_years']= [0=>'Select One','None'=>'None','Less than 1 year'=>'Less than 1 year','1 to 3 years'=>'1 to 3 years','3 to 5 years'=>'3 to 5 years','More than 5 years'=>'More than 5 years'];
        $arrays['number_of_transactions']= [0=>'Select One','less than 10 transactions'=>'less than 10 transactions','10 to 20 transactions'=>'10 to 20 transactions','More than 20 transactions'=>'More than 20 transactions'];
        $arrays['average_trading']= [0=>'Select One','Less than 30,000 GBP'=>'Less than 30,000 GBP','30,000 to 60,000 GBP'=>'30,000 to 60,000 GBP','60,000 to 300,000 GBP'=>'60,000 to 300,000 GBP','More than 300,000 GBP'=>'More than 300,000 GBP'];
        $arrays['proof_of_residence']= [0=>'Select One','Residence ID'=>'Residence ID','Utility Bill'=>'Utility Bill','Bank Statement'=>'Bank Statement'];
        $arrays['id_type']= [0=>'Select One','Driving Licence'=>'Driving Licence','Passport'=>'Passport','Residence ID'=>'Residence ID'];

        return view('cms::forms.cms_forms_liveaccount.edit', compact('cms_forms_liveaccount'),['arrays'=>$arrays])->render();
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
        $arrays['gender']= ['Male'=>'Male','Female'=>'Female'];
        $arrays['marital_status']= ['Single'=>'Single','Married'=>'Married'];
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

        $arrays['country']=[''=>'Select One',"Åland Islands"=>"Åland Islands","Albania"=>"Albania","Algeria"=>"Algeria","American Samoa"=>"American Samoa","Andorra"=>"Andorra","Angola"=>"Angola","Anguilla"=>"Anguilla","Antarctica"=>"Antarctica","Antigua and Barbuda"=>"Antigua and Barbuda","Argentina"=>"Argentina","Armenia"=>"Armenia","Aruba"=>"Aruba","Australia"=>"Australia","Austria"=>"Austria","Azerbaijan"=>"Azerbaijan","Bahamas"=>"Bahamas","Bahrain"=>"Bahrain","Bangladesh"=>"Bangladesh","Barbados"=>"Barbados","Belgium"=>"Belgium","Belize"=>"Belize","Benin"=>"Benin","Bermuda"=>"Bermuda","Bhutan"=>"Bhutan","Bolivia"=>"Bolivia","Bosnia and Herzegovina"=>"Bosnia and Herzegovina","Botswana"=>"Botswana","Bouvet Island"=>"Bouvet Island","Brazil"=>"Brazil","British Indian Ocean Territory"=>"British Indian Ocean Territory","British Virgin Islands"=>"British Virgin Islands","Brunei"=>"Brunei","Bulgaria"=>"Bulgaria","Burkina Faso"=>"Burkina Faso","Burundi"=>"Burundi","Cambodia"=>"Cambodia","Cameroon"=>"Cameroon","Canada"=>"Canada","Cape Verde"=>"Cape Verde","Cayman Islands"=>"Cayman Islands","Chad"=>"Chad","Chile"=>"Chile","China"=>"China","Christmas Island"=>"Christmas Island","Cocos [Keeling] Islands"=>"Cocos [Keeling] Islands","Colombia"=>"Colombia","Comoros"=>"Comoros","Cook Islands"=>"Cook Islands","Costa Rica"=>"Costa Rica","Croatia"=>"Croatia","Cyprus"=>"Cyprus","Czech Republic"=>"Czech Republic","Denmark"=>"Denmark","Djibouti"=>"Djibouti","Dominica"=>"Dominica","Dominican Republic"=>"Dominican Republic","Ecuador"=>"Ecuador","Egypt"=>"Egypt","El Salvador"=>"El Salvador","Equatorial Guinea"=>"Equatorial Guinea","Estonia"=>"Estonia","Ethiopia"=>"Ethiopia","European Union"=>"European Union","Falkland Islands"=>"Falkland Islands","Faroe Islands"=>"Faroe Islands","Fiji"=>"Fiji","Finland"=>"Finland","France"=>"France","French Guiana"=>"French Guiana","French Polynesia"=>"French Polynesia","French Southern Territories"=>"French Southern Territories","Gabon"=>"Gabon","Gambia"=>"Gambia","Georgia"=>"Georgia","Germany"=>"Germany","Ghana"=>"Ghana","Gibraltar"=>"Gibraltar","Greece"=>"Greece","Greenland"=>"Greenland","Grenada"=>"Grenada","Guadeloupe"=>"Guadeloupe","Guam"=>"Guam","Guatemala"=>"Guatemala","Guernsey"=>"Guernsey","Guinea"=>"Guinea","Guyana"=>"Guyana","Heard Island and McDonald Islands"=>"Heard Island and McDonald Islands","Honduras"=>"Honduras","Hong Kong SAR China"=>"Hong Kong SAR China","Hungary"=>"Hungary","Iceland"=>"Iceland","India"=>"India","Indonesia"=>"Indonesia","Ireland"=>"Ireland","Isle of Man"=>"Isle of Man","Israel"=>"Israel","Italy"=>"Italy","Jamaica"=>"Jamaica","Japan"=>"Japan","Jersey"=>"Jersey","Jordan"=>"Jordan","Kazakhstan"=>"Kazakhstan","Kenya"=>"Kenya","Kiribati"=>"Kiribati","Kuwait"=>"Kuwait","Kyrgyzstan"=>"Kyrgyzstan","Laos"=>"Laos","Latvia"=>"Latvia","Lesotho"=>"Lesotho","Liechtenstein"=>"Liechtenstein","Lithuania"=>"Lithuania","Luxembourg"=>"Luxembourg","Macau SAR China"=>"Macau SAR China","Macedonia"=>"Macedonia","Madagascar"=>"Madagascar","Malawi"=>"Malawi","Malaysia"=>"Malaysia","Maldives"=>"Maldives","Mali"=>"Mali","Malta"=>"Malta","Marshall Islands"=>"Marshall Islands","Martinique"=>"Martinique","Mauritania"=>"Mauritania","Mauritius"=>"Mauritius","Mayotte"=>"Mayotte","Mexico"=>"Mexico","Micronesia"=>"Micronesia","Moldova"=>"Moldova","Monaco"=>"Monaco","Mongolia"=>"Mongolia","Montenegro"=>"Montenegro","Montserrat"=>"Montserrat","Morocco"=>"Morocco","Mozambique"=>"Mozambique","Namibia"=>"Namibia","Nauru"=>"Nauru","Nepal"=>"Nepal","Netherlands"=>"Netherlands","Netherlands Antilles"=>"Netherlands Antilles","New Caledonia"=>"New Caledonia","Nicaragua"=>"Nicaragua","Niger"=>"Niger","Nigeria"=>"Nigeria","Niue"=>"Niue","Norfolk Island"=>"Norfolk Island","Northern Mariana Islands"=>"Northern Mariana Islands","Norway"=>"Norway","Oman"=>"Oman","Outlying Oceania"=>"Outlying Oceania","Pakistan"=>"Pakistan","Palau"=>"Palau","Palestinian Territories"=>"Palestinian Territories","Panama"=>"Panama","Papua New Guinea"=>"Papua New Guinea","Paraguay"=>"Paraguay","Peru"=>"Peru","Philippines"=>"Philippines","Pitcairn Islands"=>"Pitcairn Islands","Poland"=>"Poland","Portugal"=>"Portugal","Puerto Rico"=>"Puerto Rico","Qatar"=>"Qatar","Réunion"=>"Réunion","Romania"=>"Romania","Russia"=>"Russia","Rwanda"=>"Rwanda","Saint Barthélemy"=>"Saint Barthélemy","Saint Helena"=>"Saint Helena","Saint Kitts and Nevis"=>"Saint Kitts and Nevis","Saint Lucia"=>"Saint Lucia","Saint Martin"=>"Saint Martin","Saint Pierre and Miquelon"=>"Saint Pierre and Miquelon","Saint Vincent and the Grenadines"=>"Saint Vincent and the Grenadines","Samoa"=>"Samoa","San Marino"=>"San Marino","São Tomé and Príncipe"=>"São Tomé and Príncipe","Saudi Arabia"=>"Saudi Arabia","Senegal"=>"Senegal","Serbia"=>"Serbia","Serbia and Montenegro"=>"Serbia and Montenegro","Seychelles"=>"Seychelles","Sierra Leone"=>"Sierra Leone","Singapore"=>"Singapore","Slovakia"=>"Slovakia","Slovenia"=>"Slovenia","Solomon Islands"=>"Solomon Islands","South Africa"=>"South Africa","South Georgia and the South Sandwich Islands"=>"South Georgia and the South Sandwich Islands","South Korea"=>"South Korea","Spain"=>"Spain","Sri Lanka"=>"Sri Lanka","Suriname"=>"Suriname","Svalbard and Jan Mayen"=>"Svalbard and Jan Mayen","Swaziland"=>"Swaziland","Sweden"=>"Sweden","Switzerland"=>"Switzerland","Taiwan"=>"Taiwan","Tajikistan"=>"Tajikistan","Tanzania"=>"Tanzania","Thailand"=>"Thailand","Timor-Leste"=>"Timor-Leste","Togo"=>"Togo","Tokelau"=>"Tokelau","Tonga"=>"Tonga","Trinidad and Tobago"=>"Trinidad and Tobago","Tunisia"=>"Tunisia","Turkey"=>"Turkey","Turkmenistan"=>"Turkmenistan","Turks and Caicos Islands"=>"Turks and Caicos Islands","Tuvalu"=>"Tuvalu","U.S. Minor Outlying Islands"=>"U.S. Minor Outlying Islands","U.S. Virgin Islands"=>"U.S. Virgin Islands","Uganda"=>"Uganda","United Arab Emirates"=>"United Arab Emirates","United Kingdom"=>"United Kingdom","Uruguay"=>"Uruguay","Uzbekistan"=>"Uzbekistan","Vanuatu"=>"Vanuatu","Vatican City"=>"Vatican City","Venezuela"=>"Venezuela","Vietnam"=>"Vietnam","Wallis and Futuna"=>"Wallis and Futuna","Western Sahara"=>"Western Sahara","Zambia"=>"Zambia"];


        $arrays['nationals']=[''=>'Select One',"Afghan"=>"Afghan","Albanian"=>"Albanian","Algerian"=>"Algerian","American"=>"American","Andorran"=>"Andorran","Angolan"=>"Angolan","Antiguans"=>"Antiguans","Argentinean"=>"Argentinean","Armenian"=>"Armenian","Australian"=>"Australian","Austrian"=>"Austrian","Azerbaijani"=>"Azerbaijani","Bahamian"=>"Bahamian","Bahraini"=>"Bahraini","Bangladeshi"=>"Bangladeshi","Barbadian"=>"Barbadian","Barbudans"=>"Barbudans","Batswana"=>"Batswana","Belarusian"=>"Belarusian","Belgian"=>"Belgian","Belizean"=>"Belizean","Beninese"=>"Beninese","Bhutanese"=>"Bhutanese","Bolivian"=>"Bolivian","Bosnian"=>"Bosnian","Brazilian"=>"Brazilian","British"=>"British","Bruneian"=>"Bruneian","Bulgarian"=>"Bulgarian","Burkinabe"=>"Burkinabe","Burmese"=>"Burmese","Burundian"=>"Burundian","Cambodian"=>"Cambodian","Cameroonian"=>"Cameroonian","Canadian"=>"Canadian","Cape Verdean"=>"Cape Verdean","Central African"=>"Central African","Chadian"=>"Chadian","Chilean"=>"Chilean","Chinese"=>"Chinese","Colombian"=>"Colombian","Comoran"=>"Comoran","Congolese"=>"Congolese","Costa Rican"=>"Costa Rican","Croatian"=>"Croatian","Cuban"=>"Cuban","Cypriot"=>"Cypriot","Czech"=>"Czech","Danish"=>"Danish","Djibouti"=>"Djibouti","Dominican"=>"Dominican","Dutch"=>"Dutch","East Timorese"=>"East Timorese","Ecuadorean"=>"Ecuadorean","Egyptian"=>"Egyptian","Emirian"=>"Emirian","Equatorial Guinean"=>"Equatorial Guinean","Eritrean"=>"Eritrean","Estonian"=>"Estonian","Ethiopian"=>"Ethiopian","Fijian"=>"Fijian","Filipino"=>"Filipino","Finnish"=>"Finnish","French"=>"French","Gabonese"=>"Gabonese","Gambian"=>"Gambian","Georgian"=>"Georgian","German"=>"German","Ghanaian"=>"Ghanaian","Greek"=>"Greek","Grenadian"=>"Grenadian","Guatemalan"=>"Guatemalan","Guinea-Bissauan"=>"Guinea-Bissauan","Guinean"=>"Guinean","Guyanese"=>"Guyanese","Haitian"=>"Haitian","Herzegovinian"=>"Herzegovinian","Honduran"=>"Honduran","Hungarian"=>"Hungarian","I-Kiribati"=>"I-Kiribati","Icelander"=>"Icelander","Indian"=>"Indian","Indonesian"=>"Indonesian","Iranian"=>"Iranian","Iraqi"=>"Iraqi","Irish"=>"Irish","Israeli"=>"Israeli","Italian"=>"Italian","Ivorian"=>"Ivorian","Jamaican"=>"Jamaican","Japanese"=>"Japanese","Jordanian"=>"Jordanian","Kazakhstani"=>"Kazakhstani","Kenyan"=>"Kenyan","Kittian and Nevisian"=>"Kittian and Nevisian","Kuwaiti"=>"Kuwaiti","Kyrgyz"=>"Kyrgyz","Laotian"=>"Laotian","Latvian"=>"Latvian","Lebanese"=>"Lebanese","Liberian"=>"Liberian","Libyan"=>"Libyan","Liechtensteiner"=>"Liechtensteiner","Lithuanian"=>"Lithuanian","Luxembourger"=>"Luxembourger","Macedonian"=>"Macedonian","Malagasy"=>"Malagasy","Malawian"=>"Malawian","Malaysian"=>"Malaysian","Maldivan"=>"Maldivan","Malian"=>"Malian","Maltese"=>"Maltese","Marshallese"=>"Marshallese","Mauritanian"=>"Mauritanian","Mauritian"=>"Mauritian","Mexican"=>"Mexican","Micronesian"=>"Micronesian","Moldovan"=>"Moldovan","Monacan"=>"Monacan","Mongolian"=>"Mongolian","Moroccan"=>"Moroccan","Mosotho"=>"Mosotho","Motswana"=>"Motswana","Mozambican"=>"Mozambican","Namibian"=>"Namibian","Nauruan"=>"Nauruan","Nepalese"=>"Nepalese","New Zealander"=>"New Zealander","Nicaraguan"=>"Nicaraguan","Nigerian"=>"Nigerian","Nigerien"=>"Nigerien","North Korean"=>"North Korean","Northern Irish"=>"Northern Irish","Norwegian"=>"Norwegian","Omani"=>"Omani","Pakistani"=>"Pakistani","Palauan"=>"Palauan","Panamanian"=>"Panamanian","Papua New Guinean"=>"Papua New Guinean","Paraguayan"=>"Paraguayan","Peruvian"=>"Peruvian","Polish"=>"Polish","Portuguese"=>"Portuguese","Qatari"=>"Qatari","Romanian"=>"Romanian","Russian"=>"Russian","Rwandan"=>"Rwandan","Saint Lucian"=>"Saint Lucian","Salvadoran"=>"Salvadoran","Samoan"=>"Samoan","San Marinese"=>"San Marinese","Sao Tomean"=>"Sao Tomean","Saudi"=>"Saudi","Scottish"=>"Scottish","Senegalese"=>"Senegalese","Serbian"=>"Serbian","Seychellois"=>"Seychellois","Sierra Leonean"=>"Sierra Leonean","Singaporean"=>"Singaporean","Slovakian"=>"Slovakian","Slovenian"=>"Slovenian","Solomon Islander"=>"Solomon Islander","Somali"=>"Somali","South African"=>"South African","South Korean"=>"South Korean","Spanish"=>"Spanish","Sri Lankan"=>"Sri Lankan","Sudanese"=>"Sudanese","Surinamer"=>"Surinamer","Swazi"=>"Swazi","Swedish"=>"Swedish","Swiss"=>"Swiss","Syrian"=>"Syrian","Taiwanese"=>"Taiwanese","Tajik"=>"Tajik","Tanzanian"=>"Tanzanian","Thai"=>"Thai","Togolese"=>"Togolese","Tongan"=>"Tongan","Trinidadian/Tobagonian"=>"Trinidadian/Tobagonian","Tunisian"=>"Tunisian","Turkish"=>"Turkish","Tuvaluan"=>"Tuvaluan","Ugandan"=>"Ugandan","Ukrainian"=>"Ukrainian","Uruguayan"=>"Uruguayan","Uzbekistani"=>"Uzbekistani","Venezuelan"=>"Venezuelan","Vietnamese"=>"Vietnamese","Welsh"=>"Welsh","Yemenite"=>"Yemenite","Zambian"=>"Zambian","Zimbabwean"=>"Zimbabwean",];





        $arrays['years']=[];
        for($i=1940;$i<2016;$i++){ $arrays['years'][$i]=$i;}
        $arrays['months']=[];
        for($i=1;$i<13;$i++){ $arrays['months'][$i]=$i;}
        $arrays['days']=[];
        for($i=1;$i<32;$i++){ $arrays['days'][$i]=$i;}


       // $liveAccount=cms_forms_payment::find(\Session::get('liveAccount_id'));


        return View::make('cms::forms.cms_forms_liveaccount.cms_form')->with('arrays',$arrays)->render();

    }

    /**
     * Store a newly created resource in cms pages.
     *
     * @return void
     */
    public function cms_store(LiveAccountRequest $request)
    {

        $errors=$this->validateFrequencyFields($request);
        if(!empty($errors)){
            return Redirect::back()->withErrors($errors);
        }

        $date_of_birth=$request->date_of_birth_d.'/'.$request->date_of_birth_m.'/'.$request->date_of_birth_y;
        $date_of_birth_joint=$request->date_of_birth_joint_d.'/'.$request->date_of_birth_joint_m.'/'.$request->date_of_birth_joint_y;

        $request->merge(array('date_of_birth' => $date_of_birth));
        $request->merge(array('date_of_birth_joint' => $date_of_birth_joint));


        $htmlPath=public_path().'/tempHtml/live_account_'.rand(0,99999).rand(0,99999).'.html';
        //$htmlPath=preg_replace('/tmp$/','html',$htmlPath);

        $html=View::make('cms::forms.cms_forms_liveaccount.pdfForm',['var'=>$request])->render();
        file_put_contents($htmlPath,$html);

        $pdfPath=public_path().'/pdf/'.explode('.',basename($htmlPath))[0].'.pdf';

        $protocol='http';
        if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }
       $pdf= $protocol.'://'.$request->server->get('SERVER_NAME').':'.$_SERVER['SERVER_PORT'].'/pdf/'.explode('.',basename($htmlPath))[0].'.pdf';
        $request->merge(['pdf'=>$pdf]);

        $pdfPath=public_path().'/pdf/'.explode('.',basename($htmlPath))[0].'.pdf';
        $request->merge(['pdfPath'=>$pdfPath]);

        exec('"'.Config('fxweb.htmlToPdfPath').'" "'.$htmlPath.'" "'.$pdfPath.'"');
      //  unlink($htmlPath);
        cms_forms_liveaccount::create($request->all());


            $email=new Email();
            @$email->userLiveAccount($request->all(),$request->primary_email);
            @$email->adminLiveAccount($request->all(),config('fxweb.adminEmail'));


        Session::flash('flash_success', 'Your request has been sent successfully you can check it
        <a href="'.$pdf.'">HERE</a>
        ');
        return Redirect::back();

        return view('cms::forms.cms_forms_liveaccount.pdfForm',['var'=>$request])->render();

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
        if ($number_of_years_cfd_joint != 'None') {
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

          if ($number_of_years_commodities_joint!= 'None') {
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
            if( $number_of_years_futures_joint==="0"){
                $this->addErrorMessage($errors,'number_of_years_futures_joint', 'Required Field');

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
