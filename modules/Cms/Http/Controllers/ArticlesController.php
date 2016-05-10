<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\cms_articles;
use Modules\Cms\Entities\cms_languages;
use Modules\Cms\Entities\cms_articles_languages;
use Modules\Cms\Entities\cms_menus_items;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Modules\Cms\Http\Requests\CreateEditArticle;

class ArticlesController extends Controller
{
    /* ________________________________________________articles */

    public function getArticle($artilce_id = 0)
    {

        $pages = cms_pages::lists('title', 'id');
        $pages[0] = 'no page';

        $articles = cms_articles::lists('title', 'id');
        if ($artilce_id == 0) {
            $artilce_id = (Input::get('article_id') !== null) ? Input::get('article_id') : 0;
        }

        $languages = cms_languages::lists('name', 'id');
        $selected_language = (Input::get('selected_language') != null) ? Input::get('selected_language') : 1;


        $edit_article = '';
        if ($artilce_id > 0 && $selected_language == 1) {
            $edit_article = cms_articles::find($artilce_id);
        } else if ($artilce_id > 0 && $selected_language > 1) {
            $edit_article = cms_articles_languages::where(['cms_articles_id' => $artilce_id, 'cms_languages_id' => $selected_language])->first();
        }

        $asset_folder = Config::get('cms.asset_folder');
        return view('cms::articles', [
                'pages' => $pages,
                'selected_id' => $artilce_id,
                'articles' => $articles,
                'edit_article' => $edit_article,
                'languages' => $languages,
                'selected_language' => $selected_language,
                'asset_folder' => $asset_folder,
            ]
        );
    }

    public function postSaveArticleTranslate()
    {
        $translate_title = Input::get('title');
        $translate_body = Input::get('editor1');
        $selected_language = Input::get('selected_language');
        $id = Input::get('article_id');


        $translate = cms_articles_languages::where(['cms_languages_id' => $selected_language, 'cms_articles_id' => $id])->first();
        if ($translate) {
            $translate->title = $translate_title;
            $translate->body = $translate_body;
            $translate->save();
        } else {
            $translate = new cms_articles_languages;
            $translate->title = $translate_title;
            $translate->body = $translate_body;
            $translate->cms_languages_id = $selected_language;
            $translate->cms_articles_id = $id;
            $translate->save();
        }


        return $this->getArticle($id);
    }

    public function getArticlesList()
    {
        //  $selected_id = (Input::get('selected_id') !== null) ? Input::get('selected_id') : 1;
        $articles = cms_articles::all();
        $pages = cms_pages::lists('title', 'id');


        $asset_folder = Config::get('cms.asset_folder');


        $pages[0] = 'no page';
        return view("cms::articlesList", ['articles' => $articles,
                'pages' => $pages,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function postArticles()
    {
        if (null !== Input::get('new_article_submit')) {
            return $this->getArticle();
        }
        if (null !== Input::get('edit_article_page')) {
            return $this->getArticle(Input::get('edit_article_page'));
        }


        if (null !== Input::get('delete_article_submit')) {
            $article_id = Input::get('delete_article_submit');
            $menu_item = cms_menus_items::where(['type' => '1', 'page_id' => $article_id]);
            $menu_item->delete();
            $articles = cms_articles::find($article_id);

            $articles->delete();

            return Redirect::route('cms.articlesList');
        }
        if (null !== Input::get('delete_groub_article_submit')) {
            $articles = Input::get('articles_checkbox');
            $articles_result = cms_articles::whereIn('id', $articles)->delete();
            $menu_item = cms_menus_items::where(['type' => '1'])->whereIn('page_id', $articles)->delete();
            return Redirect::route('cms.articlesList');
        }

        if (null !== Input::get('change_groub_article_pages_submit')) {
            $articles = Input::get('articles_checkbox');
            $page = Input::get('pages_select');
            $articles_result = cms_articles::whereIn('id', $articles)->update(['page_id' => $page]);
            return Redirect::route('cms.articlesList');
        }
        return $this->getArticle();
    }

    public function postInsertEditArticle(CreateEditArticle $request)
    {


        if (null !== Input::get('insert_article_submit')) {
            $articles = new cms_articles;
        } else if (null !== Input::get('edit_article_submit')) {
            $articles = cms_articles::find(Input::get('edit_article_id'));
        }

        $articles->title = Input::get('title');
        $articles->body = Input::get('editor1');
        $articles->page_id = Input::get('page_id');
        $articles->save();

        return Redirect::to('/cms/articles/article/' . $articles->id);
    }

    /* ______________________________________________END__articles */

    /* _________________________________________upload_image */

    public function postUploadImage()
    {
        $file = Input::file('upload');
        $allowed_ext = ["png", "jpg", "jpeg", "gif", "bmp", "svg"];
        $fileExt = strtolower($file->getClientOriginalExtension());

        if (in_array($fileExt, $allowed_ext)) {
            $imageName = rand() . '_' . rand() . $file->getClientOriginalName();
            if ($file->move(Config::get('cms.asset_folder') . '/files/', $imageName)) {
                return 'the image was uploaded successfully .';
            }//uploaded successfully
            else {
                return 'error, not uploaded ...';
            }//error uploaded
        } //allowed extinsions 
        else {
            return 'this file extension not allowed';
        }//not allowed file extintion
    }

//function upload_image() 

    public function getFileBrowser()
    {
        $funnum = Input::get('CKEditorFuncNum');
        $asset_folder = Config::get('cms.asset_folder');
        $files = File::allFiles($asset_folder . '/files/');
        return view('cms::file_browser', [
                'files' => $files,
                'funnum' => $funnum,
                'asset_folder' => $asset_folder
            ]
        );
    }

    /* _____________________________________end__upload_image */
}
