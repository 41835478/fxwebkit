<?php

return [
	'is_admin' => 1,
	'is_client' => 0,
	'name' => 'cms',
	'icon' => 'fa fa-gears',
	'route' => '',
        'asset_folder'=>'cms_assets/',
        'admin_theme'=>'admin/layouts/main',//this theme contain section with name (content)
        'theme_folder'=>'porto',//this folder should contain (theme.blade.php & theme_menu.blade.php $ theme setting xml)
	'admin_menu' => [
		[
			'route' => 'cms.pagesList',
			'title' => 'pages',
			'icon' => 'fa fa-file-o',
		],
		[
			'route' => 'cms.menusList',
			'title' => 'menus',
			'icon' => 'fa fa-list',
		],
		[
			'route' => 'cms.articlesList',
			'title' => 'articles',
			'icon' => 'fa fa-file-text-o',
		],
		[
			'route' => 'cms.customHtmlList',
			'title' => 'customHtml',
			'icon' => 'fa fa-code',
		],
		[
			'route' => 'cms.themesList',
			'title' => 'themes',
			'icon' => 'fa fa-picture-o',
		],
		[
			'route' => 'cms.languagesList',
			'title' => 'languages',
			'icon' => 'fa fa-globe',
		]
	]
];