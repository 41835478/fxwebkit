<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Cms\Entities\cms_pages;
use Modules\Cms\Entities\CmsMenus;
use Modules\Cms\Entities\cms_menus_items;
use Modules\Cms\Entities\cms_articles;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class MenusController extends Controller {
    /* __________________________________________________menus */

    public function getMenus($selected_id = 0) {
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

        $menu_items = cms_menus_items::with('cms_menus_items', 'page', 'article')->where('menu_id', $selected_id)->get();

        $pages = cms_pages::lists('title', 'id');
        $disable_array = ['0' => 'enable', '1' => 'disable'];
        $hide_array = ['0' => 'show', '1' => 'hide'];
        $articles = cms_articles::lists('title', 'id');
        $asset_folder = Config::get('cms.asset_folder');



        return view("cms::menus", ['menus' => $menus,
            'selected_id' => $selected_id,
            'disable_array' => $disable_array,
            'hide_array' => $hide_array,
            'menu_items' => $menu_items,
            'pages' => $pages,
            'articles' => $articles,
            'render_menu_html' => $this->render_menu($selected_id),
            'asset_folder' => $asset_folder
                ]
        );
    }

    public function getMenusList() {
        $menus = CmsMenus::lists('title', 'id');
        $asset_folder = Config::get('cms.asset_folder');
        return view("cms::menusList", ['menus' => $menus,
            'asset_folder' => $asset_folder
                ]
        );
    }

    public function postMenus() {

        if (null !== Input::get('select_menu_submit')) {
            return $this->getMenus(Input::get('selected_id'));
        }

        if (null !== Input::get('remove_menu_item_submit')) {
            $removed_item = cms_menus_items::find(Input::get('remove_menu_item_submit'));
            $removed_item->delete();
            return $this->getMenus(Input::get('selected_id'));
        }
        
        if (null !== Input::get('add_menu_item_submit')) {
            $type = Input::get('type');
            $item = new cms_menus_items;
            $item->menu_id = Input::get('selected_id');
            $item->disable = Input::get('disable');
            $item->hide = Input::get('hide');
            $item->page_id = ($type == 0) ? Input::get('page_id') : Input::get('article_id');
            $item->type = $type;
            $item->parent_item_id = Input::get('parent_item_id');
            $item->name = Input::get('item_name_input');
            $item->save();
            return $this->getMenus(Input::get('selected_id'));
        }

        if (null !== Input::get('delete_menu_submit')) {

            $removed_item = CmsMenus::find(Input::get('delete_menu_submit'));

            $removed_item->delete();
            return Redirect::route("cms.menusList");
        }
        return $this->getMenus(Input::get('selected_id'));
    }

    public function postInsertNewMenu() {
        $menu = new CmsMenus;
        $menu->title = Input::get('new_menu_name_input');
        $menu->save();
        return Redirect::route('cms.menusList');
    }

    /* _________________________________________________________________________________render_menu_html( order menu each link with his parent and get it's html) */
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
     */

    function order_menu($links, $root = 0) {

        $return = array();
        foreach ($links as $key => $link) {
            $child = $link['id'];
            $parent = $link['parent_item_id'];
            if ($parent == $root) {

                unset($links[$key]);

                $return[] = array(
                    'id' => $child,
                    'name' => $link['name'],
                    'children' => $this->order_menu($links, $child)
                );
            }
        }
        return $return;
    }

    public function render_menu($menu_id) {

        $links = cms_menus_items::where(['menu_id' => $menu_id])->get();
        $links = $links->toArray();
        return view('cms::' . Config::get('cms.theme_folder') . '.theme_menu', [
            'menu_array' => $this->order_menu($links),
            'selected_id' => $menu_id
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
