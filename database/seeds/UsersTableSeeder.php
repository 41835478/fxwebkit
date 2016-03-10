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

        $admins = [
            [
                'first_name'=>'Mohammad',
                'last_name'=>'Galya',
                'email'    => 'admin@mqplanet.com',
                'password' => 'admin'
            ],
            [
                'first_name'=>'Mohammad',
                'last_name'=>'Galya',
                'email'    => 'Galya@mqplanet.com',
                'password' => 'galya'
            ]
        ];



        foreach ($admins as $admin) {
            $adminUser = Sentinel::registerAndActivate($admin);
            $adminUser->roles()->attach($adminRole);
        }

        $users = [
            [
                'first_name'=>'Mohammad',
                'last_name'=>'Hashim',
                'email'    => 'm.hashim@mqplanet.com',
                'password' => 'm.hashim',
            ],
            [
                'first_name'=>'demo',
                'last_name'=>'demo',
                'email'    => 'demo@mqplanet.com',
                'password' => 'demo',
            ],
            [
                'first_name'=>'Moayd',
                'last_name'=>'Galya',
                'email'    => 'mag@mqplanet.com',
                'password' => 'mag',
            ],
        ];
        foreach ($users as $user)
        {
            $clientUser = Sentinel::registerAndActivate($user);
            $clientUser->roles()->attach($clientRole);
        }
    }
}