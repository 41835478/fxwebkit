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

class ModulesListController extends Controller
{

    public function index($module_info, $variable = '', $language = 0)
    {


        if (isset($module_info['type']) && $module_info['type'] == 'files') {
            if ($variable == '')
                return '';
            return view("cms::" . $module_info['folder'] . '/' . $variable);
        } else if (isset($module_info['type']) && $module_info['type'] == 'database') {

            $results = DB::select('select ' . $module_info['html_field'] . ' from ' . $module_info['table'] . ' where id = ?', [$variable]);
            $translate_results = 0;
            if ($language > 0 && isset($module_info['languages']) && $module_info['languages'] == 'multi') {
                $translate_results = DB::select('select ' . $module_info['html_field'] . ' from ' . $module_info['table'] . '_languages where ' . $module_info['table'] . '_id= ? and cms_languages_id= ?', [$variable, $language]);

            }

            $original = (count($results)) ? $results[0]->{$module_info['html_field']} : '';
            $translate = ($translate_results !== 0 && count($translate_results)) ? $translate_results[0]->{$module_info['html_field'] }: '';
            return ($translate !== '') ? $translate : $original;
        } else {
            if (!isset($module_info['class_name']))
                return '';

            try {
                return eval('$module1 = @new ' . $module_info['class_name'] . ';RETURN @$module1->' . $module_info['class_method'] . '(' . $variable . ');');
            } catch (\Exception $e) {
                return "";
            }
        }
    }

    public function getPageModulesName($module_type, $variable = '')
    {

        switch ($module_type) {

            case -1:
                $menu = CmsMenus::find($variable);
                if ($menu) {
                    return 'menu ( ' . $menu->title . ' ) ';
                } else {
                    return '';
                }
                break;

            case -2:
                return 'main article place';
                break;
        }

        $module_info = $this->modules_list($module_type);
        if (isset($module_info['type']) && $module_info['type'] == 'files') {
            return $module_info['name'] . ' ( ' . $variable . ' ) ';
        } else if (isset($module_info['type']) && $module_info['type'] == 'database') {

            $results = DB::select('select ' . $module_info['title_field'] . ' from ' . $module_info['table'] . ' where id = ?', [$variable]);

            if (count($results)) {
                return $module_info['name'] . ' ( ' . $results[0]->{$module_info['title_field']} . ' ) ';
            } else {
                return '';
            }
        } else {
            return (!isset($module_info['class_name'])) ? '' : $module_info['name'];
        }
    }

    public function modules_list($module_index = null)
    {
        $modules_list = [

//            ['name' => 'blog',
//                'class_name' => 'Modules\Blog\Http\Controllers\BlogController',
//                'class_method' => 'index'
//            ],

            ['name' => trans('cms::cms.customHtml'),
                "type" => 'database',
                "table" => 'cms_customhtml',
                "title_field" => 'title',
                "html_field" => 'body',
                "languages" => "multi"
            ],
            ['name' => trans('cms::cms.static_pages'),
                "type" => 'files',
                "folder" => 'static_pages'

            ],
            ['name' => trans('cms::cms.files'),
                "type" => 'files',
                "folder" => 'modules_view'
            ],
            ['name' => trans('cms::cms.articles'),
                "type" => 'database',
                "table" => 'cms_articles',
                "title_field" => 'title',
                "html_field" => 'body',
                "languages" => "multi"
            ],
            ['name' => trans('cms::cms.language'),
                'class_name' => "Modules\Cms\Http\Controllers\LanguagesController",
                'class_method' => 'getLanguagesSelectNode'
            ],
            ['name' => trans('cms::cms.spread'),
                'class_name' => "Modules\Cms\Http\Controllers\HouseofborseController",
                'class_method' => 'getSymbolsSpreads'
            ],
            ['name' => trans('cms::cms.sellBuyChart'),
                'class_name' => "Modules\Cms\Http\Controllers\HouseofborseController",
                'class_method' => 'getSellBuyChart'
            ],
            ['name' => trans('cms::cms.siteMap'),
                'class_name' => "Modules\Cms\Http\Controllers\ModulesListController",
                'class_method' => 'siteMap'
            ],
            ['name' => trans('cms::cms.leftMenu'),
                'class_name' => "Modules\Cms\Http\Controllers\ModulesListController",
                'class_method' => 'left_menu'
            ],
            ['name' => trans('fxweb.allSpreadsPage'),
                'class_name' => "Modules\Cms\Http\Controllers\HouseofborseController",
                'class_method' => 'allSpreads'
            ]
        ];

        if ($module_index > -1) {
            return $modules_list[$module_index];
        } else {
            return $modules_list;
        }
    }

