<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Modules\Cms\Entities\CmsMenus;
/* dinamic *
  use Modules\Module1\Http\Controllers\Module1Controller;
  use Modules\Blog\Http\Controllers\BlogController;
  use Modules\cms\Http\Controllers\MenusController;
  /* End dinamic */

class ModulesListController extends Controller {

    public function index($module_info, $variable = '') {



        if (isset($module_info['type']) && $module_info['type'] == 'files') {
            if ($variable =='') return '';
            return view("cms::" . $module_info['folder'] . '/' . $variable);
        } else if (isset($module_info['type']) && $module_info['type'] == 'database') {
            
            $results = DB::select('select ' . $module_info['html_field'] . ' from ' . $module_info['table'] . ' where id = ?', [$variable]);
            
            if(count($results)){
            return $results[0]->$module_info['html_field'];
            }else{return '';}
        } else {
            if(!isset($module_info['class_name'])) return '';
         
          try{  return eval('$module1 = @new ' . $module_info['class_name'] . ';RETURN @$module1->' . $module_info['class_method'] . '(' . $variable . ');');}catch(\Exception $e){return"";}
            
        }
    }

    
    public function getPageModulesName($module_type, $variable = '') {

            switch ($module_type) {

                case -1:
                    $menu = CmsMenus::find($variable);
                    if ($menu) {
                         return 'menu ( ' . $menu->title . ' ) ';
                    }else{return '';}
                    break;

                case -2:
                    return 'main article place';
                    break;
            }

$module_info=$this->modules_list($module_type);
        if (isset($module_info['type']) && $module_info['type'] == 'files') {
            return $module_info['name'].' ( '. $variable.' ) ';
            
        } else if (isset($module_info['type']) && $module_info['type'] == 'database') {
            
            $results = DB::select('select ' . $module_info['title_field'] . ' from ' . $module_info['table'] . ' where id = ?', [$variable]);
            
            if(count($results)){
            return $module_info['name'].' ( '.$results[0]->$module_info['title_field'].' ) ';
            }else{return '';}
        } else {
            return (!isset($module_info['class_name']))?  '':$module_info['name'];    
        }
    }


    public function modules_list($module_index=null) {
        $modules_list= [
           
//            ['name' => 'blog',
//                'class_name' => 'Modules\Blog\Http\Controllers\BlogController',
//                'class_method' => 'index'
//            ],
            ['name' => 'static_html',
                'class_name' => '$this',
                'class_method' => 'static_html'
            ],
            ['name' => 'files',
                "type" => 'files',
                "folder" => 'modules_view'
            ],
            ['name' => 'articles',
                "type" => 'database',
                "table" => 'cms_articles',
                "title_field" => 'title',
                "html_field" => 'body'
            ],
            ['name' => 'customHtml',
                "type" => 'database',
                "table" => 'cms_customHtml',
                "title_field" => 'title',
                "html_field" => 'body'
            ]
        ];
        
        if($module_index > -1){
            return $modules_list[$module_index];
        }else{
            return $modules_list;
            
        }
    }

    public function static_html() {
        return 7;
    }


    public function getModuleOptions($id = 0) {


        $id = Input::get('module_id');


            switch ($module_type) {

                case -1:
                    $menu = CmsMenus::find($variable);
                    if ($menu) {
                         return 'menu ( ' . $menu->name . ' ) ';
                    }
                    break;

                case -2:
                    return 'main article place';
                    break;
            }
        $module_list = $this->modules_list();
        $module = $module_list[$id];
        if (isset($module['type']) && $module['type'] == 'files') {
            $files = File::allFiles(Config::get('cms.asset_folder') . $module['folder']);
            $options_html = '';
            foreach ($files as $file) {
                $base_name = basename($file);
                $name_array = explode('.', $base_name);
                $options_html.='<option value="' . $name_array[0] . '">' . $name_array[0] . '</option>';
            }
            return $options_html;
        } else if (isset($module['type']) && $module['type'] == 'database') {

            $results = DB::select('select id,' . $module['title_field'] . ' from ' . $module['table'] . ' ', []);
            $options_html = '';
            foreach ($results as $result) {
                $options_html.='<option value="' . $result->id . '">' . $result->title . '</option>';
            }
            return $options_html;
        }
    }
  public function getModuleOptionsList($id = 0) {


        $id = Input::get('module_id');


        $module_list = $this->modules_list();
        $results = [];
        if ($id == -1) {
            $menus = DB::select('select id,title from cms_menus ', []);
            if($menus){
            foreach($menus as $menu){
                                array_push($results, ['id'=>$menu->id,'title'=>$menu->title]);
                                
            }
            }
        } else{
        
        
        $module = $module_list[$id];
        if (isset($module['type']) && $module['type'] == 'files') {
            $files = File::allFiles(Config::get('cms.asset_folder') . $module['folder']);

            foreach ($files as $file) {
                $base_name = basename($file);
                $name_array = explode('.', $base_name);
                array_push($results, ['id' => $name_array[0], 'title' => $name_array[0]]);
            }
        } else if (isset($module['type']) && $module['type'] == 'database') {

            $query_result = DB::select('select id,' . $module['title_field'] . ' from ' . $module['table'] . ' ', []);
            
          if($query_result){
            foreach($query_result as $result){
                                array_push($results, ['id'=>$result->id,'title'=>$result->title]);
                                
            }
            }
        }
        }

        $options_html = '';
    foreach($results as $result){
        $options_html.='<div id="' . $id . '" content_id="0" float="0" all_pages="0" selected_pages="" class="dragable sub_module_list_button"  value="' . $result['id'] . '" draggable="true">' . $result['title'] . '</div>';
    }
        return $options_html;
    }

// get_module_options($id){
      public function getModuleOptionsList2($id = 0) {


        $id = Input::get('module_id');


        $module_list = $this->modules_list();
        $results = [];
        if ($id == -1) {
            $menus = DB::select('select id,title from cms_menus ', []);
            if($menus){
            foreach($menus as $menu){
                                array_push($results, ['id'=>$menu->id,'title'=>$menu->title]);
                                
            }
            }
        } else{
        
        
        $module = $module_list[$id];
        if (isset($module['type']) && $module['type'] == 'files') {
            $files = File::allFiles(Config::get('cms.asset_folder') . $module['folder']);

            foreach ($files as $file) {
                $base_name = basename($file);
                $name_array = explode('.', $base_name);
                array_push($results, ['id' => $name_array[0], 'title' => $name_array[0]]);
            }
        } else if (isset($module['type']) && $module['type'] == 'database') {

            $query_result = DB::select('select id,' . $module['title_field'] . ' from ' . $module['table'] . ' ', []);
            
          if($query_result){
            foreach($query_result as $result){
                                array_push($results, ['id'=>$result->id,'title'=>$result->title]);
                                
            }
            }
        }
        }

        $options_html = '';
    foreach($results as $result){
        $options_html.='<option  value="' . $result['id'] . '" >' . $result['title'] . '</option>';
    }
        return $options_html;
    }

// get_module_options($id){
}
