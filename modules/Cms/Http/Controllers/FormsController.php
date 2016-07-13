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

use Illuminate\Database\QueryException;
use Schema;

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

        $fields = Input::get('fields');
        if ($form_id != 0) {
            $fields = cms_forms_fields::where('cms_forms_id', $form_id)->lists('type','name' );


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

        $fieldTypes = [
            'string' => 'string',
//            'char'=>'char',
            'varchar' => 'varchar',
            'password' => 'password',
//            'password'=>'password',
//            'date'=> 'date',
//            'datetime'=> 'datetime',
            'time' => 'time',
//            'timestamp' =>'timestamp',
            'text' => 'text',
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
            'boolean' => 'boolean',
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
                'fieldTypes' => $fieldTypes,
                'fields' => $fields
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
            $this->deleteForm($form_id);


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


        $forms->alias = Input::get('alias');

        $forms->name = 'cms_forms_' . preg_replace(['/\s+/', '/[^a-zA-Z]/'], ['', ''], $forms->alias);

        if ($forms->name == 'cms_forms_') {

            return Redirect::back()->withErrors('Please insert valid name for form');
        }

        $formExist = cms_forms::where('name', $forms->name)->first();
        if ($formExist) {

            return Redirect::back()->withErrors('this form is already exist,please select another name');
        }
        $forms->page_id = Input::get('page_id');
        $forms->save();

        cms_forms_fields::where('cms_forms_id', $forms->id)->delete();

        $fields = $request->fields;
        /*________________________________________*/
//
//$fieldsold=['user_id', 'title', 'gender', 'date_of_birth', 'fax', 'tel', 'office', 'nationality', 'id_number', 'postal_code', 'account_type', 'base_currency_limit', 'default_platform', 'referring_partner', 'fund_manager', 'sole_joint_account', 'marital_status', 'resident_status', 'street_and_number', 'city', 'main_phone', 'secondary_phone', 'primary_email', 'secondary_email', 'postal_street_and_number', 'postal_post_code', 'postal_city', 'postal_country', 'country', 'financial_instrument_portfolio', 'source_funds_deposited', 'other_source_funds_deposited', 'understand_risks', 'experience_cfd', 'experience_commodities', 'experience_forex', 'experience_futures', 'experience_options', 'experience_securities', 'number_of_years_cfd', 'number_of_years_commodities', 'number_of_years_forex', 'number_of_years_futures', 'number_of_years_options', 'number_of_years_securities', 'number_of_transactions_cfd', 'number_of_transactions_commodities', 'number_of_transactions_forex', 'number_of_transactions_futures', 'number_of_transactions_options', 'number_of_transactions_securities', 'average_trading_cfd', 'average_trading_commodities', 'average_trading_forex', 'average_trading_futures', 'average_trading_options', 'average_trading_securities', 'understand_market_cfd', 'understand_market_commodities', 'understand_market_forex', 'understand_market_futures', 'understand_market_options', 'understand_market_securities', 'understand_market_years_cfd', 'understand_market_years_commodities', 'understand_market_years_forex', 'understand_market_years_futures', 'understand_market_years_options', 'understand_market_years_securities', 'first_name_joint', 'second_name_joint', 'last_name_joint', 'account_type_joint', 'title_joint', 'gender_joint', 'date_of_birth_joint', 'fax_joint', 'nationality_joint', 'postal_code_joint', 'base_currency_limit_joint', 'default_platform_joint', 'referring_partner_joint', 'fund_manager_joint', 'sole_joint_account_joint', 'marital_status_joint', 'resident_status_joint', 'street_and_number_joint', 'city_joint', 'main_phone_joint', 'secondary_phone_joint', 'primary_email_joint', 'secondary_email_joint', 'postal_street_and_number_joint', 'postal_post_code_joint', 'postal_city_joint', 'postal_country_joint', 'country_joint', 'financial_instrument_portfolio_joint', 'source_funds_deposited_joint', 'other_source_funds_deposited_joint', 'understand_risks_joint', 'experience_cfd_joint', 'experience_commodities_joint', 'experience_forex_joint', 'experience_futures_joint', 'experience_options_joint', 'experience_securities_joint', 'number_of_years_cfd_joint', 'number_of_years_commodities_joint', 'number_of_years_forex_joint', 'number_of_years_futures_joint', 'number_of_years_options_joint', 'number_of_years_securities_joint', 'number_of_transactions_cfd_joint', 'number_of_transactions_commodities_joint', 'number_of_transactions_forex_joint', 'number_of_transactions_futures_joint', 'number_of_transactions_options_joint', 'number_of_transactions_securities_joint', 'average_trading_cfd_joint', 'average_trading_commodities_joint', 'average_trading_forex_joint', 'average_trading_futures_joint', 'average_trading_options_joint', 'average_trading_securities_joint', 'understand_market_cfd_joint', 'understand_market_commodities_joint', 'understand_market_forex_joint', 'understand_market_futures_joint', 'understand_market_options_joint', 'understand_market_securities_joint', 'understand_market_years_cfd_joint', 'understand_market_years_commodities_joint', 'understand_market_years_forex_joint', 'understand_market_years_futures_joint', 'understand_market_years_options_joint', 'understand_market_years_securities_joint', 'agreem_check_1', 'agreem_check_2', 'agreem_check_3', 'agreem_check_4', 'agreem_check_5', 'agreem_check_6', 'agreem_check_7', 'agreem_check_8', 'agreem_check_9', 'agreem_check_10', 'agreem_check_11', 'agreem_check_12', 'joint_first_date', 'joint_first_fullname', 'joint_first_title', 'joint_second_date', 'joint_second_fullname', 'joint_second_title', 'document_id', 'document_id2', 'document_por', 'id_type', 'proof_of_residence'];
//        $fields=[];
//        foreach($fieldsold as $field){
//            $fields[$field]='string';
//}
        /*___________________________________________*/
        if (count($fields)) {
            $rows = [];
            $commandFields = [];
            foreach ($fields as $name => $type) {

                // $name  = preg_replace(['/\s+/','/[^a-zA-Z]/'],['',''] ,$name);
                $name = preg_replace(['/\s+/'], [''], $name);
                if ($name == '' || $type == '') {

                    return Redirect::back()->withErrors('Field name not valid , please select anothe name.');
                }
                $rows[] = [
                    'name' => $name,
                    'cms_forms_id' => $forms->id,
                    'type' => $type

                ];
                $commandFields[] = ' ' . $name . ':' . $type;
            }
            cms_forms_fields::insert($rows);

            Artisan::call('crud:generate', [
                'alias' => $forms->alias,
                'name' => $forms->name,
                '--fields' => implode(',', $commandFields)
            ]);

            Artisan::call('module:migrate', []);

        }
        return Redirect::to('/cms/forms/form/' . $forms->id);
    }

    /* ______________________________________________END__forms */

    function deleteForm($form_id)
    {
        $form = cms_forms::find($form_id);
        $formName = $form->name;
        $viewsPath = base_path('modules/Cms/Resources/views/forms/' . $formName);
        $controllerPath = base_path('modules/Cms/Http/Controllers/forms/' . $formName . 'Controller.php');
        $modelPath = base_path('modules/Cms/Entities/forms/' . $formName . '.php');
        $migrationPath = base_path('modules/Cms/Database/Migrations/*create_' . $formName . 's_table.php');


        foreach (glob($migrationPath) as $filename) {
            @unlink($filename);
        }
        @unlink($modelPath);
        @unlink($controllerPath);

        foreach (glob($viewsPath . '/*.*') as $filename) {

            @unlink($filename);
        }
        @rmdir($viewsPath);


        cms_menus_items::where(['type' => 2, 'page_id' => $form_id])->delete();
        cms_forms_fields::where('cms_forms_id', $form_id)->delete();
        $form->delete();
        try {
            @Schema::drop($formName . 's');
        } catch (QueryException $e) {
        }
    }


    public function postUploadImage()
    {//http://localhost:8000/cms/forms/upload-image.'?_token='. csrf_token()

        $file = Input::file('upload');
        $allowed_ext = ["png", "jpg", "jpeg", "gif", "bmp", "svg","pdf","docx"];
        if($file == null){ echo 'error|no file'; exit();}
        $fileExt = strtolower($file->getClientOriginalExtension());

        if (in_array($fileExt, $allowed_ext)) {
            $imageName = rand() . '_' . rand() . $file->getClientOriginalName();
            if ($file->move(Config::get('cms.asset_folder') . 'upload/', $imageName)) {
                echo 'success|'.'upload/'. $imageName;
            }//uploaded successfully
            else {
                echo 'error|error';
            }//error uploaded
        } //allowed extinsions
        else {
            echo 'error|notAllowed';
        }//not allowed file extintion
        exit();
    }
}