    public function static_html()
    {
        return 7;
    }

    public function getModuleOptions($id = 0)
    {


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
                $options_html .= '<option value="' . $name_array[0] . '">' . $name_array[0] . '</option>';
            }
            return $options_html;
        } else if (isset($module['type']) && $module['type'] == 'database') {

            $results = DB::select('select id,' . $module['title_field'] . ' from ' . $module['table'] . ' ', []);
            $options_html = '';
            foreach ($results as $result) {
                $options_html .= '<option value="' . $result->id . '">' . $result->title . '</option>';
            }
            return $options_html;
        }
    }

    public function getModuleOptionsList($id = 0)
    {


        $id = Input::get('module_id');


        $module_list = $this->modules_list();
        $results = [];
        if ($id == -1) {
            $menus = DB::select('select id,title from cms_menus ', []);
            if ($menus) {
                foreach ($menus as $menu) {
                    array_push($results, ['id' => $menu->id, 'title' => $menu->title]);
                }
            }
        } else {


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

                if ($query_result) {
                    foreach ($query_result as $result) {
                        array_push($results, ['id' => $result->id, 'title' => $result->title]);
                    }
                }
            }
        }

        $options_html = '';
        foreach ($results as $result) {
            $options_html .= '<div id="' . $id . '" content_id="0" float="0" all_pages="0" selected_pages="" class="dragable sub_module_list_button"  value="' . $result['id'] . '" draggable="true">' . $result['title'] . '</div>';
        }
        return $options_html;
    }

