<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\CmsMenus;
use Modules\Cms\Entities\cms_menus_items;
use Modules\Cms\Entities\cms_articles;
use Modules\Cms\Entities\cms_languages;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

use Modules\Cms\Http\Requests\CreateLanguageRequest;
use Modules\Cms\Http\Requests\CreateMenuItemRequest;
class LanguagesController extends Controller {
    /* __________________________________________________menus */

    public function getLanguages($selected_id = 0) {

    }

    public function getLanguagesList() {
        $languages = cms_languages::lists('name', 'id');
        $asset_folder = Config::get('cms.asset_folder');
        return view("cms::languagesList", [
            'languages' => $languages,
            'asset_folder' => $asset_folder
                ]
        );
    }

    public function postLanguages() {



        if (null !== Input::get('delete_Language_submit')) {

            $removed_item = cms_languages::find(Input::get('delete_Language_submit'));

            $removed_item->delete();
            return Redirect::route("cms.languagesList");
        }
        
    }

    public function postInsertNewLanguage(CreateLanguageRequest $request) {
        $language = new cms_languages;
        $language->name = Input::get('new_language_name_input');
        $language->save();
        return Redirect::to('cms/languages/languages-list');
    }

    
    

    /* _______________________________________________END___menus */
}
