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