<?php
use Fxweb\Helpers\User;
use Fxweb\Helpers\Menu;
use Illuminate\Routing\UrlGenerator;
/*
 * Global helpers file with misc functions
 */
if (! function_exists('app_name')) {
	/**
	 * Grabs the application name
	 *
	 * @return string
	 */
	function app_name()
	{
		return config('fxweb.app_name');
	}
}

if (!function_exists('admin_roles')) {
	/**
	 * Grabs the admin role names
	 *
	 * @return array
	 */
	function admin_roles()
	{
		return explode(',', config('fxweb.admin_roles'));
	}
}

if (!function_exists('theme_attr')) {
	/**
	 * Grabs the portal theme attr
	 *
	 * @return string
	 */
	function theme_attr($bAttrCheck=true)
	{
		$str = '';
                
		/* Get The theme color */
		$str .= ' theme-' . config('fxweb.theme.color');

		/* Get The theme direction */
		/*
		if (is_rtl()) {
			$str .= ' right-to-left main-menu-right';
		}
		*/

		if ($bAttrCheck) {
			/* Is Fixed Navbar */
			if (config('fxweb.theme.navbarFixed', false)) {
				$str .= ' main-navbar-fixed';
			}

			/* Is Fixed Menu */
			if (config('fxweb.theme.menuFixed', false)) {
				$str .= ' main-menu-fixed';
			}

			/* Is Animated Menu */
			if (config('fxweb.theme.menuAnimated', false)) {
				$str .= ' main-menu-animated';
			}
		}
		return $str;
	}
}

if (!function_exists('current_user')) {
	function current_user()
	{
		$oUser = new User();
		return $oUser;
	}
}

if (!function_exists('get_admin_menu')) {
	function get_admin_menu()
	{
		$oMenu = new Menu(env('ADMIN_NAME'));
		return $oMenu->getAdminMenu();
	}
}

if (!function_exists('get_client_menu')) {
	function get_client_menu()
	{
		$oMenu = new Menu(env('CLIENT_NAME'));
		return $oMenu->getClientMenu();
	}
}

if (!function_exists('th_sort')) {
	function th_sort($sText, $sCol, $oResult)
	{
		if (is_null($oResult) || $oResult->isEmpty()) {
			return '<a href="#">'.$sText.'</a>';
		}

		$sRouteName = Route::currentRouteName();
                               
		$aParams = Input::get();
		$sUrl =($sRouteName ==null)? '': route($sRouteName);
		$aArrow = '';

			$sUrl .= '?';
		if (count($aParams)) {
			foreach ($aParams as $sKey => $sValue) {
				if (!in_array($sKey, ['order', 'sort'])) {
                                    if(!is_array($sValue)){
					$sUrl .= $sKey.'='.$sValue.'&';
                                    }else{
                                        $sUrl .= $sKey.'='.implode(',',$sValue).'&';
                                    }
				}
			}

		}

			$sUrl .= 'order='.$sCol;

			if (isset($aParams['order']) && $aParams['order'] == $sCol) {
				if ($aParams['sort'] == 'ASC') {
					$sSort = 'DESC';
					$aArrow = ' <i class="fa fa-chevron-down"></i>';
				} else {
					$sSort = 'ASC';
					$aArrow = ' <i class="fa fa-chevron-up"></i>';
				}
			} else {
				$sSort = 'desc';
			}

			$sUrl .= '&sort='.$sSort;
		return '<a href="'.$sUrl.'">'.$sText.$aArrow.'</a>';
	}
}



