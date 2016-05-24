@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit live account</h1>
    <hr/>

    {!! Form::model($cms_forms_liveaccount, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_liveaccount', $cms_forms_liveaccount->id],
        'class' => 'form-horizontal'
    ]) !!}


                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', trans('cms::cms.user_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                {!! Form::label('gender', trans('cms::cms.gender'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
                {!! Form::label('date_of_birth', trans('cms::cms.date_of_birth'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('date_of_birth', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
                {!! Form::label('fax', trans('cms::cms.fax'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('tel') ? 'has-error' : ''}}">
                {!! Form::label('tel', trans('cms::cms.tel'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('tel', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('office') ? 'has-error' : ''}}">
                {!! Form::label('office', trans('cms::cms.office'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('office', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('office', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}}">
                {!! Form::label('nationality', trans('cms::cms.nationality'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_number') ? 'has-error' : ''}}">
                {!! Form::label('id_number', trans('cms::cms.id_number'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('id_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_code') ? 'has-error' : ''}}">
                {!! Form::label('postal_code', trans('cms::cms.postal_code'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('account_type') ? 'has-error' : ''}}">
                {!! Form::label('account_type', trans('cms::cms.account_type'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('account_type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('account_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('base_currency_limit') ? 'has-error' : ''}}">
                {!! Form::label('base_currency_limit', trans('cms::cms.base_currency_limit'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('base_currency_limit', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('base_currency_limit', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('default_platform') ? 'has-error' : ''}}">
                {!! Form::label('default_platform', trans('cms::cms.default_platform'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('default_platform', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('default_platform', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('referring_partner') ? 'has-error' : ''}}">
                {!! Form::label('referring_partner', trans('cms::cms.referring_partner'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('referring_partner', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('referring_partner', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fund_manager') ? 'has-error' : ''}}">
                {!! Form::label('fund_manager', trans('cms::cms.fund_manager'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fund_manager', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fund_manager', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sole_joint_account') ? 'has-error' : ''}}">
                {!! Form::label('sole_joint_account', trans('cms::cms.sole_joint_account'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sole_joint_account', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sole_joint_account', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : ''}}">
                {!! Form::label('marital_status', trans('cms::cms.marital_status'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('marital_status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('resident_status') ? 'has-error' : ''}}">
                {!! Form::label('resident_status', trans('cms::cms.resident_status'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('resident_status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('resident_status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('street_and_number') ? 'has-error' : ''}}">
                {!! Form::label('street_and_number', trans('cms::cms.street_and_number'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('street_and_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('street_and_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', trans('cms::cms.city'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('main_phone') ? 'has-error' : ''}}">
                {!! Form::label('main_phone', trans('cms::cms.main_phone'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('main_phone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('main_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_phone') ? 'has-error' : ''}}">
                {!! Form::label('secondary_phone', trans('cms::cms.secondary_phone'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondary_phone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondary_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('primary_email') ? 'has-error' : ''}}">
                {!! Form::label('primary_email', trans('cms::cms.primary_email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('primary_email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('primary_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_email') ? 'has-error' : ''}}">
                {!! Form::label('secondary_email', trans('cms::cms.secondary_email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondary_email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondary_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_street_and_number') ? 'has-error' : ''}}">
                {!! Form::label('postal_street_and_number', trans('cms::cms.postal_street_and_number'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_street_and_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_street_and_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_post_code') ? 'has-error' : ''}}">
                {!! Form::label('postal_post_code', trans('cms::cms.postal_post_code'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_post_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_post_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_city') ? 'has-error' : ''}}">
                {!! Form::label('postal_city', trans('cms::cms.postal_city'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_city', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_country') ? 'has-error' : ''}}">
                {!! Form::label('postal_country', trans('cms::cms.postal_country'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_country', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_country', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                {!! Form::label('country', trans('cms::cms.country'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('country', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('financial_instrument_portfolio') ? 'has-error' : ''}}">
                {!! Form::label('financial_instrument_portfolio', trans('cms::cms.financial_instrument_portfolio'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('financial_instrument_portfolio', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('financial_instrument_portfolio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('source_funds_deposited') ? 'has-error' : ''}}">
                {!! Form::label('source_funds_deposited', trans('cms::cms.source_funds_deposited'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('source_funds_deposited', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('source_funds_deposited', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('other_source_funds_deposited') ? 'has-error' : ''}}">
                {!! Form::label('other_source_funds_deposited', trans('cms::cms.other_source_funds_deposited'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('other_source_funds_deposited', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('other_source_funds_deposited', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_risks') ? 'has-error' : ''}}">
                {!! Form::label('understand_risks', trans('cms::cms.understand_risks'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">

                    {!! Form::checkbox('understand_risks', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_risks', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_cfd') ? 'has-error' : ''}}">
                {!! Form::label('experience_cfd', trans('cms::cms.experience_cfd'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_cfd', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_commodities') ? 'has-error' : ''}}">
                {!! Form::label('experience_commodities', trans('cms::cms.experience_commodities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_commodities', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_forex') ? 'has-error' : ''}}">
                {!! Form::label('experience_forex', trans('cms::cms.experience_forex'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_forex', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_futures') ? 'has-error' : ''}}">
                {!! Form::label('experience_futures', trans('cms::cms.experience_futures'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_futures', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_options') ? 'has-error' : ''}}">
                {!! Form::label('experience_options', trans('cms::cms.experience_options'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_options', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_securities') ? 'has-error' : ''}}">
                {!! Form::label('experience_securities', trans('cms::cms.experience_securities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_securities', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_cfd') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_cfd', trans('cms::cms.number_of_years_cfd'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_cfd',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_commodities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_commodities', trans('cms::cms.number_of_years_commodities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_commodities',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_forex') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_forex', trans('cms::cms.number_of_years_forex'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_forex',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_futures') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_futures', trans('cms::cms.number_of_years_futures'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_futures',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_options') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_options', trans('cms::cms.number_of_years_options'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_options',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_securities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_securities', trans('cms::cms.number_of_years_securities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_securities',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_cfd') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_cfd', trans('cms::cms.number_of_transactions_cfd'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_cfd',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_commodities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_commodities', trans('cms::cms.number_of_transactions_commodities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_commodities',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_forex') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_forex', trans('cms::cms.number_of_transactions_forex'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_forex',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_futures') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_futures', trans('cms::cms.number_of_transactions_futures'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_futures',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_options') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_options', trans('cms::cms.number_of_transactions_options'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_options',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_securities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_securities', trans('cms::cms.number_of_transactions_securities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_securities',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_cfd') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_cfd', trans('cms::cms.average_trading_cfd'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_cfd',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_commodities') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_commodities', trans('cms::cms.average_trading_commodities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_commodities',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_forex') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_forex', trans('cms::cms.average_trading_forex'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_forex',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_futures') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_futures', trans('cms::cms.average_trading_futures'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_futures',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_options') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_options', trans('cms::cms.average_trading_options'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_options',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_securities') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_securities', trans('cms::cms.average_trading_securities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_securities',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_cfd') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_cfd', trans('cms::cms.understand_market_cfd'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_cfd', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_commodities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_commodities', trans('cms::cms.understand_market_commodities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_commodities', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_forex') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_forex', trans('cms::cms.understand_market_forex'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_forex', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_futures') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_futures', trans('cms::cms.understand_market_futures'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_futures', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_options') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_options', trans('cms::cms.understand_market_options'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_options', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_securities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_securities', trans('cms::cms.understand_market_securities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_securities', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_cfd') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_cfd', trans('cms::cms.understand_market_years_cfd'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_cfd', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_commodities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_commodities', trans('cms::cms.understand_market_years_commodities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_commodities', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_forex') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_forex', trans('cms::cms.understand_market_years_forex'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_forex', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_futures') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_futures', trans('cms::cms.understand_market_years_futures'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_futures', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_options') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_options', trans('cms::cms.understand_market_years_options'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_options', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_securities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_securities', trans('cms::cms.understand_market_years_securities'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_securities', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('first_name_joint') ? 'has-error' : ''}}">
                {!! Form::label('first_name_joint', trans('cms::cms.first_name_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('first_name_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('first_name_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('second_name_joint') ? 'has-error' : ''}}">
                {!! Form::label('second_name_joint', trans('cms::cms.second_name_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('second_name_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('second_name_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name_joint') ? 'has-error' : ''}}">
                {!! Form::label('last_name_joint', trans('cms::cms.last_name_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('last_name_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('account_type_joint') ? 'has-error' : ''}}">
                {!! Form::label('account_type_joint', trans('cms::cms.account_type_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('account_type_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('account_type_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('title_joint') ? 'has-error' : ''}}">
                {!! Form::label('title_joint', trans('cms::cms.title_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gender_joint') ? 'has-error' : ''}}">
                {!! Form::label('gender_joint', trans('cms::cms.gender_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('gender_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('gender_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_of_birth_joint') ? 'has-error' : ''}}">
                {!! Form::label('date_of_birth_joint', trans('cms::cms.date_of_birth_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('date_of_birth_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_of_birth_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fax_joint') ? 'has-error' : ''}}">
                {!! Form::label('fax_joint', trans('cms::cms.fax_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fax_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fax_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nationality_joint') ? 'has-error' : ''}}">
                {!! Form::label('nationality_joint', trans('cms::cms.nationality_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nationality_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nationality_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_code_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_code_joint', trans('cms::cms.postal_code_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_code_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_code_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('base_currency_limit_joint') ? 'has-error' : ''}}">
                {!! Form::label('base_currency_limit_joint', trans('cms::cms.base_currency_limit_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('base_currency_limit_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('base_currency_limit_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('default_platform_joint') ? 'has-error' : ''}}">
                {!! Form::label('default_platform_joint', trans('cms::cms.default_platform_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('default_platform_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('default_platform_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('referring_partner_joint') ? 'has-error' : ''}}">
                {!! Form::label('referring_partner_joint', trans('cms::cms.referring_partner_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('referring_partner_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('referring_partner_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fund_manager_joint') ? 'has-error' : ''}}">
                {!! Form::label('fund_manager_joint', trans('cms::cms.fund_manager_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fund_manager_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fund_manager_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sole_joint_account_joint') ? 'has-error' : ''}}">
                {!! Form::label('sole_joint_account_joint', trans('cms::cms.sole_joint_account_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sole_joint_account_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sole_joint_account_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('marital_status_joint') ? 'has-error' : ''}}">
                {!! Form::label('marital_status_joint', trans('cms::cms.marital_status_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('marital_status_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('marital_status_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('resident_status_joint') ? 'has-error' : ''}}">
                {!! Form::label('resident_status_joint', trans('cms::cms.resident_status_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('resident_status_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('resident_status_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('street_and_number_joint') ? 'has-error' : ''}}">
                {!! Form::label('street_and_number_joint', trans('cms::cms.street_and_number_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('street_and_number_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('street_and_number_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city_joint') ? 'has-error' : ''}}">
                {!! Form::label('city_joint', trans('cms::cms.city_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('city_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('city_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('main_phone_joint') ? 'has-error' : ''}}">
                {!! Form::label('main_phone_joint', trans('cms::cms.main_phone_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('main_phone_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('main_phone_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_phone_joint') ? 'has-error' : ''}}">
                {!! Form::label('secondary_phone_joint', trans('cms::cms.secondary_phone_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondary_phone_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondary_phone_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('primary_email_joint') ? 'has-error' : ''}}">
                {!! Form::label('primary_email_joint', trans('cms::cms.primary_email_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('primary_email_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('primary_email_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_email_joint') ? 'has-error' : ''}}">
                {!! Form::label('secondary_email_joint', trans('cms::cms.secondary_email_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondary_email_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondary_email_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_street_and_number_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_street_and_number_joint', trans('cms::cms.postal_street_and_number_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_street_and_number_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_street_and_number_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_post_code_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_post_code_joint', trans('cms::cms.postal_post_code_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_post_code_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_post_code_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_city_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_city_joint', trans('cms::cms.postal_city_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_city_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_city_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_country_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_country_joint', trans('cms::cms.postal_country_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('postal_country_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('postal_country_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country_joint') ? 'has-error' : ''}}">
                {!! Form::label('country_joint', trans('cms::cms.country_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('country_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('country_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('financial_instrument_portfolio_joint') ? 'has-error' : ''}}">
                {!! Form::label('financial_instrument_portfolio_joint', trans('cms::cms.financial_instrument_portfolio_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('financial_instrument_portfolio_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('financial_instrument_portfolio_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('source_funds_deposited_joint') ? 'has-error' : ''}}">
                {!! Form::label('source_funds_deposited_joint', trans('cms::cms.source_funds_deposited_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('source_funds_deposited_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('source_funds_deposited_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('other_source_funds_deposited_joint') ? 'has-error' : ''}}">
                {!! Form::label('other_source_funds_deposited_joint', trans('cms::cms.other_source_funds_deposited_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('other_source_funds_deposited_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('other_source_funds_deposited_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_risks_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_risks_joint', trans('cms::cms.understand_risks_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_risks_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_risks_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_cfd_joint', trans('cms::cms.experience_cfd_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_cfd_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_commodities_joint', trans('cms::cms.experience_commodities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_commodities_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_forex_joint', trans('cms::cms.experience_forex_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_forex_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_futures_joint', trans('cms::cms.experience_futures_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_futures_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_options_joint', trans('cms::cms.experience_options_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_options_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_securities_joint', trans('cms::cms.experience_securities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('experience_securities_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('experience_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_cfd_joint', trans('cms::cms.number_of_years_cfd_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_cfd_joint',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_commodities_joint', trans('cms::cms.number_of_years_commodities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_commodities_joint',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_forex_joint', trans('cms::cms.number_of_years_forex_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_forex_joint',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_futures_joint', trans('cms::cms.number_of_years_futures_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_futures_joint',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_options_joint', trans('cms::cms.number_of_years_options_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_options_joint',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_securities_joint', trans('cms::cms.number_of_years_securities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_years_securities_joint',$arrays['number_of_years'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_years_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_cfd_joint', trans('cms::cms.number_of_transactions_cfd_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_cfd_joint',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_commodities_joint', trans('cms::cms.number_of_transactions_commodities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_commodities_joint',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_forex_joint', trans('cms::cms.number_of_transactions_forex_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_forex_joint',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_futures_joint', trans('cms::cms.number_of_transactions_futures_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_futures_joint',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_options_joint', trans('cms::cms.number_of_transactions_options_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_options_joint',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_securities_joint', trans('cms::cms.number_of_transactions_securities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('number_of_transactions_securities_joint',$arrays['number_of_transactions'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_transactions_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_cfd_joint', trans('cms::cms.average_trading_cfd_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_cfd_joint',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_commodities_joint', trans('cms::cms.average_trading_commodities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_commodities_joint',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_forex_joint', trans('cms::cms.average_trading_forex_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_forex_joint',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_futures_joint', trans('cms::cms.average_trading_futures_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_futures_joint',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_options_joint', trans('cms::cms.average_trading_options_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_options_joint',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_securities_joint', trans('cms::cms.average_trading_securities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('average_trading_securities_joint',$arrays['average_trading'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('average_trading_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_cfd_joint', trans('cms::cms.understand_market_cfd_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_cfd_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_commodities_joint', trans('cms::cms.understand_market_commodities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_commodities_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_forex_joint', trans('cms::cms.understand_market_forex_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_forex_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_futures_joint', trans('cms::cms.understand_market_futures_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_futures_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_options_joint', trans('cms::cms.understand_market_options_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_options_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_securities_joint', trans('cms::cms.understand_market_securities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('understand_market_securities_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_cfd_joint', trans('cms::cms.understand_market_years_cfd_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_cfd_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_commodities_joint', trans('cms::cms.understand_market_years_commodities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_commodities_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_forex_joint', trans('cms::cms.understand_market_years_forex_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_forex_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_futures_joint', trans('cms::cms.understand_market_years_futures_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_futures_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_options_joint', trans('cms::cms.understand_market_years_options_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_options_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_securities_joint', trans('cms::cms.understand_market_years_securities_joint'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('understand_market_years_securities_joint', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('understand_market_years_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_1') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_1', trans('cms::cms.agreem_check_1'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_1', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_2') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_2', trans('cms::cms.agreem_check_2'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_2', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_3') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_3', trans('cms::cms.agreem_check_3'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_3', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_3', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_4') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_4', trans('cms::cms.agreem_check_4'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_4', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_4', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_5') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_5', trans('cms::cms.agreem_check_5'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_5', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_5', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_6') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_6', trans('cms::cms.agreem_check_6'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_6', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_6', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_7') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_7', trans('cms::cms.agreem_check_7'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_7', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_7', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_8') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_8', trans('cms::cms.agreem_check_8'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_8', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_8', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_9') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_9', trans('cms::cms.agreem_check_9'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_9', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_9', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_10') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_10', trans('cms::cms.agreem_check_10'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_10', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_10', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_11') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_11', trans('cms::cms.agreem_check_11'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_11', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_11', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_12') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_12', trans('cms::cms.agreem_check_12'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::checkbox('agreem_check_12', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreem_check_12', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_first_date') ? 'has-error' : ''}}">
                {!! Form::label('joint_first_date', trans('cms::cms.joint_first_date'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('joint_first_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('joint_first_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_first_fullname') ? 'has-error' : ''}}">
                {!! Form::label('joint_first_fullname', trans('cms::cms.joint_first_fullname'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('joint_first_fullname', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('joint_first_fullname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_first_title') ? 'has-error' : ''}}">
                {!! Form::label('joint_first_title', trans('cms::cms.joint_first_title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('joint_first_title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('joint_first_title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_second_date') ? 'has-error' : ''}}">
                {!! Form::label('joint_second_date', trans('cms::cms.joint_second_date'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('joint_second_date', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('joint_second_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_second_fullname') ? 'has-error' : ''}}">
                {!! Form::label('joint_second_fullname', trans('cms::cms.joint_second_fullname'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('joint_second_fullname', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('joint_second_fullname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_second_title') ? 'has-error' : ''}}">
                {!! Form::label('joint_second_title', trans('cms::cms.joint_second_title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('joint_second_title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('joint_second_title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('document_id') ? 'has-error' : ''}}">
                {!! Form::label('document_id', trans('cms::cms.document_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('document_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('document_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('document_id2') ? 'has-error' : ''}}">
                {!! Form::label('document_id2', trans('cms::cms.document_id2'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('document_id2', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('document_id2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('document_por') ? 'has-error' : ''}}">
                {!! Form::label('document_por', trans('cms::cms.document_por'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('document_por', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('document_por', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_type') ? 'has-error' : ''}}">
                {!! Form::label('id_type', trans('cms::cms.id_type'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('id_type',$arrays['id_type'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('proof_of_residence') ? 'has-error' : ''}}">
                {!! Form::label('proof_of_residence', trans('cms::cms.proof_of_residence'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('proof_of_residence',$arrays['proof_of_residence'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('proof_of_residence', '<p class="help-block">:message</p>') !!}

                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>
@endsection