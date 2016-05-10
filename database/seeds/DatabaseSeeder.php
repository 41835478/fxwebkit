<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeds\CmsSeeder;

include base_path().'\Database\Seeds\CmsSeeder.php';
include base_path().'\Database\Seeds\Mt4TradeSeeder.php';



class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CmsSeeder');
		$this->call('Mt4TradeSeeder');
	}

}
