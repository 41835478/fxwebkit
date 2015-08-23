<?php

namespace Modules\Cms\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
/* dinamic *
  use Modules\Module1\Http\Controllers\Module1Controller;
  use Modules\Blog\Http\Controllers\BlogController;
  use Modules\cms\Http\Controllers\MenusController;
  /* End dinamic */

class ModulesListController extends Controller {

    public function index($module_info, $variable = '') {



        if (isset($module_info['type']) && $module_info['type'] == 'files') {
            return view("cms::" . $module_info['folder'] . '/' . $variable);
        } else if (isset($module_info['type']) && $module_info['type'] == 'database') {
            
            $results = DB::select('select ' . $module_info['html_field'] . ' from ' . $module_info['table'] . ' where id = ?', [$variable]);
            
            if(count($results)){
            return $results[0]->$module_info['html_field'];
            }else{return '';}
        } else {
            
            return eval('try{$module1 = new ' . $module_info['class_name'] . ';RETURN $module1->' . $module_info['class_method'] . '(' . $variable . ');}  catch (Exception $e){return "";}');
            
        }
    }

//    public function index2($method_name) {
//        switch ($method_name) {
//            case 0://module1
//                $class_name='Modules\Module1\Http\Controllers\Module1Controller';
//                $class_method='index';
//               return  eval('$module1 = new '.$class_name.';RETURN $module1->'.$class_method.'('.$variable.');');
//                
//                break;
//            
//            case 1://'blog'
//                $blog = new BlogController;
//                RETURN $blog->index();
//                break;
//            
//            case 2://'reports'
//                RETURN 6;
//                break;
//            case 3://'menu'
//                $menu= new MenusController;
//                
//                RETURN $menu->index();
//                break;
//        }
//    }

    public function modules_list() {
        return [
            ['name' => 'module1',
                'class_name' => 'Modules\Module1\Http\Controllers\Module1Controller',
                'class_method' => 'index'
            ],
            ['name' => 'blog',
                'class_name' => 'Modules\Blog\Http\Controllers\BlogController',
                'class_method' => 'index'
            ],
            ['name' => 'static_html',
                'class_name' => '$this',
                'class_method' => 'static_html'
            ],
            ['name' => 'menu',
                'class_name' => 'Modules\cms\Http\Controllers\MenusController',
                'class_method' => 'index',
            ],
            ['name' => 'cslider',
                'class_name' => '$this',
                'class_method' => 'cslider',
            ],
            ['name' => 'what_we_do',
                'class_name' => '$this',
                'class_method' => 'what_we_do',
            ],
            ['name' => 'portfolio',
                'class_name' => '$this',
                'class_method' => 'portfolio',
            ],
            ['name' => 'about',
                'class_name' => '$this',
                'class_method' => 'about',
            ],
            ['name' => 'clients',
                'class_name' => '$this',
                'class_method' => 'clients',
            ],
            ['name' => 'our_clients',
                'class_name' => '$this',
                'class_method' => 'clients',
            ],
            ['name' => 'newsletter',
                'class_name' => '$this',
                'class_method' => 'newsletter',
            ],
            ['name' => 'contact',
                'class_name' => '$this',
                'class_method' => 'contact',
            ],
            ['name' => 'footer_line',
                'class_name' => '$this',
                'class_method' => 'footer_line',
            ],
            ['name' => 'purshase',
                'class_name' => '$this',
                'class_method' => 'purshase',
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
            ]
        ];
    }

    public function static_html() {
        return 7;
    }

    public function cslider() {
        return view('cms::modules_view/cslider');
    }

    public function what_we_do() {
        return view('cms::modules_view/what_we_do');
    }

    public function portfolio() {
        return view('cms::modules_view/portfolio');
    }

    public function about() {
        return view('cms::modules_view/about');
    }

    public function clients() {
        return view('cms::modules_view/clients');
    }

    public function our_clients() {
        return view('cms::modules_view/our_clients');
    }

    public function newsletter() {
        return view('cms::modules_view/newsletter');
    }

    public function contact() {
        return view('cms::modules_view/contact');
    }

    public function footer_line() {
        return view('cms::modules_view/footer_line');
    }

    public function purshase() {
        return view('cms::modules_view/purshase');
    }

    public function getModuleOptions($id = 0) {


        $id = Input::get('module_id');


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

// get_module_options($id){
}
