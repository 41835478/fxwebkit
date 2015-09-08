<?php

namespace Fxweb\Helpers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\File;

class User {

    private $oUser = null;

    public function __construct() {
        $this->oUser = Sentinel::check();
    }

    public function getUser() {
        return $this->oUser;
    }

    public function getAvatar() {
        if (is_null($this->oUser->avatar)) {
            return File::get(public_path() . '/assets/img/avatar');
        }
        return $this->oUser->avatar;
    }

    public function getFirstName() {
        return $this->oUser->first_name;
    }

    public function getLastName() {
        return $this->oUser->first_name;
    }

    public function getName() {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

}