if (!function_exists('getGeoipCountry')) {
	function getGeoipCountry(){

$ip=getIpFromServer();

		$aCountry=["AX"=>"Åland Islands","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory","VG"=>"British Virgin Islands","BN"=>"Brunei","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","CV"=>"Cape Verde","KY"=>"Cayman Islands","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos [Keeling] Islands","CO"=>"Colombia","KM"=>"Comoros","CK"=>"Cook Islands","CR"=>"Costa Rica","HR"=>"Croatia","CY"=>"Cyprus","CZ"=>"Czech Republic","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","EE"=>"Estonia","ET"=>"Ethiopia","QU"=>"European Union","FK"=>"Falkland Islands","FO"=>"Faroe Islands","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories","GA"=>"Gabon","GM"=>"Gambia","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GY"=>"Guyana","HM"=>"Heard Island and McDonald Islands","HN"=>"Honduras","HK"=>"Hong Kong SAR China","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Laos","LV"=>"Latvia","LS"=>"Lesotho","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macau SAR China","MK"=>"Macedonia","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia","MD"=>"Moldova","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands","AN"=>"Netherlands Antilles","NC"=>"New Caledonia","NI"=>"Nicaragua","NE"=>"Niger","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands","NO"=>"Norway","OM"=>"Oman","QO"=>"Outlying Oceania","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestinian Territories","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines","PN"=>"Pitcairn Islands","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","RE"=>"Réunion","RO"=>"Romania","RU"=>"Russia","RW"=>"Rwanda","BL"=>"Saint Barthélemy","SH"=>"Saint Helena","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"São Tomé and Príncipe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","CS"=>"Serbia and Montenegro","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","KR"=>"South Korea","ES"=>"Spain","LK"=>"Sri Lanka","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SZ"=>"Swaziland","SE"=>"Sweden","CH"=>"Switzerland","TW"=>"Taiwan","TJ"=>"Tajikistan","TZ"=>"Tanzania","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands","TV"=>"Tuvalu","UM"=>"U.S. Minor Outlying Islands","VI"=>"U.S. Virgin Islands","UG"=>"Uganda","AE"=>"United Arab Emirates","GB"=>"United Kingdom","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VA"=>"Vatican City","VE"=>"Venezuela","VN"=>"Vietnam","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","ZM"=>"Zambia"];

		$con = curl_init();

			curl_setopt($con,CURLOPT_URL,'ipinfo.io/'.$ip);
			curl_setopt($con,CURLOPT_POST,false);

			curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($con, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($con, CURLOPT_TIMEOUT, 5);
			$locationInfo=curl_exec($con);

			$status=curl_getinfo($con,CURLINFO_HTTP_CODE);
			if($status ==200){
				$locationInfo=json_decode($locationInfo);
				if(array_key_exists('country',$locationInfo)){
					$country=$locationInfo->country;
					$iso2=(!empty($country))? strtoupper($country):'GB';
					$country=( array_key_exists($iso2,$aCountry))? $aCountry[$iso2]:'United Kingdom';

					curl_close($con);
					return [$iso2,$country];
//					$hostname=$locationInfo->hostname;
//					$city=$locationInfo->city;
//					$region=$locationInfo->region;
//					$loc=$locationInfo->loc;
//					$org=$locationInfo->org;
//					$locArray=explode(',',$loc);
//
//					$longitude=$locArray[0];
//					$latitude=$locArray[1];
//					$data=[
//						'infoProvider'=>'ipInfo',
//						'ip'=>$ip,
//						'countryIos2'=>$country,
//						'countryName'=>'',
//						'city'=>$city,
//						'cityShortName'=>'',
//						'longitude'=>$longitude,
//						'latitude'=>$latitude,
//						'address'=>'',
//						'street'=>'',
//						'region'=>$region,
//						'org'=>$org,
//						'hostname'=>$hostname,
//					];
//
//
//					return $data;
				}

			}



		return ['GB','United Kingdom'];

	}





	 function getIpFromServer()
	{
		foreach (array('HTTP_CLIENT_IP',
					 'HTTP_X_FORWARDED_FOR',
					 'HTTP_X_FORWARDED',
					 'HTTP_X_CLUSTER_CLIENT_IP',
					 'HTTP_FORWARDED_FOR',
					 'HTTP_FORWARDED',
					 'REMOTE_ADDR') as $key){
			if (array_key_exists($key, $_SERVER) === true){
				foreach (explode(',', $_SERVER[$key]) as $IPaddress){
					$IPaddress = trim($IPaddress); // Just to be safe

					if (filter_var($IPaddress,
							FILTER_VALIDATE_IP,
							FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
						!== false) {

						return $IPaddress;
					}
				}
			}
		}
		return false;
	}




}


if (!function_exists('hasMtUser')) {
	function hasMtUser($login,$server_id){

		$exist= Modules\Accounts\Entities\mt4_users_users::where([
                'users_id'=>current_user()->getUser()->id,
                'mt4_users_id'=>$login,
                'server_id'=>$server_id
            ])->first();
           if($exist){

			  return true;

		   }
		return false;

	}
}