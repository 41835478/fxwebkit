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
        Sentinel::getRoleRepository()->createModel()->fill($role)->save();
        $adminRole = Sentinel::getRoleRepository()->findBySlug($role['slug']);
        $cRole = [
            'name' => 'Client',
            'slug' => 'client',
        ];
        /*
        Sentinel::getRoleRepository()->createModel()->fill($cRole)->save();
        $blockRole = Sentinel::getRoleRepository()->findBySlug($cRole['slug']);
        $cRole = [
            'name' => 'Block',
            'slug' => 'block',
        ];
        Sentinel::getRoleRepository()->createModel()->fill($cRole)->save();
        $denyLiveAccount = Sentinel::getRoleRepository()->findBySlug($cRole['slug']);
        $cRole = [
            'name' => 'DenyLiveAccount',
            'slug' => 'denyLiveAccount',
        ];
        */
        Sentinel::getRoleRepository()->createModel()->fill($cRole)->save();
        $clientRole = Sentinel::getRoleRepository()->findBySlug($cRole['slug']);

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