<?php namespace Modules\Mt4Configrations\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ConfigrationsGroups extends Model {

    protected $table = 'configrations_groups';
    public $timestamps = false;
    protected $fillable = [  'id',
        'group',
        'enable',
        'timeout',
        'otp_mode',
        'company',
        'signature',
        'support_page',
        'smtp_server',
        'smtp_login',
        'smtp_password',
        'support_email',
        'templates',
        'copies',
        'reports',
        'default_leverage',
        'default_deposit',
        'maxsecurities',
        'ConGroupSec',
        'ConGroupMargin',
        'secmargins_total',
        'currency',
        'credit',
        'margin_call',
        'margin_mode',
        'margin_stopout',
        'interestrate',
        'use_swap',
        'news',
        'rights',
        'check_ie_prices',
        'maxpositions',
        'close_reopen',
        'hedge_prohibited',
        'close_fifo',
        'hedge_largeleg',
        'unused_rights',
        'securities_hash',
        'margin_type',
        'archive_period',
        'archive_max_balance',
        'stopout_skip_hedged',
        'archive_pending_period',
        'news_languages',
        'news_languages_total',
        'reserved'];

}