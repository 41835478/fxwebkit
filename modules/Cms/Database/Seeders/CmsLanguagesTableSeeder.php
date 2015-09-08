<?php namespace Modules\Cms\Database\Seeders;
 use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CmsLanguagesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
                DB::table('cms_languages')->insert([
                    "id"=>"1",
                    "name"=>'English',
                    "charset"=>'utf8',
                    "code"=>'en',
                    "dir"=>'ltr',
                ]);
                
                DB::table('cms_pages')->insert([
                    "id"=>"1",
                    "name"=>'English',
                    "charset"=>'utf8',
                    "code"=>'en',
                    "dir"=>'ltr',
                ]);
                
		// $this->call("OthersTableSeeder");
	}

}