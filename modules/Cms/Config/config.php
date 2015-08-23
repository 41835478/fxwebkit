<?php

return [
	'is_admin' => 1,
	'is_client' => 0,
	'name' => 'cms',
	'icon' => 'fa fa-gears',
	'route' => '',
        'asset_folder'=>'cms_assets/',
        'admin_theme'=>'admin/layouts/main',//this theme contain section with name (content)
        'theme_folder'=>'theme1',//this folder should contain (theme.blade.php & theme_menu.blade.php)
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
		]
	]
];