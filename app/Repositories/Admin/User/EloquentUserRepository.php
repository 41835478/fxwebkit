<?php

namespace Fxweb\Repositories\Admin\User;

use Fxweb\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Config;
use Fxweb\Helpers\Fx;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentUserRepository implements UserContract {

    /**
     */
    public function __construct() {
        //
    }

    public function getLoginsInGroup($aGroups, $sOrderBy = 'LOGIN', $sSort = 'ASC') {
        if (is_string($aGroups)) {

            $aGroups = explode(',', $aGroups);
        }

        $oUsers = Mt4User::whereIn('GROUP', $aGroups)->select('LOGIN')->get();
        $aUsers = [];

        foreach ($oUsers as $oUser) {
            $aUsers[] = $oUser->LOGIN;
        }

        return $aUsers;
    }

    /**
     * 
     */
    public function getAllGroups() {
        // return User::select('group')->get();
    }

    public function getUsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC') {
        $oResult = new User();

        /* =============== id Filter  =============== */
        if (isset($aFilters['id']) && !empty($aFilters['id'])) {
            $oResult = $oResult->where('id', $aFilters['id']);
        }

        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['first_name']) && !empty($aFilters['first_name'])) {
            $oResult = $oResult->where('first_name', 'like', '%' . $aFilters['first_name'] . '%');
        }

        if (isset($aFilters['last_name']) && !empty($aFilters['last_name'])) {
            $oResult = $oResult->where('last_name', 'like', '%' . $aFilters['last_name'] . '%');
        }

        /* =============== email Filter  =============== */
        if (isset($aFilters['email']) && !empty($aFilters['email'])) {
            $oResult = $oResult->where('email', 'like', '%' . $aFilters['email'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            
        }
        /* =============== Preparing Output  =============== */
        return $oResult;
    }

    public function addUser($oRequest) {
        $admin_role = explode(',', Config::get('fxweb.admin_roles'));
        $oClientRole = Sentinel::findRoleBySlug($admin_role[0]);

        //$bAutoActivate	= Config::get('fxweb.auto_activate_client');
        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email,
            'password' => $oRequest->password,
        ];

        $oUser = Sentinel::register($aCredentials);
        $oClientRole->users()->attach($oUser);
        $oActivation = Activation::create($oUser);

        return true;
    }

    public function updateUser($oRequest) {
        $user = Sentinel::findById($oRequest->edit_id);

        $aCredentials = [
            'first_name' => $oRequest->first_name,
            'last_name' => $oRequest->last_name,
            'email' => $oRequest->email
        ];

        if ($oRequest->password != '') {
            $aCredentials['password'] = $oRequest->password;
        }
        try {
            $user = Sentinel::update($user, $aCredentials);
        } catch (QueryException $e) {
            return ['The email has already been taken.'];
        }
        return true;
    }

    public function deleteUser($id) {
        $user = Sentinel::findById($id);

        try {
            $user->delete();
        } catch (Exception $e) {
            return ['error! please try again later.'];
        }
        return ['deleted successfully.'];
    }

}
