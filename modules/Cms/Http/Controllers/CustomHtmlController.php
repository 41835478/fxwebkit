<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\cms_customHtml;
use Modules\Cms\Entities\cms_languages;
use Modules\Cms\Entities\cms_customHtml_languages;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Modules\Cms\Http\Requests\CreateCustomHtmlRequest;

class CustomHtmlController extends Controller
{
    /* ________________________________________________articles */

    public function getCustomHtml($customHtml_id = 0)
    {

        $pages = cms_pages::lists('title', 'id');
        $customHtmls = cms_customHtml::lists('title', 'id');
        if ($customHtml_id == 0) {
            $customHtml_id = (Input::get('customHtml_id') !== null) ? Input::get('customHtml_id') : 0;
        }


        $languages = cms_languages::lists('name', 'id');
        $selected_language = (Input::get('selected_language') != null) ? Input::get('selected_language') : 1;


        $edit_customHtml = '';
        if ($customHtml_id > 0 && $selected_language == 1) {

            $edit_customHtml = cms_customHtml::find($customHtml_id);

        } else if ($customHtml_id > 0 && $selected_language > 1) {

            $edit_customHtml = cms_customHtml_languages::where(['cms_customHtml_id' => $customHtml_id, 'cms_languages_id' => $selected_language])->first();
        }

        $asset_folder = Config::get('cms.asset_folder');
        return view('cms::customHtml', [
                'selected_id' => $customHtml_id,
                'customHtmls' => $customHtmls,
                'edit_customHtml' => $edit_customHtml,
                'languages' => $languages,
                'selected_language' => $selected_language,
                'asset_folder' => $asset_folder,
            ]
        );
    }

    public function postSaveCustomHtmlTranslate()
    {
        $translate_title = Input::get('title');
        $translate_body = Input::get('editor1');
        $selected_language = Input::get('selected_language');
        $id = Input::get('customHtml_id');


        $translate = cms_customHtml_languages::where(['cms_languages_id' => $selected_language, 'cms_customHtml_id' => $id])->first();
        if ($translate) {
            $translate->title = $translate_title;
            $translate->body = $translate_body;
            $translate->save();
        } else {
            $translate = new cms_customHtml_languages;
            $translate->title = $translate_title;
            $translate->body = $translate_body;
            $translate->cms_languages_id = $selected_language;
            $translate->cms_customHtml_id = $id;
            $translate->save();
        }


        return $this->getCustomHtml($id);
    }

    public function getCustomHtmlList()
    {
        //  $selected_id = (Input::get('selected_id') !== null) ? Input::get('selected_id') : 1;
        $customHtmls = cms_customHtml::lists('title', 'id');

        $asset_folder = Config::get('cms.asset_folder');

        return view("cms::customHtmlList", ['customHtmls' => $customHtmls,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function postCustomHtml()
    {
        if (null !== Input::get('new_customHtml_submit')) {
            return $this->getCustomHtml();
        }
        if (null !== Input::get('edit_customHtml_page')) {
            return $this->getCustomHtml(Input::get('edit_customHtml_page'));
        }


        if (null !== Input::get('delete_customHtml_submit')) {
            $articles = cms_customHtml::find(Input::get('delete_customHtml_submit'));
            $articles->delete();

            return Redirect::route('cms.customHtmlList');
        }
        return $this->getCustomHtml();
    }

    public function postInsertEditCustomHtml(CreateCustomHtmlRequest $request)
    {


        if (null !== Input::get('insert_customHtml_submit')) {
            $html = new cms_customHtml;
        } else if (null !== Input::get('edit_customHtml_submit')) {
            $html = cms_customHtml::find(Input::get('edit_customHtml_id'));
        }

        $html->title = Input::get('title');
        $html->body = Input::get('editor1');
        $html->save();

        return Redirect::to('/cms/customHtml/custom-html/' . $html->id);
    }

    /* ______________________________________________END__articles */
}
