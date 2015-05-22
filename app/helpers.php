<?php
/*
 * Global helpers file with misc functions
 */
if (! function_exists('app_name')) {
	/**
	 * Grabs the application name
	 *
	 * @return string
	 */
	function app_name() {
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
	function theme_attr()
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

		return $str;
	}
}