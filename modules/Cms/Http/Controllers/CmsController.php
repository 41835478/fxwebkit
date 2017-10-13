<?php namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\cms_modules;
use Modules\Cms\Entities\CmsMenus;
use Modules\Cms\Entities\cms_pages_contents;
use Modules\Cms\Entities\cms_pages_contents_pages;
use Modules\Cms\Entities\cms_menus_items;
use Modules\Cms\Entities\cms_articles;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
//use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Fxweb\Http\Controllers\Admin\EditConfigController as EditConfig;
use Illuminate\Http\Request;

class CmsController extends Controller
{


    /*
    public function pages($page_id=1){
        $pages = cms_pages::all();


    if (Input::get('page_id') !== null) {
        $page_id = Input::get('page_id');
    } else {
        foreach ($pages as $page) {
            $page_id = $page->id;
            break;
        }
    }
    //$page_id=(Input::get('page_id')!==null)? Input::get('page_id'):1;


        $modules_list_controller=new ModulesListController;
         $modules_list=$modules_list_controller->modules_list();




        $page_modules=cms_pages_contents::where('page_id', $page_id)
           ->orderBy('order')
           ->get();

// $page_modules=cms_pages_contents::with('Modules\Cms\Entities\cms_pages_contents\cms_pages_contents_pages')->get();
// var_dump($page_modules);
//
        $query_string=
        "select *,id  from  cms_pages_contents as first_table   where
(all_pages=0)
or
(all_pages=1 and '$page_id'=(select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id='$page_id') )
or
(all_pages=2 and not '$page_id' in (select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id=$page_id) ) "
        ;

$page_modules=DB::select( $query_string);

        $float_array=[0=>'float',1=>'left',2=>'right'];
        $display_array=[0=>'display',1=>'inline',2=>'block'];
        $positions=[];
        foreach($page_modules as $page_module){

          $positions[$page_module->position]=[] ;
        }
        foreach($page_modules as $page_module){
            $float=($page_module->float !=0)? 'float:'.$float_array[$page_module->float].';':'';
            $display=($page_module->display !=0)? 'display:'.$display_array[$page_module->display].';':'';

            $module_html='<div module_id="'.$page_module->id .'"class="one_module_all_div" style="'.$float.$display.'">';

        switch ($page_module->type) {

            case -1:
                $module_html.= $this->render_menu($page_module->module_id);
                break;

            case -2:
                $module_html.= 'article place and it should be one place in page';
                break;
            default :
                 $module_html.= $modules_list_controller->index($modules_list[$page_module->type],$page_module->module_id);

        }
        $module_html.='</div>';
          array_push($positions[$page_module->position],$module_html)  ;
        }

//            $module = Module::find('cms');
//            var_dump($module->getExtraPath('Assets'));

        $menus=CmsMenus::all();
    return view('cms::pages', ['modules_list' => $modules_list,
        'display_array' => $display_array,
        'float_array' => $float_array,
        'page_id' => $page_id,
        'pages' => $pages,
        'positions' => $positions,
        'menus'=>$menus]
    );
}

public function pages_php(){

        if(null !== Input::get('add_module_submit')){
            $type=Input::get('type');
            $all_pages=Input::get('all_pages');
            $page_id=Input::get('page_id');
            $module_id=0;

            switch($type){
                            case -1:
                                $module_id=Input::get('menu_id');
                                break;
                            case -2:
                                $module_id=0;
                                break;
                            default:
                                $module_id=Input::get('module_variable');
                                $type=Input::get('module_id');;
                          }

            $page_module=new cms_pages_contents;
            $page_module->page_id=$page_id;
            $page_module->module_id=$module_id;
            $page_module->type=$type;
            $page_module->module_name=Input::get('module_id');
            $page_module->order=Input::get('order');
            $page_module->float=Input::get('float');
            $page_module->display=Input::get('display');
            $page_module->position=Input::get('position');
            $page_module->all_pages=$all_pages;
            $page_module->save();


            if($all_pages!=0){
                $selected_pages=Input::get('selected_pages');

                for($i= 0 ;$i<count($selected_pages);$i++){
                $module_pages=new cms_pages_contents_pages;
                    $module_pages->pages_id=$selected_pages[$i];
                    $module_pages->pages_contents_id=$page_module->id;
                    $module_pages->save();
                }
            }
        }

        if(null !== Input::get('new_page_submit')){
       $page=new cms_pages;
      $page->title=Input::get('new_page_name_input');
       $page->save();
        }

        if (null !== Input::get('remove_module_id')) {

        $page_module = cms_pages_contents::find(Input::get('remove_module_id'));

        $page_module->delete();

    }
return  $this->pages(Input::get('page_id'));

    }


    public function website($page_id=1,$article_html=''){

    //  $page_id=(Input::get('page_id')!==null)? Input::get('page_id'):1;
        $modules_list_controller=new ModulesListController;
         $modules_list=$modules_list_controller->modules_list();


//            $page_modules=cms_pages_contents::where('page_id', $page_id)
//               ->orderBy('order')
//               ->get();
                    $query_string=
        "select *,id  from  cms_pages_contents as first_table   where
(all_pages=0)
or
(all_pages=1 and '$page_id'=(select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id='$page_id') )
or
(all_pages=2 and not '$page_id' in (select pages_id from cms_pages_contents_pages where pages_contents_id=first_table.id and pages_id=$page_id) ) "
        ;

$page_modules=DB::select( $query_string);

        $float_array=[0=>'float',1=>'left',2=>'right'];
        $display_array=[0=>'display',1=>'inline',2=>'block'];
        $positions=[];
        foreach($page_modules as $page_module){

          $positions[$page_module->position]=[] ;
        }
        foreach($page_modules as $page_module){
            $float=($page_module->float !=0)? 'float:'.$float_array[$page_module->float].';':'';
            $display=($page_module->display !=0)? 'display:'.$display_array[$page_module->display].';':'';

            $module_html='<div module_id="'.$page_module->id .'"class="one_module_all_div" style="'.$float.$display.'">';


            switch ($page_module->type){

                case -1:
                    $module_html.= $this->render_menu($page_module->module_id);
                    break;

                case -2:
                    $module_html.= $article_html;
                    break;
                  default:

            $module_html.= $modules_list_controller->index($modules_list[$page_module->type],$page_module->module_id);

            }
            $module_html.='</div>';
          array_push($positions[$page_module->position],$module_html)  ;
        }

//            $module = Module::find('cms');
//            var_dump($module->getExtraPath('Assets'));
    return view('cms::theme', [
        'page_id' => $page_id,
        'positions' => $positions]
    );

    }
/*_________________________________________End______pages*/

