<?php namespace Fxweb\Http\Middleware\Admin;

use Closure, Sentinel, Redirect, App, Session;
use Illuminate\Routing\Route;

/**
 * Class Authenticate
 * @package Fxweb\Http\Middleware\Admin
 *
 * Checks if the user logged in and is in admin group
 */
class ACLAdmin
{
    private $method;
    public function __construct(Route $route){
         $targetController=$route->getActionName();
        $method=explode('@',$targetController);
        $this->method=$method[1];

    }
    public function handle($oRequest, Closure $fNext)
    {
        return $fNext($oRequest);

        $oUser = Sentinel::check();
dd($oUser->permissions);

        $role=Sentinel::findRoleBySlug('admin');

        dd($role->permissions);

        if ($oUser && $oUser->hasAnyAccess(['user.create', 'user.update']))
        {

        }
        else
        {

        }

        if ($oUser && Sentinel::inRole('admin')) {}

        return Redirect::back();

        return $fNext($oRequest);
    }

}
