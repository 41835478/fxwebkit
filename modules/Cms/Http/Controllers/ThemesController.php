<?php namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\Config;
class ThemesController extends Controller {
	
	public function index()
	{
	}
	
        public function getThemesList(){
            
            
        $asset_folder = Config::get('cms.asset_folder');
		return view('cms::themes',[
                    'asset_folder'=>$asset_folder,
                ]);
        }
}