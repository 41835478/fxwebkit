<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();
        $role = [
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'admin' => true,
            ]
        ];
        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();
        $cRole = [
            'name' => 'Client',
            'slug' => 'client',
        ];
        $clientRole = Sentinel::getRoleRepository()->createModel()->fill($cRole)->save();

        $admin = [
            'email'    => 'admin@example.com',
            'password' => 'admin',
        ];
        $users = [
            [
                'email'    => 'demo1@example.com',
                'password' => 'demo1',
            ],
            [
                'email'    => 'demo2@example.com',
                'password' => 'demo2',
            ],
            [
                'email'    => 'demo3@example.com',
                'password' => 'demo3',
            ],
        ];

        $adminUser = Sentinel::registerAndActivate($admin);
        $adminUser->roles()->attach($adminRole);

        foreach ($users as $user)
        {
            $clientUser = Sentinel::registerAndActivate($user);
            $clientUser->roles()->attach($clientRole);
        }
    }
}