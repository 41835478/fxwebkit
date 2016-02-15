<?php

namespace Modules\Mt4Configrations\Repositories;


use Modules\Mt4configrations\Entities\ConfigrationsGroups as Groups;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsMargin as GroupsMargin;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsSecurities as GroupsSecurities;
use Modules\Mt4configrations\Entities\ConfigrationsSymbolGroup as SymbolGroup;
use Modules\Mt4configrations\Entities\ConfigrationsSymbols as Symbols;
use Modules\Mt4configrations\Entities\ConfigrationsSession as Session;
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
        if ($socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
        } else {
            echo "OK.\n";
        }


        $result = socket_connect($socket, $this->mt4Host, $this->mt4Port);
        $string = '';
        if ($result === false) {

        } else {
            echo "OK.\n" . socket_strerror(socket_last_error());
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
        $oAddFullGroupInfo = [
            'id' => '',
            'group' => 'group',
            'enable' => 'enable',
            'timeout' => 'timeout',
            'otp_mode' => 'otp_mode',
            'company' => 'company',
            'signature' => 'signature',
            'support_page' => 'support_page',
            'smtp_server' => 'smtp_server',
            'smtp_login' => 'smtp_login',
            'smtp_password' => 'smtp_password',
            'support_email' => 'support_email',
            'templates' => 'templates',
            'copies' => 'copies',
            'reports' => 'reports',
            'default_leverage' => 'default_leverage',
            'default_deposit' => 'default_deposit',
            'maxsecurities' => 'maxsecurities',
            'ConGroupSec' => 'ConGroupSec',
            'ConGroupMargin' => 'ConGroupMargin',
            'secmargins_total' => 'secmargins_total',
            'currency' => 'currency',
            'credit' => 'credit',
            'margin_call' => 'margin_call',
            'margin_mode' => 'margin_mode',
            'margin_stopout' => 'margin_stopout',
            'interestrate' => 'interestrate',
            'use_swap' => 'use_swap',
            'news' => 'news',
            'rights' => 'rights',
            'check_ie_prices' => 'check_ie_prices',
            'maxpositions' => 'maxpositions',
            'close_reopen' => 'close_reopen',
            'hedge_prohibited' => 'hedge_prohibited',
            'close_fifo' => 'close_fifo',
            'hedge_largeleg' => 'hedge_largeleg',
            'unused_rights' => 'unused_rights',
            'securities_hash' => 'securities_hash',
            'margin_type' => 'margin_type',
            'archive_period' => 'archive_period',
            'archive_max_balance' => 'archive_max_balance',
            'stopout_skip_hedged' => 'stopout_skip_hedged',
            'archive_pending_period' => 'archive_pending_period',
            'news_languages' => 'news_languages',
            'news_languages_total' => 'news_languages_total',
            'reserved' => 'reserved'];

        Groups::create($oAddFullGroupInfo);


        return true;
    }


    public function addSecurities()
    {
        $oAddFullSecuritieInfo = [
            'id' => '',
            'name' => 'name',
            'description' => 'description'];

        SymbolGroup::create($oAddFullSecuritieInfo);


        return true;
    }

    public function synchronizeSymbols()
    {


        $message = 'WMQADMINWEBAPI MASTER=' . Config('mt4configrations.apiAdminPassword') . '|MODE=1';

        $apiSymbols = json_decode($this->sendApiMessage($message));


        if (isset($apiSymbols->result) && $apiSymbols->result == 1 && isset($apiSymbols->data) && count($apiSymbols->data)) {
            Symbols::truncate();
            foreach ($apiSymbols->data as $symbol) {

                $oAddFullSymbolsInfo = [

                    'name' => '',
                    'securities_id' => 'securities_id',
                    'symbol' => $symbol->symbol,
                    'description' => $symbol->description,
                    'source' => $symbol->source,
                    'currency' => $symbol->currency,
                    'type' => $symbol->type,
                    'digits' => $symbol->digits,
                    'trade' => $symbol->trade,
                    'background_color' => '',
                    'count' => $symbol->count,
                    'count_original' => $symbol->count_original,
                    'external_unused' => '',
                    'realtime' => $symbol->realtime,
                    'starting' => $symbol->starting,
                    'expiration' => $symbol->expiration,
                    //'sessions'=>$symbol->sessions,/////////////////////
                    'profit_mode' => $symbol->profit_mode,
                    'profit_reserved' => $symbol->profit_reserved,
                    'filter' => $symbol->filter,
                    'filter_counter' => $symbol->filter_counter,
                    'filter_limit' => $symbol->filter_limit,
                    'filter_smoothing' => $symbol->filter_smoothing,
                    'filter_reserved' => $symbol->filter_reserved,
                    'logging' => $symbol->logging,
                    'spread' => $symbol->spread,
                    'spread_balance' => $symbol->spread_balance,
                    'exemode' => $symbol->exemode,
                    'swap_enable' => $symbol->swap_enable,
                    'swap_type' => $symbol->swap_type,
                    'swap_long' => $symbol->swap_long,
                    'swap_short' => $symbol->swap_short,
                    'swap_rollover3days' => $symbol->swap_rollover3days,
                    'contract_size' => $symbol->contract_size,
                    'tick_value' => $symbol->tick_value,
                    'tick_size' => $symbol->tick_size,
                    'stops_level' => $symbol->stops_level,
                    'gtc_pendings' => $symbol->gtc_pendings,
                    'margin_mode' => $symbol->margin_mode,
                    'margin_initial' => $symbol->margin_initial,
                    'margin_maintenance' => $symbol->margin_maintenance,
                    'margin_hedged' => $symbol->margin_hedged,
                    'margin_divider' => $symbol->margin_divider,
                    'point' => $symbol->point,
                    'multiply' => $symbol->multiply,
                    'bid_tickvalue' => $symbol->bid_tickvalue,
                    'ask_tickvalue' => $symbol->ask_tickvalue,
                    'long_only' => $symbol->long_only,
                    'instant_max_volume' => $symbol->instant_max_volume,
                    'margin_currency' => $symbol->margin_currency,
                    'freeze_level' => $symbol->freeze_level,
                    'margin_hedged_strong' => $symbol->margin_hedged_strong,
                    'value_date' => $symbol->value_date,
                    'quotes_delay' => $symbol->quotes_delay,
                    'swap_openprice' => $symbol->swap_openprice,
                    'swap_variation_margin' => $symbol->swap_variation_margin,
                    'unused' => ''];


                Symbols::create($oAddFullSymbolsInfo);

                Session::truncate();
                foreach ($symbol->sessions as $session) {

                    Session::create(['symbol' => $symbol->symbol,
                        'quote' => serialize($session->quote),
                        'trade' => serialize($session->trade),
                        'quote_overnight' => $session->quote_overnight,
                        'trade_overnight' => $session->trade_overnight,
                        // 'reserved'=>$session->reserved
                    ]);


                }
            }
            return true;


        }

        return false;
    }


}
