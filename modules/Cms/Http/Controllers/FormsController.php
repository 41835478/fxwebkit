<?php

namespace Modules\Cms\Http\Controllers;

use Modules\Cms\Entities\cms_forms;
use Modules\Cms\Entities\cms_forms_fields;
use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\cms_languages;
use Modules\Cms\Entities\cms_forms_languages;
use Modules\Cms\Entities\cms_menus_items;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Modules\Cms\Http\Requests\CreateEditForm;
use Illuminate\Support\Facades\Artisan;

class FormsController extends Controller
{
    /* _________________Forms Entities__and __migration______________articles */

    public function getForm($form_id = 0)
    {

        $pages = cms_pages::lists('title', 'id');
        $pages[0] = 'no page';

        $forms = cms_forms::lists('name', 'id');
        if ($form_id == 0) {
            $form_id = (Input::get('form_id') !== null) ? Input::get('form_id') : 0;
        }

        $fields=Input::get('fields');
        if($form_id != 0){
            $fields=cms_forms_fields::where('cms_forms_id',$form_id)->lists('name', 'type');
        }

        $languages = cms_languages::lists('name', 'id');
        $selected_language = (Input::get('selected_language') != null) ? Input::get('selected_language') : 1;


        $edit_form = '';
        if ($form_id > 0 && $selected_language == 1) {
            $edit_form = cms_forms::find($form_id);
        } else if ($form_id > 0 && $selected_language > 1) {
            $edit_form = cms_forms_languages::where(['cms_forms_id' => $form_id, 'cms_languages_id' => $selected_language])->first();
        }

        $asset_folder = Config::get('cms.asset_folder');

        $fieldTypes=[
            'string'=>'string',
//            'char'=>'char',
            'varchar'=>'varchar',
            'password'=>'password',
//            'password'=>'password',
//            'date'=> 'date',
//            'datetime'=> 'datetime',
            'time'=> 'time',
//            'timestamp' =>'timestamp',
            'text'=>'text',
//            'mediumtext'=> 'mediumtext',
//            'longtext'=>'longtext',
//            'json'=>'json',
//            'jsonb'=>'jsonb',
//            'binary'=>'binary',
//            'number'=>'number',
//            'integer'=>'integer',
//            'bigint' =>'bigint',
//            'mediumint' =>'mediumint',
//            'tinyint'=>'tinyint',
//            'smallint'=>'smallint',
            'boolean'=>'boolean',
//            'decimal'=> 'decimal',
//            'double' =>'double',
//            'float'=>'float'
        ];

        return view('cms::forms', [
                'pages' => $pages,
                'selected_id' => $form_id,
                'forms' => $forms,
                'edit_form' => $edit_form,
                'languages' => $languages,
                'selected_language' => $selected_language,
                'asset_folder' => $asset_folder,
                'fieldTypes'=>$fieldTypes,
                'fields'=>$fields
            ]
        );
    }

    public function postSaveFormTranslate()
    {
        $translate_title = Input::get('name');
        $selected_language = Input::get('selected_language');
        $id = Input::get('form_id');


        $translate = cms_forms_languages::where(['cms_languages_id' => $selected_language, 'cms_forms_id' => $id])->first();
        if ($translate) {
            $translate->name = $translate_title;
            $translate->save();
        } else {
            $translate = new cms_forms_languages;
            $translate->name = $translate_title;
            $translate->cms_languages_id = $selected_language;
            $translate->cms_forms_id = $id;
            $translate->save();
        }


        return $this->getForm($id);
    }

    public function getFormsList()
    {
        //  $selected_id = (Input::get('selected_id') !== null) ? Input::get('selected_id') : 1;
        $forms = cms_forms::all();
        $pages = cms_pages::lists('title', 'id');


        $asset_folder = Config::get('cms.asset_folder');


        $pages[0] = 'no page';
        return view("cms::formsList", ['forms' => $forms,
                'pages' => $pages,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function postForms()
    {
        if (null !== Input::get('new_form_submit')) {
            return $this->getForm();
        }
        if (null !== Input::get('edit_form_page')) {
            return $this->getForm(Input::get('edit_form_page'));
        }


        if (null !== Input::get('delete_form_submit')) {
            $form_id = Input::get('delete_form_submit');
            $menu_item = cms_menus_items::where(['type' => '1', 'page_id' => $form_id]);
            $menu_item->delete();
            $forms = cms_forms::find($form_id);

            $forms->delete();

            return Redirect::route('cms.formsList');
        }
        if (null !== Input::get('delete_groub_form_submit')) {
            $forms = Input::get('forms_checkbox');
            $forms_result = cms_forms::whereIn('id', $forms)->delete();
            $menu_item = cms_menus_items::where(['type' => '1'])->whereIn('page_id', $forms)->delete();
            return Redirect::route('cms.formsList');
        }

        if (null !== Input::get('change_groub_form_pages_submit')) {
            $forms = Input::get('forms_checkbox');
            $page = Input::get('pages_select');
            $forms_result = cms_forms::whereIn('id', $forms)->update(['page_id' => $page]);
            return Redirect::route('cms.formsList');
        }
        return $this->getForm();
    }

    public function postInsertEditForm(CreateEditForm $request)
    {


        if (null !== Input::get('insert_form_submit')) {
            $forms = new cms_forms;
        } else if (null !== Input::get('edit_form_submit')) {
            $forms = cms_forms::find(Input::get('edit_form_id'));
        }



        $forms->name  = preg_replace('/\s+/', '', Input::get('name'));
        $forms->page_id = Input::get('page_id');
        $forms->save();

        cms_forms_fields::where('cms_forms_id',$forms->id)->delete();

        $fields=$request->fields;

        if(count($fields)){
             $rows=[];
$commandFields=[];
        foreach($fields as $name=>$type){
        $rows[]=[
            'name'=>$name,
            'cms_forms_id'=>$forms->id,
            'type'=>$type

        ];
            $commandFields[]=' '.$name.':'.$type;
    }
    cms_forms_fields::insert($rows);

    Artisan::call('crud:generate', [
        'name' =>  $forms->name, '--fields' => implode(',',$commandFields)
    ]);

    Artisan::call('module:migrate',[]);

}
        return Redirect::to('/cms/forms/form/' . $forms->id);
    }

    /* ______________________________________________END__forms */

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
