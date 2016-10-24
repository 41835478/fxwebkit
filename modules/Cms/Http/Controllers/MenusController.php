<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\CmsMenus;
use Modules\Cms\Entities\cms_menus_items;
use Modules\Cms\Entities\cms_articles;
use Modules\Cms\Entities\cms_languages;
use Modules\Cms\Entities\cms_menus_languages;
use Modules\Cms\Entities\cms_menus_items_languages;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Cms\Http\Requests\CreateMenusRequest;
use Modules\Cms\Http\Requests\CreateMenuItemRequest;
use Modules\Cms\Entities\cms_forms as Forms;
class MenusController extends Controller
{
    /* __________________________________________________menus */

    public function getMenus($selected_id = 0)
    {

        //  $selected_id = (Input::get('selected_id') !== null) ? Input::get('selected_id') : 1;
        $menus = CmsMenus::lists('title', 'id');

        if (Input::get('selected_id') !== null) {
            $selected_id = Input::get('selected_id');
        } else if ($selected_id == 0) {
            foreach ($menus as $key => $menu) {
                $selected_id = $key;
                break;
            }
        }

        $languages = cms_languages::lists('name', 'id');
        $selected_language = (Input::get('selected_language') != null) ? Input::get('selected_language') : 1;
        //$menu_items = cms_menus_items::with('cms_menus_items', 'page', 'article')->where('menu_id', $selected_id)->get();



        $menu_items = cms_menus_items::with([
            'article' => function ($query) { $query->where('page_id', "!=", "0"); }
            ,'cms_menus_items',
            'page',
            'form',
            'cms_menus_items_languages' => function ($query) use ($selected_language) {
            $query->where('cms_languages_id', '=', $selected_language);
        }])->where('menu_id', $selected_id)->get();

        $pages = cms_pages::lists('title', 'id');
        $disable_array = ['0' => 'enable', '1' => 'disable'];
        $hide_array = ['0' => 'show', '1' => 'hide'];
        $articles = cms_articles::lists('title', 'id');
        $asset_folder = Config::get('cms.asset_folder');


        $links = cms_menus_items::where(['menu_id' => $selected_id])->get();

        $links = $links->toArray();
        $menu_preview = $this->order_menu_get_html(0, $links);
        $disable_icons = ["fa fa-check", "fa fa-ban"];
        $hide_icons = ["fa fa-eye", "fa fa-eye-slash"];

        return view("cms::menus", ['menus' => $menus,
                'selected_id' => $selected_id,
                'disable_array' => $disable_array,
                'disable_icons' => $disable_icons,
                'hide_array' => $hide_array,
                'hide_icons' => $hide_icons,
                'menu_items' => $menu_items,
                'pages' => $pages,
                'articles' => $articles,
                'menu_preview' => $menu_preview,
                'render_menu_html' => $this->render_menu($selected_id),
                'languages' => $languages,
                'selected_language' => $selected_language,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function getEditMenuItem($menu_item_id = 0, $menu_id)
    {
        //  $selected_id = (Input::get('selected_id') !== null) ? Input::get('selected_id') : 1;

        $menus = CmsMenus::lists('title', 'id');

        $languages = cms_languages::lists('name', 'id');
        $selected_language = (Input::get('selected_language') != null) ? Input::get('selected_language') : 1;


        $menu_item = ($menu_item_id != 0) ? cms_menus_items::with('cms_menus_items', 'page', 'article')->where('id', $menu_item_id)->first() : 0;


        $menu_items = cms_menus_items::with('cms_menus_items', 'page', 'article')->where('menu_id', $menu_id)->first();
        $pages = cms_pages::lists('title', 'id');
        $disable_array = ['0' => 'enable', '1' => 'disable'];
        $hide_array = ['0' => 'show', '1' => 'hide'];
        $articles = cms_articles::where('page_id', '>', 0)->lists('title', 'id');
        $asset_folder = Config::get('cms.asset_folder');


        $links = cms_menus_items::where(['menu_id' => $menu_id])->get();

        $links = $links->toArray();
        $menu_preview = $this->order_menu_get_html(0, $links);

        $forms = Forms::lists('alias', 'id');

//dd($forms);
        return view("cms::menusAddEditItem", [
                'menu_item' => $menu_item,
                'menu_items' => $menu_items,
                'selected_id' => $menu_id,
                'disable_array' => $disable_array,
                'hide_array' => $hide_array,
                'pages' => $pages,
                'articles' => $articles,
                'forms' => $forms,
                'menu_preview' => $menu_preview,
                'render_menu_html' => $this->render_menu($menu_id),
                'languages' => $languages,
                'selected_language' => $selected_language,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function getMenusList()
    {

        $languages = cms_languages::lists('name', 'id');
        $selected_language = (Input::get('selected_language') != null) ? Input::get('selected_language') : 1;

        $menus = CmsMenus::lists('title', 'id');

        //$menus = CmsMenus::with('cms_menus_languages')->where('',$selected_language)->get();//lists('title', 'id');
        $menus = CmsMenus::with(['cms_menus_languages' => function ($query) use ($selected_language) {

            $query->where('cms_languages_id', '=', $selected_language);
        }])->paginate();


        $asset_folder = Config::get('cms.asset_folder');
        return view("cms::menusList", [
                'menus' => $menus,
                'languages' => $languages,
                'selected_language' => $selected_language,
                'asset_folder' => $asset_folder
            ]
        );
    }

    public function postMenus()
    {

        if (null !== Input::get('select_menu_submit')) {
            return $this->getMenus(Input::get('selected_id'));
        }

        if (null !== Input::get('remove_menu_item_submit')) {
            $removed_item = cms_menus_items::find(Input::get('remove_menu_item_submit'));
            $removed_item->delete();
            return $this->getMenus(Input::get('selected_id'));
        }

        if (null !== Input::get('edit_menu_item_id')) {

            return $this->getEditMenuItem(Input::get('edit_menu_item_id'), Input::get('selected_id'));
        }

        if (null !== Input::get('delete_menu_submit')) {

            $removed_item = CmsMenus::find(Input::get('delete_menu_submit'));

            $removed_item->delete();
            return Redirect::route("cms.menusList");
        }
        return $this->getMenus(Input::get('selected_id'));
    }

    public function postInsertNewMenu(CreateMenusRequest $request)
    {
        $menu = new CmsMenus;
        $menu->title = Input::get('new_menu_name_input');
        $menu->save();
        return Redirect::to('cms/menus/menus/' . $menu->id);
    }

    public function postInsertNewMenuItem(CreateMenuItemRequest $request)
    {
        $type = Input::get('type');
        if (Input::get('edit_menu_item_id') != null) {
            $item = cms_menus_items::find(Input::get('edit_menu_item_id'));
        } else {
            $item = new cms_menus_items;
        }
        $item->menu_id = Input::get('selected_id');
        $item->disable = Input::get('disable');
        $item->hide = Input::get('hide');

       // $item->page_id = ($type == 0) ? Input::get('page_id') : Input::get('article_id');
        if($type == 0){
            $item->page_id = Input::get('page_id');
        }elseif($type == 1){

            $item->page_id = Input::get('article_id');
        }elseif($type == 2){

            $item->page_id = Input::get('form_id');
        }

        $item->type = $type;
        $item->parent_item_id = Input::get('parent_item_id');
        $item->name = Input::get('item_name_input');
        $item->save();
        return Redirect::to('/cms/menus/menus/' . Input::get('selected_id'));
    }

    public function postSaveTranslate()
    {
        $translate_title = Input::get('translate_title');
        $selected_language = Input::get('selected_language');

        foreach ($translate_title as $id => $title) {

            $translate = cms_menus_languages::where(['cms_languages_id' => $selected_language, 'cms_menus_id' => $id])->first();
            if ($translate) {
                $translate->translate = $title;
                $translate->save();
            } else {
                $translate = new cms_menus_languages;
                $translate->translate = $title;
                $translate->cms_languages_id = $selected_language;
                $translate->cms_menus_id = $id;
                $translate->save();
            }
        }
        //return Redirect::to('/cms/menus/menus-list');
        return $this->getMenusList();
    }

    public function postSaveItemsTranslate()
    {
        $translate_name = Input::get('translate_name');
        $selected_language = Input::get('selected_language');

        foreach ($translate_name as $id => $name) {

            $translate = cms_menus_items_languages::where(['cms_languages_id' => $selected_language, 'cms_menus_items_id' => $id])->first();
            if ($translate) {
                $translate->translate = $name;
                $translate->save();
            } else {
                $translate = new cms_menus_items_languages;
                $translate->translate = $name;
                $translate->cms_languages_id = $selected_language;
                $translate->cms_menus_items_id = $id;
                $translate->save();
            }
        }
        //return Redirect::to('/cms/menus/menus-list');
        return $this->getMenus();
    }

    /* _________________________________________________________________________________render_menu_html( order menu each link with his parent and get it's html) */

    private function order_menu_get_html($root, $links)
    {


        $menu_html = '';
        if (!is_null($links) && count($links) > 0) {
            $menu_html .= ($root == 0) ? '<ul class="dropdown-menu btn-group" style="display: block;">' : '<ul class="dropdown-menu sub-menu">';
            foreach ($links as $key => $link) {
                $child = $link['id'];
                $parent = $link['parent_item_id'];
                if ($parent == $root) {
                    unset($links[$key]);
                    if ($link['hide'])
                        continue;
                    $sub_menu = $this->order_menu_get_html($child, $links);
                    $menu_html .= '<li ><a class=" btn trigger right-caret" >' . $link['name'] . '</a>';
                    $menu_html .= $sub_menu;
                    $menu_html .= '</li>';
                }
            }
            $menu_html .= '</ul>';
        }
        return $menu_html;
    }

    function order_menu($links, $root = 0)
    {
        $returnArray = array();
        foreach ($links as $key => $link) {
            if($link['hide']==1) continue;
            $child = $link['id'];
            $parent = $link['parent_item_id'];
            $translate = (isset($link["cms_menus_items_languages"][0]["translate"])) ? $link["cms_menus_items_languages"][0]["translate"] : "";
            if ($parent == $root) {

                unset($links[$key]);

                $returnArray[] = array(
                    'id' => $child,
                    'name' =>  $link['name'] ,
                    'disable' =>  $link['disable'] ,

                    'translate'=> ($translate == '') ? $link['name'] : $translate,
                    'children' => $this->order_menu($links, $child)
                );
            }
        }
        return $returnArray;
    }

    public function render_menu($menu_id, $language = 1,$selected_id=1)
    {


        $links = cms_menus_items::where(['menu_id' => $menu_id])->get();

        // $links=cms_menus_items_languages::where(['cms_languages_id'=>$language,'cms_menus_items_id'=>$id])->get();
        $links = cms_menus_items::with(['cms_menus_items_languages' => function ($query) use ($language) {
            $query->where('cms_languages_id', '=', $language);
        }])->where('menu_id', $menu_id)->get();
        $links = $links->toArray();

        foreach($links as &$link){
            $link['name']=str_replace(' ','-',$link['name']);
        }
        return view('cms::' . Config::get('cms.theme_folder') . '.theme_menu', [
                'menu_array' => $this->order_menu($links),
                'selected_id' => $selected_id
            ]
        );
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


    /* ____END________render_menu_html( order menu each link with his parent and get it's html) */

    /* _______________________________________________END___menus */
}
