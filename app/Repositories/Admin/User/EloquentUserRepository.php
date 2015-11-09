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

        $user = Sentinel::getUser();
        $fullDetails=  UsersDetails::where('users_id',$user->id)->first();


        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email
                ];

     if($fullDetails){
            $fullDetails->nickname=$oRequest->nickname;
            $fullDetails->location=$oRequest->location;
            $fullDetails->birthday=$oRequest->birthday;
            $fullDetails->phone=$oRequest->phone;
            $fullDetails->country=$oRequest->country;
            $fullDetails->city=$oRequest->city;
             $fullDetails->save();
     }else{
         $fullDetails=new UsersDetails();
         
            $fullDetails->users_id=$user->id;
            $fullDetails->nickname=$oRequest->nickname;
            $fullDetails->location=$oRequest->location;
            $fullDetails->birthday=$oRequest->birthday;
            $fullDetails->phone=$oRequest->phone;
            $fullDetails->country=$oRequest->country;
            $fullDetails->city=$oRequest->city;
            $fullDetails->gender=$oRequest->gender;
            $fullDetails->zip_code=$oRequest->zip_code;
             $fullDetails->save();
     }

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
            "af"=>" Afghanistan (افغانستان) ",
            "ax"=>" Åland Islands (Åland) ",
            "al"=>" Albania (Shqipëri) ",
            "dz"=>" Algeria ",
            "as"=>"American Samoa ", 
            "ad"=>"Andorra ", 
            "ao"=>"Angola ", 
            "ai"=>"Anguilla ", 
            "aq"=>"Antarctica ",
            "ag"=>"Antigua & Barbuda ", 
            "ar"=>"Argentina ",
            "am"=>"Armenia (Հայաստան) ", 
            "aw"=>"Aruba ", 
            "ac"=>"Ascension Island ", 
            "au"=>"Australia ",
            "at"=>"Austria (Österreich) ", 
            "az"=>"Azerbaijan (Azərbaycan) ", 
            "bs"=>"Bahamas ", 
            "bh"=>"Bahrain (البحرين) ", 
            "bd"=>"Bangladesh (বাংলাদেশ) ",
            "bb"=>"Barbados ",
            "by"=>"Belarus (Беларусь) ", 
            "be"=>"Belgium ",
            "bz"=>"Belize ",
            "bj"=>"Benin (Bénin) ",
            "bm"=>"Bermuda ",
            "bt"=>"Bhutan (འབྲུག) ",
            "bo"=>"Bolivia ",
            "ba"=>"Bosnia & Herzegovina (Босна и Херцеговина) ",
            "bw"=>"Botswana ", 
            "bv"=>"Bouvet Island ",
            "br"=>"Brazil (Brasil) ", 
            "io"=>"British Indian Ocean Territory ",
            "vg"=>"British Virgin Islands ",
            "bn"=>"Brunei ",
            "bg"=>"Bulgaria (България) ", 
            "bf"=>"Burkina Faso ",
            "bi"=>"Burundi (Uburundi) ",
            "kh"=>"Cambodia (កម្ពុជា) ", 
            "cm"=>"Cameroon (Cameroun) ", 
            "ca"=>"Canada ",
            "ic"=>"Canary Islands (islas Canarias) ", 
            "cv"=>"Cape Verde (Kabu Verdi) ", 
            "bq"=>"Caribbean Netherlands ", 
            "ky"=>"Cayman Islands ", 
            "cf"=>"Central African Republic (République centrafricaine) ", 
            "ea"=>"Ceuta & Melilla (Ceuta y Melilla) ",
            "td"=>"Chad (Tchad) ", 
            "cl"=>"Chile ",
            "cn"=>"China (中国) ",
            "cx"=>"Christmas Island ",
            "cp"=>"Clipperton Island ", 
            "cc"=>"Cocos (Keeling) Islands (Kepulauan Cocos (Keeling)) ",
            "co"=>"Colombia ",
            "km"=>"Comoros (جزر القمر) ",
            "cd"=>"Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo) ",
            "cg"=>"Congo (Republic) (Congo-Brazzaville) ",
            "ck"=>"Cook Islands ", 
            "cr"=>"Costa Rica ", 
            "ci"=>"Côte d’Ivoire ",
            "hr"=>"Croatia (Hrvatska) ",
            "cu"=>"Cuba ",
            "cw"=>"Curaçao ",
            "cy"=>"Cyprus (Κύπρος) ",
            "cz"=>"Czech Republic (Česká republika) ",
            "dk"=>"Denmark (Danmark) ", 
            "dg"=>"Diego Garcia ",
            "dj"=>"Djibouti ", 
            "dm"=>"Dominica ", 
            "do"=>"Dominican Republic (República Dominicana) ",
            "ec"=>"Ecuador ",
            "eg"=>"Egypt (مصر) ",
            "sv"=>"El Salvador ", 
            "gq"=>"Equatorial Guinea (Guinea Ecuatorial) ", 
            "er"=>"Eritrea ",
            "ee"=>"Estonia (Eesti) ",
            "et"=>"Ethiopia ", 
            "fk"=>"Falkland Islands (Islas Malvinas) ",
            "fo"=>"Faroe Islands (Føroyar) ",
            "fj"=>"Fiji ", 
            "fi"=>"Finland (Suomi) ", 
            "fr"=>"France ",
            "gf"=>"French Guiana (Guyane française) ",
            "pf"=>"French Polynesia (Polynésie française) ", 
            "tf"=>"French Southern Territories (Terres australes françaises) ",
            "ga"=>"Gabon ", 
            "gm"=>"Gambia ", 
            "ge"=>"Georgia (საქართველო) ", 
            "de"=>"Germany (Deutschland) ", 
            "gh"=>"Ghana (Gaana) ", 
            "gi"=>"Gibraltar ", 
            "gr"=>"Greece (Ελλάδα) ", 
            "gl"=>"Greenland (Kalaallit Nunaat) ", 
            "gd"=>"Grenada ", 
            "gp"=>"Guadeloupe ", 
            "gu"=>"Guam ", 
            "gt"=>"Guatemala ", 
            "gg"=>"Guernsey ",
            "gn"=>"Guinea (Guinée) ", 
            "gw"=>"Guinea-Bissau (Guiné-Bissau) ", 
            "gy"=>"Guyana ", 
            "ht"=>"Haiti ", 
            "hm"=>"Heard & McDonald Islands ",
            "hn"=>"Honduras ", 
            "hk"=>"Hong Kong (香港) ", 
            "hu"=>"Hungary (Magyarország) ", 
            "is"=>"Iceland (Ísland) ", 
            "in"=> " India (भारत) ", 
            "id"=>"Indonesia ", 
            "ir"=>" Iran (ایران) ", 
            "iq"=> " Iraq (العراق) ", 
            "ie"=>"Ireland ", 
            "im"=> " Isle of Man ",
            "il"=>"Israel (ישראל) ", 
            "it"=> " Italy (Italia) ",
            "jm"=>"Jamaica ", 
            "jp"=>"Japan (日本) ", 
            "je"=> " Jersey ",
            "jo"=> " Jordan (الأردن) ",
            "kz"=> " Kazakhstan (Казахстан) ",
            "ke"=> " Kenya ", 
            "ki"=> " Kiribati ", 
            "xk"=> " Kosovo (Kosovë) ", 
            "kw"=> " Kuwait (الكويت) ", 
            "kg"=> " Kyrgyzstan (Кыргызстан) ", 
            "la"=>" Laos (ລາວ) ", 
            "lv"=> " Latvia (Latvija) ",
            "lb"=>"Lebanon (لبنان) ", 
            "ls"=>"Lesotho ", 
            "lr"=> " Liberia ", 
            "ly"=> " Libya (ليبيا) ", 
            "li"=> " Liechtenstein ", 
            "lt"=> " Lithuania (Lietuva) ",
            "lu"=> " Luxembourg ",
            "mo"=> " Macau (澳門) ", 
            "mk"=> " Macedonia (FYROM) (Македонија) ",
            "mg"=> " Madagascar (Madagasikara) ",
            "mw"=> " Malawi ", 
            "my"=> " Malaysia ",
            "mv"=> " Maldives ", 
            "ml"=> " Mali ",
            "mt"=> " Malta ", 
            "mh"=> " Marshall Islands ",
            "mq"=> " Martinique ", 
            "mr"=> " Mauritania (موريتانيا) ",
            "mu"=> " Mauritius (Moris) ",
            "yt"=> " Mayotte ",
            "mx"=> " Mexico (México) ",
            "fm"=> " Micronesia ", 
            "md"=> " Moldova (Republica Moldova) ", 
            "mc"=> " Monaco ", 
            "mn"=> " Mongolia (Монгол) ", 
            "me"=> " Montenegro (Crna Gora) ",
            "ms"=> " Montserrat ", 
            "ma"=> " Morocco ", 
            "mz"=> " Mozambique (Moçambique) ", 
            "mm"=> " Myanmar (Burma) (မြန်မာ) ", 
            "na"=> " Namibia (Namibië) ",
            "nr"=> " Nauru ", 
            "np"=> " Nepal (नेपाल) ", 
            "nl"=> " Netherlands (Nederland) ",
            "nc"=> " New Caledonia (Nouvelle-Calédonie) ",
            "nz"=> " New Zealand ",
            "ni"=> " Nicaragua ", 
            "ne"=> " Niger (Nijar) ", 
            "ng"=> " Nigeria ", 
            "nu"=> " Niue ", 
            "nf"=>"Norfolk Island ",
            "mp"=>" Northern Mariana Islands ", 
            "kp"=> " North Korea (조선민주주의인민공화국) ",
            "no"=>" Norway (Norge) ", 
            "om"=>"Oman (عُمان) ", 
            "pk"=>" Pakistan (پاکستان) ",
            "pw"=>"Palau ",
            "ps"=>"Palestine (فلسطين) ",
            "pa"=>"Panama (Panamá) ",
            "pg"=>"Papua New Guinea ",
            "py"=>"Paraguay ", 
            "pe"=>"Peru (Perú) ",
            "ph"=>"Philippines ",
            "pn"=>"Pitcairn Islands ",
            "pl"=>"Poland (Polska) ",
            "pt"=>"Portugal ",
            "pr"=>"Puerto Rico ", 
            "qa"=>"Qatar (قطر) ",
            "re"=>"Réunion (La Réunion) ",
            "ro"=>"Romania (România) ", 
            "ru"=>"Russia (Россия) ",
            "rw"=>"Rwanda ", 
            "ws"=>"Samoa ", 
            "sm"=>"San Marino ", 
            "st"=>"São Tomé & Príncipe (São Tomé e Príncipe) ",
            "sa"=>"Saudi Arabia (المملكة العربية السعودية) ", 
            "sn"=>"Senegal ", 
            "rs"=>"Serbia (Србија) ", 
            "sc"=>"Seychelles ", 
            "sl"=>"Sierra Leone ",
            "sg"=>"Singapore ", 
            "sx"=>"Sint Maarten ", 
            "sk"=>"Slovakia (Slovensko) ",
            "si"=>"Slovenia (Slovenija) ", 
            "sb"=>"Solomon Islands ", 
            "so"=>"Somalia (Soomaaliya) ",
            "za"=>"South Africa ",
            "gs"=>"South Georgia & South Sandwich Islands ",
            "kr"=>"South Korea (대한민국) ",
            "ss"=>"South Sudan (جنوب السودان) ",
            "es"=>"Spain (España) ",
            "lk"=>"Sri Lanka (ශ්‍රී ලංකාව) ",
            "bl"=>"St. Barthélemy (Saint-Barthélemy) ",
            "sh"=>"St. Helena ",
            "kn"=>"St. Kitts & Nevis ",
            "lc"=>"St. Lucia ",
            "mf"=>"St. Martin (Saint-Martin) ",
            "pm"=>"St. Pierre & Miquelon (Saint-Pierre-et-Miquelon) ",
            "vc"=>"St. Vincent & Grenadines ",
            "sd"=>"Sudan (السودان) ",
            "sr"=>"Suriname ", 
            "sj"=>"Svalbard & Jan Mayen (Svalbard og Jan Mayen) ",
            "sz"=>"Swaziland ",
            "se"=>"Sweden (Sverige) ",
            "ch"=>"Switzerland (Schweiz) ",
            "sy"=>"Syria (سوريا) ",
            "tw"=>"Taiwan (台灣) ",
            "tj"=>"Tajikistan ",
            "tz"=>"Tanzania ",
            "th"=>"Thailand (ไทย) ", 
            "tl"=>"Timor-Leste ",
            "tg"=>"Togo ",
            "tk"=>"Tokelau ", 
            "to"=>"Tonga ",
            "tt"=>"Trinidad & Tobago ",
            "ta"=>"Tristan da Cunha ",
            "tn"=>"Tunisia ", 
            "tr"=>"Turkey (Türkiye) ", 
            "tm"=>"Turkmenistan ", 
            "tc"=>"Turks & Caicos Islands ", 
            "tv"=>"Tuvalu ", 
            "um"=>"U.S. Outlying Islands ",
            "vi"=>"U.S. Virgin Islands ", 
            "ug"=>"Uganda ", 
            "ua"=>"Ukraine (Україна) ",
            "ae"=>"United Arab Emirates (الإمارات العربية المتحدة) ", 
            "gb"=>"United Kingdom ", 
            "us"=>"United States ", 
            "uy"=>"Uruguay ", 
            "uz"=>"Uzbekistan (Oʻzbekiston) ", 
            "vu"=>"Vanuatu ", 
            "va"=>"Vatican City (Città del Vaticano) ",
            "ve"=>"Venezuela ",
            "vn"=>"Vietnam (Việt Nam) ", 
            "wf"=>"Wallis & Futuna ", 
            "eh"=>"Western Sahara (الصحراء الغربية) ", 
            "ye"=>"Yemen (اليمن) ",
            "zm"=>"Zambia ", 
            "zw"=>"Zimbabwe ", 
        ];
                if($iso2===null){
                    return $country_arr;
                }if(isset($country_arr[$iso2])){
                    return $country_arr[$iso2];
                }else{
                    return $iso2;
                }
        }
        
}
