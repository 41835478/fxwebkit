<?php

namespace Modules\Mt4Configrations\Repositories;


use Modules\Mt4configrations\Entities\ConfigrationsGroups as Groups;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsMargin as GroupsMargin;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsSecurities as GroupsSecurities;
use Modules\Mt4configrations\Entities\ConfigrationsSymbolGroup as SymbolGroup;
use Modules\Mt4configrations\Entities\ConfigrationsSymbols as Symbols;
use Modules\Mt4configrations\Entities\ConfigrationsSession as Session;
use Modules\Ibportal\Entities\IbportalAliases as Aliases;

use Config;

class EloquentMt4ConfigrationsContractRepository implements Mt4ConfigrationsContract
{


    private $apiAdminPassword;
    private $mt4Host;
    private $mt4Port;

    public function __construct()
    {

        $this->mt4Host = Config('fxweb.mt4CheckHost');
        $this->mt4Port = Config('fxweb.mt4CheckPort');
    }

    private function sendApiMessage($message)
    {


        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) return false;


        $result = socket_connect($socket, $this->mt4Host, $this->mt4Port);
        $string = '';
        if ($result === false) {
            return false;
        } else {

            socket_write($socket, $message . "\nQUIT\n", strlen($message . "\nQUIT\n"));
            while (socket_recv($socket, $data, 8192, 0)) {
                $string .= $data;
            }
        }
        return $string;


    }

    public function getSymbolsByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Symbols();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }


    public function getSecuritiesByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new SymbolGroup();


        if (isset($aFilters['name']) && !empty($aFilters['name'])) {

            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
        }
        $oResult = $oResult->where('name','!=','');

        $oResult = $oResult->orderBy($sOrderBy, $sSort);


        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

        } else {
            $oResult = $oResult->get();


        }

        return $oResult;

    }


    public function getGroupsByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Groups();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');

        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }


    public function addGroups()
    {

        $message='WMQADMINWEBAPI MASTER='.Config('mt4configrations.apiAdminPassword').'|MODE=3';

        $apiGroups=json_decode(utf8_encode($this->sendApiMessage($message)));


        if(isset($apiGroups->result) && $apiGroups->result==1 &&  isset($apiGroups->data) && count($apiGroups->data)) {

            $groups = [];
            $groupSecs=[];
            $groupMargins=[];
            foreach ($apiGroups->data as $group) {
                $groups[] = [

                    'group' => $group->group,
                    'enable' => $group->enable,
                    'timeout' => $group->timeout,
                    'otp_mode' => $group->otp_mode,
                    'company' => $group->company,
                    'signature' => $group->signature,
                    'support_page' => $group->support_page,
                    'smtp_server' => $group->smtp_server,
                    'smtp_login' => $group->smtp_login,
                    'smtp_password' => $group->smtp_password,
                    'support_email' => $group->support_email,
                    'templates' => $group->templates,
                    'copies' => $group->copies,
                    'reports' => $group->reports,
                    'default_leverage' => $group->default_leverage,
                    'default_deposit' => $group->default_deposit,
                    'maxsecurities' => $group->maxsecurities,
//                    'ConGroupSec' => $group->secgroups,
//                    'ConGroupMargin' => $group->secmargins,
                    'secmargins_total' => $group->secmargins_total,
                    'currency' =>$group->currency,
                    'credit' => $group->credit,
                    'margin_call' => $group->margin_call,
                    'margin_mode' => $group->margin_mode,
                    'margin_stopout' => $group->margin_stopout,
                    'interestrate' => $group->interestrate,
                    'use_swap' => $group->use_swap,
                    'news' => $group->news,
                    'rights' => $group->rights,
                    'check_ie_prices' => $group->check_ie_prices,
                    'maxpositions' => $group->maxpositions,
                    'close_reopen' => $group->close_reopen,
                    'hedge_prohibited' => $group->hedge_prohibited,
                    'close_fifo' => $group->close_fifo,
                    'hedge_largeleg' =>$group->hedge_largeleg,
                    'unused_rights' => '',
                    'securities_hash' => $group->securities_hash,
                    'margin_type' => $group->margin_type,
                    'archive_period' => $group->archive_period,
                    'archive_max_balance' => $group->archive_max_balance,
                    'stopout_skip_hedged' => $group->stopout_skip_hedged,
                    'archive_pending_period' => $group->archive_pending_period,
                    'news_languages' => '',
                    'news_languages_total' => '',
                    'reserved' => ''];




                if(count( $group->secgroups)){

                    foreach( $group->secgroups as $groupSec){
                        $groupSecs[]= [
                            'position'=>$groupSec->position,
                            'show'=>$groupSec->show,
                            'trade'=>$groupSec->trade,
                            'execution'=>$groupSec->execution,
                            'comm_base'=>$groupSec->comm_base,
                            'comm_type'=>$groupSec->comm_type,
                            'comm_lots'=>$groupSec->comm_lots,
                            'comm_agent'=>$groupSec->comm_agent,
                            'comm_agent_type'=>$groupSec->comm_agent_type,
                            'spread_diff'=>$groupSec->spread_diff,
                            'lot_min'=>$groupSec->lot_min,
                            'lot_max'=>$groupSec->lot_max,
                            'lot_step'=>$groupSec->lot_step,
                            'ie_deviation'=>$groupSec->ie_deviation,
                            'confirmation'=>$groupSec->confirmation,
                            'trade_rights'=>$groupSec->trade_rights,
                            'ie_quick_mode'=>$groupSec->ie_quick_mode,
                            'autocloseout_mode'=>$groupSec->autocloseout_mode,
                            'comm_tax'=>$groupSec->comm_tax,
                            'comm_agent_lots'=>$groupSec->comm_agent_lots,
                            'freemargin_mode'=>$groupSec->freemargin_mode,
                            'reserved'=>'']
                        ;
                    }
                }
                if(count( $group->secmargins)){

                    foreach( $group->secmargins as $groupMargin){
                        $groupMargins[]= [
                            'position'=>$groupMargin->position,
                            'symbol'=>$groupMargin->symbol,
                            'swap_long'=>$groupMargin->swap_long,
                            'swap_short'=>$groupMargin->swap_short,
                            'margin_divider'=>$groupMargin->margin_divider,
                            'reserved'=>''

                        ]
                        ;
                    }
                }
            }

            if(count($groups)){
                Groups::truncate();
                GroupsSecurities::truncate();
                GroupsMargin::truncate();
                Groups::insert($groups);
                GroupsSecurities::insert($groupSecs);
                GroupsMargin::insert($groupMargins);
                return true;
            }
        }

        return false;
    }


    public function addSecurities()
    {

        $message='WMQADMINWEBAPI MASTER='.Config('mt4configrations.apiAdminPassword').'|MODE=2';

        $apiSecurity= json_decode($this->sendApiMessage($message));

        if(isset($apiSecurity->result) && $apiSecurity->result==1 &&  isset($apiSecurity->data) && count($apiSecurity->data)){
            SymbolGroup::truncate();
            $groups=[];
            foreach($apiSecurity->data as $security){

                $groups[] = [
                    'name' => $security->name,
                    'description' =>  $security->description,
                    'position' =>  $security->position];


            }
            SymbolGroup::insert($groups);


            return true;
        }

        return false;
    }

    public function synchronizeSymbols()
    {


        $message='WMQADMINWEBAPI MASTER='.Config('mt4configrations.apiAdminPassword').'|MODE=1';

        $apiSymbols= json_decode($this->sendApiMessage($message));


        if(isset($apiSymbols->result) && $apiSymbols->result==1 &&  isset($apiSymbols->data) && count($apiSymbols->data)){
            Symbols::truncate();
            $emptyAliases=(Aliases::first())? false:true;
            $symbols=[];
            $aliases=[];
            $sessions=[];
            foreach($apiSymbols->data as $symbol){

                $symbols[] = [

           //         'name'=>'',
                    'securities_id'=>'securities_id',
                    'symbol'=>$symbol->symbol,
                    'description'=>$symbol->description,
                    'source'=>$symbol->source,
                    'currency'=>$symbol->currency,
                    'type'=>$symbol->type,
                    'digits'=>$symbol->digits,
                    'trade'=>$symbol->trade,
                    'background_color'=>'',
                    'count'=>$symbol->count,
                    'count_original'=>$symbol->count_original,
                    'external_unused'=>'',
                    'realtime'=>$symbol->realtime,
                    'starting'=>$symbol->starting,
                    'expiration'=>$symbol->expiration,
                    //'sessions'=>$symbol->sessions,/////////////////////
                    'profit_mode'=>$symbol->profit_mode,
                    'profit_reserved'=>$symbol->profit_reserved,
                    'filter'=>$symbol->filter,
                    'filter_counter'=>$symbol->filter_counter,
                    'filter_limit'=>$symbol->filter_limit,
                    'filter_smoothing'=>$symbol->filter_smoothing,
                    'filter_reserved'=>$symbol->filter_reserved,
                    'logging'=>$symbol->logging,
                    'spread'=>$symbol->spread,
                    'spread_balance'=>$symbol->spread_balance,
                    'exemode'=>$symbol->exemode,
                    'swap_enable'=>$symbol->swap_enable,
                    'swap_type'=>$symbol->swap_type,
                    'swap_long'=>$symbol->swap_long,
                    'swap_short'=>$symbol->swap_short,
                    'swap_rollover3days'=>$symbol->swap_rollover3days,
                    'contract_size'=>$symbol->contract_size,
                    'tick_value'=>$symbol->tick_value,
                    'tick_size'=>$symbol->tick_size,
                    'stops_level'=>$symbol->stops_level,
                    'gtc_pendings'=>$symbol->gtc_pendings,
                    'margin_mode'=>$symbol->margin_mode,
                    'margin_initial'=>$symbol->margin_initial,
                    'margin_maintenance'=>$symbol->margin_maintenance,
                    'margin_hedged'=>$symbol->margin_hedged,
                    'margin_divider'=>$symbol->margin_divider,
                    'point'=>$symbol->point,
                    'multiply'=>$symbol->multiply,
                    'bid_tickvalue'=>$symbol->bid_tickvalue,
                    'ask_tickvalue'=>$symbol->ask_tickvalue,
                    'long_only'=>$symbol->long_only,
                    'instant_max_volume'=>$symbol->instant_max_volume,
                    'margin_currency'=>$symbol->margin_currency,
                    'freeze_level'=>$symbol->freeze_level,
                    'margin_hedged_strong'=>$symbol->margin_hedged_strong,
                    'value_date'=>$symbol->value_date,
                    'quotes_delay'=>$symbol->quotes_delay,
                    'swap_openprice'=>$symbol->swap_openprice,
                    'swap_variation_margin'=>$symbol->swap_variation_margin,
              //      'unused'=>''
              ];



                Session::truncate();
                if(isset($symbol->sessions) && count($symbol->sessions)){
                    foreach($symbol->sessions as $session){

                        $sessions[]=['symbol'=>$symbol->symbol,
                            'quote'=>serialize($session->quote),
                            'trade'=>serialize($session->trade),
                            'quote_overnight'=>$session->quote_overnight,
                            'trade_overnight'=>$session->trade_overnight,
                            // 'reserved'=>$session->reserved
                        ];
                    }


                }

                if($emptyAliases){
                    $aliases[]=['alias'=>$symbol->symbol,'operand'=>'Equals','value'=>$symbol->symbol];
                }
            }

            if(count($symbols))Symbols::insert($symbols);
            if(count($sessions))Session::insert($sessions);
            if(count($aliases))Aliases::insert($aliases);
            return true;



        }

        return false;
    }


}