    /* __________________________________________________menus *

    public function menus($selected_id = 1) {
          //  $selected_id = (Input::get('selected_id') !== null) ? Input::get('selected_id') : 1;
            $menus = CmsMenus::all();


            if (Input::get('selected_id') !== null) {
                $selected_id = Input::get('selected_id');
            } else {
                foreach ($menus as $menu) {
                    $selected_id = $menu->id;
                    break;
                }
            }

            $menu_items=cms_menus_items::with('cms_menus_items','page','article')->where('menu_id',$selected_id)->get();
            $pages=  cms_pages::all();
            $disable_array=['0'=>'enable','1'=>'disable'];
            $hide_array=['0'=>'show','1'=>'hide'];

            $articles=  cms_articles::all();
            return view("cms::menus", ['menus' => $menus,
                'selected_id' => $selected_id,
                'disable_array' => $disable_array,
                'hide_array' => $hide_array,
                'menu_items'=>$menu_items,
                'pages'=>$pages,
                'articles'=>$articles,
                'render_menu_html'=>$this->render_menu($selected_id),
                    ]
            );
        }

        public function menus_php() {
            if (null !== Input::get('new_menu_submit')) {
                $menu = new CmsMenus;
                $menu->title = Input::get('new_menu_name_input');
                $menu->save();
            }
            if(null !== Input::get('remove_menu_item_submit')){
                 $removed_item = cms_menus_items::find(Input::get('remove_menu_item_submit'));

                $removed_item->delete();
            }
            if (null !== Input::get('add_menu_item_submit')) {
                $type=Input::get('type');
                $item = new cms_menus_items;
                $item->menu_id = Input::get('selected_id');
                $item->disable = Input::get('disable');
                $item->hide = Input::get('hide');
                $item->page_id = ($type==0)?Input::get('page_id'):Input::get('article_id');
                $item->type = $type;
                $item->parent_item_id = Input::get('parent_item_id');
                $item->name= Input::get('item_name_input');
                $item->save();
            }

            return $this->menus(Input::get('selected_id'));
        }
    /*_________________________________________________________________________________render_menu_html( order menu each link with his parent and get it's html)*/
    /*
        private function order_menu_get_html($root, $links) {


        $menu_html='';
        if(!is_null($links) && count($links) > 0) {
            $menu_html.='<ul>';
            foreach($links as $key=>$link) {
                $child=$link['id'];
                $parent=$link['parent_item_id'];
                if($parent == $root) {
                    unset($links[$key]);
                    if($link['hide']) continue;
                    $menu_html.=($link['disable'])? '<li>'.$link['name']:'<li><a href="'.asset($link["name"]).'">'.$link['name'].'</a>';
                    $menu_html.=$this->order_menu_get_html($child, $links);
                    $menu_html.='</li>';
                }
            }
            $menu_html.='</ul>';
        }
        return $menu_html;
    }
     *


        function order_menu($links, $root = 0) {

        $return = array();
        # Traverse the tree and search for direct children of the root
             foreach($links as $key=>$link) {
                $child=$link['id'];
                $parent=$link['parent_item_id'];
            # A direct child is found
            if($parent == $root) {
                # Remove item from tree (we don't need to traverse this again)
                unset($links[$key]);
                # Append the child into result array and parse its children
                $return[] = array(
                    'id' => $child,
                    'name' => $link['name'],
                    'children' => $this->order_menu($links, $child)
                );
            }
        }
        return $return;
    }
        private  function render_menu($menu_id){

            $links=cms_menus_items::where(['menu_id'=>$menu_id])->get();

            $links=$links->toArray();
        return view('cms::theme_menu',['menu_array'=>$this->order_menu( $links),'selected_id'=>$menu_id]);

        }
    /*
            function get_childs($menu_id, $links) {

                $checked_item_array = [];
                foreach ($links as $link2) {
                    $order_links[$menu_id] = array();
                    if ($link2['parent_item_id'] == $menu_id) {

                        array_push($order_links[$menu_id], $link2);
                        if (!in_array($link2['id'],$checked_item_array )) {
                            array_push($checked_item_array, $link2['id']);
                            get_childs($link2['id'], $links);
                        }
                    }
                    return $order_links;
                }
            }

    //get_childs($menu_id)
            $order_links=array();





            dd(get_childs($links[0]['id'],$links));


        function parseTree($tree, $root = 0) {
        $return = array();
        # Traverse the tree and search for direct children of the root
        foreach($tree as $child => $parent) {
            # A direct child is found
            if($parent == $root) {
                # Remove item from tree (we don't need to traverse this again)
                unset($tree[$child]);
                # Append the child into result array and parse its children
                $return[] = array(
                    'name' => $child,
                    'children' => parseTree($tree, $child)
                );
            }
        }
        return empty($return) ? null : $return;
    }


    function printTree($tree) {
        $tree_html='';
        if(!is_null($tree) && count($tree) > 0) {
            $tree_html.= '<ul>';
            foreach($tree as $node) {
               $tree_html.='<li>'.$node['name'];
                $tree_html.=printTree($node['children']);
                $tree_html.='</li>';
            }
            $tree_html.='</ul>';
        }
        return $tree_html;
    }
    $result = parseTree($tree);
    echo printTree($result);
    die();
    */


