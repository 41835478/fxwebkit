<?php

namespace Modules\Mt4Configrations\Repositories;



use Modules\Mt4configrations\Entities\ConfigrationsGroups as Groups;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsMargin as GroupsMargin;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsSecurities as GroupsSecurities;
use Modules\Mt4configrations\Entities\ConfigrationsSymbolGroup as SymbolGroup;
use Modules\Mt4configrations\Entities\ConfigrationsSymbols as Symbols;
use Config;

class EloquentMt4ConfigrationsContractRepository implements Mt4ConfigrationsContract
{

    /**
     */
    public function __construct()
    {
        //
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
            'id'=>'',
            'group'=>'group',
            'enable'=>'enable',
            'timeout'=>'timeout',
            'otp_mode'=>'otp_mode',
            'company'=>'company',
            'signature'=>'signature',
            'support_page'=>'support_page',
            'smtp_server'=>'smtp_server',
            'smtp_login'=>'smtp_login',
            'smtp_password'=>'smtp_password',
            'support_email'=>'support_email',
            'templates'=>'templates',
            'copies'=>'copies',
            'reports'=>'reports',
            'default_leverage'=>'default_leverage',
            'default_deposit'=>'default_deposit',
            'maxsecurities'=>'maxsecurities',
            'ConGroupSec'=>'ConGroupSec',
            'ConGroupMargin'=>'ConGroupMargin',
            'secmargins_total'=>'secmargins_total',
            'currency'=>'currency',
            'credit'=>'credit',
            'margin_call'=>'margin_call',
            'margin_mode'=>'margin_mode',
            'margin_stopout'=>'margin_stopout',
            'interestrate'=>'interestrate',
            'use_swap'=>'use_swap',
            'news'=>'news',
            'rights'=>'rights',
            'check_ie_prices'=>'check_ie_prices',
            'maxpositions'=>'maxpositions',
            'close_reopen'=>'close_reopen',
            'hedge_prohibited'=>'hedge_prohibited',
            'close_fifo'=>'close_fifo',
            'hedge_largeleg'=>'hedge_largeleg',
            'unused_rights'=>'unused_rights',
            'securities_hash'=>'securities_hash',
            'margin_type'=>'margin_type',
            'archive_period'=>'archive_period',
            'archive_max_balance'=>'archive_max_balance',
            'stopout_skip_hedged'=>'stopout_skip_hedged',
            'archive_pending_period'=>'archive_pending_period',
            'news_languages'=>'news_languages',
            'news_languages_total'=>'news_languages_total',
            'reserved'=>'reserved'];

        Groups::create($oAddFullGroupInfo);


        return true;
    }


    public function addSecurities()
    {
        $oAddFullSecuritieInfo = [
            'id'=>'',
            'name'=>'name',
            'description'=>'description'];

        SymbolGroup::create($oAddFullSecuritieInfo);


        return true;
    }

    public function addSymbols()
    {

        $oAddFullSymbolsInfo = [
            'id'=>'',
            'name'=>'name',
            'securities_id'=>'securities_id',
            'symbol'=>'symbol',
            'description'=>'description',
            'source'=>'source',
            'currency'=>'currency',
            'type'=>'type',
            'digits'=>'digits',
            'trade'=>'trade',
            'background_color'=>'background_color',
            'count'=>'count',
            'count_original'=>'count_original',
            'external_unused'=>'external_unused',
            'realtime'=>'realtime',
            'starting'=>'starting',
            'expiration'=>'expiration',
            'sessions'=>'sessions',
            'profit_mode'=>'profit_mode',
            'profit_reserved'=>'profit_reserved',
            'filter'=>'filter',
            'filter_counter'=>'filter_counter',
            'filter_limit'=>'filter_limit',
            'filter_smoothing'=>'filter_smoothing',
            'filter_reserved'=>'filter_reserved',
            'logging'=>'logging',
            'spread'=>'spread',
            'spread_balance'=>'spread_balance',
            'exemode'=>'exemode',
            'swap_enable'=>'swap_enable',
            'swap_type'=>'swap_type',
            'swap_long'=>'swap_long',
            'swap_short'=>'swap_short',
            'swap_rollover3days'=>'swap_rollover3days',
            'contract_size'=>'contract_size',
            'tick_value'=>'tick_value',
            'tick_size'=>'tick_size',
            'stops_level'=>'stops_level',
            'gtc_pendings'=>'gtc_pendings',
            'margin_mode'=>'margin_mode',
            'margin_initial'=>'margin_initial',
            'margin_maintenance'=>'margin_maintenance',
            'margin_hedged'=>'margin_hedged',
            'margin_divider'=>'margin_divider',
            'point'=>'point',
            'multiply'=>'multiply',
            'bid_tickvalue'=>'bid_tickvalue',
            'ask_tickvalue'=>'ask_tickvalue',
            'long_only'=>'long_only',
            'instant_max_volume'=>'instant_max_volume',
            'margin_currency'=>'margin_currency',
            'freeze_level'=>'freeze_level',
            'margin_hedged_strong'=>'margin_hedged_strong',
            'value_date'=>'value_date',
            'quotes_delay'=>'quotes_delay',
            'swap_openprice'=>'swap_openprice',
            'swap_variation_margin'=>'swap_variation_margin',
            'unused'=>'unused'];


        Symbols::create($oAddFullSymbolsInfo);


        return true;
    }




}
