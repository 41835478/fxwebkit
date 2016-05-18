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
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
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
        $arrays['gender']= ['Select One'=>'Select One','Male'=>'Male','Female'=>'Female'];
        $arrays['marital_status']= ['Select One'=>'Select One','Single'=>'Single','Married'=>'Married'];
        $arrays['resident_status']= ['Non Resident'=>'Non Resident','Resident Individual'=>'Resident Individual','Foreign National'=>'Foreign National'];
        //   $arrays['country']= ['Non Resident'=>'Non Resident','Resident Individual'=>'Resident Individual','Foreign National'=>'Foreign National'];
        $arrays['source_funds_deposited_joint']= ['Employment'=>'Employment inheritance investment','Previous'=>'Previous employment real state','Sale of'=>'Sale of investments savings','Other'=>'Other'];
        $arrays['proof_of_residence']= ['Select One'=>'Select One','Residence ID'=>'Residence ID','Utility Bill'=>'Utility Bill','Bank Statement'=>'Bank Statement'];
        $arrays['id_type']= ['Select One'=>'Select One','Driving Licence'=>'Driving Licence','Passport'=>'Passport','Residence ID'=>'Residence ID'];
        $arrays['number_of_years']= ['Select One'=>'Select One','None'=>'None','Less than 1 year'=>'Less than 1 year','1 to 3 years'=>'1 to 3 years','3 to 5 years'=>'3 to 5 years','More than 5 years'=>'More than 5 years'];
        $arrays['number_of_transactions']= ['Select One'=>'Select One','less than 10 transactions'=>'less than 10 transactions','10 to 20 transactions'=>'10 to 20 transactions','More than 20 transactions'=>'More than 20 transactions'];
        $arrays['average_trading']= ['Select One'=>'Select One','Less than 30,000 GBP'=>'Less than 30,000 GBP','30,000 to 60,000 GBP'=>'30,000 to 60,000 GBP','60,000 to 300,000 GBP'=>'60,000 to 300,000 GBP','More than 300,000 GBP'=>'More than 300,000 GBP'];
        $arrays['source_funds_deposited_joint']= ['Employment'=>'Employment','Inheritance'=>'Inheritance','Investment'=>'Investment','Previous Employment'=>'Previous Employment','Real Estate'=>'Real Estate','Sale of investments'=>'Sale of investments','Savings'=>'Savings','Other (specify below)'=>'Other (specify below)',];
        $arrays['source_funds_deposited']= ['Employment inheritance investment'=>'Employment inheritance investment','Previous employment real state'=>'Previous employment real state','Sale of investments savings'=>'Sale of investments savings','Other'=>'Other',];

        $arrays['country']=["AX"=>"Aland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","EE"=>"Estonia","ET"=>"Ethiopia","QU"=>"European Union","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GY"=>"Guyana","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LS"=>"Lesotho","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NC"=>"New Caledonia","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","QO"=>"Outlying Oceania","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","BL"=>"Saint Barthélemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"S?o Tomé and Pr?ncipe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","AE"=>"United Arab Emirates","GB"=>"United Kingdom","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","ZM"=>"Zambia"];
        return View::make('cms::forms.cms_forms_liveaccount.cms_form',['arrays'=>$arrays])->render();
    }

    /**
     * Store a newly created resource in cms pages.
     *
     * @return void
     */
    public function cms_store(Request $request)
    {

        cms_forms_liveaccount::create($request->all());
      //  dd($request);
        return view('cms::forms.cms_forms_liveaccount.pdfForm', ['var' => $request])->render();

        Session::flash('flash_message', 'cms_forms_liveaccount added!');
        return Redirect::back();
        //    return redirect('cms/cms_forms_liveaccount');
    }

}
