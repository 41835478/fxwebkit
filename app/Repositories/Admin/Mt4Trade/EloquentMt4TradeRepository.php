<?php

namespace Fxweb\Repositories\Admin\Mt4Trade;

use Fxweb\Helpers\Fx;
use Fxweb\Models\Mt4ClosedActual;
use Fxweb\Models\MT4Daily;
use Fxweb\Models\Mt4ClosedBalance;
use Fxweb\Models\Mt4ClosedPending;
use Fxweb\Models\Mt4OpenActual;
use Fxweb\Models\Mt4OpenPending;
use Fxweb\Models\Mt4ClosedActualBalance;
use Fxweb\Models\Mt4Closed;
use Fxweb\Models\Mt4Open;
use Modules\Mt4Configrations\Entities\ConfigrationsSymbols as Symbols;
use Fxweb\Repositories\Admin\Mt4User\Mt4UserContract as Mt4User;
use Fxweb\Models\Mt4User as modelMt4User;
use Illuminate\Support\Facades\DB;
use Config;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Mt4Configrations\Entities\ConfigrationsGroupsSecurities as GroupsSecurities;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentMt4TradeRepository implements Mt4TradeContract
{

    protected $oUsers;

    /**
     */
    public function __construct(Mt4User $oUsers)
    {
        $this->oUsers = $oUsers;
    }

    /**
     * Gets the closed orders symbols
     *
     * @param string $sOrderBy
     * @param string $sSort
     * @return mixed
     */
    public function getClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC')
    {
        $user = current_user()->getUser();

        if (!$user->InRole('admin')) {
            $account_id = $user->id;

            $oUserMt4Groups = modelMt4User::with('accounts')->whereHas('accounts', function($query) use($account_id) {
                $query->where(DB::raw('mt4_users_users.server_id'),'=',DB::raw(' mt4_users.server_id'));
                $query->where('users_id', $account_id);
            })->select('group')->get();

            $aUserMt4Groups=[];
            foreach($oUserMt4Groups as $group){
                $aUserMt4Groups[]=$group->group;
            }

            $oAgentMt4Groups = modelMt4User::with('agents')->whereHas('agents', function($query) use($account_id) {
                $query->where(DB::raw('mt4_users_users.server_id'),'=',DB::raw(' mt4_users.server_id'));
                $query->where('agent_id', $account_id);
            })->select('group')->get();

            $aAgentMt4Groups=[];
            foreach($oAgentMt4Groups as $group){
                $aAgentMt4Groups[]=$group->group;
            }

            $groupsSecurities=GroupsSecurities::select()
                ->whereIn('group',$aUserMt4Groups+$aAgentMt4Groups)
                ->where('show','=',1)->get();

            $aGroupsSecurities=[];
            foreach($groupsSecurities as $group){
                $aGroupsSecurities[]=$group->position;
            }

            $oResult =Symbols::whereIn('type',$aGroupsSecurities)->get();
            foreach($oResult as &$result){
                $result->SYMBOL= $result->symbol;
            }
        } else {

            $oResult =Symbols::get();
            foreach($oResult as &$result){
                $result->SYMBOL= $result->symbol;
            }
        }
        return $oResult;
    }

    /**
     * Gets the open orders symbols
     *
     * @param string $sOrderBy
     * @param string $sSort
     * @return mixed
     */

    public function getAgentsClosedTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC')
    {
        $user = current_user()->getUser();

        if (!$user->InRole('admin')) {
            $account_id = $user->id;

            $oUserMt4Groups = modelMt4User::with('accounts')->whereHas('accounts', function($query) use($account_id) {
                $query->where(DB::raw('mt4_users_users.server_id'),'=',DB::raw(' mt4_users.server_id'));
                $query->where('users_id', $account_id);
            })->select('group')->get();

            $aUserMt4Groups=[];
            foreach($oUserMt4Groups as $group){
                $aUserMt4Groups[]=$group->group;
            }

            $oAgentMt4Groups = modelMt4User::with('agents')->whereHas('agents', function($query) use($account_id) {
                $query->where(DB::raw('mt4_users_users.server_id'),'=',DB::raw(' mt4_users.server_id'));
                $query->where('agent_id', $account_id);
            })->select('group')->get();

            $aAgentMt4Groups=[];
            foreach($oAgentMt4Groups as $group){
                $aAgentMt4Groups[]=$group->group;
            }

            $groupsSecurities=GroupsSecurities::select()
                ->whereIn('group',$aUserMt4Groups+$aAgentMt4Groups)
                ->where('show','=',1)->get();

            $aGroupsSecurities=[];
            foreach($groupsSecurities as $group){
                $aGroupsSecurities[]=$group->position;
            }

            $oResult =Symbols::whereIn('type',$aGroupsSecurities)->get();
            foreach($oResult as &$result){
                $result->SYMBOL= $result->symbol;
            }
        } else {

            $oResult =Symbols::get();
            foreach($oResult as &$result){
                $result->SYMBOL= $result->symbol;
            }
        }
        return $oResult;
    }


    public function getOpenTradesSymbols($sOrderBy = 'SYMBOL', $sSort = 'ASC')
    {
        /* TODO[Galya] please tell me if the close symbols different  from close order */

        return $this->getClosedTradesSymbols();
    }

    public function getAgentSymbols(){

        $user = current_user()->getUser();

        if (!$user->InRole('admin')) {
            $account_id = $user->id;
            $agentLogin=\Modules\Ibportal\Entities\IbportalUserIbid::select('login')->where('user_id', current_user()->getUser()->id)->first();

            $oAgentMt4Groups = modelMt4User::select('group')->where('COMMENT','like','%M:'.$agentLogin->login.';%')->get();


            $aAgentMt4Groups=[];
            foreach($oAgentMt4Groups as $group){
                $aAgentMt4Groups[]=$group->group;
            }

            $groupsSecurities=GroupsSecurities::select()
                ->whereIn('group',$aAgentMt4Groups)
                ->where('show','=',1)->get();

            $aGroupsSecurities=[];
            foreach($groupsSecurities as $group){
                $aGroupsSecurities[]=$group->position;
            }


            $oResult =Symbols::whereIn('type',$aGroupsSecurities)->get();
            foreach($oResult as &$result){
                $result->SYMBOL= $result->symbol;
            }
        } else {

            $oResult =Symbols::get();
            foreach($oResult as &$result){
                $result->SYMBOL= $result->symbol;
            }
        }

        return $oResult;

    }
    /**
     * Gets the orders types
     *
     * @return array
     */
    public function getTradesTypes()
    {
        return [
            0 => 'ACTUAL_TRADES',
            1 => 'PENDING_TRADES',
        ];
    }

    public function getAgentsTradesTypes()
    {
        return [
            0 => 'ACTUAL_TRADES',
            1 => 'PENDING_TRADES',
        ];
    }


    public function getServerTypes()
    {
        return [
            -1 => trans('accounts::accounts.all'),
            0 => config('fxweb.servers')[0]['serverName'],
            1 => config('fxweb.servers')[1]['serverName'],
        ];
    }

    public function getAgentsServerTypes()
    {
        return [
            -1 => trans('accounts::accounts.all'),
            0 => config('fxweb.servers')[0]['serverName'],
            1 => config('fxweb.servers')[1]['serverName'],
        ];
    }
    /**
     * Gets the accountant types
     *
     * @return array
     */
    public function getAccountantTypes()
    {

        return [
            1 => 'BalanceOperations',
            2 => 'CreditOperations',
            3 => 'Deposits',
            4 => 'Withdrawal',
            5 => 'CreditIn',
            6 => 'CreditOut',
        ];
    }

    public function getAgentsAccountantTypes()
    {

        return [
            1 => 'BalanceOperations',
            2 => 'CreditOperations',
            3 => 'Deposits',
            4 => 'Withdrawal',
            5 => 'CreditIn',
            6 => 'CreditOut',
        ];
    }
    /**
     * Gets the closed orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getClosedTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC')
    {

        $oFxHelper = new Fx();
        /* ===============================check admin or user================ */
        $oResult = '';

        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {

                $oResult = Mt4ClosedActual::with('Mt4Prices');

                $account_id = $user->id;

                $table_name="mt4_closed_actual";

                if (isset($aFilters['type']) && !empty($aFilters['type'])){
                    if($aFilters['type'] == 1){
                        $oResult =new Mt4ClosedPending();
                        $table_name="mt4_closed_pending";
                    }
                }

                $oResult=$oResult->join("mt4_users_users",function($query) use($account_id,$table_name){
                    $query->on($table_name.".login","=","mt4_users_users.mt4_users_id");
                    $query->on($table_name.".server_id","=","mt4_users_users.server_id");
                    $query->where("mt4_users_users.users_id","=",$account_id);
                });

            } else {
                $oResult = Mt4ClosedActual::with('Mt4Prices');

                $table_name="mt4_closed_actual";

                if (isset($aFilters['type']) && !empty($aFilters['type'])){
                    if($aFilters['type'] == 1){
                        $oResult =new Mt4ClosedPending();
                        $table_name="mt4_closed_pending";
                    }
                }

            }
        }

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }


        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where($table_name.'.server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn($table_name.'.LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where($table_name.'.CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where($table_name.'.CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Symbols Filter  =============== */
        if (!isset($aFilters['all_symbols']) || !$aFilters['all_symbols']) {
            $aFilters['symbol']=(!is_array($aFilters['symbol']))? explode(',',$aFilters['symbol']):$aFilters['symbol'];
            $oResult = $oResult->whereIn($table_name.'.SYMBOL', $aFilters['symbol']);
        }

        /* =============== Type Filter  =============== */

        if (isset($aFilters['type']) && !empty($aFilters['type'])) {

            if ($aFilters['type'] == 1) {

                $oResult = $oResult->where($table_name.'.CMD', '<', 2);
            } elseif ($aFilters['type'] == 2) {

                $oResult = $oResult->whereBetween($table_name.'.CMD', [2, 5]);
            }
        } else {

            $oResult = $oResult->where($table_name.'.CMD', '<', 6);
        }

        $oResult = $oResult->orderBy($table_name.'.'.$sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;
            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    public function getOpenTradesByDate($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC',$pageName='page',$table='mt4_open_actual')
    {

        $oFxHelper = new Fx();
        $oResult =new Mt4Open();

        if($table=='mt4_open_actual'){
            $oResult =new Mt4OpenActual();
        }elseif($table=='mt4_open_pending'){
            $oResult =new Mt4OpenPending();
        }
        //  $oResult = $oResult->with('Mt4Prices');

        $oResult=$oResult->join("mt4_users",function($query) use ($table) {
            $query->on($table.".login","=","mt4_users.login");
            $query->on($table.".server_id","=","mt4_users.server_id");
        });

        /* =============== Groups Filter  =============== */

        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {


            if (isset($aFilters['group'])) {


                if (is_array($aFilters['group'])) {
                    $oResult = $oResult->whereIn('GROUP', $aFilters['group']);
                } else {
                    $oResult = $oResult->where('GROUP', '=', $aFilters['group']);

                }
            }
        }

        /* =============== Login Filters =============== */

        $oResult = $oResult->where('mt4_users.LOGIN', '=', $aFilters['login']);

        if ((isset($aFilters['server_id']) && $aFilters['server_id']>-1)){
            $oResult = $oResult->where($table.'.server_id', '=', $aFilters['server_id']);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ){

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('OPEN_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('OPEN_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }


        $oResult = $oResult->orderBy($table.'.'.$sOrderBy, $sSort);

        if (!$bFullSet) {
            //  $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'),['*'],$pageName);

        } else {
            $oResult = $oResult->get();
        }


        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }
        return $oResult;
    }
    /**
     * Gets the closed orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getClosedTradesByDate($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC',$pageName='page',$table='mt4_closed_actual')
    {

        $oFxHelper = new Fx();
        $oResult =new Mt4Closed();
        if($table=='mt4_closed_actual'){
            $oResult =new Mt4ClosedActual();
        }elseif($table=='mt4_closed_balance'){
            $oResult =new Mt4ClosedBalance();
        }elseif($table=='mt4_closed_pending'){
            $oResult =new Mt4ClosedPending();
        }
        //  $oResult = $oResult->with('Mt4Prices');

        $oResult=$oResult->join("mt4_users",function($query) use($table) {
            $query->on($table.".login","=","mt4_users.login");
            $query->on($table.".server_id","=","mt4_users.server_id");
        });
        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            if(isset($aFilters['group'])){
                if (is_array( $aFilters['group'])){
                    $oResult = $oResult->whereIn('GROUP',$aFilters['group']);
                }else{
                    $oResult = $oResult->where('GROUP','=',$aFilters['group']);
                }
            }

        }

        /* =============== Login Filters =============== */


        $oResult = $oResult->where($table.'.LOGIN', '=', $aFilters['login']);

        if ((isset($aFilters['server_id']) && $aFilters['server_id']>-1)){
            $oResult = $oResult->where($table.'.server_id', '=', $aFilters['server_id']);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        $oResult = $oResult->orderBy($table.'.'.$sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'),['*'],$pageName);
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;
            $digits =($price) ? $price->DIGITS : 5;

            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    /**
     * Gets the closed orders by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getOpenTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC')
    {
        $oFxHelper = new Fx();

        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {

                $oResult =Mt4OpenActual::with('Mt4Prices');

                $account_id = $user->id;

                $table_name="mt4_open_actual";

                if (isset($aFilters['type']) && !empty($aFilters['type'])){
                    if($aFilters['type'] == 1){
                        $oResult = Mt4OpenPending::with('Mt4Prices');
                        $table_name="mt4_open_pending";
                    }
                }


                $oResult=$oResult->join("mt4_users_users",function($query) use($account_id,$table_name){
                    $query->on($table_name.".login","=","mt4_users_users.mt4_users_id");
                    $query->on($table_name.".server_id","=","mt4_users_users.server_id");
                    $query->where("mt4_users_users.users_id","=",$account_id);
                });

            } else {
                $oResult = Mt4OpenActual::with('Mt4Prices');


                $table_name="mt4_open_actual";
                if (isset($aFilters['type']) && !empty($aFilters['type'])){
                    if($aFilters['type'] == 1){
                        $oResult = Mt4OpenPending::with('Mt4Prices');
                        $table_name="mt4_open_pending";
                    }
                }
            }
        }
        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where($table_name.'.'.'LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where($table_name.'.'.'LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where($table_name.'.server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }

        /* =============== Symbols Filter  =============== */
        if (!isset($aFilters['all_symbols']) || !$aFilters['all_symbols']) {
            $aFilters['symbol']=(!is_array($aFilters['symbol']))? explode(',',$aFilters['symbol']):$aFilters['symbol'];
            $oResult = $oResult->whereIn($table_name.'.'.'SYMBOL', $aFilters['symbol']);
        }

        $oResult = $oResult->orderBy($table_name.'.'.$sOrderBy,$sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    /**
     * Gets Deposit/Withdrawal for login
     *
     * @param array $aFilters
     * @return integer
     */
    public function getDepositByLogin($aFilters)
    {
        /* Todo[Galya] which tables we have to get data from  ( I've use Mt4ClosedBalance where cmd =6)*/
        // $oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 6);
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4ClosedBalance::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                })->select('PROFIT')->where('CMD', '=', 6);
            } else {
                $oResult = Mt4ClosedBalance::select('PROFIT')->where('CMD', '=', 6);
            }
        }
        $oResult->where('LOGIN', '=', $aFilters['login']);


        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        return $oResult->sum('PROFIT');
    }

    /**
     * Gets Credit Facility for login
     *
     * @param array $aFilters
     * @return integer
     */
    public function getCreditFacilityByLogin($aFilters)
    {

        /* Todo[Galya] which tables we have to get data from   ( I've used Mt4ClosedBalance where cmd =7)*/
        //$oResult = Mt4Trade::select('PROFIT')->where('CMD', '=', 7);
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4ClosedBalance::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                })->select('PROFIT')->where('CMD', '=', 7);
            } else {
                $oResult = Mt4ClosedBalance::select('PROFIT')->where('CMD', '=', 7);
            }
        }

        /* =================================== */


        $oResult->where('LOGIN', '=', $aFilters['login']);


        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        return $oResult->sum('PROFIT');
    }

    /**
     * Gets ClosedTrade for login
     *
     * @param array $aFilters
     * @return integer
     */
    public function getClosedTradeByLogin($aFilters)
    {
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4ClosedActual::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                })->select('PROFIT');
            } else {
                $oResult = Mt4ClosedActual::select('PROFIT');
            }
        }

        /* =================================== */

        $oResult->where('LOGIN', '=', $aFilters['login']);

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        return $oResult->sum('PROFIT');
    }

    /**
     * Gets Floating  P/L for login
     *
     * @param array $aFilters
     * @return integer
     */
    public function getFloatingByLogin($aFilters)
    {
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4OpenActual::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                })->select('PROFIT');
            } else {
                $oResult = Mt4OpenActual::select('PROFIT');
            }
        }

        /* =================================== */
        $oResult->where('LOGIN', '=', $aFilters['login']);

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        return $oResult->sum('PROFIT');
    }

    /**
     * Gets the Commission by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getCommissionByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC')
    {
        $oFxHelper = new Fx();
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4ClosedActual::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                });
            } else {
                $oResult = Mt4ClosedActual::with('Mt4Prices');
            }
        }

        /* =================================== */
        $oResult->select(['SYMBOL',
            DB::raw('sum(COMMISSION) as COMMISSION'),
            DB::raw('sum(VOLUME) as VOLUME')
        ]);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }
        /* =============== get sum of volume  =============== */
        $totalResult = clone $oResult;
        $totalLotsResult = clone $oResult;
        $totalCommission = $totalResult->where('COMMISSION', '!=', 0)->sum('COMMISSION');
        $totalLots = $totalLotsResult->where('COMMISSION', '!=', 0)->sum('VOLUME')/100;


        /* =============== $oResult = $oResult; ===================== */
        $oResult->groupBy('SYMBOL');
        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }


        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;
        }

        return [$oResult, $totalCommission, $totalLots];
    }

    /**
     * Gets the Agent Commission by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return object
     */
    public function getAgentCommissionByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC')
    {
        $oFxHelper = new Fx();
        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4ClosedActual::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                })->where('COMMISSION_AGENT', '!=', 0);
            } else {
                $oResult = Mt4ClosedActual::where('COMMISSION_AGENT', '!=', 0);
            }
        }

        /* =================================== */
        $oResult->select(['SYMBOL',
            DB::raw('sum(COMMISSION_AGENT) as COMMISSION'),
            DB::raw('sum(VOLUME) as VOLUME')
        ]);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }
        /* =============== get sum of volume  =============== */
        $totalResult = clone $oResult;
        $totalLotsResult = clone $oResult;
        $totalCommission = $totalResult->where('COMMISSION', '!=', 0)->sum('COMMISSION');
        $totalLots = $totalLotsResult->where('COMMISSION', '!=', 0)->sum('VOLUME')/100;

        $oResult->groupBy('SYMBOL');

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;
        }

        return [$oResult, $totalCommission, $totalLots];
    }

    /**
     * Gets Accountant by filters
     *
     * @param array $aFilters
     * @param bool $bFullSet
     * @param string $sOrderBy
     * @param string $sSort
     * @return array
     */
    public function getAccountantByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC')
    {
        $oFxHelper = new Fx();
        $oResult = Mt4ClosedBalance::with('Mt4Prices');
        $aSummury = [];
        /* ===============================check admin or user================ */
        $oResult = Mt4ClosedBalance::with('Mt4Prices');
        if ($user = current_user()->getUser()) {
            if (!$user->InRole('admin')) {
                $account_id = $user->id;
                $oResult = Mt4ClosedBalance::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                });
            } else {
                $oResult = Mt4ClosedBalance::with('Mt4Prices');
            }
        }

        /* =================================== */
        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where('server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Get sum info and others =============== */
        $depositResult = clone $oResult;
        $WithdrawalResult = clone $oResult;
        $creditInResult = clone $oResult;
        $creditOutResult = clone $oResult;


        $aSummury ['deposits'] = $depositResult->where('CMD', 6)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['Withdrawal'] = $WithdrawalResult->where('CMD', 6)->where('PROFIT', '<', 0)->sum('PROFIT');
        $aSummury ['creditIn'] = $creditInResult->where('CMD', 7)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['creditOut'] = $creditOutResult->where('CMD', 7)->where('PROFIT', '<', 0)->sum('PROFIT');


        if (isset($aFilters['type']) && !empty($aFilters['type'])) {
            if ($aFilters['type'] == 1) {
                $oResult = $oResult->where('CMD', 6);
            } elseif ($aFilters['type'] == 2) {
                $oResult = $oResult->where('CMD', 7);
            } elseif ($aFilters['type'] == 3) {
                $oResult = $oResult->where('CMD', 6)->where('PROFIT', '>', 0);
            } elseif ($aFilters['type'] == 4) {
                $oResult = $oResult->where('CMD', 6)->where('PROFIT', '<', 0);
            } elseif ($aFilters['type'] == 5) {
                $oResult = $oResult->where('CMD', 7)->where('PROFIT', '>', 0);
            } elseif ($aFilters['type'] == 6) {
                $oResult = $oResult->where('CMD', 7)->where('PROFIT', '<', 0);
            }
        } else {
            $oResult = $oResult->whereIn('CMD',[6,7]);
        }

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getAccountantType($oValue->CMD, $oValue->PROFIT);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->EQUITY = round($oResult[$dKey]->EQUITY, 2);
            $oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE, 2);
            $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT, 2);
            $oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN, 2);
            $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE, 2);
            $oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE, 2);
        }

        return [$oResult, $aSummury];
    }


    public function getClientGrowthChart($login, $server_id)
    {

        $oGrowthResults = Mt4ClosedActualBalance::select([DB::raw('PROFIT+COMMISSION+SWAPS as netProfit'), 'CMD'])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->orderBy('CLOSE_TIME')
            ->get();


        $growth_array = [];
        $horizontal_line_numbers = [];
        $pastK = 1;
        $lastBalance = 0;
        $pastBalance = 0;
        $i = 0;
        $growth = 0;
        foreach ($oGrowthResults as $row) {
            if ($row->CMD != 6 && $lastBalance != 0) {
                $i++;

                $growth = round((($pastK * $pastBalance / $lastBalance) - 1) * 100, 2);
                $growth_array[] = $growth;

                $horizontal_line_numbers[] = $i;
            } else if ($row->CMD == 6) {


                $pastK *= ($lastBalance != 0) ? ($pastBalance + $lastBalance / ($lastBalance * $lastBalance)) : 1;
                $pastK /= ($lastBalance != 0) ? $lastBalance : 1;

                $lastBalance = $pastBalance + $row->netProfit;
            }

            $pastBalance += $row->netProfit;
        }

        $averages_array = [];

        list($symbols_pie_array, $sell_array, $buy_array, $sell_buy_horizontal_line_numbers) = $this->getClinetSymbolsChart($login, $server_id);

        return [$horizontal_line_numbers, $growth_array, $averages_array, $this->getStatistics($login, $server_id),
            $symbols_pie_array,
            $sell_array,
            $buy_array,
            $sell_buy_horizontal_line_numbers,
            $growth
        ];
    }

    public function getClinetBalanceChart($login, $server_id)
    {

        $oGrowthResults = Mt4ClosedActualBalance::select([DB::raw('PROFIT+COMMISSION+SWAPS as netProfit'), 'CMD'])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->orderBy('CLOSE_TIME')
            ->get();


        $balance_array = [];
        $horizontal_line_numbers = [];

        $pastBalance = 0;
        $i = 0;
        $balance = 0;
        foreach ($oGrowthResults as $row) {


            $pastBalance += $row->netProfit;
            $balance = round($pastBalance, 2);
            $balance_array[] = $balance;
            $i++;
            $horizontal_line_numbers[] = $i;
        }


        list($symbols_pie_array, $sell_array, $buy_array, $sell_buy_horizontal_line_numbers) = $this->getClinetSymbolsChart($login, $server_id);
        return [$horizontal_line_numbers,
            $balance_array,
            $this->getStatistics($login, $server_id),
            $symbols_pie_array,
            $sell_array,
            $buy_array,
            $sell_buy_horizontal_line_numbers,
            $balance];
    }

    public function getClinetSymbolsChart($login, $server_id)
    {
        $oGrowthResults = Mt4ClosedActual::select([DB::raw('sum(VOLUME) as valume'), 'SYMBOL'])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->groupBy('SYMBOL')
            ->orderBy('CLOSE_TIME')
            ->get();


        $symbols_pie_array = [];
        $horizontal_line_numbers = [];
        $totalValume = 0;


        $i = 0;

        foreach ($oGrowthResults as $row) {
            $totalValume += $row->valume;
        }
        $totalValume = ($totalValume != 0) ? $totalValume : 1;
        foreach ($oGrowthResults as $row) {

            $valume = round($row->valume / $totalValume * 100, 2);

            $symbols_pie_array[] = ['name' => [$row->SYMBOL . ' ' . $valume . '%'], 'y' => $row->valume * 1];
        }


        $oSymbolsResults = Mt4ClosedActual::select([DB::raw('sum(VOLUME) as valume'), 'SYMBOL', 'CMD'])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->groupBy(['SYMBOL', 'CMD'])
            ->orderBy('SYMBOL')
            ->get();

        $sell_array = [];
        $buy_array = [];
        $totalSymbolsValume = [];

        foreach ($oSymbolsResults as $row) {
            if (isset($totalSymbolsValume[$row->SYMBOL])) {
                $totalSymbolsValume[$row->SYMBOL] += $row->valume;
            } else {
                $totalSymbolsValume[$row->SYMBOL] = $row->valume;
            }
        }
        foreach ($oSymbolsResults as $row) {

            $totalSymbolValume = ($totalSymbolsValume[$row->SYMBOL] != 0) ? $totalSymbolsValume[$row->SYMBOL] : 1;
            if (!in_array($row->SYMBOL, $horizontal_line_numbers)) {
                $horizontal_line_numbers[] = $row->SYMBOL;
            }
            if ($row->CMD == 1) {
                $sell_array[$row->SYMBOL] = $row->valume * -1 / $totalSymbolValume * 100;
                $buy_array[$row->SYMBOL] = (isset($buy_array[$row->SYMBOL])) ? $buy_array[$row->SYMBOL] : 0;
            } else if ($row->CMD == 0) {
                $buy_array[$row->SYMBOL] = $row->valume * 1 / $totalSymbolValume * 100;
                $sell_array[$row->SYMBOL] = (isset($sell_array[$row->SYMBOL])) ? $sell_array[$row->SYMBOL] : 0;
            }
        }
        $final_sell_array = [];
        $final_buy_array = [];
        foreach ($buy_array as $key => $value) {
            $final_sell_array[] = (isset($sell_array[$key])) ? $sell_array[$key] : 0;
            $final_buy_array[] = $buy_array[$key];
        }


        return [$symbols_pie_array, $final_sell_array, $final_buy_array, $horizontal_line_numbers];
    }

    public function getStatistics($login, $server_id)
    {

        /* ==== trades ==== */
        $trades = Mt4ClosedActual::where('login', $login)
            ->where('server_id', $server_id)->count();
        $statistics['trades'] = $trades;


        /* ==== profit_trades ==== */

        $profit_trades_number = Mt4ClosedActual::select(DB::raw('PROFIT+COMMISSION+SWAPS as total'))
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->having('total', '>=', '0')
            ->get()
            ->count();
        $profit_trades_per = ($trades > 0) ? round(($profit_trades_number / $trades * 100), 5) : 0;


        $statistics['profit_trades_number'] = $profit_trades_number;
        $statistics['profit_trades'] = $profit_trades_per;


        /* ==== loss_trade ==== */
        $loss_trade_number = $trades - $profit_trades_number;
        $loss_trade_per = ($trades > 0) ? round($loss_trade_number / $trades * 100, 5) : 0;

        $statistics['loss_trade_number'] = $loss_trade_number;
        $statistics['loss_trade'] = $loss_trade_per;

        /* ==== best_trade ==== */

        $oBest_trade = Mt4ClosedActual::select(['SYMBOL', 'PROFIT'])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->orderBy('PROFIT', 'desc')
            ->first();

        $statistics['best_trade'] = (count($oBest_trade)) ? $oBest_trade->PROFIT : 0;


        /* ==== worst_trade ==== */

        $oWorst_trade = Mt4ClosedActual::select(['SYMBOL', 'PROFIT'])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->orderBy('PROFIT', 'asc')
            ->first();
        $statistics['worst_trade'] = (count($oWorst_trade)) ? $oWorst_trade->PROFIT : 0;

        /* ==== gross_profit ==== */   /* ==== gross_loss ==== */ /* ==== profit ==== */

        $gross_profit_result = Mt4ClosedActual::select(['PROFIT', DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->having('total', '>', '0')
            ->get()
            ->sum('PROFIT');


        $statistics['gross_profit'] = $gross_profit_result;


        $gross_loss_result = Mt4ClosedActual::select(['PROFIT', DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->having('total', '<', '0')
            ->get()
            ->sum('PROFIT');
        $statistics['gross_loss'] = $gross_loss_result;


        $statistics['profit'] = $statistics['gross_profit'] + $statistics['gross_loss'];


        /* === maximal_consecutive_profit === */
        $consecutive_result = Mt4ClosedActual::select(['PROFIT', DB::raw('PROFIT+COMMISSION+SWAPS as total')])
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->orderBy('CLOSE_TIME')
            ->get();

        $maxWinArray = [];
        $pastMaxWinNumber = 0;
        $pastMaxWin = 0;


        $minWinArray = [];
        $pastMinWinNumber = 0;
        $pastMinWin = 0;

        $pastTradeLossOrWin = 'win';
        foreach ($consecutive_result as $row) {
            if ($row->total >= 0) {
                if ($pastTradeLossOrWin != 'win') {
                    $maxWinArray[] = [$pastMaxWinNumber, $pastMaxWin];
                    $pastMaxWinNumber = 1;
                    $pastMaxWin = $row->total;
                } else {

                    $pastMaxWinNumber += 1;
                    $pastMaxWin += $row->total;
                }


                $pastTradeLossOrWin = 'win';
            } else {
                if ($pastTradeLossOrWin != 'loss') {
                    $minWinArray[] = [$pastMinWinNumber, $pastMinWin];
                    $pastMinWinNumber = 1;
                    $pastMinWin = $row->total;

                } else {

                    $pastMinWinNumber += 1;
                    $pastMinWin += $row->total;
                }


                $pastTradeLossOrWin = 'loss';
            }

        }

        $maxWin = 0;
        $maxWinNumber = 0;
        foreach ($maxWinArray as $row) {
            if ($maxWinNumber < $row[0]) {
                $maxWin = $row[1];
                $maxWinNumber = $row[0];
            } elseif ($maxWinNumber == $row[0]) {
                $maxWin = ($maxWin > $row[1]) ? $maxWin : $row[1];
            }
        }

        $minWin = 0;
        $minWinNumber = 0;
        foreach ($minWinArray as $row) {
            if ($minWinNumber < $row[0]) {
                $minWin = $row[1];
                $minWinNumber = $row[0];
            } elseif ($minWinNumber == $row[0]) {
                $minWin = ($minWin < $row[1]) ? $minWin : $row[1];
            }
        }

        /*______________________________________________*/

        $maxProfit = 0;
        $maxProfitNumber = 0;
        foreach ($maxWinArray as $row) {
            if ($maxProfit < $row[1]) {
                $maxProfit = $row[1];
                $maxProfitNumber = $row[0];
            } elseif ($maxProfit == $row[1]) {
                $maxProfitNumber = ($maxProfitNumber > $row[0]) ? $maxProfitNumber : $row[0];
            }
        }

        $minProfit = 0;
        $minProfitNumber = 0;
        foreach ($minWinArray as $row) {
            if ($minProfit > $row[1]) {
                $minProfit = $row[1];
                $minProfitNumber = $row[0];
            } elseif ($minProfit == $row[1]) {
                $minProfitNumber = ($minProfitNumber < $row[0]) ? $minProfitNumber : $row[0];
            }
        }

        $statistics['maximum_consecutive_wins_number'] = $maxWinNumber;
        $statistics['maximum_consecutive_wins'] = $maxWin;


        $statistics['maximum_consecutive_losses_number'] = $minWinNumber;
        $statistics['maximum_consecutive_losses'] = $minWin;


        $statistics['maximal_consecutive_profit'] = $maxProfit;
        $statistics['maximal_consecutive_profit_number'] = $maxProfitNumber;

        $statistics['maximal_consecutive_loss'] = $minProfit;
        $statistics['maximal_consecutive_loss_number'] = $minProfitNumber;
        $statistics['sharpe_ratio'] = 00;
        $statistics['recovery_factor'] = 00;

        /* === long_trades ==== */

        $long_trades = Mt4ClosedActual::where('cmd', '=', '0')
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->count();
        $statistics['long_trades'] = $long_trades;

        /* === short_trades ==== */
        $short_trades = Mt4ClosedActual::where('cmd', '=', '1')
            ->where('login', $login)
            ->where('server_id', $server_id)
            ->count();
        $statistics['short_trades'] = $short_trades;


        /* === profits_factor ==== */
        $statistics['profits_factor'] = ($gross_loss_result != 0) ? $gross_profit_result / $gross_loss_result * 100 : 0;
        $statistics['profits_factor'] = ($gross_profit_result >= $gross_loss_result) ? abs($statistics['profits_factor']) : abs($statistics['profits_factor']) * -1;
        $statistics['profits_factor'] = round($statistics['profits_factor'], 5);

        $statistics['expected_payoff'] = 00;
        $statistics['average_profit'] = ($profit_trades_number > 0) ? round($gross_profit_result / $profit_trades_number, 2) : 0.0;
        $statistics['average_loss'] = ($loss_trade_number > 0) ? round($gross_loss_result / $loss_trade_number, 2) : 0.0;
        $statistics['monthly_grouth'] = 00;
        $statistics['annual_farecast'] = 00;
        return $statistics;
    }


    public function getAgentClosedTradesByFilters($aFilters, $bFullSet = false, $sOrderBy ='CLOSE_TIME', $sSort = 'ASC',$agent_id)
    {

        $oFxHelper = new Fx();

        $oResult = Mt4ClosedActual::with('Mt4Prices');

        $table_name="mt4_closed_actual";

        if (isset($aFilters['type']) && !empty($aFilters['type'])){
            if($aFilters['type'] == 1){
                $oResult = Mt4ClosedPending::with('Mt4Prices');
                $table_name="mt4_closed_pending";
            }
        }

        $agetUsersResult=\Modules\Ibportal\Entities\IbportalAgentUser::where('agent_id',$agent_id)->get();

        $users_id=[];
        foreach($agetUsersResult as $user){

            if ( isset($user->user_id))
                $users_id[] = $user->user_id;
        }

        if(!count($users_id)){return null;}

        $oResult=$oResult->join("mt4_users_users",function($query) use($users_id,$table_name){
            $query->on($table_name.".login","=","mt4_users_users.mt4_users_id");
            $query->on($table_name.".server_id","=","mt4_users_users.server_id");
            $query->whereIn("mt4_users_users.users_id",$users_id);
        });

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where($table_name.'.LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where($table_name.'.LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where($table_name.'.server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn($table_name.'.LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where($table_name.'.CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where($table_name.'.CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Symbols Filter  =============== */
        if (!isset($aFilters['all_symbols']) || !$aFilters['all_symbols']) {

            $aFilters['symbol']=(!is_array($aFilters['symbol']))? explode(',',$aFilters['symbol']):$aFilters['symbol'];
            $oResult = $oResult->whereIn($table_name.'.SYMBOL', $aFilters['symbol']);
        }

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }
        return $oResult;
    }


    public function getAgentOpenTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC',$agent_id)
    {
        $oFxHelper = new Fx();

        $oResult = Mt4OpenActual::with('Mt4Prices');

        $table_name="mt4_open_actual";

        if (isset($aFilters['type']) && !empty($aFilters['type'])){
            if($aFilters['type'] == 1){
                $oResult = Mt4OpenPending::with('Mt4Prices');
                $table_name="mt4_open_pending";
            }
        }

        $agetUsersResult=\Modules\Ibportal\Entities\IbportalAgentUser::where('agent_id',$agent_id)->get();

        $users_id=[];
        foreach($agetUsersResult as $user){

            if ( isset($user->user_id))
                $users_id[] = $user->user_id;
        }

        if(!count($users_id)){return null;}


        $oResult=$oResult->join("mt4_users_users",function($query) use($users_id,$table_name){
            $query->on($table_name.".login","=","mt4_users_users.mt4_users_id");
            $query->on($table_name.".server_id","=","mt4_users_users.server_id");
            $query->whereIn("mt4_users_users.users_id",$users_id);
        });

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where($table_name.'.LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where($table_name.'.LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where($table_name.'.server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn($table_name.'.LOGIN', $aUsers);
        }

        /* =============== Symbols Filter  =============== */
        if (!isset($aFilters['all_symbols']) || !$aFilters['all_symbols']) {
            $oResult = $oResult->whereIn($table_name.'.SYMBOL', $aFilters['symbol']);
        }
        /* =============== Type Filter  =============== */

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    public function getMoneyManagerClosedTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC',$agent_id)
    {
        $oFxHelper = new Fx();

        $oResult = Mt4Closed::with('Mt4Prices');


        $server_id=$aFilters['server_id'];
        $agentLogin=$aFilters['agentLogin'];

        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on(DB::raw("mt4_users.COMMENT"),DB::raw("like"),DB::raw(" CONCAT('%M:', mt4_users_users.mt4_users_id,';%') "));

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->get();


        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->LOGIN;
            }
        }else{
            return null;
        }

        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where('server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Type Filter  =============== */

        if (isset($aFilters['type']) && !empty($aFilters['type'])) {

            if ($aFilters['type'] == 1) {

                $oResult = $oResult->where('CMD', '<', 2);
            } elseif ($aFilters['type'] == 2) {

                $oResult = $oResult->whereBetween('CMD', [2, 5]);
            }
        } else {

            $oResult = $oResult->where('CMD', '<', 6);
        }

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }


        return $oResult;
    }


    public function getMoneyManagerOpenTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC',$agent_id)
    {
        $oFxHelper = new Fx();

        $oResult = Mt4OpenActual::with('Mt4Prices');



        $server_id=$aFilters['server_id'];
        $agentLogin=$aFilters['agentLogin'];

        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on(DB::raw("mt4_users.COMMENT"),DB::raw("like"),DB::raw(" CONCAT('%M:', mt4_users_users.mt4_users_id,';%') "));

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->get();


        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->LOGIN;
            }
        }else{
            return null;
        }


        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where('server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }

        /* =============== Type Filter  =============== */
        if (isset($aFilters['type']) && !empty($aFilters['type'])) {
            if ($aFilters['type'] == 1) {
                $oResult = $oResult->where('CMD', '<', 2);
            } elseif ($aFilters['type'] == 2) {
                $oResult = $oResult->whereBetween('CMD', [2, 5]);
            }
        } else {
            $oResult = $oResult->where('CMD', '<', 6);
        }

        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    public function getAgentsClosedTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC',$agent_id)
    {
        $oFxHelper = new Fx();

        $oResult = Mt4Closed::with('Mt4Prices');

        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on("mt4_users.AGENT_ACCOUNT","=","mt4_users_users.mt4_users_id");

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->get();


        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->LOGIN;
            }
        }else{
            return null;
        }

        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('mt4_closed.LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('mt4_closed.LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('mt4_closed.LOGIN', '<=', $aFilters['to_login']);
            }
        }


        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where('mt4_closed.server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);


            $oResult = $oResult->whereIn('mt4_closed.LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('mt4_closed.CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('mt4_closed.CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Type Filter  =============== */

        if (isset($aFilters['type']) && !empty($aFilters['type'])) {

            if ($aFilters['type'] == 1) {

                $oResult = $oResult->where('mt4_closed.CMD', '<', 2);
            } elseif ($aFilters['type'] == 2) {

                $oResult = $oResult->whereBetween('mt4_closed.CMD', [2, 5]);
            }
        } else {
            $oResult = $oResult->where('mt4_closed.CMD', '<', 6);
        }

        $oResult = $oResult->orderBy("mt4_closed.".$sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE

            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }


        return $oResult;
    }


    public function getAgentsOpenTradesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC',$agent_id)
    {

        $oFxHelper = new Fx();
        $oResult = Mt4OpenActual::with('Mt4Prices');

        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on("mt4_users.AGENT_ACCOUNT","=","mt4_users_users.mt4_users_id");

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->get();



        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->LOGIN;
            }
        }else{
            return null;
        }


        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        /* =============== Server Id Filter  =============== */

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where('mt4_open_actual.server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }

        /* =============== Type Filter  =============== */
        if (isset($aFilters['type']) && !empty($aFilters['type'])) {
            if ($aFilters['type'] == 1) {
                $oResult = $oResult->where('CMD', '<', 2);
            } elseif ($aFilters['type'] == 2) {
                $oResult = $oResult->whereBetween('CMD', [2, 5]);
            }
        } else {
            $oResult = $oResult->where('CMD', '<', 6);
        }

        $oResult = $oResult->orderBy("mt4_open_actual.".$sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE
            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }

        return $oResult;
    }

    public function getAgentsTradingVolumeByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC',$agent_id)
    {
        $oFxHelper = new Fx();

        $oResult = Mt4ClosedActual::with('Mt4Prices');

        /* =================================== */

        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on("mt4_users.AGENT_ACCOUNT","=","mt4_users_users.mt4_users_id");

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->get();

        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->LOGIN;
            }
        }else{
            return null;
        }

        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('mt4_closed_actual.LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('mt4_closed_actual.LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('mt4_closed_actual.LOGIN', '<=', $aFilters['to_login']);
            }
        }


        /* =============== Type Filter  =============== */

        if (isset($aFilters['type']) && !empty($aFilters['type'])) {

            if ($aFilters['type'] == 1) {

                $oResult = $oResult->where('mt4_closed_actual.CMD', '<', 2);
            } elseif ($aFilters['type'] == 2) {

                $oResult = $oResult->whereBetween('mt4_closed_actual.CMD', [2, 5]);
            }
        } else {

            $oResult = $oResult->where('mt4_closed_actual.CMD', '<', 6);
        }

        $oResult = $oResult->groupBy("mt4_closed_actual.LOGIN");
        $oResult = $oResult->select(['*',DB::raw('sum(VOLUME)/100 as tradingVolume')]);

        $oResult = $oResult->orderBy("mt4_closed_actual.".$sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE

            $price=$oValue->Mt4Prices;

            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }


        return $oResult;
    }



    public function getAgentsRebateByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC',$agent_id)
    {
        $oFxHelper = new Fx();

        $oResult = Mt4ClosedBalance::with('Mt4Prices');

        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on("mt4_users.AGENT_ACCOUNT","=","mt4_users_users.mt4_users_id");

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->distinct('mt4_users.AGENT_ACCOUNT')->get();



        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->AGENT_ACCOUNT;
            }
        }else{
            return null;
        }


        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('mt4_closed_balance.LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('mt4_closed_balance.LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('mt4_closed_balance.LOGIN', '<=', $aFilters['to_login']);
            }
        }



        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('mt4_closed_balance.LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('mt4_closed_balance.CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('mt4_closed_balance.CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }


        /* =============== Type Filter  =============== */

        $oResult = $oResult->where('mt4_closed_balance.CMD', '=', 6);
        $oResult = $oResult->where('mt4_closed_balance.PROFIT', '>',0);

        $oResult = $oResult->orderBy("mt4_closed_balance.".$sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }

        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getCmdType($oValue->CMD);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->COMMISSION = round($oResult[$dKey]->COMMISSION, 2);
            $oResult[$dKey]->SWAPS = round($oResult[$dKey]->SWAPS, 2);
            $oResult[$dKey]->PROFIT = round($oResult[$dKey]->PROFIT, 2);

            //OPenPrice/SL/TP/CLOSED_PRICE

            $price=$oValue->Mt4Prices;


            $digits =($price) ? $price->DIGITS : 5;
            $oResult[$dKey]->OPEN_PRICE = round($oResult[$dKey]->OPEN_PRICE, $digits);
            $oResult[$dKey]->SL = round($oResult[$dKey]->SL, $digits);
            $oResult[$dKey]->TP = round($oResult[$dKey]->TP, $digits);
            $oResult[$dKey]->CLOSE_PRICE = round($oResult[$dKey]->CLOSE_PRICE, $digits);
        }


        return $oResult;
    }


    public function getAgentsDepositWithdrawalByFilters($aFilters, $bFullSet = false, $sOrderBy = 'CLOSE_TIME', $sSort = 'ASC')
    {
        $oFxHelper = new Fx();
        $oResult = Mt4ClosedBalance::with('Mt4Prices');
        $aSummury = [];
        /* ===============================check admin or user================ */
        $oResult = Mt4ClosedBalance::with('Mt4Prices');


        $mt4_users=modelMt4User::join("mt4_users_users",function($query) {
            $query->on("mt4_users.AGENT_ACCOUNT","=","mt4_users_users.mt4_users_id");

            $query->where("mt4_users_users.users_id","=",current_user()->getUser()->id);
            $query->where("mt4_users_users.server_id","=",0);
        })->where("mt4_users.server_id","=",0)->get();



        $mt4_users_array=[];
        if(count($mt4_users)){
            foreach($mt4_users as $user){
                $mt4_users_array[]=$user->LOGIN;
            }
        }else{
            return null;
        }


        $oResult=$oResult->whereIn('LOGIN',$mt4_users_array);
        $oResult=$oResult->where('server_id',"=",0);

        /* =============== Login Filters =============== */

        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        ) {

            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }

        if (isset($aFilters['server_id']) && in_array($aFilters['server_id'], [0, 1])) {

            $oResult = $oResult->where('server_id', $aFilters['server_id']);
        }

        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            $aUsers = $this->oUsers->getLoginsInGroup($aFilters['group']);
            $oResult = $oResult->whereIn('LOGIN', $aUsers);
        }

        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('CLOSE_TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }

        /* =============== Get sum info and others =============== */
        $depositResult = clone $oResult;
        $WithdrawalResult = clone $oResult;
        $creditInResult = clone $oResult;
        $creditOutResult = clone $oResult;


        $aSummury ['deposits'] = $depositResult->where('CMD', 6)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['Withdrawal'] = $WithdrawalResult->where('CMD', 6)->where('PROFIT', '<', 0)->sum('PROFIT');
        $aSummury ['creditIn'] = $creditInResult->where('CMD', 7)->where('PROFIT', '>', 0)->sum('PROFIT');
        $aSummury ['creditOut'] = $creditOutResult->where('CMD', 7)->where('PROFIT', '<', 0)->sum('PROFIT');


        if (isset($aFilters['type']) && !empty($aFilters['type'])) {
            if ($aFilters['type'] == 1) {
                $oResult = $oResult->where('CMD', 6);
            } elseif ($aFilters['type'] == 2) {
                $oResult = $oResult->where('CMD', 7);
            } elseif ($aFilters['type'] == 3) {
                $oResult = $oResult->where('CMD', 6)->where('PROFIT', '>', 0);
            } elseif ($aFilters['type'] == 4) {
                $oResult = $oResult->where('CMD', 6)->where('PROFIT', '<', 0);
            } elseif ($aFilters['type'] == 5) {
                $oResult = $oResult->where('CMD', 7)->where('PROFIT', '>', 0);
            } elseif ($aFilters['type'] == 6) {
                $oResult = $oResult->where('CMD', 7)->where('PROFIT', '<', 0);
            }
        } else {
            $oResult = $oResult->whereIn('CMD', [6,7]);
        }
        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();
        }
        /* =============== Preparing Output  =============== */
        foreach ($oResult as $dKey => $oValue) {
            // Set CMD type
            $oResult[$dKey]->TYPE = $oFxHelper->getAccountantType($oValue->CMD, $oValue->PROFIT);
            $oResult[$dKey]->VOLUME = $oValue->VOLUME / 100;

            $oResult[$dKey]->EQUITY = round($oResult[$dKey]->EQUITY, 2);
            $oResult[$dKey]->BALANCE = round($oResult[$dKey]->BALANCE, 2);
            $oResult[$dKey]->AGENT_ACCOUNT = round($oResult[$dKey]->AGENT_ACCOUNT, 2);
            $oResult[$dKey]->MARGIN = round($oResult[$dKey]->MARGIN, 2);
            $oResult[$dKey]->MARGIN_FREE = round($oResult[$dKey]->MARGIN_FREE, 2);
            $oResult[$dKey]->LEVERAGE = round($oResult[$dKey]->LEVERAGE, 2);
        }
        return [$oResult, $aSummury];
    }

    public function getDailyReportByFilters($aFilters, $bFullSet = false, $sOrderBy = 'TICKET', $sSort = 'ASC')
    {

        /* ===============================check admin or user================ */
        $oResult = '';
        if ($user = current_user()->getUser()) {

            if (!$user->InRole('admin')) {

                $account_id = $user->id;
                $oResult = MT4Daily::with('users')->whereHas('users', function ($query) use ($account_id) {
                    $query->where('users_id', $account_id);
                });
            } else {
                $oResult =new MT4Daily();
            }
        }

        /* =============== Login Filters =============== */
        if (isset($aFilters['exactLogin']) && $aFilters['exactLogin']) {
            $oResult = $oResult->where('LOGIN', $aFilters['login']);
        } else if ((isset($aFilters['from_login']) && !empty($aFilters['from_login'])) ||
            (isset($aFilters['to_login']) && !empty($aFilters['to_login']))
        )

        {
            if (!empty($aFilters['from_login'])) {
                $oResult = $oResult->where('LOGIN', '>=', $aFilters['from_login']);
            }

            if (!empty($aFilters['to_login'])) {
                $oResult = $oResult->where('LOGIN', '<=', $aFilters['to_login']);
            }
        }
        /* =============== server_id =============== */
        if (isset($aFilters['server_id']) && $aFilters['server_id']&& $aFilters['server_id'] !='-1' ) {

            $oResult = $oResult->where('server_id', '=', $aFilters['server_id']);

        }


        /* =============== Groups Filter  =============== */
        if (!isset($aFilters['all_groups']) || !$aFilters['all_groups']) {
            if (!empty($aFilters['group'])) {
                if (is_array( $aFilters['group'])){
                    $oResult = $oResult->whereIn('GROUP',$aFilters['group']);
                }else{
                    $oResult = $oResult->where('GROUP','=',$aFilters['group']);
                }
            }
        }
        /* =============== Date Filter  =============== */
        if ((isset($aFilters['from_date']) && !empty($aFilters['from_date'])) ||
            (isset($aFilters['to_date']) && !empty($aFilters['to_date']))
        ) {

            if (!empty($aFilters['from_date'])) {
                $oResult = $oResult->where('TIME', '>=', $aFilters['from_date'] . ' 00:00:00');
            }

            if (!empty($aFilters['to_date'])) {
                $oResult = $oResult->where('TIME', '<=', $aFilters['to_date'] . ' 23:59:59');
            }
        }



        /* =============== chart data ===================== */
        $chartQuery=clone $oResult;

        $oResult = $oResult->orderBy('TIME', "asc");
        $chartQueryResult = $chartQuery->paginate(Config::get('fxweb.pagination_size'));
        list($RenderedChartData,$chartXLine)= $this->getDailyReportChartData($chartQueryResult);

        /* =============== $oResult = $oResult; ===================== */
        $oResult = $oResult->orderBy($sOrderBy, $sSort);


        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));


        } else {
            $oResult = $oResult->get();
        }
        return [$oResult,$RenderedChartData,$chartXLine] ;
    }

    public function getDailyReportChartData($oChartDataResult)
    {

        $demoServerName=config('fxweb.servers')[1]['serverName'];
        $liveServerName=config('fxweb.servers')[0]['serverName'];
        $chartDataGroupDate=[];
        $RenderedChartData=[];
        $logins=[];
        $loginsDataArray=[];
        $chartXLine=[];

        if($oChartDataResult){
            foreach($oChartDataResult as $row){
                $date=explode(' ',$row->TIME)[0];
                $serverName=($row->server_id==0)? $liveServerName:$demoServerName;
                $loginName=$row->LOGIN .' - '.$serverName;
                $chartDataGroupDate[$date][$loginName]=  $row->BALANCE;
                $logins[$loginName]='demo value';
            }

            foreach($chartDataGroupDate as $date=>$loginsArray) {
                $chartXLine[]=$date;
                foreach($logins as $login=>$demoData) {
                    $value=(isset($loginsArray[$login]))? $loginsArray[$login]:((isset($loginsDataArray[$login]))?last($loginsDataArray[$login]):0);
                    $loginsDataArray[$login][]=$value;
                }
            }

            foreach($logins as $login=>$demoData) {
                $RenderedChartData[] = [
                    'name' => $login,
                    'data' => $loginsDataArray[$login]
                ];
            }
        }
        return [$RenderedChartData,$chartXLine];
    }
}
