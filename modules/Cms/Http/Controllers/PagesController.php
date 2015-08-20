<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\CmsMenus;
use Modules\Cms\Entities\cms_pages_contents;
use Modules\Cms\Entities\cms_pages_contents_pages;

use Modules\Cms\Entities\cms_menus_items;

use Modules\Cms\Entities\cms_articles;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller {

    public function getPages($page_id = 0) {
        $pages = cms_pages::lists('title','id');

        if (   Input::get('page_id') !== null) {
            $page_id = Input::get('page_id');
        } else if ( $page_id ==0 ){
            foreach ($pages as $key=>$page) {
                $page_id = $key;
                break;
            }
        }
     
        //$page_id=(Input::get('page_id')!==null)? Input::get('page_id'):1;


        $modules_list_controller = new ModulesListController;
        $modules_list = $modules_list_controller->modules_list();
        
// $page_modules=cms_pages_contents::with('Modules\Cms\Entities\cms_pages_contents\cms_pages_contents_pages')->get();
// var_dump($page_modules);
//            
        $query_string = "select *,id  from  cms_pages_contents as first_table   where
(all_pages=0)
or
(all_pages=1 and '$page_id'=(select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id='$page_id') )
or
 (all_pages=2 and not '$page_id' in (select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id=$page_id) ) "
        ;

        $page_modules = DB::select($query_string);

        $float_array = [0 => 'float', 1 => 'left', 2 => 'right'];
        $display_array = [0 => 'display', 1 => 'inline', 2 => 'block'];
        $positions = [];
        foreach ($page_modules as $page_module) {

            $positions[$page_module->position] = [];
        }
        foreach ($page_modules as $page_module) {
            $float = ($page_module->float != 0) ? 'float:' . $float_array[$page_module->float] . ';' : '';
            $display = ($page_module->display != 0) ? 'display:' . $display_array[$page_module->display] . ';' : '';

            $module_html = '<div module_id="' . $page_module->id . '"class="one_module_all_div" style="' . $float . $display . '">';

            switch ($page_module->type) {

                case -1:
                    $menu=new MenusController();
                    $module_html.= $menu->render_menu($page_module->module_id);
                    break;

                case -2:
                    $module_html.= 'article place and it should be one place in page';
                    break;
                default :
                    $module_html.= $modules_list_controller->index($modules_list[$page_module->type], $page_module->module_id);
            }
            $module_html.='</div>';
            array_push($positions[$page_module->position], $module_html);
        }

//            $module = Module::find('cms');
//            var_dump($module->getExtraPath('Assets'));

        $menus = CmsMenus::lists('title','id');
      $asset_folder=Config::get('cms.asset_folder'); 
        
        return view('cms::pages', ['modules_list' => $modules_list,
            'display_array' => $display_array,
            'float_array' => $float_array,
            'page_id' => $page_id,
            'pages' => $pages,
            'positions' => $positions,
            'menus' => $menus,
            'asset_folder'=>$asset_folder,
            ]
             
        );
    }

    public function getPagesList() {
        $pages = cms_pages::lists('title','id');



      $asset_folder=Config::get('cms.asset_folder'); 
        
        return view('cms::pagesList', [
            'pages' => $pages,
            'asset_folder'=>$asset_folder,
            ]
             
        );
    }

    public function postPages() {

        if (null !== Input::get('go_to_page')){
            
            return $this->getPages(Input::get('go_to_page'));
        }
        
        if (null !== Input::get('add_module_submit')) {
            $type = Input::get('type');
            $all_pages = Input::get('all_pages');
            $page_id = Input::get('page_id');
            $module_id = 0;

            switch ($type) {
                case -1:
                    $module_id = Input::get('menu_id');
                    break;
                case -2:
                    $module_id = 0;
                    break;
                default:
                    $module_id = Input::get('module_variable');
                    $type = Input::get('module_id');
                    ;
            }

            $page_module = new cms_pages_contents;
            $page_module->page_id = $page_id;
            $page_module->module_id = $module_id;
            $page_module->type = $type;
            $page_module->module_name = Input::get('module_id');
            $page_module->order = Input::get('order');
            $page_module->float = Input::get('float');
            $page_module->display = Input::get('display');
            $page_module->position = Input::get('position');
            $page_module->all_pages = $all_pages;
            $page_module->save();


            if ($all_pages != 0) {
                $selected_pages = Input::get('selected_pages');

                for ($i = 0; $i < count($selected_pages); $i++) {
                    $module_pages = new cms_pages_contents_pages;
                    $module_pages->pages_id = $selected_pages[$i];
                    $module_pages->pages_contents_id = $page_module->id;
                    $module_pages->save();
                }
            }
        }

        if (null !== Input::get('new_page_submit')) {
            $page = new cms_pages;
            $page->title = Input::get('new_page_name_input');
            $page->save();
            
            return Redirect::to('cms/pages');
        }

        if (null !== Input::get('remove_module_id')) {

            $page_module = cms_pages_contents::find(Input::get('remove_module_id'));

            $page_module->delete();
        }
        if(null !== Input::get('remove_page_submit')){
            
            $page_module = cms_pages::find(Input::get('remove_page_submit'));
            $page_module->delete();
            return Redirect::to('cms/pages');
        }
        return $this->getPages(Input::get('page_id'));
    }

    public function website($page_id = 1, $article_html = '') {

        //  $page_id=(Input::get('page_id')!==null)? Input::get('page_id'):1;
        $modules_list_controller = new ModulesListController;
        $modules_list = $modules_list_controller->modules_list();


//            $page_modules=cms_pages_contents::where('page_id', $page_id)
//               ->orderBy('order')
//               ->get();
        $query_string = "select *,id  from  cms_pages_contents as first_table   where
(all_pages=0)
or
(all_pages=1 and '$page_id'=(select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id='$page_id') )
or
 (all_pages=2 and not '$page_id' in (select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id=$page_id) ) "
        ;

        $page_modules = DB::select($query_string);

        $float_array = [0 => 'float', 1 => 'left', 2 => 'right'];
        $display_array = [0 => 'display', 1 => 'inline', 2 => 'block'];
        $positions = [];
        foreach ($page_modules as $page_module) {

            $positions[$page_module->position] = [];
        }
        foreach ($page_modules as $page_module) {
            $float = ($page_module->float != 0) ? 'float:' . $float_array[$page_module->float] . ';' : '';
            $display = ($page_module->display != 0) ? 'display:' . $display_array[$page_module->display] . ';' : '';

            $module_html = '<div module_id="' . $page_module->id . '"class="one_module_all_div" style="' . $float . $display . '">';


            switch ($page_module->type) {

                case -1:
                    $menu=new MenusController();
                    $module_html.= $menu->render_menu($page_module->module_id);
                    break;

                case -2:
                    $module_html.= $article_html;
                    break;
                default:

                    $module_html.= $modules_list_controller->index($modules_list[$page_module->type], $page_module->module_id);
            }
            $module_html.='</div>';
            array_push($positions[$page_module->position], $module_html);
        }

//            $module = Module::find('cms');
//            var_dump($module->getExtraPath('Assets'));
        $asset_folder=Config::get('cms.asset_folder');
        return view('cms::'.Config::get('cms.theme_folder').'.theme', [
            'page_id' => $page_id,
            'positions' => $positions,
                'asset_folder'=>$asset_folder]
        );
    }

    /* _________________________________________End______pages */
    
    /*________________________________________________________________render_page*/
    public function render_page($menu_item){
        $page_id=0;
        $article_id=0;
        $article_html='';
        
        $menu_item=cms_menus_items::where(['name'=>$menu_item])->first();
        
        $page_type=$menu_item->type;
        if($page_type==0){
             $page_id=$menu_item->page_id;
        }else{
        $article_id=$menu_item->page_id;
        
        $article=cms_articles::find($article_id);
        if($article){
        $article_html=  $article->body;
        $page_id=$article->page_id;}
        
        }
       
        return $this->website($page_id,$article_html);
        
    }
    /*________________________________________________________END________render_page*/
}
