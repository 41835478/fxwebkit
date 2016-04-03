<?php

namespace Fxweb\Repositories\Admin\User;

use Fxweb\Models\User;
use Fxweb\Models\UsersDetails;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Modules\Accounts\Entities\mt4_users_users;
use Config;
use Fxweb\Helpers\Fx;
use Illuminate\Support\Facades\DB;
use Fxweb\Models\Mt4User;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentUserRepository implements UserContract
{

    /**
     */
    public function __construct()
    {
        //
    }

public function getDashboardStatistics(){

    $oRole = Sentinel::findRoleBySlug('client');
    $role_id = $oRole->id;

    $statistics['usersNumber']=User::with('roles')->whereHas('roles', function ($query) use ($role_id) {
        $query->where('id', $role_id);
    })->count();

    $statistics['activeUsersNumber']=User::with('activations')->distinct('user_id')->whereHas('activations',function ($query){
        $query->where('completed',1);
    })->with('roles')->whereHas('roles', function ($query) use ($role_id) {
        $query->where('id', $role_id);
    })->count();

    $statistics['mt4UsersNumber']=Mt4User::count();
    $statistics['liveMt4UsersNumber']=Mt4User::where('server_id',1)->count();


    return $statistics;
}

    public function getLoginsInGroup($aGroups, $sOrderBy = 'LOGIN', $sSort = 'ASC')
    {
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
    public function getAllGroups()
    {
        // return User::select('group')->get();
    }

    public function getUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin')
    {

        $oRole = Sentinel::findRoleBySlug($role);
        $role_id = $oRole->id;
        $oResult = User::with('roles')->whereHas('roles', function ($query) use ($role_id) {
            $query->where('id', $role_id);
        });



        /* =============== active Filters =============== */
        if (isset($aFilters['active']) && $aFilters['active']!=0) {


            if ($aFilters['active'] == 1) {
                $oResult = $oResult->with('activations')->whereHas('activations',function ($query){
                    $query->where('completed',1);
                });
            } else {
                $oResult = $oResult->whereNotIn('id', function ($query) {

                    $query->select(DB::raw('activations.user_id'))
                        ->from('activations')
                        ->where('completed',1)
                        ->whereRaw('activations.user_id = users.id');

                });
            }
        }
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

    public function getAgentUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin')
    {

        $agents=$aFilters['agents'];
        //$oResult =new User();


        $oRole = Sentinel::findRoleBySlug('admin');
        $role_id = $oRole->id;
        $oResult = User::with('roles')->whereHas('roles', function ($query) use ($role_id) {
            $query->where('id','!=', $role_id);
        });

        if($agents == 1){
            $oResult=   $oResult->with('isAgent')->whereHas('isAgent', function ($query) use ($agents) {

                $query->whereNotNull('user_id');

            });
        }else{
            $oResult=  $oResult->whereNotIn('id', function ($query) {

                $query->select(DB::raw('ibportal_user_ibid.user_id'))
                    ->from('ibportal_user_ibid')
                    ->whereRaw('ibportal_user_ibid.user_id = users.id');

            });
        }

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


    public function getClientAgentUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC', $role = 'admin')
    {

        $agents=$aFilters['agent_id'];
        $oResult =new User();

            $oResult=   $oResult->with('agentPlan')->whereHas('agentPlan',function($query)use ($agents){
                $query->where('agent_id',$agents);
                $query->with('plan');
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

    public function getUsersEmail($last_user_id=0,$limit=0)
    {

        $oResult = User::select('first_name', 'email','id')->where('id','>',$last_user_id);

        if($limit > 0){
            $oResult = $oResult->limit($limit);
        }
        $oResult = $oResult->get();
        return $oResult->toArray();
    }


    public function addUser($oRequest, $role = 'admin')
    {

        $oClientRole = Sentinel::findRoleBySlug($role);

        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email,
            'password' => $oRequest->password,
        ];

        $oUser = Sentinel::register($aCredentials);

        $oClientRole->users()->attach($oUser);
        $oActivation = Activation::create($oUser);




        $fullDetails = new UsersDetails();

        $fullDetails->users_id = $oUser->id;
        $fullDetails->nickname = $oRequest->nickname;
        $fullDetails->address = $oRequest->address;
        $fullDetails->birthday = $oRequest->birthday;
        $fullDetails->phone = $oRequest->phone;
        $fullDetails->country = $oRequest->country;
        $fullDetails->city = $oRequest->city;
        $fullDetails->gender = $oRequest->gender;
        $fullDetails->zip_code = $oRequest->zip_code;
        $fullDetails->gender = $oRequest->gender;
        $fullDetails->save();

        return $oUser->id;
    }

    public function updateUser($oRequest)
    {

        $user = current_user()->getUser();
        $user = Sentinel::findById($oRequest->edit_id);
        $fullDetails = UsersDetails::where('users_id', $user->id)->first();


        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email
        ];

        if ($fullDetails) {
            $fullDetails->nickname = $oRequest->nickname;
            $fullDetails->address = $oRequest->address;
            $fullDetails->birthday = $oRequest->birthday;
            $fullDetails->phone = $oRequest->phone;
            $fullDetails->country = $oRequest->country;
            $fullDetails->city = $oRequest->city;
            $fullDetails->zip_code = $oRequest->zip_code;
            $fullDetails->gender = $oRequest->gender;
            $fullDetails->save();
        } else {
            $fullDetails = new UsersDetails();

            $fullDetails->users_id = $oRequest->edit_id;
            $fullDetails->nickname = $oRequest->nickname;
            $fullDetails->address = $oRequest->address;
            $fullDetails->birthday = $oRequest->birthday;
            $fullDetails->phone = $oRequest->phone;
            $fullDetails->country = $oRequest->country;
            $fullDetails->city = $oRequest->city;
            $fullDetails->gender = $oRequest->gender;
            $fullDetails->zip_code = $oRequest->zip_code;
            $fullDetails->save();
        }

        if ($oRequest->password != '') {
            $aCredentials['password'] = $oRequest->password;
        }

//        $updateResult = Sentinel::validForUpdate($user, $aCredentials);
//       
//        if($updateResult){
//            $fullDetails->save();
//        }else{
//            return ['The email has already been taken.'];
//        }
        try {
            $user = Sentinel::update($user, $aCredentials);
            $fullDetails->save();

        } catch (\Illuminate\Database\QueryException $e) {
            return trans('general.the_email_has');
        }

        return $user->id;
    }

    public function deleteUser($id)
    {
        $user = Sentinel::findById($id);

        try {
            $user->delete();
        } catch (Exception $e) {
            return [trans('general.error_please_try')];
        }
        return [trans('general.deleted_successfully')];
    }

    public function asignMt4UsersToAccount($account_id, $users_id,$server_id=1)
    {

        if (is_array($users_id)) {
            foreach ($users_id as $id => $user_id) {
                if($server_id==3){
                    $mt4=explode(',',$user_id);
                    $user_id=$mt4[0];
                    $server_id=($mt4[1]=='')? 0:$mt4[1];
                }
                $asign = mt4_users_users::where(['users_id' => $account_id, 'mt4_users_id' => $user_id, 'server_id' => $server_id])->first();
                if ($asign) {
                    $asign->users_id = $account_id;
                    $asign->mt4_users_id = $user_id;
                    $asign->server_id = $server_id;
                    $asign->save();
                } else {
                    $asign = new mt4_users_users;

                    $asign->users_id = $account_id;
                    $asign->mt4_users_id = $user_id;
                    $asign->server_id = $server_id;
                    $asign->save();
                }
            }
        }
        return true;
    }
//
//    public function assignAgents($account_id, $users_id)
//    {
//        if (is_array($users_id)) {
//            foreach ($users_id as $id => $user_id) {
//
//                $asign = mt4_users_users::where(['users_id' => $account_id, 'mt4_users_id' => $user_id])->first();
//                if ($asign) {
//                    $asign->users_id = $account_id;
//                    $asign->mt4_users_id = $user_id;
//                    $asign->save();
//                } else {
//                    $asign = new mt4_users_users;
//
//                    $asign->users_id = $account_id;
//                    $asign->mt4_users_id = $user_id;
//                    $asign->save();
//                }
//            }
//        }
//        return true;
//    }

    public function unsignMt4UsersToAccount($account_id, $users_id,$server_id=1)
    {

        if (is_array($users_id)) {
            foreach ($users_id as $id => $user_id) {
                if($server_id==3){
                    $mt4=explode(',',$user_id);
                    $user_id=$mt4[0];
                    $server_id=($mt4[1]=='')? 0:$mt4[1];
                }
                $asign = mt4_users_users::where(['users_id' => $account_id, 'mt4_users_id' => $user_id,'server_id'=>$server_id])->first();
                if ($asign) {
                    $asign->delete();
                }
            }
        }
    }

    public function getUserDetails($userId)
    {

        $user = Sentinel::findById($userId);

        $fullDetails = UsersDetails::where('users_id', $userId)->first();

        $userDetails = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'nickname' => '',
            'address' => '',
            'birthday' => '',
            'phone' => '',
            'country' => '',
            'city' => '',
            'zip_code' => '',
            'last_login'=>'',
            'created_at'=>'',
            'gender' => 0
        ];
        if ($fullDetails) {

            $userDetails ['nickname'] = $fullDetails['nickname'];
            $userDetails ['address'] = $fullDetails['address'];
            $userDetails ['birthday'] = $fullDetails['birthday'];
            $userDetails ['phone'] = $fullDetails['phone'];
            $userDetails ['country'] = $fullDetails['country'];
            $userDetails ['city'] = $fullDetails['city'];
            $userDetails ['zip_code'] = $fullDetails['zip_code'];
            $userDetails ['gender'] = $fullDetails['gender'];
            $userDetails ['last_login'] = $user['last_login'];
            $userDetails ['created_at'] = $user['created_at'];
        }

        return $userDetails;
    }

    public function getCountry($iso2)
    {
        $country_arr = [
            "af" => "Afghanistan (افغانستان)",
            "ax" => "Åland Islands (Åland)",
            "al" => "Albania (Shqipëri)",
            "dz" => "Algeria",
            "as" => "American Samoa",
            "ad" => "Andorra",
            "ao" => "Angola",
            "ai" => "Anguilla",
            "aq" => "Antarctica",
            "ag" => "Antigua & Barbuda",
            "ar" => "Argentina",
            "am" => "Armenia (Հայաստան)",
            "aw" => "Aruba",
            "ac" => "Ascension Island",
            "au" => "Australia",
            "at" => "Austria (Österreich)",
            "az" => "Azerbaijan (Azərbaycan)",
            "bs" => "Bahamas",
            "bh" => "Bahrain (البحرين)",
            "bd" => "Bangladesh (বাংলাদেশ)",
            "bb" => "Barbados",
            "by" => "Belarus (Беларусь)",
            "be" => "Belgium",
            "bz" => "Belize",
            "bj" => "Benin (Bénin)",
            "bm" => "Bermuda",
            "bt" => "Bhutan (འབྲུག)",
            "bo" => "Bolivia",
            "ba" => "Bosnia & Herzegovina (Босна и Херцеговина)",
            "bw" => "Botswana",
            "bv" => "Bouvet Island",
            "br" => "Brazil (Brasil)",
            "io" => "British Indian Ocean Territory",
            "vg" => "British Virgin Islands",
            "bn" => "Brunei",
            "bg" => "Bulgaria (България)",
            "bf" => "Burkina Faso",
            "bi" => "Burundi (Uburundi)",
            "kh" => "Cambodia (កម្ពុជា)",
            "cm" => "Cameroon (Cameroun)",
            "ca" => "Canada",
            "ic" => "Canary Islands (islas Canarias)",
            "cv" => "Cape Verde (Kabu Verdi)",
            "bq" => "Caribbean Netherlands",
            "ky" => "Cayman Islands",
            "cf" => "Central African Republic (République centrafricaine)",
            "ea" => "Ceuta & Melilla (Ceuta y Melilla)",
            "td" => "Chad (Tchad)",
            "cl" => "Chile",
            "cn" => "China (中国)",
            "cx" => "Christmas Island",
            "cp" => "Clipperton Island",
            "cc" => "Cocos (Keeling) Islands (Kepulauan Cocos (Keeling))",
            "co" => "Colombia",
            "km" => "Comoros (جزر القمر)",
            "cd" => "Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)",
            "cg" => "Congo (Republic) (Congo-Brazzaville ",
            "ck" => "Cook Islands",
            "cr" => "Costa Rica",
            "ci" => "Côte d’Ivoire",
            "hr" => "Croatia (Hrvatska)",
            "cu" => "Cuba",
            "cw" => "Curaçao",
            "cy" => "Cyprus (Κύπρος)",
            "cz" => "Czech Republic (Česká republika)",
            "dk" => "Denmark (Danmark)",
            "dg" => "Diego Garcia",
            "dj" => "Djibouti",
            "dm" => "Dominica",
            "do" => "Dominican Republic (República Dominicana)",
            "ec" => "Ecuador ",
            "eg" => "Egypt (مصر)",
            "sv" => "El Salvador",
            "gq" => "Equatorial Guinea (Guinea Ecuatorial)",
            "er" => "Eritrea ",
            "ee" => "Estonia (Eesti)",
            "et" => "Ethiopia",
            "fk" => "Falkland Islands (Islas Malvinas)",
            "fo" => "Faroe Islands (Føroyar)",
            "fj" => "Fiji",
            "fi" => "Finland (Suomi)",
            "fr" => "France",
            "gf" => "French Guiana (Guyane française)",
            "pf" => "French Polynesia (Polynésie française)",
            "tf" => "French Southern Territories (Terres australes françaises)",
            "ga" => "Gabon",
            "gm" => "Gambia",
            "ge" => "Georgia (საქართველო)",
            "de" => "Germany (Deutschland)",
            "gh" => "Ghana (Gaana)",
            "gi" => "Gibraltar",
            "gr" => "Greece (Ελλάδα)",
            "gl" => "Greenland (Kalaallit Nunaat)",
            "gd" => "Grenada",
            "gp" => "Guadeloupe",
            "gu" => "Guam",
            "gt" => "Guatemala",
            "gg" => "Guernsey",
            "gn" => "Guinea (Guinée)",
            "gw" => "Guinea-Bissau (Guiné-Bissau)",
            "gy" => "Guyana",
            "ht" => "Haiti",
            "hm" => "Heard & McDonald Islands",
            "hn" => "Honduras ",
            "hk" => "Hong Kong (香港)",
            "hu" => "Hungary (Magyarország)",
            "is" => "Iceland (Ísland)",
            "in" => "India (भारत)",
            "id" => "Indonesi ",
            "ir" => "Iran (ایران)",
            "iq" => "Iraq (العراق)",
            "ie" => "Ireland",
            "im" => "Isle of Man ",
            "il" => "Israel (ישראל)",
            "it" => "Italy (Italia)",
            "jm" => "Jamaica",
            "jp" => "Japan (日本)",
            "je" => "Jersey",
            "jo" => "Jordan (الأردن)",
            "kz" => "Kazakhstan (Казахстан)",
            "ke" => "Kenya",
            "ki" => "Kiribati",
            "xk" => "Kosovo (Kosovë)",
            "kw" => "Kuwait (الكويت)",
            "kg" => "Kyrgyzstan (Кыргызстан)",
            "la" => "Laos (ລາວ)",
            "lv" => "Latvia (Latvija)",
            "lb" => "Lebanon (لبنان)",
            "ls" => "Lesotho",
            "lr" => "Liberia",
            "ly" => "Libya (ليبيا)",
            "li" => "Liechtenstein",
            "lt" => "Lithuania (Lietuva)",
            "lu" => "Luxembourg",
            "mo" => "Macau (澳門)",
            "mk" => "Macedonia (FYROM) (Македонија)",
            "mg" => "Madagascar (Madagasikara)",
            "mw" => "Malawi",
            "my" => "Malaysia",
            "mv" => "Maldives",
            "ml" => "Mali",
            "mt" => "Malta",
            "mh" => "Marshall Islands",
            "mq" => "Martinique",
            "mr" => "Mauritania (موريتانيا)",
            "mu" => "Mauritius (Moris)",
            "yt" => "Mayotte",
            "mx" => "Mexico (México)",
            "fm" => "Micronesia",
            "md" => "Moldova (Republica Moldova)",
            "mc" => "Monaco",
            "mn" => "Mongolia (Монгол)",
            "me" => "Montenegro (Crna Gora)",
            "ms" => "Montserrat",
            "ma" => "Morocco",
            "mz" => "Mozambique (Moçambique)",
            "mm" => "Myanmar (Burma) (မြန်မာ)",
            "na" => "Namibia (Namibië)",
            "nr" => "Nauru",
            "np" => "Nepal (नेपाल)",
            "nl" => "Netherlands (Nederland)",
            "nc" => "New Caledonia (Nouvelle-Calédonie)",
            "nz" => "New Zealand",
            "ni" => "Nicaragua",
            "ne" => "Niger (Nijar)",
            "ng" => "Nigeria",
            "nu" => "Niue",
            "nf" => "Norfolk Island",
            "mp" => "Northern Mariana Islands",
            "kp" => "North Korea (조선민주주의인민공화국)",
            "no" => "Norway (Norge)",
            "om" => "Oman (عُمان)",
            "pk" => "Pakistan (پاکستان)",
            "pw" => "Palau",
            "ps" => "Palestine (فلسطين)",
            "pa" => "Panama (Panamá)",
            "pg" => "Papua New Guinea",
            "py" => "Paraguay",
            "pe" => "Peru (Perú)",
            "ph" => "Philippines",
            "pn" => "Pitcairn Islands",
            "pl" => "Poland (Polska)",
            "pt" => "Portugal",
            "pr" => "Puerto Rico",
            "qa" => "Qatar (قطر)",
            "re" => "Réunion (La Réunion)",
            "ro" => "Romania (România)",
            "ru" => "Russia (Россия ",
            "rw" => "Rwanda",
            "ws" => "Samoa",
            "sm" => "San Marino",
            "st" => "São Tomé & Príncipe (São Tomé e Príncipe)",
            "sa" => "Saudi Arabia (المملكة العربية السعودية)",
            "sn" => "Senegal",
            "rs" => "Serbia (Србија)",
            "sc" => "Seychelles",
            "sl" => "Sierra Leone",
            "sg" => "Singapore",
            "sx" => "Sint Maarten",
            "sk" => "Slovakia (Slovensko)",
            "si" => "Slovenia (Slovenija)",
            "sb" => "Solomon Islands",
            "so" => "Somalia (Soomaaliya)",
            "za" => "South Africa",
            "gs" => "South Georgia & South Sandwich Islands",
            "kr" => "South Korea (대한민국)",
            "ss" => "South Sudan (جنوب السودان)",
            "es" => "Spain (España)",
            "lk" => "Sri Lanka (ශ්‍රී ලංකාව)",
            "bl" => "St. Barthélemy (Saint-Barthélemy)",
            "sh" => "St. Helena",
            "kn" => "St. Kitts & Nevis",
            "lc" => "St. Lucia",
            "mf" => "St. Martin (Saint-Martin)",
            "pm" => "St. Pierre & Miquelon (Saint-Pierre-et-Miquelon)",
            "vc" => "St. Vincent & Grenadines",
            "sd" => "Sudan (السودان)",
            "sr" => "Suriname",
            "sj" => "Svalbard & Jan Mayen (Svalbard og Jan Mayen)",
            "sz" => "Swaziland",
            "se" => "Sweden (Sverige)",
            "ch" => "Switzerland (Schweiz)",
            "sy" => "Syria (سوريا)",
            "tw" => "Taiwan (台灣)",
            "tj" => "Tajikistan",
            "tz" => "Tanzania",
            "th" => "Thailand (ไทย)",
            "tl" => "Timor-Leste",
            "tg" => "Togo",
            "tk" => "Tokelau",
            "to" => "Tonga",
            "tt" => "Trinidad & Tobago",
            "ta" => "Tristan da Cunha",
            "tn" => "Tunisia",
            "tr" => "Turkey (Türkiye)",
            "tm" => "Turkmenistan",
            "tc" => "Turks & Caicos Islands",
            "tv" => "Tuvalu",
            "um" => "U.S. Outlying Islands",
            "vi" => "U.S. Virgin Islands",
            "ug" => "Uganda",
            "ua" => "Ukraine (Україна)",
            "ae" => "United Arab Emirates (الإمارات العربية المتحدة)",
            "gb" => "United Kingdom",
            "us" => "United States",
            "uy" => "Uruguay",
            "uz" => "Uzbekistan (Oʻzbekiston)",
            "vu" => "Vanuatu ",
            "va" => "Vatican City (Città del Vaticano)",
            "ve" => "Venezuela",
            "vn" => "Vietnam (Việt Nam)",
            "wf" => "Wallis & Futuna",
            "eh" => "Western Sahara (الصحراء الغربية)",
            "ye" => "Yemen (اليمن)",
            "zm" => "Zambia",
            "zw" => "Zimbabwe",
        ];
        if ($iso2 === null) {
            return $country_arr;
        }
        if (isset($country_arr[$iso2])) {
            return $country_arr[$iso2];
        } else {
            return $iso2;
        }
    }

    public function getUsersNames(){

        $oRole = Sentinel::findRoleBySlug('client');
        $role_id = $oRole->id;
        $oResult = User::select(['id','first_name','last_name'])->with('roles')->whereHas('roles', function ($query) use ($role_id) {
            $query->where('id', $role_id);
        })->get();
        $users=[];
        foreach($oResult as $result){
            $users[$result->id] = $result->first_name .' '.$result->last_name;
        }

        return $users;
    }


    public function getMt4AssignedUsers($login,$server_id){

        $oResults=User::with('mt4Users')->whereHas('mt4Users',function ($query) use($login,$server_id){

            $query->where('mt4_users_id',$login);
            $query->where('server_id',$server_id);
        })->paginate(Config::get('fxweb.pagination_size'));

        return $oResults;
    }
}