    /*
     * $tree=array();
    foreach ($links as $link){
        $tree[$link['id']]=$link['parent_item_id'];
    }

    function order_menu_get_html($root, $tree) {


        $menu_html='';
        if(!is_null($tree) && count($tree) > 0) {
            $menu_html.='<ul>';
            foreach($tree as $child => $parent) {
                if($parent == $root) {
                    unset($tree[$child]);
                    $menu_html.='<li>'.$child;
                    $menu_html.=order_menu_get_html($child, $tree);
                    $menu_html.='</li>';
                }
            }
            $menu_html.='</ul>';
        }
        return $menu_html;
    }
    */


    /*_________________________________________________________________________END________render_menu_html( order menu each link with his parent and get it's html)*/
///////////////////////////////////////////
    /* _______________________________________________END___menus */

    /*________________________________________________articles*/
    public function articles()
    {

        if (null !== Input::get('delete_article_submit')) {
            $articles = cms_articles::find(Input::get('article_id'));

            $articles->delete();
        }

        $pages = cms_pages::all();
        $articles = cms_articles::all(['id', 'title']);


        $article_id = (Input::get('article_id') !== null) ? Input::get('article_id') : 0;

        $edit_article = '';
        if ($article_id > 0) {
            $edit_article = cms_articles::find($article_id);

        }

        return view('cms::articles', [
                'pages' => $pages,
                'selected_id' => $article_id,
                'articles' => $articles,
                'edit_article' => $edit_article]
        );
    }


