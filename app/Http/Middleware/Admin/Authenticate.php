<?php namespace Fxweb\Http\Middleware\Admin;

use Closure, Sentinel, Redirect, App, Session;

/**
 * Class Authenticate
 * @package Fxweb\Http\Middleware\Admin
 *
 * Checks if the user logged in and is in admin group
 */
class Authenticate
{
    public function handle($oRequest, Closure $fNext)
    {
        // Check if the user is logged in
        if ($oUser = Sentinel::check() && Sentinel::inRole('admin')) {

        } else {
            // User is not logged in
            if ($oRequest->ajax()) {
                return response('Needs Login', 401);
            } else {
                return Redirect::route('admin.auth.login');
            }
        }

        $locale = ($oRequest->has('locale')) ? $oRequest->locale : false;
        $back = $this->setLocale($locale);

        if ($back == 'back') {
            return Redirect::back();
        }
        return $fNext($oRequest);
    }

    private function setLocale($locale)
    {
        if ($locale) {
            Session::put('locale', $locale);
            return 'back';
        } else if (!Session::has('locale')) {
            Session::put('locale', 'en');
        }


        App::setLocale(Session::get('locale'));

    }
}
