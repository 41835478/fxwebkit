<?php

namespace Fxweb\Repositories\Admin\User;

use Fxweb\Models\User;
use Fxweb\Models\UsersDetails;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Modules\Accounts\Entities\mt4_users_users;
use Config;
use Fxweb\Helpers\Fx;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentUserRepository implements UserContract {

    /**
     */
    public function __construct() {
        //
    }

    public function getLoginsInGroup($aGroups, $sOrderBy = 'LOGIN', $sSort = 'ASC') {
        if (is_string($aGroups)) {

            $aGroups = explode(',', $aGroups);
        }

        $oUsers = Mt4User::whereIn('GROUP', $aGroups)->select('LOGIN')->get();
        $aUsers = [];

        foreach ($oUsers as $oUser) {
            $aUsers[] = $oUser->LOGIN;
        }

        return $aUsers;
    }

    /**
     * 
     */
    public function getAllGroups() {
        // return User::select('group')->get();
    }

    public function getUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin') {

        $oRole = Sentinel::findRoleBySlug($role);
        $role_id = $oRole->id;
        $oResult = User::with('roles')->whereHas('roles', function($query) use($role_id) {
            $query->where('id', $role_id);
        });

        /* =============== id Filter  =============== */
        if (isset($aFilters['id']) && !empty($aFilters['id'])) {
            $oResult = $oResult->where('id', $aFilters['id']);
        }

        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['first_name']) && !empty($aFilters['first_name'])) {
            $oResult = $oResult->where('first_name', 'like', '%' . $aFilters['first_name'] . '%');
        }

        if (isset($aFilters['last_name']) && !empty($aFilters['last_name'])) {
            $oResult = $oResult->where('last_name', 'like', '%' . $aFilters['last_name'] . '%');
        }

        /* =============== email Filter  =============== */
        if (isset($aFilters['email']) && !empty($aFilters['email'])) {
            $oResult = $oResult->where('email', 'like', '%' . $aFilters['email'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            
        }
        /* =============== Preparing Output  =============== */
        return $oResult;
    }

    public function addUser($oRequest, $role = 'admin') {

        $oClientRole = Sentinel::findRoleBySlug($role);

        //$bAutoActivate	= Config::get('fxweb.auto_activate_client');
        
        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email,
            'password' => $oRequest->password,
        ];

        $oUser = Sentinel::register($aCredentials);
        $oClientRole->users()->attach($oUser);
        $oActivation = Activation::create($oUser);

        return true;
    }

    public function updateUser($oRequest) {
        $user = Sentinel::findById($oRequest->edit_id);
        $fullDetails=  UsersDetails::where('users_id',$oRequest->edit_id)->first();

        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email
                ];

     
            $fullDetails->nickname=$oRequest->nickname;
            $fullDetails->location=$oRequest->location;
            $fullDetails->birthday=$oRequest->birthday;
            $fullDetails->phone=$oRequest->phone;
            $fullDetails->country=$oRequest->country;
            $fullDetails->city=$oRequest->city;
      

        if ($oRequest->password != '') {
            $aCredentials['password'] = $oRequest->password;
        }
        try {
   
            $user = Sentinel::update($user, $aCredentials);
            $fullDetails->save();
            
        } catch (QueryException $e) {
            return ['The email has already been taken.'];
        }
        return true;
    }

    public function deleteUser($id) {
        $user = Sentinel::findById($id);

        try {
            $user->delete();
        } catch (Exception $e) {
            return ['error! please try again later.'];
        }
        return ['deleted successfully.'];
    }

    public function asignMt4UsersToAccount($account_id, $users_id) {
if(is_array($users_id)){
        foreach ($users_id as $id => $user_id) {

            $asign = mt4_users_users::where(['users_id' => $account_id, 'mt4_users_id' => $user_id])->first();
            if ($asign) {
                $asign->users_id = $account_id;
                $asign->mt4_users_id = $user_id;
                $asign->save();
            } else {
                $asign = new mt4_users_users;

                $asign->users_id = $account_id;
                $asign->mt4_users_id = $user_id;
                $asign->save();
            }
        }
}
    }

    public function unsignMt4UsersToAccount($account_id, $users_id) {
      
if(is_array($users_id)){  
        foreach ($users_id as $id => $user_id) {

            $asign = mt4_users_users::where(['users_id' => $account_id, 'mt4_users_id' => $user_id])->first();
            if ($asign) {
                $asign->delete();
            } 
        }
}
    }
      public function getUserDetails($userId)
        {
     
           $user = Sentinel::findById($userId);
           $fullDetails=  UsersDetails::where('users_id',$userId)->first();
           
            $userDetails = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'nickname' => $fullDetails['nickname'],
            'location' => $fullDetails['location'],
            'birthday' => $fullDetails['birthday'],
            'phone' => $fullDetails['phone'],
            'country' => $fullDetails['country'],
            'city' => $fullDetails['city'],
         
        ];
            return $userDetails;
        }

        public function getCountry($iso2)
        {
            $country_arr = [
            "af"=>[" Afghanistan (افغانستان) ", " 93"],
            "ax"=>[" Åland Islands (Åland) ", " 0"],
            "al"=>[" Albania (Shqipëri) ", " 355"],
            "dz"=>[" Algeria ", " 213"],
            "as"=>[" American Samoa ", " 1684"],
            "ad"=>[" Andorra ", " 376"],
            "ao"=>[" Angola ", " 244"],
            "ai"=>[" Anguilla ", " 1264"],
            "aq"=>[" Antarctica ", " 0"],
            "ag"=>[" Antigua & Barbuda ", " 1268"],
            "ar"=>[" Argentina ", " 54"],
            "am"=>[" Armenia (Հայաստան) ", " 374"],
            "aw"=>[" Aruba ", " 297"],
            "ac"=>[" Ascension Island ", " 247"],
            "au"=>[" Australia ", " 61"],
            "at"=>[" Austria (Österreich) ", " 43"],
            "az"=>[" Azerbaijan (Azərbaycan) ", " 994"],
            "bs"=>[" Bahamas ", " 1242"],
            "bh"=>[" Bahrain (البحرين) ", " 973"],
            "bd"=>[" Bangladesh (বাংলাদেশ) ", " 880"],
            "bb"=>[" Barbados ", " 1246"],
            "by"=>[" Belarus (Беларусь) ", " 375"],
            "be"=>[" Belgium ", " 32"],
            "bz"=>[" Belize ", " 501"],
            "bj"=>[" Benin (Bénin) ", " 229"],
            "bm"=>[" Bermuda ", " 1441"],
            "bt"=>[" Bhutan (འབྲུག) ", " 975"],
            "bo"=>[" Bolivia ", " 591"],
            "ba"=>[" Bosnia & Herzegovina (Босна и Херцеговина) ", " 387"],
            "bw"=>[" Botswana ", " 267"],
            "bv"=>[" Bouvet Island ", " 0"],
            "br"=>[" Brazil (Brasil) ", " 55"],
            "io"=>[" British Indian Ocean Territory ", " 246"],
            "vg"=>[" British Virgin Islands ", " 1284"],
            "bn"=>[" Brunei ", " 673"],
            "bg"=>[" Bulgaria (България) ", " 359"],
            "bf"=>[" Burkina Faso ", " 226"],
            "bi"=>[" Burundi (Uburundi) ", " 257"],
            "kh"=>[" Cambodia (កម្ពុជា) ", " 855"],
            "cm"=>[" Cameroon (Cameroun) ", " 237"],
            "ca"=>[" Canada ", " 1"],
            "ic"=>[" Canary Islands (islas Canarias) ", " 0"],
            "cv"=>[" Cape Verde (Kabu Verdi) ", " 238"],
            "bq"=>[" Caribbean Netherlands ", " 599"],
            "ky"=>[" Cayman Islands ", " 1345"],
            "cf"=>[" Central African Republic (République centrafricaine) ", " 236"],
            "ea"=>[" Ceuta & Melilla (Ceuta y Melilla) ", " 0"],
            "td"=>[" Chad (Tchad) ", " 235"],
            "cl"=>[" Chile ", " 56"],
            "cn"=>[" China (中国) ", " 86"],
            "cx"=>[" Christmas Island ", " 0"],
            "cp"=>[" Clipperton Island ", " 0"],
            "cc"=>[" Cocos (Keeling) Islands (Kepulauan Cocos (Keeling)) ", " 0"],
            "co"=>[" Colombia ", " 57"],
            "km"=>[" Comoros (جزر القمر) ", " 269"],
            "cd"=>[" Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo) ", " 243"],
            "cg"=>[" Congo (Republic) (Congo-Brazzaville) ", " 242"],
            "ck"=>[" Cook Islands ", " 682"],
            "cr"=>[" Costa Rica ", " 506"],
            "ci"=>[" Côte d’Ivoire ", " 225"],
            "hr"=>[" Croatia (Hrvatska) ", " 385"],
            "cu"=>[" Cuba ", " 53"],
            "cw"=>[" Curaçao ", " 599"],
            "cy"=>[" Cyprus (Κύπρος) ", " 357"],
            "cz"=>[" Czech Republic (Česká republika) ", " 420"],
            "dk"=>[" Denmark (Danmark) ", " 45"],
            "dg"=>[" Diego Garcia ", " 0"],
            "dj"=>[" Djibouti ", " 253"],
            "dm"=>[" Dominica ", " 1767"],
            "do"=>[" Dominican Republic (República Dominicana) ", " 1809"],
            "ec"=>[" Ecuador ", " 593"],
            "eg"=>[" Egypt (مصر) ", " 20"],
            "sv"=>[" El Salvador ", " 503"],
            "gq"=>[" Equatorial Guinea (Guinea Ecuatorial) ", " 240"],
            "er"=>[" Eritrea ", " 291"],
            "ee"=>[" Estonia (Eesti) ", " 372"],
            "et"=>[" Ethiopia ", " 251"],
            "fk"=>[" Falkland Islands (Islas Malvinas) ", " 500"],
            "fo"=>[" Faroe Islands (Føroyar) ", " 298"],
            "fj"=>[" Fiji ", " 679"],
            "fi"=>[" Finland (Suomi) ", " 358"],
            "fr"=>[" France ", " 33"],
            "gf"=>[" French Guiana (Guyane française) ", " 594"],
            "pf"=>[" French Polynesia (Polynésie française) ", " 689"],
            "tf"=>[" French Southern Territories (Terres australes françaises) ", " 0"],
            "ga"=>[" Gabon ", " 241"],
            "gm"=>[" Gambia ", " 220"],
            "ge"=>[" Georgia (საქართველო) ", " 995"],
            "de"=>[" Germany (Deutschland) ", " 49"],
            "gh"=>[" Ghana (Gaana) ", " 233"],
            "gi"=>[" Gibraltar ", " 350"],
            "gr"=>[" Greece (Ελλάδα) ", " 30"],
            "gl"=>[" Greenland (Kalaallit Nunaat) ", " 299"],
            "gd"=>[" Grenada ", " 1473"],
            "gp"=>[" Guadeloupe ", " 590"],
            "gu"=>[" Guam ", " 1671"],
            "gt"=>[" Guatemala ", " 502"],
            "gg"=>[" Guernsey ", " 0"],
            "gn"=>[" Guinea (Guinée) ", " 224"],
            "gw"=>[" Guinea-Bissau (Guiné-Bissau) ", " 245"],
            "gy"=>[" Guyana ", " 592"],
            "ht"=>[" Haiti ", " 509"],
            "hm"=>[" Heard & McDonald Islands ", " 0"],
            "hn"=>[" Honduras ", " 504"],
            "hk"=>[" Hong Kong (香港) ", " 852"],
            "hu"=>[" Hungary (Magyarország) ", " 36"],
            "is"=>[" Iceland (Ísland) ", " 354"],
            "in"=>[ " India (भारत) ", " 91"],
            "id"=>[" Indonesia ", " 62"],
            "ir"=>[ " Iran (ایران) ", " 98"],
            "iq"=>[ " Iraq (العراق) ", " 964"],
            "ie"=>[" Ireland ", " 353"],
            "im"=>[ " Isle of Man ", " 0"],
            "il"=>[" Israel (ישראל) ", " 972"],
            "it"=>[ " Italy (Italia) ", " 39"],
            "jm"=>[" Jamaica ", " 1876"],
            "jp"=>[" Japan (日本) ", " 81"],
            "je"=>[ " Jersey ", " 0"],
            "jo"=>[ " Jordan (الأردن) ", " 962"],
            "kz"=>[ " Kazakhstan (Казахстан) ", " 7"],
            "ke"=>[ " Kenya ", " 254"],
            "ki"=>[ " Kiribati ", " 686"],
            "xk"=>[ " Kosovo (Kosovë) ", " 0"],
            "kw"=>[ " Kuwait (الكويت) ", " 965"],
            "kg"=>[ " Kyrgyzstan (Кыргызстан) ", " 996"],
            "la"=>[ " Laos (ລາວ) ", " 856"],
            "lv"=>[ " Latvia (Latvija) ", " 371"],
            "lb"=>[" Lebanon (لبنان) ", " 961"],
            "ls"=>[" Lesotho ", " 266"],
            "lr"=>[ " Liberia ", " 231"],
            "ly"=>[ " Libya (ليبيا) ", " 218"],
            "li"=>[ " Liechtenstein ", " 423"],
            "lt"=>[ " Lithuania (Lietuva) ", " 370"],
            "lu"=>[ " Luxembourg ", " 352"],
            "mo"=>[ " Macau (澳門) ", " 853"],
            "mk"=>[ " Macedonia (FYROM) (Македонија) ", " 389"],
            "mg"=>[ " Madagascar (Madagasikara) ", " 261"],
            "mw"=>[ " Malawi ", " 265"],
            "my"=>[ " Malaysia ", " 60"],
            "mv"=>[ " Maldives ", " 960"],
            "ml"=>[ " Mali ", " 223"],
            "mt"=>[ " Malta ", " 356"],
            "mh"=>[ " Marshall Islands ", " 692"],
            "mq"=>[ " Martinique ", " 596"],
            "mr"=>[ " Mauritania (موريتانيا) ", " 222"],
            "mu"=>[ " Mauritius (Moris) ", " 230"],
            "yt"=>[ " Mayotte ", " 0"],
            "mx"=>[ " Mexico (México) ", " 52"],
            "fm"=>[ " Micronesia ", " 691"],
            "md"=>[ " Moldova (Republica Moldova) ", " 373"],
            "mc"=>[ " Monaco ", " 377"],
            "mn"=>[ " Mongolia (Монгол) ", " 976"],
            "me"=>[ " Montenegro (Crna Gora) ", " 382"],
            "ms"=>[ " Montserrat ", " 1664"],
            "ma"=>[ " Morocco ", " 212"],
            "mz"=>[ " Mozambique (Moçambique) ", " 258"],
            "mm"=>[ " Myanmar (Burma) (မြန်မာ) ", " 95"],
            "na"=>[ " Namibia (Namibië) ", " 264"],
            "nr"=>[ " Nauru ", " 674"],
            "np"=>[ " Nepal (नेपाल) ", " 977"],
            "nl"=>[ " Netherlands (Nederland) ", " 31"],
            "nc"=>[ " New Caledonia (Nouvelle-Calédonie) ", " 687"],
            "nz"=>[ " New Zealand ", " 64"],
            "ni"=>[ " Nicaragua ", " 505"],
            "ne"=>[ " Niger (Nijar) ", " 227"],
            "ng"=>[ " Nigeria ", " 234"],
            "nu"=>[ " Niue ", " 683"],
            "nf"=>[" Norfolk Island ", " 6723"],
            "mp"=>[ " Northern Mariana Islands ", " 1"],
            "kp"=>[ " North Korea (조선민주주의인민공화국) ", " 850"],
            "no"=>[ " Norway (Norge) ", " 47"],
            "om"=>[" Oman (عُمان) ", " 968"],
            "pk"=>[ " Pakistan (پاکستان) ", " 92"],
            "pw"=>[" Palau ", " 680"],
            "ps"=>[" Palestine (فلسطين) ", " 970"],
            "pa"=>[" Panama (Panamá) ", " 507"],
            "pg"=>[" Papua New Guinea ", " 675"],
            "py"=>[" Paraguay ", " 595"],
            "pe"=>[" Peru (Perú) ", " 51"],
            "ph"=>[" Philippines ", " 63"],
            "pn"=>[" Pitcairn Islands ", " 0"],
            "pl"=>[" Poland (Polska) ", " 48"],
            "pt"=>[" Portugal ", " 351"],
            "pr"=>[" Puerto Rico ", " 1787"],
            "qa"=>[" Qatar (قطر) ", " 974"],
            "re"=>[" Réunion (La Réunion) ", " 262"],
            "ro"=>[" Romania (România) ", " 40"],
            "ru"=>[" Russia (Россия) ", " 7"],
            "rw"=>[" Rwanda ", " 250"],
            "ws"=>[" Samoa ", " 685"],
            "sm"=>[" San Marino ", " 378"],
            "st"=>[" São Tomé & Príncipe (São Tomé e Príncipe) ", " 239"],
            "sa"=>[" Saudi Arabia (المملكة العربية السعودية) ", " 966"],
            "sn"=>[" Senegal ", " 221"],
            "rs"=>[" Serbia (Србија) ", " 381"],
            "sc"=>[" Seychelles ", " 248"],
            "sl"=>[" Sierra Leone ", " 232"],
            "sg"=>[" Singapore ", " 65"],
            "sx"=>[" Sint Maarten ", " 1721"],
            "sk"=>[" Slovakia (Slovensko) ", " 421"],
            "si"=>[" Slovenia (Slovenija) ", " 386"],
            "sb"=>[" Solomon Islands ", " 677"],
            "so"=>[" Somalia (Soomaaliya) ", " 252"],
            "za"=>[" South Africa ", " 27"],
            "gs"=>[" South Georgia & South Sandwich Islands ", " 0"],
            "kr"=>[" South Korea (대한민국) ", " 82"],
            "ss"=>[" South Sudan (جنوب السودان) ", " 211"],
            "es"=>[" Spain (España) ", " 34"],
            "lk"=>[" Sri Lanka (ශ්‍රී ලංකාව) ", " 94"],
            "bl"=>[" St. Barthélemy (Saint-Barthélemy) ", " 590"],
            "sh"=>[" St. Helena ", " 290"],
            "kn"=>[" St. Kitts & Nevis ", " 1869"],
            "lc"=>[" St. Lucia ", " 1758"],
            "mf"=>[" St. Martin (Saint-Martin) ", " 590"],
            "pm"=>[" St. Pierre & Miquelon (Saint-Pierre-et-Miquelon) ", " 508"],
            "vc"=>[" St. Vincent & Grenadines ", " 1784"],
            "sd"=>[" Sudan (السودان) ", " 249"],
            "sr"=>[" Suriname ", " 597"],
            "sj"=>[" Svalbard & Jan Mayen (Svalbard og Jan Mayen) ", " 0"],
            "sz"=>[" Swaziland ", " 268"],
            "se"=>[" Sweden (Sverige) ", " 46"],
            "ch"=>[" Switzerland (Schweiz) ", " 41"],
            "sy"=>[" Syria (سوريا) ", " 963"],
            "tw"=>[" Taiwan (台灣) ", " 886"],
            "tj"=>[" Tajikistan ", " 992"],
            "tz"=>[" Tanzania ", " 255"],
            "th"=>[" Thailand (ไทย) ", " 66"],
            "tl"=>[" Timor-Leste ", " 670"],
            "tg"=>[" Togo ", " 228"],
            "tk"=>[" Tokelau ", " 690"],
            "to"=>[" Tonga ", " 676"],
            "tt"=>[" Trinidad & Tobago ", " 1868"],
            "ta"=>[" Tristan da Cunha ", " 0"],
            "tn"=>[" Tunisia ", " 216"],
            "tr"=>[" Turkey (Türkiye) ", " 90"],
            "tm"=>[" Turkmenistan ", " 993"],
            "tc"=>[" Turks & Caicos Islands ", " 1649"],
            "tv"=>[" Tuvalu ", " 688"],
            "um"=>[" U.S. Outlying Islands ", " 0"],
            "vi"=>[" U.S. Virgin Islands ", " 1340"],
            "ug"=>[" Uganda ", " 256"],
            "ua"=>[" Ukraine (Україна) ", " 380"],
            "ae"=>[" United Arab Emirates (الإمارات العربية المتحدة) ", " 971"],
            "gb"=>[" United Kingdom ", " 44"],
            "us"=>[" United States ", " 1"],
            "uy"=>[" Uruguay ", " 598"],
            "uz"=>[" Uzbekistan (Oʻzbekiston) ", " 998"],
            "vu"=>[" Vanuatu ", " 678"],
            "va"=>[" Vatican City (Città del Vaticano) ", " 379"],
            "ve"=>[" Venezuela ", " 58"],
            "vn"=>[" Vietnam (Việt Nam) ", " 84"],
            "wf"=>[" Wallis & Futuna ", " 681"],
            "eh"=>[" Western Sahara (الصحراء الغربية) ", " 0"],
            "ye"=>[" Yemen (اليمن) ", " 967"],
            "zm"=>[" Zambia ", " 260"],
            "zw"=>[" Zimbabwe ", " 263"],
        ];
                if($iso2===null){
                    return $country_arr;
                }if(isset($country_arr[$iso2])){
                    return $country_arr[$iso2][0];
                }else{
                    return $iso2;
                }
       
        }
        
}