// get_module_options($id){
    public function getModuleOptionsList2($id = 0)
    {


        $id = Input::get('module_id');


        $module_list = $this->modules_list();
        $results = [];
        if ($id == -1) {
            $menus = DB::select('select id,title from cms_menus ', []);
            if ($menus) {
                foreach ($menus as $menu) {
                    array_push($results, ['id' => $menu->id, 'title' => $menu->title]);
                }
            }
        } else if ($id == -2) {
            return '';
        } else {


            $module = $module_list[$id];
            if (isset($module['type']) && $module['type'] == 'files') {
                $files = File::allFiles(base_path('modules/Cms/Resources/views/' . $module['folder']));

                foreach ($files as $file) {
                    $base_name = basename($file);
                    $name_array = explode('.', $base_name);
                    array_push($results, ['id' => $name_array[0], 'title' => $name_array[0]]);
                }
            } else if (isset($module['type']) && $module['type'] == 'database') {

                $query_result = DB::select('select id,' . $module['title_field'] . ' from ' . $module['table'] . ' ', []);

                if ($query_result) {
                    foreach ($query_result as $result) {
                        array_push($results, ['id' => $result->id, 'title' => $result->title]);
                    }
                }
            }
        }

        $options_html = '';
        foreach ($results as $result) {
            $options_html .= '<option  value="' . $result['id'] . '" >' . $result['title'] . '</option>';
        }
        return $options_html;
    }


    public function siteMap(){



$language= \Modules\Cms\Entities\cms_languages::where('code',\Session::get('locale'))->first();
        $language_id=(count($language))? $language->id:1;
//        $links = \Modules\Cms\Entities\cms_menus_items::where(['menu_id' => 3])->get();

        // $links=cms_menus_items_languages::where(['cms_languages_id'=>$language,'cms_menus_items_id'=>$id])->get();
        $links = \Modules\Cms\Entities\cms_menus_items::with(['cms_menus_items_languages' => function ($query) use($language_id)  {
           $query->where('cms_languages_id', '=', $language_id);
        }])->where('menu_id', 3)->get();
        $links = $links->toArray();

        foreach($links as &$link){
            $link['name']=str_replace(' ','-',$link['name']);
        }





//        $links = \Modules\Cms\Entities\cms_menus_items::where(['menu_id' => 3])->get();
//
//        $links = $links->toArray();
        $menuHelper= new \Modules\Cms\Http\Controllers\MenusController();
       $links= $menuHelper->order_menu($links);
       // dd($links);
        return '<div class="container">'.$this->site_map_html(0, $links).'</div>';
    }


    private function site_map_html($root, $links)
    {
        $menu_html = '';
        foreach($links as $link){

            $menu_html .='<h3>' . $link['translate'] . '</h3>';
            $menu_html .=  '<ul >';
            foreach($link['children'] as $child){
                $menu_html .='<li ><a href="/'.$child['name'].'"  ><i class="fa fa-angle-double-right"></i>' . $child['translate'] . '</a></li>';
            }

            $menu_html .=  '</ul>';
        }

return $menu_html;
//        $menu_html = '';
//        if (!is_null($links) && count($links) > 0) {
//            $menu_html .= ($root == 0) ? '' : '<ul >';
//            foreach ($links as $key => $link) {
//                $child = $link['id'];
//                $parent = $link['parent_item_id'];
//                if ($parent == $root) {
//                    unset($links[$key]);
//                    if ($link['hide'])
//                        continue;
//                    $sub_menu = $this->site_map_html($child, $links);
//
//                    $menu_html .=($parent==0)? '<h3>' . $link['translate'] . '</h3>'.$sub_menu:'<li ><a href="/'.$link['name'].'"  ><i class="fa fa-angle-double-right"></i>' . $link['translate'] . '</a>'.$sub_menu.'</li>';
//
//                }
//            }
//            $menu_html .= ($root == 0) ? '' : '</ul >';
//        }
//        return $menu_html;
    }



    public function left_menu(){

        $language= \Modules\Cms\Entities\cms_languages::where('code',\Session::get('locale'))->first();
        $language_id=(count($language))? $language->id:1;

       $parentId= \Illuminate\Support\Facades\Session::get('parentId');
if(!$parentId >0 ){$parentId=24;}
        $links = \Modules\Cms\Entities\cms_menus_items::with(['cms_menus_items_languages' => function ($query) use($language_id)  {
            $query->where('cms_languages_id', '=', $language_id);
        }])->where('parent_item_id',$parentId)->orWhere('id' , $parentId)->orderBy('id')->get();

        $menuHtml='<div style="clear:both;direction:'.$language->dir.'; "><div class="b-categories-filter">';
        $i=0;

        foreach($links as $link){
            $translate=(isset($link->cms_menus_items_languages) &&
           isset($link->cms_menus_items_languages[0]) &&
                $link->cms_menus_items_languages[0]->translate != '')? $link->cms_menus_items_languages[0]->translate:$link->name;

            if($i==0){$i++;
                $menuHtml .= '<h4 class="f-primary-b b-h4-special f-h4-special--gray f-h4-special">'.$translate  .'</h4><ul>';
           continue;
            }
            $menuHtml .= '<li><a class="f-categories-filter_name" style="text-transform: capitalize;" href="/'.strtolower(str_replace(' ','-',$link->name)).'"><i class="fa fa-plus"></i> '.$translate.'</a></li>';
        }

        return $menuHtml.'</ul></div></div>';
    }
// get_module_options($id){
}
