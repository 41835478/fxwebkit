<?php

namespace Fxweb\Repositories\Admin\Mt4User;

use Fxweb\Models\Mt4User;
use Fxweb\Helpers\Fx;
use Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4UserRepository implements Mt4UserContract {

    /**
     */
    public function __construct() {
        //
    }

    /**
     * @param mixed $aGroups
     * @param string $sOrderBy
     * @param string $sSort
     * @return array
     */
    public function getAllUsers() {
        return Mt4User::all();
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
        return Mt4User::select('group')->get();
    }

    /**
     * @param int $login
     * @return array
     */
    public function getUserInfo($login) {
        $oResult = Mt4User::where('LOGIN', '=', $login);
        $oResult = $oResult->get();
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            $oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE, 2);
            $oResult[$dKey]->EQUITY = round($oResult[$dKey]->EQUITY, 2);
            $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT, 2);
            $oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN, 2);
            $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE, 2);
            $oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE, 2);
        }
        return (count($oResult)) ? $oResult[0] : null;
    }

    public function getUsersByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC') {
        //$oResult = new Mt4User();
        /* ===============================check admin or user================ */
        $oResult = new Mt4User();
        if ($user = Sentinel::getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4User::with('accounts')->whereHas('accounts', function($query) use($account_id) {
                    $query->where('users_id', $account_id);
                });
            }
        }

        /* =================================== */
        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
                (isset($aFilters['to_login']) && !empty($aFilters['to_login']))) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }
        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            $oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE, 2);
            $oResult[$dKey]->EQUITY = round($oResult[$dKey]->EQUITY, 2);
            $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT, 2);
            $oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN, 2);
            $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE, 2);
            $oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE, 2);
        }
        /* =============== Preparing Output  =============== */
        return $oResult;
    }

    public function getUsersMt4UsersByFilter($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC') {
//                 $oResult = Mt4User::with('account')->whereHas('account', function($query) use($account_id) {
//            $query->where('users_id', $account_id);

        $account_id = (isset($aFilters['account_id'])) ? $aFilters['account_id'] : 0;
        //$oResult = Mt4User::with('account');
        //select * from `mt4_users` left join `mt4_users_users` on `mt4_users`.`id` = `mt4_users_users`.`mt4_users_id` and (`mt4_users_users`.`users_id` = 18)
        $oResult = Mt4User::leftJoin('mt4_users_users', function($join) use($account_id) {
                    $join->on('mt4_users.LOGIN', '=', 'mt4_users_users.mt4_users_id')->where('mt4_users_users.users_id', '=', $account_id);
                });

//                $oResult = Mt4User::leftJoin('mt4_users_users', function ($join) use ($account_id){
//                    $join->on('mt4_users.id', '=', 'mt4_users_users.mt4_users_id');
//      $join->where('mt4_users_users.users_id', '=',$account_id );
//      
//    });


        /* =============== signed filter ============== */
        if ((isset($aFilters['signed']) && !empty($aFilters['signed']))) {

            if ($aFilters['signed'] == 1) {
                $oResult = $oResult->with('account')->whereHas('account', function($query) use($account_id) {
                    $query->where('users_id', $account_id);
                });
            } elseif ($aFilters['signed'] == 2) {
                
            }
        }
        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
                (isset($aFilters['to_login']) && !empty($aFilters['to_login']))) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }
        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            $oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE, 2);
            $oResult[$dKey]->EQUITY = round($oResult[$dKey]->EQUITY, 2);
            $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT, 2);
            $oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN, 2);
            $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE, 2);
            $oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE, 2);
        }
        /* =============== Preparing Output  =============== */
        return $oResult;
    }

    public function delete($id) {
        $user = Mt4User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
    
    public function addMt4User($oRequest)
    {
       
        $fullDetails=new Mt4User();
            $fullDetails->name=$oRequest->name;
            $fullDetails->email=$oRequest->email;
            $fullDetails->status=$oRequest->status;
            $fullDetails->password_phone='vFDrwwwrrrS';
            $fullDetails->address=$oRequest->address;
            $fullDetails->id=$oRequest->id_number;
            $fullDetails->phone='$oRequssest->phone';
            $fullDetails->country=$oRequest->country;
            $fullDetails->city=$oRequest->city;
            $fullDetails->state=$oRequest->state;
            $fullDetails->zipcode=$oRequest->zip_code;
            $fullDetails->group='$oReqwwuestrrr->group';
            $fullDetails->save();
             
        return $fullDetails;
    }

}
