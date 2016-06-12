<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_currencyconvertor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_currencyconvertorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_currencyconvertor = cms_forms_currencyconvertor::paginate(15);

        return view('cms::forms.cms_forms_currencyconvertor.index', compact('cms_forms_currencyconvertor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_currencyconvertor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_currencyconvertor::create($request->all());

        Session::flash('flash_message', 'cms_forms_currencyconvertor added!');

        return redirect('cms/cms_forms_currencyconvertor');
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
        $cms_forms_currencyconvertor = cms_forms_currencyconvertor::findOrFail($id);

        return view('cms::forms.cms_forms_currencyconvertor.show', compact('cms_forms_currencyconvertor'));
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
        $cms_forms_currencyconvertor = cms_forms_currencyconvertor::findOrFail($id);

        return view('cms::forms.cms_forms_currencyconvertor.edit', compact('cms_forms_currencyconvertor'));
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
        
        $cms_forms_currencyconvertor = cms_forms_currencyconvertor::findOrFail($id);
        $cms_forms_currencyconvertor->update($request->all());

        Session::flash('flash_message', 'cms_forms_currencyconvertor updated!');

        return redirect('cms/cms_forms_currencyconvertor');
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
        cms_forms_currencyconvertor::destroy($id);

        Session::flash('flash_message', 'cms_forms_currencyconvertor deleted!');

        return redirect('cms/cms_forms_currencyconvertor');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            $countries=[0=>'select currency',"AFN"=>"Afghan Afghani","AFA"=>"Afghan Afghani (1927-2002)","ALL"=>"Albanian Lek","DZD"=>"Algerian Dinar","ADP"=>"Andorran Peseta","AOA"=>"Angolan Kwanza","AOK"=>"Angolan Kwanza (1977-1990)","AOR"=>"Angolan Kwanza Reajustado (1995-1999)","AON"=>"Angolan New Kwanza (1990-2000)","ARA"=>"Argentine Austral","ARS"=>"Argentine Peso","ARP"=>"Argentine Peso (1983-1985)","ARL"=>"Argentine Peso Ley","ARM"=>"Argentine Peso Moneda Nacional","AMD"=>"Armenian Dram","AWG"=>"Aruban Florin","AUD"=>"Australian Dollar","ATS"=>"Austrian Schilling","AZN"=>"Azerbaijani Manat","AZM"=>"Azerbaijani Manat (1993-2006)","BSD"=>"Bahamian Dollar","BHD"=>"Bahraini Dinar","BDT"=>"Bangladeshi Taka","BBD"=>"Barbadian Dollar","BYB"=>"Belarusian New Ruble (1994-1999)","BYR"=>"Belarusian Ruble","BEF"=>"Belgian Franc","BEC"=>"Belgian Franc (convertible)","BEL"=>"Belgian Franc (financial)","BZD"=>"Belize Dollar","BMD"=>"Bermudan Dollar","BTN"=>"Bhutanese Ngultrum","BOB"=>"Bolivian Boliviano","BOV"=>"Bolivian Mvdol","BOP"=>"Bolivian Peso","BAM"=>"Bosnia-Herzegovina Convertible Mark","BAD"=>"Bosnia-Herzegovina Dinar","BAN"=>"Bosnia-Herzegovina New Dinar","BWP"=>"Botswanan Pula","BRC"=>"Brazilian Cruzado","BRN"=>"Brazilian Cruzado Novo","BRR"=>"Brazilian Cruzeiro","BRE"=>"Brazilian Cruzeiro (1990-1993)","BRB"=>"Brazilian Cruzeiro Novo (1967-1986)","BRL"=>"Brazilian Real","GBP"=>"British Pound Sterling","BND"=>"Brunei Dollar","BGL"=>"Bulgarian Hard Lev","BGN"=>"Bulgarian Lev","BGM"=>"Bulgarian Socialist Lev","BUK"=>"Burmese Kyat","BIF"=>"Burundian Franc","KHR"=>"Cambodian Riel","CAD"=>"Canadian Dollar","CVE"=>"Cape Verdean Escudo","KYD"=>"Cayman Islands Dollar","XOF"=>"CFA Franc BCEAO","XAF"=>"CFA Franc BEAC","XPF"=>"CFP Franc","CLE"=>"Chilean Escudo","CLP"=>"Chilean Peso","CLF"=>"Chilean Unidades de Fomento","CNY"=>"Chinese Yuan Renminbi","COP"=>"Colombian Peso","KMF"=>"Comorian Franc","CDF"=>"Congolese Franc","CRC"=>"Costa Rican Colón","HRD"=>"Croatian Dinar","HRK"=>"Croatian Kuna","CUC"=>"Cuban Convertible Peso","CUP"=>"Cuban Peso","CYP"=>"Cypriot Pound","CZK"=>"Czech Republic Koruna","CSK"=>"Czechoslovak Hard Koruna","DKK"=>"Danish Krone","DJF"=>"Djiboutian Franc","DOP"=>"Dominican Peso","NLG"=>"Dutch Guilder","XCD"=>"East Caribbean Dollar","DDM"=>"East German Mark","ECS"=>"Ecuadorian Sucre","ECV"=>"Ecuadorian Unidad de Valor Constante (UVC)","EGP"=>"Egyptian Pound","GQE"=>"Equatorial Guinean Ekwele","ERN"=>"Eritrean Nakfa","EEK"=>"Estonian Kroon","ETB"=>"Ethiopian Birr","EUR"=>"Euro","XBA"=>"European Composite Unit","XEU"=>"European Currency Unit","XBB"=>"European Monetary Unit","XBC"=>"European Unit of Account (XBC)","XBD"=>"European Unit of Account (XBD)","FKP"=>"Falkland Islands Pound","FJD"=>"Fijian Dollar","FIM"=>"Finnish Markka","FRF"=>"French Franc","XFO"=>"French Gold Franc","XFU"=>"French UIC-Franc","GMD"=>"Gambian Dalasi","GEK"=>"Georgian Kupon Larit","GEL"=>"Georgian Lari","DEM"=>"German Mark","GHS"=>"Ghanaian Cedi","GHC"=>"Ghanaian Cedi (1979-2007)","GIP"=>"Gibraltar Pound","XAU"=>"Gold","GRD"=>"Greek Drachma","GTQ"=>"Guatemalan Quetzal","GWP"=>"Guinea-Bissau Peso","GNF"=>"Guinean Franc","GNS"=>"Guinean Syli","GYD"=>"Guyanaese Dollar","HTG"=>"Haitian Gourde","HNL"=>"Honduran Lempira","HKD"=>"Hong Kong Dollar","HUF"=>"Hungarian Forint","ISK"=>"Icelandic Króna","INR"=>"Indian Rupee","IDR"=>"Indonesian Rupiah","IRR"=>"Iranian Rial","IQD"=>"Iraqi Dinar","IEP"=>"Irish Pound","ILS"=>"Israeli New Sheqel","ILP"=>"Israeli Pound","ITL"=>"Italian Lira","JMD"=>"Jamaican Dollar","JPY"=>"Japanese Yen","JOD"=>"Jordanian Dinar","KZT"=>"Kazakhstan Tenge","KES"=>"Kenyan Shilling","KWD"=>"Kuwaiti Dinar","KGS"=>"Kyrgystani Som","LAK"=>"Laotian Kip","LVL"=>"Latvian Lats","LVR"=>"Latvian Ruble","LBP"=>"Lebanese Pound","LSL"=>"Lesotho Loti","LRD"=>"Liberian Dollar","LYD"=>"Libyan Dinar","LTL"=>"Lithuanian Litas","LTT"=>"Lithuanian Talonas","LUL"=>"Luxembourg Financial Franc","LUC"=>"Luxembourgian Convertible Franc","LUF"=>"Luxembourgian Franc","MOP"=>"Macanese Pataca","MKD"=>"Macedonian Denar","MGA"=>"Malagasy Ariary","MGF"=>"Malagasy Franc","MWK"=>"Malawian Kwacha","MYR"=>"Malaysian Ringgit","MVR"=>"Maldivian Rufiyaa","MVP"=>"Maldivian Rupee","MLF"=>"Malian Franc","MTL"=>"Maltese Lira","MTP"=>"Maltese Pound","MRO"=>"Mauritanian Ouguiya","MUR"=>"Mauritian Rupee","MXN"=>"Mexican Peso","MXP"=>"Mexican Silver Peso (1861-1992)","MXV"=>"Mexican Unidad de Inversion (UDI)","MDC"=>"Moldovan Cupon","MDL"=>"Moldovan Leu","MCF"=>"Monegasque Franc","MNT"=>"Mongolian Tugrik","MAD"=>"Moroccan Dirham","MAF"=>"Moroccan Franc","MZE"=>"Mozambican Escudo","MZN"=>"Mozambican Metical","MMK"=>"Myanma Kyat","NAD"=>"Namibian Dollar","NPR"=>"Nepalese Rupee","ANG"=>"Netherlands Antillean Guilder","TWD"=>"New Taiwan Dollar","NZD"=>"New Zealand Dollar","NIC"=>"Nicaraguan Cordoba","NIO"=>"Nicaraguan Cordoba Oro","NGN"=>"Nigerian Naira","KPW"=>"North Korean Won","NOK"=>"Norwegian Krone","BOL"=>"Old Bolivian Boliviano","BRZ"=>"Old Brazilian Cruzeiro","BGO"=>"Old Bulgarian Lev","ISJ"=>"Old Icelandic Króna","ILR"=>"Old Israeli Sheqel","MKN"=>"Old Macedonian Denar","MZM"=>"Old Mozambican Metical","ROL"=>"Old Romanian Leu","CSD"=>"Old Serbian Dinar","KRO"=>"Old South Korean Won","SDD"=>"Old Sudanese Dinar","SDP"=>"Old Sudanese Pound","TRL"=>"Old Turkish Lira","VNN"=>"Old Vietnamese Dong","OMR"=>"Omani Rial","PKR"=>"Pakistani Rupee","XPD"=>"Palladium","PAB"=>"Panamanian Balboa","PGK"=>"Papua New Guinean Kina","PYG"=>"Paraguayan Guarani","PEI"=>"Peruvian Inti","PEN"=>"Peruvian Nuevo Sol","PES"=>"Peruvian Sol","PHP"=>"Philippine Peso","XPT"=>"Platinum","PLN"=>"Polish Zloty","PLZ"=>"Polish Zloty (1950-1995)","PTE"=>"Portuguese Escudo","GWE"=>"Portuguese Guinea Escudo","QAR"=>"Qatari Rial","RHD"=>"Rhodesian Dollar","XRE"=>"RINET Funds","RON"=>"Romanian Leu","RUB"=>"Russian Ruble","RUR"=>"Russian Ruble (1991-1998)","RWF"=>"Rwandan Franc","SHP"=>"Saint Helena Pound","SVC"=>"Salvadoran Colón","WST"=>"Samoan Tala","STD"=>"São Tomé and Príncipe Dobra","SAR"=>"Saudi Riyal","RSD"=>"Serbian Dinar","SCR"=>"Seychellois Rupee","SLL"=>"Sierra Leonean Leone","XAG"=>"Silver","SGD"=>"Singapore Dollar","SKK"=>"Slovak Koruna","SIT"=>"Slovenian Tolar","SBD"=>"Solomon Islands Dollar","SOS"=>"Somali Shilling","ZAR"=>"South African Rand","ZAL"=>"South African Rand (financial)","KRH"=>"South Korean Hwan","KRW"=>"South Korean Won","SUR"=>"Soviet Rouble","ESP"=>"Spanish Peseta","ESA"=>"Spanish Peseta (A account)","ESB"=>"Spanish Peseta (convertible account)","XDR"=>"Special Drawing Rights","LKR"=>"Sri Lanka Rupee","SDG"=>"Sudanese Pound","SRG"=>"Suriname Guilder","SRD"=>"Surinamese Dollar","SZL"=>"Swazi Lilangeni","SEK"=>"Swedish Krona","CHF"=>"Swiss Franc","SYP"=>"Syrian Pound","TJR"=>"Tajikistani Ruble","TJS"=>"Tajikistani Somoni","TZS"=>"Tanzanian Shilling","XTS"=>"Testing Currency Code","THB"=>"Thai Baht","TPE"=>"Timorese Escudo","TOP"=>"Tongan Paʻanga","TTD"=>"Trinidad and Tobago Dollar","TND"=>"Tunisian Dinar","TRY"=>"Turkish Lira","TMM"=>"Turkmenistani Manat","TMT"=>"Turkmenistani New Manat","UGX"=>"Ugandan Shilling","UGS"=>"Ugandan Shilling (1966-1987)","UAH"=>"Ukrainian Hryvnia","UAK"=>"Ukrainian Karbovanets","COU"=>"Unidad de Valor Real","AED"=>"United Arab Emirates Dirham","XXX"=>"Unknown or Invalid Currency","UYU"=>"Uruguayan Peso","UYP"=>"Uruguayan Peso (1975-1993)","UYI"=>"Uruguayan Peso en Unidades Indexadas","USD"=>"US Dollar","USN"=>"US Dollar (Next day)","USS"=>"US Dollar (Same day)","UZS"=>"Uzbekistan Som","VUV"=>"Vanuatu Vatu","VEB"=>"Venezuelan Bolívar","VEF"=>"Venezuelan Bolívar Fuerte","VND"=>"Vietnamese Dong","CHE"=>"WIR Euro","CHW"=>"WIR Franc","YDD"=>"Yemeni Dinar","YER"=>"Yemeni Rial","YUN"=>"Yugoslavian Convertible Dinar","YUD"=>"Yugoslavian Hard Dinar","YUM"=>"Yugoslavian Noviy Dinar","YUR"=>"Yugoslavian Reformed Dinar","ZRN"=>"Zairean New Zaire","ZRZ"=>"Zairean Zaire","ZMK"=>"Zambian Kwacha","ZWD"=>"Zimbabwean Dollar","ZWR"=>"Zimbabwean Dollar (2008)","ZWL"=>"Zimbabwean Dollar (2009)"];
         return View::make('cms::forms.cms_forms_currencyconvertor.cms_form',['countries'=>$countries])->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {

            $amount = $request->amount;
            $from = $request->from;
            $to = $request->to;

             $file = file_get_contents('http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s=' . $from . $to . '=X', true);
            $filedata = explode(",", $file);
            $rate = $filedata[1];
            $con = $rate * $amount;

            $success = true;
            Session::flash('result',"$amount $from = $con $to</strong><span> 1 $from = $rate $to");
return Redirect::back();
        //    return redirect('cms/cms_forms_currencyconvertor');
        }

}
