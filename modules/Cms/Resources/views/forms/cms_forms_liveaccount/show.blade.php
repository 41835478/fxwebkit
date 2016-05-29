@extends('admin.layouts.main')

@section('content')
    <div class="container">

        <div id="content-wrapper">
            <h1>live account</h1>

            {!! Form::model($cms_forms_liveaccount, [
           'method' => 'PATCH',
           'url' => ['/cms/cms_forms_liveaccount', $cms_forms_liveaccount->id],
           'class' => 'form-horizontal'
       ])!!}


            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li class="">
                    <a href="#" onclick="$('.joint-group-div').hide();$('.sole-group-div').show();">{{ trans('cms::cms.sole') }}</a>
                </li>
                @if($cms_forms_liveaccount->sole_joint_account =='joint account')
                <li>
                    <a href="#" onclick="$('.joint-group-div').show();$('.sole-group-div').hide();">{{ trans('cms::cms.joint') }}</a>
                </li>
                @endif
            </ul>

            <div class="sole-group-div">
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                {!! Form::label('first_name', trans('cms::cms.first_name').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->first_name }}</label>
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : ''}}">
                {!! Form::label('middle_name', trans('cms::cms.middle_name').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->middle_name }}</label>
                    {!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                {!! Form::label('last_name', trans('cms::cms.last_name').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->last_name }}</label>

                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('cms::cms.title').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->title }}</label>
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                {!! Form::label('gender', trans('cms::cms.gender').' :' ,['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->gender }}</label>
                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
                {!! Form::label('date_of_birth', trans('cms::cms.date_of_birth').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->date_of_birth }}</label>
                    {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fax') ? 'has-error' : ''}}">
                {!! Form::label('fax', trans('cms::cms.fax').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->fax }}</label>
                    {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}}">
                {!! Form::label('nationality', trans('cms::cms.nationality').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->nationality }}</label>
                    {!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('postal_code') ? 'has-error' : ''}}">
                {!! Form::label('postal_code', trans('cms::cms.postal_code').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_code }}</label>
                    {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('account_type') ? 'has-error' : ''}}">
                {!! Form::label('account_type', trans('cms::cms.account_type').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->account_type }}</label>
                    {!! $errors->first('account_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('base_currency_limit') ? 'has-error' : ''}}">
                {!! Form::label('base_currency_limit', trans('cms::cms.base_currency_limit').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->base_currency_limit }}</label>
                    {!! $errors->first('base_currency_limit', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('default_platform') ? 'has-error' : ''}}">
                {!! Form::label('default_platform', trans('cms::cms.default_platform').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->default_platform }}</label>
                    {!! $errors->first('default_platform', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('referring_partner') ? 'has-error' : ''}}">
                {!! Form::label('referring_partner', trans('cms::cms.referring_partner').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->referring_partner }}</label>
                    {!! $errors->first('referring_partner', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fund_manager') ? 'has-error' : ''}}">
                {!! Form::label('fund_manager', trans('cms::cms.fund_manager').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->fund_manager }}</label>
                    {!! $errors->first('fund_manager', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sole_joint_account') ? 'has-error' : ''}}">
                {!! Form::label('sole_joint_account', trans('cms::cms.sole_joint_account').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->sole_joint_account }}</label>
                    {!! $errors->first('sole_joint_account', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : ''}}">
                {!! Form::label('marital_status', trans('cms::cms.marital_status').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->marital_status }}</label>
                    {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('resident_status') ? 'has-error' : ''}}">
                {!! Form::label('resident_status', trans('cms::cms.resident_status').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->resident_status }}</label>
                    {!! $errors->first('resident_status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('street_and_number') ? 'has-error' : ''}}">
                {!! Form::label('street_and_number', trans('cms::cms.street_and_number').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->street_and_number }}</label>
                    {!! $errors->first('street_and_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', trans('cms::cms.city').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->city }}</label>
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('main_phone') ? 'has-error' : ''}}">
                {!! Form::label('main_phone', trans('cms::cms.main_phone').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->main_phone }}</label>
                    {!! $errors->first('main_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_phone') ? 'has-error' : ''}}">
                {!! Form::label('secondary_phone', trans('cms::cms.secondary_phone').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->secondary_phone }}</label>
                    {!! $errors->first('secondary_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('primary_email') ? 'has-error' : ''}}">
                {!! Form::label('primary_email', trans('cms::cms.primary_email').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->primary_email }}</label>
                    {!! $errors->first('primary_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_email') ? 'has-error' : ''}}">
                {!! Form::label('secondary_email', trans('cms::cms.secondary_email').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->secondary_email }}</label>
                    {!! $errors->first('secondary_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_street_and_number') ? 'has-error' : ''}}">
                {!! Form::label('postal_street_and_number', trans('cms::cms.postal_street_and_number').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_street_and_number }}</label>
                    {!! $errors->first('postal_street_and_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_post_code') ? 'has-error' : ''}}">
                {!! Form::label('postal_post_code', trans('cms::cms.postal_post_code').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_post_code }}</label>
                    {!! $errors->first('postal_post_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_city') ? 'has-error' : ''}}">
                {!! Form::label('postal_city', trans('cms::cms.postal_city').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_city }}</label>
                    {!! $errors->first('postal_city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_country') ? 'has-error' : ''}}">
                {!! Form::label('postal_country', trans('cms::cms.postal_country').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_country }}</label>
                    {!! $errors->first('postal_country', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                {!! Form::label('country', trans('cms::cms.country').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->country }}</label>
                    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('financial_instrument_portfolio') ? 'has-error' : ''}}">
                {!! Form::label('financial_instrument_portfolio', trans('cms::cms.financial_instrument_portfolio').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->financial_instrument_portfolio }}</label>
                    {!! $errors->first('financial_instrument_portfolio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('source_funds_deposited') ? 'has-error' : ''}}">
                {!! Form::label('source_funds_deposited', trans('cms::cms.source_funds_deposited').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->source_funds_deposited }}</label>
                    {!! $errors->first('source_funds_deposited', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('other_source_funds_deposited') ? 'has-error' : ''}}">
                {!! Form::label('other_source_funds_deposited', trans('cms::cms.other_source_funds_deposited').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->other_source_funds_deposited }}</label>
                    {!! $errors->first('other_source_funds_deposited', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_risks') ? 'has-error' : ''}}">
                {!! Form::label('understand_risks', trans('cms::cms.understand_risks').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_risks) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_risks', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_cfd') ? 'has-error' : ''}}">
                {!! Form::label('experience_cfd', trans('cms::cms.experience_cfd :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_cfd) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('experience_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_commodities') ? 'has-error' : ''}}">
                {!! Form::label('experience_commodities', trans('cms::cms.experience_commodities :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_commodities) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('experience_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_forex') ? 'has-error' : ''}}">
                {!! Form::label('experience_forex', trans('cms::cms.experience_forex :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_forex) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('experience_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_futures') ? 'has-error' : ''}}">
                {!! Form::label('experience_futures', trans('cms::cms.experience_futures :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_futures) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('experience_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_options') ? 'has-error' : ''}}">
                {!! Form::label('experience_options', trans('cms::cms.experience_options :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_options) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('experience_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_securities') ? 'has-error' : ''}}">
                {!! Form::label('experience_securities', trans('cms::cms.experience_securities :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_securities) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('experience_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_cfd') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_cfd', trans('cms::cms.number_of_years_cfd').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_cfd) ? $cms_forms_liveaccount->number_of_years_cfd : 'Select One'  }}</label>
                    {!! $errors->first('number_of_years_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_commodities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_commodities', trans('cms::cms.number_of_years_commodities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_commodities) ? $cms_forms_liveaccount->number_of_years_commodities : 'Select One' }}</label>
                    {!! $errors->first('number_of_years_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_forex') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_forex', trans('cms::cms.number_of_years_forex').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_forex) ? $cms_forms_liveaccount->number_of_years_forex : 'Select One'}}</label>
                    {!! $errors->first('number_of_years_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_futures') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_futures', trans('cms::cms.number_of_years_futures').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_futures) ? $cms_forms_liveaccount->number_of_years_futures : 'Select One' }}</label>
                    {!! $errors->first('number_of_years_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_options') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_options', trans('cms::cms.number_of_years_options').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_options) ? $cms_forms_liveaccount->number_of_years_options : 'Select One' }}</label>
                    {!! $errors->first('number_of_years_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_securities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_securities', trans('cms::cms.number_of_years_securities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_securities) ? $cms_forms_liveaccount->number_of_years_securities : 'Select One' }}</label>
                    {!! $errors->first('number_of_years_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_cfd') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_cfd', trans('cms::cms.number_of_transactions_cfd').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_cfd) ? $cms_forms_liveaccount->number_of_transactions_cfd : 'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_commodities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_commodities', trans('cms::cms.number_of_transactions_commodities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_commodities) ? $cms_forms_liveaccount->number_of_transactions_commodities : 'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_forex') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_forex', trans('cms::cms.number_of_transactions_forex').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_forex) ? $cms_forms_liveaccount->number_of_transactions_forex : 'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_futures') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_futures', trans('cms::cms.number_of_transactions_futures').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_futures) ? $cms_forms_liveaccount->number_of_transactions_futures : 'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_options') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_options', trans('cms::cms.number_of_transactions_options').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_options) ? $cms_forms_liveaccount->number_of_transactions_options : 'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_securities') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_securities', trans('cms::cms.number_of_transactions_securities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_securities) ? $cms_forms_liveaccount->number_of_transactions_securities : 'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_cfd') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_cfd', trans('cms::cms.average_trading_cfd').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_cfd) ? $cms_forms_liveaccount->average_trading_cfd : 'Select One' }}</label>
                    {!! $errors->first('average_trading_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_commodities') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_commodities', trans('cms::cms.average_trading_commodities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_commodities) ? $cms_forms_liveaccount->average_trading_commodities : 'Select One' }}</label>
                    {!! $errors->first('average_trading_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_forex') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_forex', trans('cms::cms.average_trading_forex').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_forex) ? $cms_forms_liveaccount->average_trading_forex : 'Select One' }}</label>
                    {!! $errors->first('average_trading_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_futures') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_futures', trans('cms::cms.average_trading_futures').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_futures) ? $cms_forms_liveaccount->average_trading_futures : 'Select One' }}</label>
                    {!! $errors->first('average_trading_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_options') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_options', trans('cms::cms.average_trading_options').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_options) ? $cms_forms_liveaccount->average_trading_options : 'Select One' }}</label>
                    {!! $errors->first('average_trading_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_securities') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_securities', trans('cms::cms.average_trading_securities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_securities) ? $cms_forms_liveaccount->average_trading_securities : 'Select One' }}</label>
                    {!! $errors->first('average_trading_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_cfd') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_cfd', trans('cms::cms.understand_market_cfd').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_cfd) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_market_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_commodities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_commodities', trans('cms::cms.understand_market_commodities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_commodities) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_market_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_forex') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_forex', trans('cms::cms.understand_market_forex').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_forex) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_market_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_futures') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_futures', trans('cms::cms.understand_market_futures').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_futures) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_market_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_options') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_options', trans('cms::cms.understand_market_options').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_options) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_market_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_securities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_securities', trans('cms::cms.understand_market_securities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_securities) ? 'Yes' : 'No' }}</label>
                    {!! $errors->first('understand_market_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_cfd') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_cfd', trans('cms::cms.understand_market_years_cfd').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_cfd }}</label>
                    {!! $errors->first('understand_market_years_cfd', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_commodities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_commodities', trans('cms::cms.understand_market_years_commodities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_commodities }}</label>
                    {!! $errors->first('understand_market_years_commodities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_forex') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_forex', trans('cms::cms.understand_market_years_forex').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_forex }}</label>
                    {!! $errors->first('understand_market_years_forex', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_futures') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_futures', trans('cms::cms.understand_market_years_futures').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_futures }}</label>
                    {!! $errors->first('understand_market_years_futures', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_options') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_options', trans('cms::cms.understand_market_years_options').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_options }}</label>
                    {!! $errors->first('understand_market_years_options', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_securities') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_securities', trans('cms::cms.understand_market_years_securities').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_securities }}</label>
                    {!! $errors->first('understand_market_years_securities', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            </div>

            <div class="joint-group-div" style="display:none;">


                <div class="text-center">
                    <label class="control-label">'JOINT'</label>
                </div>

            <div class="form-group {{ $errors->has('first_name_joint') ? 'has-error' : ''}}">
                {!! Form::label('first_name_joint', trans('cms::cms.first_name_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->first_name_joint }}</label>
                    {!! $errors->first('first_name_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('second_name_joint') ? 'has-error' : ''}}">
                {!! Form::label('second_name_joint', trans('cms::cms.second_name_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->second_name_joint }}</label>
                    {!! $errors->first('second_name_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name_joint') ? 'has-error' : ''}}">
                {!! Form::label('last_name_joint', trans('cms::cms.last_name_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->last_name_joint }}</label>
                    {!! $errors->first('last_name_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('title_joint') ? 'has-error' : ''}}">
                {!! Form::label('title_joint', trans('cms::cms.title_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->title_joint }}</label>
                    {!! $errors->first('title_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gender_joint') ? 'has-error' : ''}}">
                {!! Form::label('gender_joint', trans('cms::cms.gender_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->gender_joint }}</label>
                    {!! $errors->first('gender_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('date_of_birth_joint') ? 'has-error' : ''}}">
                {!! Form::label('date_of_birth_joint', trans('cms::cms.date_of_birth_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->date_of_birth_joint }}</label>
                    {!! $errors->first('date_of_birth_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fax_joint') ? 'has-error' : ''}}">
                {!! Form::label('fax_joint', trans('cms::cms.fax_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->fax_joint }}</label>
                    {!! $errors->first('fax_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nationality_joint') ? 'has-error' : ''}}">
                {!! Form::label('nationality_joint', trans('cms::cms.nationality_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->nationality_joint }}</label>
                    {!! $errors->first('nationality_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_code_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_code_joint', trans('cms::cms.postal_code_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_code_joint }}</label>
                    {!! $errors->first('postal_code_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('base_currency_limit_joint') ? 'has-error' : ''}}">
                {!! Form::label('base_currency_limit_joint', trans('cms::cms.base_currency_limit_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->base_currency_limit_joint }}</label>
                    {!! $errors->first('base_currency_limit_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('sole_joint_account_joint') ? 'has-error' : ''}}">
                {!! Form::label('sole_joint_account_joint', trans('cms::cms.sole_joint_account_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->sole_joint_account_joint }}</label>
                    {!! $errors->first('sole_joint_account_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('marital_status_joint') ? 'has-error' : ''}}">
                {!! Form::label('marital_status_joint', trans('cms::cms.marital_status_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->marital_status_joint }}</label>
                    {!! $errors->first('marital_status_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('resident_status_joint') ? 'has-error' : ''}}">
                {!! Form::label('resident_status_joint', trans('cms::cms.resident_status_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->resident_status_joint }}</label>
                    {!! $errors->first('resident_status_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('street_and_number_joint') ? 'has-error' : ''}}">
                {!! Form::label('street_and_number_joint', trans('cms::cms.street_and_number_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->street_and_number_joint }}</label>
                    {!! $errors->first('street_and_number_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city_joint') ? 'has-error' : ''}}">
                {!! Form::label('city_joint', trans('cms::cms.city_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->city_joint }}</label>
                    {!! $errors->first('city_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('main_phone_joint') ? 'has-error' : ''}}">
                {!! Form::label('main_phone_joint', trans('cms::cms.main_phone_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->main_phone_joint }}</label>
                    {!! $errors->first('main_phone_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_phone_joint') ? 'has-error' : ''}}">
                {!! Form::label('secondary_phone_joint', trans('cms::cms.secondary_phone_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->secondary_phone_joint }}</label>
                    {!! $errors->first('secondary_phone_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('primary_email_joint') ? 'has-error' : ''}}">
                {!! Form::label('primary_email_joint', trans('cms::cms.primary_email_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->primary_email_joint }}</label>
                    {!! $errors->first('primary_email_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondary_email_joint') ? 'has-error' : ''}}">
                {!! Form::label('secondary_email_joint', trans('cms::cms.secondary_email_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->secondary_email_joint }}</label>
                    {!! $errors->first('secondary_email_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_street_and_number_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_street_and_number_joint', trans('cms::cms.postal_street_and_number_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_street_and_number_joint }}</label>
                    {!! $errors->first('postal_street_and_number_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_post_code_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_post_code_joint', trans('cms::cms.postal_post_code_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_post_code_joint }}</label>
                    {!! $errors->first('postal_post_code_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_city_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_city_joint', trans('cms::cms.postal_city_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_city_joint }}</label>
                    {!! $errors->first('postal_city_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('postal_country_joint') ? 'has-error' : ''}}">
                {!! Form::label('postal_country_joint', trans('cms::cms.postal_country_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->postal_country_joint }}</label>
                    {!! $errors->first('postal_country_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country_joint') ? 'has-error' : ''}}">
                {!! Form::label('country_joint', trans('cms::cms.country_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->country_joint }}</label>
                    {!! $errors->first('country_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('financial_instrument_portfolio_joint') ? 'has-error' : ''}}">
                {!! Form::label('financial_instrument_portfolio_joint', trans('cms::cms.financial_instrument_portfolio_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->financial_instrument_portfolio_joint }}</label>
                    {!! $errors->first('financial_instrument_portfolio_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('source_funds_deposited_joint') ? 'has-error' : ''}}">
                {!! Form::label('source_funds_deposited_joint', trans('cms::cms.source_funds_deposited_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->source_funds_deposited_joint }}</label>
                    {!! $errors->first('source_funds_deposited_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('other_source_funds_deposited_joint') ? 'has-error' : ''}}">
                {!! Form::label('other_source_funds_deposited_joint', trans('cms::cms.other_source_funds_deposited_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->other_source_funds_deposited_joint }}</label>
                    {!! $errors->first('other_source_funds_deposited_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_risks_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_risks_joint', trans('cms::cms.understand_risks_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->other_source_funds_deposited_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_risks_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_cfd_joint', trans('cms::cms.experience_cfd_joint :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_cfd_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('experience_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_commodities_joint', trans('cms::cms.experience_commodities_joint :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_commodities_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('experience_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_forex_joint', trans('cms::cms.experience_forex_joint :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_forex_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('experience_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_futures_joint', trans('cms::cms.experience_futures_joint :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_futures_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('experience_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_options_joint', trans('cms::cms.experience_options_joint :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_options_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('experience_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('experience_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('experience_securities_joint', trans('cms::cms.experience_securities_joint :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->experience_securities_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('experience_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_cfd_joint', trans('cms::cms.number_of_years_cfd_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_cfd_joint) ? $cms_forms_liveaccount->number_of_years_cfd_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_years_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_commodities_joint', trans('cms::cms.number_of_years_commodities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_commodities_joint) ? $cms_forms_liveaccount->number_of_years_commodities_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_years_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_forex_joint', trans('cms::cms.number_of_years_forex_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_forex_joint) ? $cms_forms_liveaccount->number_of_years_forex_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_years_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_futures_joint', trans('cms::cms.number_of_years_futures_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_futures_joint) ? $cms_forms_liveaccount->number_of_years_futures_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_years_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_options_joint', trans('cms::cms.number_of_years_options_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_options_joint) ? $cms_forms_liveaccount->number_of_years_options_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_years_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_years_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_years_securities_joint', trans('cms::cms.number_of_years_securities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_years_securities_joint) ? $cms_forms_liveaccount->number_of_years_securities_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_years_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_cfd_joint', trans('cms::cms.number_of_transactions_cfd_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_cfd_joint) ? $cms_forms_liveaccount->number_of_transactions_cfd_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_commodities_joint', trans('cms::cms.number_of_transactions_commodities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_commodities_joint) ? $cms_forms_liveaccount->number_of_transactions_commodities_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_forex_joint', trans('cms::cms.number_of_transactions_forex_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_forex_joint) ? $cms_forms_liveaccount->number_of_transactions_forex_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_futures_joint', trans('cms::cms.number_of_transactions_futures_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_futures_joint) ? $cms_forms_liveaccount->number_of_transactions_futures_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_options_joint', trans('cms::cms.number_of_transactions_options_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_options_joint) ? $cms_forms_liveaccount->number_of_transactions_options_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('number_of_transactions_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('number_of_transactions_securities_joint', trans('cms::cms.number_of_transactions_securities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->number_of_transactions_securities_joint) ? $cms_forms_liveaccount->number_of_transactions_securities_joint:'Select One' }}</label>
                    {!! $errors->first('number_of_transactions_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_cfd_joint', trans('cms::cms.average_trading_cfd_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_cfd_joint) ? $cms_forms_liveaccount->average_trading_cfd_joint:'Select One' }}</label>
                    {!! $errors->first('average_trading_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_commodities_joint', trans('cms::cms.average_trading_commodities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_commodities_joint) ? $cms_forms_liveaccount->average_trading_commodities_joint:'Select One' }}</label>
                    {!! $errors->first('average_trading_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_forex_joint', trans('cms::cms.average_trading_forex_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_forex_joint) ? $cms_forms_liveaccount->average_trading_forex_joint:'Select One' }}</label>
                    {!! $errors->first('average_trading_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_futures_joint', trans('cms::cms.average_trading_futures_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_futures_joint) ? $cms_forms_liveaccount->average_trading_futures_joint:'Select One' }}</label>
                    {!! $errors->first('average_trading_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_options_joint', trans('cms::cms.average_trading_options_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_options_joint) ? $cms_forms_liveaccount->average_trading_options_joint:'Select One' }}</label>
                    {!! $errors->first('average_trading_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('average_trading_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('average_trading_securities_joint', trans('cms::cms.average_trading_securities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->average_trading_securities_joint) ? $cms_forms_liveaccount->average_trading_securities_joint:'Select One' }}</label>
                    {!! $errors->first('average_trading_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_cfd_joint', trans('cms::cms.understand_market_cfd_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_cfd_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_market_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_commodities_joint', trans('cms::cms.understand_market_commodities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_commodities_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_market_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_forex_joint', trans('cms::cms.understand_market_forex_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_forex_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_market_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_futures_joint', trans('cms::cms.understand_market_futures_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_futures_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_market_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_options_joint', trans('cms::cms.understand_market_options_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_options_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_market_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_securities_joint', trans('cms::cms.understand_market_securities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->understand_market_securities_joint) ? 'Yes':'No' }}</label>
                    {!! $errors->first('understand_market_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_cfd_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_cfd_joint', trans('cms::cms.understand_market_years_cfd_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_cfd_joint }}</label>
                    {!! $errors->first('understand_market_years_cfd_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_commodities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_commodities_joint', trans('cms::cms.understand_market_years_commodities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_commodities_joint }}</label>
                    {!! $errors->first('understand_market_years_commodities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_forex_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_forex_joint', trans('cms::cms.understand_market_years_forex_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_forex_joint }}</label>
                    {!! $errors->first('understand_market_years_forex_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_futures_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_futures_joint', trans('cms::cms.understand_market_years_futures_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_futures_joint }}</label>
                    {!! $errors->first('understand_market_years_futures_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_options_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_options_joint', trans('cms::cms.understand_market_years_options_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_options_joint }}</label>
                    {!! $errors->first('understand_market_years_options_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('understand_market_years_securities_joint') ? 'has-error' : ''}}">
                {!! Form::label('understand_market_years_securities_joint', trans('cms::cms.understand_market_years_securities_joint').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->understand_market_years_securities_joint }}</label>
                    {!! $errors->first('understand_market_years_securities_joint', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                        </div>



            <div class="sole-group-div">
            <div class="form-group {{ $errors->has('agreem_check_1') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_1', trans('cms::cms.agreem_check_1').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_1)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_2') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_2', trans('cms::cms.agreem_check_2').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_2)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_3') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_3', trans('cms::cms.agreem_check_3').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_3)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_3', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_4') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_4', trans('cms::cms.agreem_check_4').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_4)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_4', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_5') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_5', trans('cms::cms.agreem_check_5').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_5)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_5', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_6') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_6', trans('cms::cms.agreem_check_6').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_6)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_6', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_7') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_7', trans('cms::cms.agreem_check_7').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_7)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_7', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_8') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_8', trans('cms::cms.agreem_check_8').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_8)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_8', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_9') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_9', trans('cms::cms.agreem_check_9').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_9)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_9', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_10') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_10', trans('cms::cms.agreem_check_10').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_10)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_10', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_11') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_11', trans('cms::cms.agreem_check_11').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_11)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_11', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreem_check_12') ? 'has-error' : ''}}">
                {!! Form::label('agreem_check_12', trans('cms::cms.agreem_check_12').' :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->agreem_check_12)? 'Yes':'No' }}</label>
                    {!! $errors->first('agreem_check_12', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_first_date') ? 'has-error' : ''}}">
                {!! Form::label('joint_first_date', trans('cms::cms.joint_first_date :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->date_of_birth }}</label>
                    {!! $errors->first('joint_first_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_first_fullname') ? 'has-error' : ''}}">
                {!! Form::label('joint_first_fullname', trans('cms::cms.joint_first_fullname :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->first_name.' '.$cms_forms_liveaccount->last_name }}</label>
                    {!! $errors->first('joint_first_fullname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_first_title') ? 'has-error' : ''}}">
                {!! Form::label('joint_first_title', trans('cms::cms.joint_first_title :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->title }}</label>
                    {!! $errors->first('joint_first_title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_second_date') ? 'has-error' : ''}}">
                {!! Form::label('joint_second_date', trans('cms::cms.joint_second_date :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->date_of_birth_joint }}</label>
                    {!! $errors->first('joint_second_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_second_fullname') ? 'has-error' : ''}}">
                {!! Form::label('joint_second_fullname', trans('cms::cms.joint_second_fullname :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->first_name_joint.' '.$cms_forms_liveaccount->last_name_joint }}</label>
                    {!! $errors->first('joint_second_fullname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('joint_second_title') ? 'has-error' : ''}}">
                {!! Form::label('joint_second_title', trans('cms::cms.joint_second_title :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->title_joint }}</label>
                    {!! $errors->first('joint_second_title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('document_id') ? 'has-error' : ''}}">
                {!! Form::label('document_id', trans('cms::cms.document_id :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label"><a href="/{{Config::get('cms.asset_folder').'/'.$cms_forms_liveaccount->document_id }}" >{{trans('cms::cms.document_id :')}}</a></label>
                    {!! $errors->first('document_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <!--
            <div class="form-group {{ $errors->has('document_id2') ? 'has-error' : ''}}">
                {!! Form::label('document_id2', trans('document_id2 :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->document_id2 }}</label>
                    {!! $errors->first('document_id2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            -->
            <div class="form-group {{ $errors->has('document_por') ? 'has-error' : ''}}">
                {!! Form::label('document_por', trans('cms::cms.document_por :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label"><a href="/{{Config::get('cms.asset_folder').'/'.$cms_forms_liveaccount->document_por }}">{{trans('cms::cms.document_por :')}}</a></label>
                    {!! $errors->first('document_por', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_type') ? 'has-error' : ''}}">
                {!! Form::label('id_type', trans('cms::cms.id_type :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->id_type)? $cms_forms_liveaccount->id_type:'Select One' }}</label>
                    {!! $errors->first('id_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('proof_of_residence :') ? 'has-error' : ''}}">
                {!! Form::label('proof_of_residence', trans('cms::cms.proof_of_residence :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{($cms_forms_liveaccount->proof_of_residence)? $cms_forms_liveaccount->proof_of_residence:'Select One' }}</label>
                    {!! $errors->first('proof_of_residence', '<p class="help-block">:message</p>') !!}

                </div>
            </div>
            <div class="form-group {{ $errors->has('pdf') ? 'has-error' : ''}}">
                {!! Form::label('pdf', trans('cms::cms.pdf :'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    <label class="control-label">{{$cms_forms_liveaccount->pdf }}</label>
                    {!! $errors->first('pdf', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection