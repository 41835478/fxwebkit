<?php namespace Fxweb\Http\Controllers;

use Sentinel;

class TestController extends Controller
{
	public function index()
	{
		$adminR = Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'Super Administrators',
			'slug' => 'admin',
			'permissions' => ['super' => 1]
		]);

		$managerR = Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'Managers',
			'slug' => 'manager',
			'permissions' => ['create-shit' => 1]
		]);

		$clientR = Sentinel::getRoleRepository()->createModel()->create([
			'name' => 'Super Clients',
			'slug' => 'client',
			'permissions' => ['super' => 1]
		]);

		$adminU = Sentinel::create([
			'email'    => 'husni.admin@gmail.com',
			'password' => '123456',
			'first_name' => 'Husni',
			'last_name' => 'Admin',
		]);

		$managerU = Sentinel::create([
			'email'    => 'husni.manager@gmail.com',
			'password' => '123456',
			'first_name' => 'Husni',
			'last_name' => 'Manager',
		]);

		$clientU = Sentinel::create([
			'email'    => 'husni.client@gmail.com',
			'password' => '123456',
			'first_name' => 'Husni',
			'last_name' => 'Client',
		]);

		$adminR->users()->attach($adminU);
		$managerR->users()->attach($managerU);
		$clientR->users()->attach($clientU);

		dd('Done');
	}
}
