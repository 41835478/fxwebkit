<?php

namespace Modules\Cms\Entities\forms;

use Illuminate\Database\Eloquent\Model;

class cms_forms_liveaccount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cms_forms_liveaccounts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = ['user_id','first_name','middle_name','last_name' ,'title', 'gender', 'date_of_birth', 'fax', 'tel', 'office', 'nationality', 'id_number', 'postal_code', 'account_type', 'base_currency_limit', 'default_platform', 'referring_partner', 'fund_manager', 'sole_joint_account', 'marital_status', 'resident_status', 'street_and_number', 'building_number', 'city', 'main_phone', 'secondary_phone', 'primary_email', 'secondary_email', 'postal_street_and_number', 'postal_post_code', 'postal_city', 'postal_country', 'country', 'financial_instrument_portfolio', 'source_funds_deposited', 'other_source_funds_deposited', 'understand_risks', 'experience_cfd', 'experience_commodities', 'experience_forex', 'experience_futures', 'experience_options', 'experience_securities', 'number_of_years_cfd', 'number_of_years_commodities', 'number_of_years_forex', 'number_of_years_futures', 'number_of_years_options', 'number_of_years_securities', 'number_of_transactions_cfd', 'number_of_transactions_commodities', 'number_of_transactions_forex', 'number_of_transactions_futures', 'number_of_transactions_options', 'number_of_transactions_securities', 'average_trading_cfd', 'average_trading_commodities', 'average_trading_forex', 'average_trading_futures', 'average_trading_options', 'average_trading_securities', 'understand_market_cfd', 'understand_market_commodities', 'understand_market_forex', 'understand_market_futures', 'understand_market_options', 'understand_market_securities', 'understand_market_years_cfd', 'understand_market_years_commodities', 'understand_market_years_forex', 'understand_market_years_futures', 'understand_market_years_options', 'understand_market_years_securities', 'first_name_joint', 'second_name_joint', 'last_name_joint', 'account_type_joint', 'title_joint', 'gender_joint', 'date_of_birth_joint', 'fax_joint', 'nationality_joint', 'postal_code_joint', 'base_currency_limit_joint', 'default_platform_joint', 'referring_partner_joint', 'fund_manager_joint', 'sole_joint_account_joint', 'marital_status_joint', 'resident_status_joint', 'street_and_number_joint','building_number_joint', 'city_joint', 'main_phone_joint', 'secondary_phone_joint', 'primary_email_joint', 'secondary_email_joint', 'postal_street_and_number_joint', 'postal_post_code_joint', 'postal_city_joint', 'postal_country_joint', 'country_joint', 'financial_instrument_portfolio_joint', 'source_funds_deposited_joint', 'other_source_funds_deposited_joint', 'understand_risks_joint', 'experience_cfd_joint', 'experience_commodities_joint', 'experience_forex_joint', 'experience_futures_joint', 'experience_options_joint', 'experience_securities_joint', 'number_of_years_cfd_joint', 'number_of_years_commodities_joint', 'number_of_years_forex_joint', 'number_of_years_futures_joint', 'number_of_years_options_joint', 'number_of_years_securities_joint', 'number_of_transactions_cfd_joint', 'number_of_transactions_commodities_joint', 'number_of_transactions_forex_joint', 'number_of_transactions_futures_joint', 'number_of_transactions_options_joint', 'number_of_transactions_securities_joint', 'average_trading_cfd_joint', 'average_trading_commodities_joint', 'average_trading_forex_joint', 'average_trading_futures_joint', 'average_trading_options_joint', 'average_trading_securities_joint', 'understand_market_cfd_joint', 'understand_market_commodities_joint', 'understand_market_forex_joint', 'understand_market_futures_joint', 'understand_market_options_joint', 'understand_market_securities_joint', 'understand_market_years_cfd_joint', 'understand_market_years_commodities_joint', 'understand_market_years_forex_joint', 'understand_market_years_futures_joint', 'understand_market_years_options_joint', 'understand_market_years_securities_joint', 'agreem_check_1', 'agreem_check_2', 'agreem_check_3', 'agreem_check_4', 'agreem_check_5', 'agreem_check_6', 'agreem_check_7', 'agreem_check_8', 'agreem_check_9', 'agreem_check_10', 'agreem_check_11', 'agreem_check_12', 'joint_first_date', 'joint_first_fullname', 'joint_first_title', 'joint_second_date', 'joint_second_fullname', 'joint_second_title', 'document_id', 'document_id2', 'document_por', 'id_type', 'proof_of_residence','pdf','ref','ip','status','comment'];


}
