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
use Illuminate\Support\Facades\Session;
use Illuminate\Html\FormFacade;
use Modules\Cms\Http\Requests\CreateLanguageRequest;
use Modules\Cms\Http\Requests\CreateMenuItemRequest;

class LanguagesController extends Controller
{
    /* __________________________________________________menus */

    public function getLanguages($selected_id = 0)
    {

    }

    public function getLanguagesList()
    {
        $languages = cms_languages::all();
        $asset_folder = Config::get('cms.asset_folder');
        return view("cms::languagesList", [
                'languages' => $languages,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function postLanguages()
    {


        if (null !== Input::get('delete_Language_submit')) {

            $removed_item = cms_languages::find(Input::get('delete_Language_submit'));

            $removed_item->delete();
            return Redirect::route("cms.languagesList");
        }
    }

    public function postInsertNewLanguage(CreateLanguageRequest $request)
    {
        $language = new cms_languages;
        $language->name = Input::get('new_language_name_input');
        $language->charset = Input::get('new_language_charset_input');
        $language->code = Input::get('new_language_code_input');
        $language->dir = Input::get('new_language_dir_input');
        $language->save();
        return Redirect::to('cms/languages/languages-list');
    }

    public function postSetLanguage()
    {
        Session::put('locale', Input::get('languses_select'));
        return Redirect::back();
    }
    public function getSetLanguage()
    {
        Session::put('locale', Input::get('languses_select'));
        return Redirect::back();
    }

    public function postGetLanguage()
    {
       // $language=(Session::get('locale') !=null)? Session::get('locale'):'en';
        $language = cms_languages::where('code',Session::get('locale'))->first();

        return ($language) ? $language : cms_languages::first();
    }

    //http://localhost:8000/cms/languages/languages-select-node
    public function getLanguagesSelectNode()
    {
        $form_html = FormFacade::open(['url' => '/cms/languages/set-language']);
        $form_html .= FormFacade::select('languses_select', cms_languages::lists('name', 'code'), @$this->postGetLanguage()->code, ['onchange' => 'this.parentNode.submit();']);
        $form_html .= FormFacade::close();
        return $form_html;
    }

    /* _______________________________________________END___menus */
}
