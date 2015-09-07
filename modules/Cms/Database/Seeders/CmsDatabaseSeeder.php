<?php namespace Modules\Cms\Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CmsDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		// $this->call("OthersTableSeeder");
		 $this->call("Modules\Cms\Database\Seeders\CmsLanguagesTableSeeder");
                 
                $page_id= DB::table('cms_pages')->insertGetId(['title'=>'home']);
                 
                 DB::table('cms_pages_contents')->insert(['page_id'=>$page_id,
                     'module_id'=>'home',
                     'type'=>'1',
                     'module_name'=>'home',
                     'order'=>0,
                     'float'=>0,
                     'display'=>0,
                     'position'=>'position_1',
                     'all_pages'=>0]);
                   
                 
                 $menu_id=DB::table('cms_menus')->insertGetId(['title'=>'Home Menu']);
                 DB::table('cms_menus_items')->insert(['menu_id'=>$menu_id,
                     'disable'=>0,
                     'hide'=>0,
                     'page_id'=>$page_id,
                     'type'=>0,
                     'parent_item_id'=>0,
                     'name'=>'home']);
                 
                 
        }
   
                 

}