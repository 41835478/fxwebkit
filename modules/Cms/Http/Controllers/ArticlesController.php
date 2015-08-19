<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\cms_articles;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;

class ArticlesController extends Controller {
    /* ________________________________________________articles */

    public function articles() {

        $pages = cms_pages::all();
        $articles = cms_articles::all(['id', 'title']);



        $article_id = (Input::get('article_id') !== null) ? Input::get('article_id') : 0;

        $edit_article = '';
        if ($article_id > 0) {
            $edit_article = cms_articles::find($article_id);
        }

        $asset_folder=Config::get('cms.asset_folder'); 
        return view('cms::articles', [
            'pages' => $pages,
            'selected_id' => $article_id,
            'articles' => $articles,
            'edit_article' => $edit_article,
            'asset_folder'=>$asset_folder,
            ]
                
                
        );
    }

    public function articles_php() {

        if (null !== Input::get('insert_article_submit')) {
            $articles = new cms_articles;
            $articles->title = Input::get('title');
            $articles->body = Input::get('editor1');
            $articles->page_id = Input::get('page_id');
            $articles->save();
        }

        if (null !== Input::get('edit_article_submit')) {
            $articles = cms_articles::find(Input::get('edit_article_id'));
            $articles->title = Input::get('title');
            $articles->body = Input::get('editor1');
            $articles->page_id = Input::get('page_id');
            $articles->save();
        }


        if (null !== Input::get('delete_article_submit')) {
            $articles = cms_articles::find(Input::get('edit_article_id'));
            $articles->delete();

            return Redirect::to('cms/articles');
        }
        return $this->articles();
    }
    /* ______________________________________________END__articles */

    /* _________________________________________upload_image */

    public function upload_image() {
        $file = Input::file('upload');
        $allowed_ext = ["png", "jpg", "jpeg", "gif", "bmp", "svg"];
        $fileExt = strtolower($file->getClientOriginalExtension());

        if (in_array($fileExt, $allowed_ext)) {
            $imageName = rand() . '_' . rand() . $file->getClientOriginalName();
            if ($file->move(Config::get('cms.asset_folder'). '/files/', $imageName)) {
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

    public function file_browser() {
        $funnum = Input::get('CKEditorFuncNum');
        $asset_folder=Config::get('cms.asset_folder');
        $files = File::allFiles($asset_folder. '/files/');
        return view('cms::file_browser', [
            'files' => $files,
            'funnum' => $funnum,
            'asset_folder'=>$asset_folder
                ]
        );
    }

    /* _____________________________________end__upload_image */
}
