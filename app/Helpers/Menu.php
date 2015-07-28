<?php namespace Fxweb\Helpers;

use Module, Config, Lang;

class Menu
{
	public function __construct()
	{
		//
	}

	public function getAdminMenu()
	{
		$oModules = Module::all();
		$aModules = [];
		if (count($oModules)) {
			foreach ($oModules as $sName => $oModule) {
				$sLowerName = strtolower($sName);
				$bIsAdmin = Config::get($sLowerName.'.is_admin');

				if ($bIsAdmin) {
					$sRoute = Config::get($sLowerName.'.route');
					$aSubMenus = Config::get($sLowerName.'.admin_menu', []);
					if (count($aSubMenus)) {
						foreach ($aSubMenus as &$aSubMenu) {
							$aSubMenu['title'] = Lang::get($sLowerName.'::'.$sLowerName.'.'.$aSubMenu['title']);
							if (empty($aSubMenu['route'])) {
								$aSubMenu['route'] = '#';
							} else {
								$aSubMenu['route'] = route($aSubMenu['route']);
							}
						}
					}

					if (empty($sRoute)) {
						$sRoute = '#';
					} else {
						$sRoute = route($sRoute);
					}

					$aModule = [
						'route' => $sRoute,
						'icon' => Config::get($sLowerName.'.icon'),
						'title' => Lang::get($sLowerName.'::'.$sLowerName.'.ModuleTitle'),
						'menu' => $aSubMenus,
					];
					$aModules[] = $aModule;
				}
			}
		}
		return $aModules;
	}
}