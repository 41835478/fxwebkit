<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_referringpartner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use modules\Cms\Http\Controllers\forms\Email;
class cms_forms_referringpartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_referringpartner = cms_forms_referringpartner::paginate(15);

        return view('cms::forms.cms_forms_referringpartner.index', compact('cms_forms_referringpartner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_referringpartner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_referringpartner::create($request->all());

        Session::flash('flash_message', 'cms_forms_referringpartner added!');

        return redirect('cms/cms_forms_referringpartner');
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
        $cms_forms_referringpartner = cms_forms_referringpartner::findOrFail($id);

        return view('cms::forms.cms_forms_referringpartner.show', compact('cms_forms_referringpartner'));
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
        $cms_forms_referringpartner = cms_forms_referringpartner::findOrFail($id);

        return view('cms::forms.cms_forms_referringpartner.edit', compact('cms_forms_referringpartner'));
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
        
        $cms_forms_referringpartner = cms_forms_referringpartner::findOrFail($id);
        $cms_forms_referringpartner->update($request->all());

        Session::flash('flash_message', 'cms_forms_referringpartner updated!');

        return redirect('cms/cms_forms_referringpartner');
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
        cms_forms_referringpartner::destroy($id);

        Session::flash('flash_message', 'cms_forms_referringpartner deleted!');

        return redirect('cms/cms_forms_referringpartner');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            $arrays['country']=["AX"=>"Åland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","EE"=>"Estonia","ET"=>"Ethiopia","QU"=>"European Union","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GY"=>"Guyana","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LS"=>"Lesotho","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NC"=>"New Caledonia","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","QO"=>"Outlying Oceania","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","BL"=>"Saint Barthélemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"São Tomé and Príncipe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","AE"=>"United Arab Emirates","GB"=>"United Kingdom","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","ZM"=>"Zambia"];

            return View::make('cms::forms.cms_forms_referringpartner.cms_form',['country'=>$arrays['country']])->with('geoipCountry',getGeoipCountry()[0])->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {

            cms_forms_referringpartner::create($request->all());

            $email=new Email();
            @$email->contactus($request->all(),$request->email);


            Session::flash('flash_success', 'Your request has been sent successfully!');
                                    return Redirect::back();
        //    return redirect('cms/cms_forms_referringpartner');
        }

}