    public function articles_php()
    {

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
        return $this->articles();
    }
    /*______________________________________________END__articles*/

    /*_________________________________________upload_image*/


    public function upload_image()
    {
        $file = Input::file('upload');
        $allowed_ext = ["png", "jpg", "jpeg", "gif", "bmp", "svg"];
        $fileExt = strtolower($file->getClientOriginalExtension());

        if (in_array($fileExt, $allowed_ext)) {
            $imageName = rand() . '_' . rand() . $file->getClientOriginalName();
            if ($file->move(public_path() . '/files/', $imageName)) {
                return 'the image was uploaded successfully .';
            }//uploaded successfully
            else {
                return 'error, not uploaded ...';
            }//error uploaded
        } //allowed extinsions 
        else {
            return 'this file extinssion not allowed';
        }//not allowed file extintion
    }//function upload_image() 


    public function file_browser()
    {
        $funnum = Input::get('CKEditorFuncNum');
        $files = File::allFiles(public_path() . '/files/');

        return view('cms::file_browser', ['files' => $files, 'funnum' => $funnum]);
    }

    public function getCmsSettings()
    {
        $aSetting= [

            'is_client' => Config('toolsConfig.is_client'),


        ];


        return view('cms::cmsSetting')->with('aSetting',$aSetting);

    }

    public function postCmsSettings(Request $oRequest)
    {

        $aSetting = [

            'asset_folder'=>$oRequest->asset_folder,
            'admin_theme'=>$oRequest->admin_theme,
            'theme_folder'=>$oRequest->theme_folder,

        ];



        $editConfig = new EditConfig();
        $editConfig->editConfigFile('config/cmsConfig.php', $aSetting);

        \Session::flash('refresh', 'true');

        return Redirect::route('cms.cmsSettings');

    }



    /* _____________________________________end__upload_image */
    /*________________________________________________________________render_page*
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
        $article_html=  $article->body;
        $page_id=$article->page_id;
        
        }
       
        return $this->website($page_id,$article_html);
        
    }
    /*________________________________________________________END________render_page*/
}
