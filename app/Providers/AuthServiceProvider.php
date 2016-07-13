<?php

namespace Fxweb\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Accounts\Entities\mt4_users_users;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Fxweb\Model' => 'Fxweb\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);


        $gate->define('has', function () {
return true;
//            $exist=mt4_users_users::where([
//                'users_id'=>current_user()->getUser()->id,
//                'mt4_users_id'=>$login,
//                'server_id'=>$server_id
//            ])->first();
//            return !! $exist;


//dd(Gate::allows('has', [100,0]));


        });
    }
}
