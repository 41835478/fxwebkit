<?php

namespace Fxweb\Repositories\Admin\Mt4User;

use Fxweb\Models\Mt4User;
use Fxweb\Helpers\Fx;
use Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;


/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4UserRepository implements Mt4UserContract{

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
    public function getUserInfo($login,$server_id=0) {

        $oResult = Mt4User::where('LOGIN', '=', $login)->where('server_id', '=', $server_id);
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

        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4User::with('accounts')->whereHas('accounts', function($query) use($account_id) {
                    $query->where(DB::raw('mt4_users_users.server_id'),'=',DB::raw(' mt4_users.server_id'));

                    $query->where('users_id', $account_id);
                });
            }
        }


        /* =============== active Filters =============== */
        if (isset($aFilters['assigned']) && $aFilters['assigned']!=0) {


            if ($aFilters['assigned'] == 1) {
                $oResult = $oResult->with('account')->whereHas('account',function ($query){

                    $query->whereRaw('mt4_users_users.server_id = mt4_users.server_id');
                    $query->whereNotNull('mt4_users_id');

                });
            } else {

                $oResult = $oResult->whereNotIn('login', function ($query) {

                    $query->select(DB::raw('mt4_users_users.mt4_users_id'))
                        ->from('mt4_users_users')
                        ->whereRaw('mt4_users_users.mt4_users_id = mt4_users.login')
                    ->whereRaw('mt4_users_users.server_id = mt4_users.server_id');

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

        if (isset($aFilters['server_id']) &&in_array($aFilters['server_id'],[0,1])) {

            $oResult = $oResult->where('server_id',$aFilters['server_id']);
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

        $account_id = (isset($aFilters['account_id'])) ? $aFilters['account_id'] : 0;

        $oResult =new Mt4User();



        /* =============== signed filter ============== */
        if ((isset($aFilters['signed']) && !empty($aFilters['signed']))) {

            if ($aFilters['signed'] == 1) {

                $oResult = $oResult->with('account')->whereHas('account', function($query) use($account_id) {
                    $query->where(DB::raw('mt4_users_users.server_id'),'=',DB::raw(' mt4_users.server_id'));
                    $query->where('users_id', $account_id);
                });

            }
        }else{

            $oResult=  Mt4User::leftJoin('mt4_users_users', function($join) use($account_id) {

                $join->on('mt4_users.LOGIN', '=', 'mt4_users_users.mt4_users_id')
                    ->on('mt4_users.server_id', '=', 'mt4_users_users.server_id');
                $join->where('mt4_users_users.users_id', '=',$account_id );
            })->select(['mt4_users.*','mt4_users_users.users_id']);
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

        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['server_id'])) {
            $oResult = $oResult->where('server_id', '=', $aFilters['server_id']);
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




    public function getUsersMt4UsersWithMassGroup($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC') {

        $group_id= (isset($aFilters['group_id'])) ? $aFilters['group_id'] : 0;

        $oResult =new Mt4User();



        /* =============== signed filter ============== */
        if ((isset($aFilters['signed']) && !empty($aFilters['signed']))) {

            if ($aFilters['signed'] == 1) {

                $oResult = $oResult->with('massGroup')->whereHas('massGroup', function($query) use($group_id) {
                    $query->where(DB::raw('settings_mass_groups_users.user_id'),'=',DB::raw(' mt4_users.uid'));
                    $query->where('group_id', $group_id);
                });

            }
        }else{

            $oResult=  Mt4User::leftJoin('settings_mass_groups_users', function($join) use($group_id) {

                $join->on('mt4_users.uid', '=', 'settings_mass_groups_users.user_id')
                    ->on('settings_mass_groups_users.type', '=',DB::raw(1));
                $join->where('settings_mass_groups_users.group_id', '=',$group_id );
            })->select(['mt4_users.*','settings_mass_groups_users.user_id']);
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

        /* =============== Nmae Filter  =============== */
        if (isset($aFilters['server_id'])) {
            $oResult = $oResult->where('server_id', '=', $aFilters['server_id']);
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


    public function getUsersMt4Users($account_id) {

 $oResult = Mt4User::join('mt4_users_users', function($join) use($account_id) {
            $join->on('mt4_users.LOGIN', '=', 'mt4_users_users.mt4_users_id')
                ->on('mt4_users.server_id', '=', 'mt4_users_users.server_id')
                ->where('mt4_users_users.users_id', '=', $account_id);
        });

        $oResult = $oResult->with('account')->whereHas('account', function($query) use($account_id) {
            $query->where('users_id', $account_id);
        });


            $oResult = $oResult->get();

        /* =============== Preparing Output  =============== */
        $aResult=[];
        $firstLogin =0;
        $firstLoginServerID=1;
        foreach ($oResult as $dKey => $oValue) {
            if($firstLogin ==0 ){
                $firstLogin=$oResult[$dKey]->LOGIN;
                $firstLoginServerID=$oResult[$dKey]->server_id;
            }
            $aResult[] = [$oResult[$dKey]->LOGIN,$oResult[$dKey]->server_id];
        }
        return [$firstLogin,$firstLoginServerID,$aResult];
    }

}
