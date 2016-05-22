<h1>{{ trans('cms::cms.Create New live account') }}</h1>
<hr/>

{!! Form::open(['route' => 'cms_forms_liveaccount.form', 'class' => 'form-horizontal']) !!}
<div class="fieldset_div">
    <div class="clearfix"></div>
    <h1>{{ trans('cms::cms.PERSONAL ACCOUNT OPENING FORM') }}</h1>

    <div class="clearfix"></div>
    <h2>{{ trans('cms::cms.APPLICATION FORM FOR THE PERSONAL ACCOUNT') }}</h2>

    <div class="clearfix"></div>
    <h3>1.{{ trans('cms::cms.BASIC_INFORMATION') }}</h3>

    <div class="left_div">

        <div class="clearfix"></div>
        <h4>A. {{ trans('cms::cms.account_type') }}</h4>

        <div class="input_all_div">
            <p></p>
            <label>{!! Form::label('account_type', trans('cms::cms.account_type'), ['class' => 'control-label']) !!}</label>
            {!! Form::select('account_type',$arrays['account_type'], 'Self-trading', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            <span> {!! $errors->first('account_type', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>








    <div class="right_div">

        <h4>B. {{ trans('cms::cms.TRADING ACCOUNT CURRENCY') }}</h4>

        <div class="input_all_div">
            <label>{!! Form::label('base_currency_limit', trans('cms::cms.base_currency_limit'), ['class' => 'control-label']) !!}</label>
            {!! Form::select('base_currency_limit',$arrays['base_currency_limit'], 'USD', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            <span>{!! $errors->first('base_currency_limit', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="full_width_div">

        <div class="clearfix"></div>
        <h4>C.{{ trans('cms::cms.PLATFORMS') }} </h4>

        <div class="input_all_div">
            <p> {{ trans('cms::cms.default_platform') }}</p>
            <label></label>

            {!! Form::select('default_platform',$arrays['default_platform'], 'MT4', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            <span>{!! $errors->first('default_platform', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="clearfix"></div>
    <h3>2. {{ trans('cms::cms.INTRODUCTION(S)') }}</h3>

    <p>{{ trans('cms::cms.Please only complete this section in the event you have been introduced to House of Borse by a third party. Please ensure to
       provide the full name of the third party introducer.') }}
    </p>

    <div class="clearfix"></div>
    <div class="left_div">
        <div class="input_all_div  intl-tel-input">
            <label>{!! Form::label('referring_partner',  trans('cms::cms.referring_partner')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('referring_partner', null, ['class' => '','placeholder'=>trans('referring_partner')]) !!}
            <span>{!! $errors->first('referring_partner', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="right_div">

        <div class="input_all_div">
            <label>{!! Form::label('fund_manager',trans('cms::cms.fund_manager')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('fund_manager', null, ['class' => '','placeholder'=>trans('fund_manager')]) !!}
            <span>{!! $errors->first('fund_manager', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>


    <div class="clearfix"></div>
    <h3>3. {{ trans('cms::cms.PERSONAL DETAILS') }}</h3>

    <p>{{ trans('cms::cms.if_you_are') }}</p>

    <div class="clearfix"></div>
    <div class="left_div">
        <div class="input_all_div">
            {!! Form::radio('sole_joint_account',0, true, ['class' => '','id'=>'sole_joint_account_0']) !!}
            <label for="sole_joint_account_0">{{ trans('cms::cms.sole_joint_account') }}</label>

            {!! Form::radio('sole_joint_account',1, false, ['class' => '','id'=>'sole_joint_account_1']) !!}
            <label for="sole_joint_account_1">{{ trans('cms::cms.sole_joint_account_joint') }}</label>
            <span>{!! $errors->first('sole_joint_account', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="clearfix"></div>
    <h4>A. {{ trans('cms::cms.PERSONAL DETAILS (HEREAFTER “CLIENT”)') }}</h4>

    <div>
        <label class="required">{{ trans('cms::cms.title')}}</label>

        <div>
            {!! Form::radio('title','Mr', true, ['class' => '','id'=>'title_0']) !!}
            <label for="title_0">{{ trans('cms::cms.Mr') }}</label>
            {!! Form::radio('title','Ms', false, ['class' => '','id'=>'title_1']) !!}
            <label for="title_1">{{ trans('cms::cms.Ms') }}</label>
            {!! Form::radio('title','Mrs', false, ['class' => '','id'=>'title_2']) !!}
            <label for="title_2">{{ trans('cms::cms.Mrs') }}</label>
            {!! Form::radio('title','Dr', false, ['class' => '','id'=>'title_3']) !!}
            <label for="title_3">{{ trans('cms::cms.Dr') }}</label>
        </div>
    </div>

    <div class="col-xm-12 col-sm-4">
        <label>{{ trans('cms::cms.first_name').' *' }}</label>
        {!! Form::text('first_name', null, ['class' => '','placeholder'=>trans('cms::cms.first_name_joint')]) !!}
        <div class="input_all_div" id="date_of_birth_div">
            {!! Form::label('date_of_birth', trans('cms::cms.date_of_birth')) !!}
            <div class="clearfix">
                {!! Form::text('date_of_birth', null, ['class' => '']) !!}
            </div>
            {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-xm-12 col-sm-4 ">
        <div class="input_all_div">
            <label>{{trans('cms::cms.middle_name')}}</label>
            {!! Form::text('second_name', null, ['class' => '','placeholder'=>trans('cms::cms.middle_name')]) !!}
        </div>

        <div class="input_all_div">
            <label>{{trans('cms::cms.nationality')}}</label>
            {!! Form::select('nationality',$arrays['country'], 'MT4', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
        </div>


    </div>
    <div class="col-xm-12 col-sm-4">
        <div class="input_all_div">
            <label>{{trans('cms::cms.last_name').' *'}}</label>
            {!! Form::text('last_name', null, ['class' => '','placeholder'=>trans('cms::cms.last_name_joint'),'required'=>'required']) !!}
        </div>
        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.gender').' *' }}</label>
            {!! Form::select('gender',$arrays['gender'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-xm-12 col-sm-4 clearfix">
        <div class="input_all_div">
            {!! Form::label('marital_status', trans('cms::cms.marital_status')).' *' !!}
            <div class="clearfix">
                {!! Form::select('marital_status',$arrays['marital_status'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
            </div>
            {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-xm-12 col-sm-4">
        <div class="input_all_div">
            <label>{{trans('cms::cms.resident_status')}}</label>
            {!! Form::select('resident_status',$arrays['resident_status'], 'Non Resident', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
        </div>
    </div>

    <div class="joint_div" id="a_joint">

        <div class="clearfix"></div>
        <h4>A. {{trans('cms::cms.PERSONAL DETAILS (HEREAFTER “CLIENT”) (for Joint Account)')}}</h4>


        <div>
            <label class="required">{{ trans('cms::cms.title_joint') }}</label>

            <div>
                {!! Form::radio('title_joint','Mr', true, ['class' => '','id'=>'title_joint_0']) !!}
                <label for="title_joint_0">{{ trans('cms::cms.Mr') }}</label>
                {!! Form::radio('title_joint','Ms', false, ['class' => '','id'=>'title_joint_1']) !!}
                <label for="title_joint_1">{{ trans('cms::cms.Ms') }}</label>
                {!! Form::radio('title_joint','Mrs', false, ['class' => '','id'=>'title_joint_2']) !!}
                <label for="title_joint_2">{{ trans('cms::cms.Mrs') }}</label>
                {!! Form::radio('title_joint','Dr', false, ['class' => '','id'=>'title_joint_3']) !!}
                <label for="title_joint_3">{{ trans('cms::cms.Dr') }}</label>
            </div>
        </div>


        <div class="col-xm-12 col-sm-4">
            <label>{{ trans('cms::cms.first_name_joint').' *' }}</label>
            {!! Form::text('first_name_joint', null, ['class' => '','placeholder'=>trans('cms::cms.first_name_joint'),'required'=>'required']) !!}
            <div class="input_all_div" id="date_of_birth_joint_div">
                {!! Form::label('date_of_birth_joint', trans('cms::cms.date_of_birth_joint')) !!}
                <div class="clearfix">
                    {!! Form::text('date_of_birth_joint', null, ['class' => '']) !!}
                </div>
                {!! $errors->first('date_of_birth_joint', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-xm-12 col-sm-4 ">
            <div class="input_all_div">
                <label>{{trans('cms::cms.second_name_joint')}}</label>
                {!! Form::text('second_name_joint', null, ['class' => '','placeholder'=>trans('cms::cms.second_name_joint')]) !!}
            </div>

            <div class="input_all_div">
                <label>{{trans('cms::cms.nationality_joint')}}</label>
                {!! Form::select('nationality_joint',$arrays['country'], 'MT4', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            </div>


        </div>
        <div class="col-xm-12 col-sm-4">
            <div class="input_all_div">
                <label>{{trans('cms::cms.last_name_joint').'* '}}</label>
                {!! Form::text('last_name_joint', null, ['class' => '','placeholder'=>trans('cms::cms.last_name_joint'),'required'=>'required']) !!}
            </div>
            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.gender_joint').' *' }}</label>
                {!! Form::select('gender_joint',$arrays['gender'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xm-12 col-sm-4 clearfix">
            <div class="input_all_div">
                {!! Form::label('marital_status_joint', trans('cms::cms.marital_status_joint')).' *' !!}
                <div class="clearfix">
                    {!! Form::select('marital_status_joint',$arrays['marital_status'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                </div>
                {!! $errors->first('marital_status_joint', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="col-xm-12 col-sm-4">
            <div class="input_all_div">
                <label>{{trans('cms::cms.resident_status_joint')}}</label>
                {!! Form::select('resident_status_joint',$arrays['resident_status'], 'Non Resident', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            </div>
        </div>

    </div>


    <div class="clearfix"></div>

    <h4>B. {{trans('cms::cms.RESIDENTIAL ADDRESS')}}</h4>


    <div class="left_div">
        <div class="input_all_div">
            <label>{!! Form::label('street_and_number',  trans('cms::cms.street_and_number').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('street_and_number', null, ['class' => '','placeholder'=>trans('cms::cms.street_and_number'),'required'=>'required']) !!}
            <span>{!! $errors->first('street_and_number', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="right_div">

        <div class="input_all_div">
            <label>{!! Form::label('postal_code',trans('cms::cms.postal_code').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('postal_code', null, ['class' => '','placeholder'=>trans('cms::cms.postal_code'),'required'=>'required']) !!}
            <span>{!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>


    <div class="left_div">
        <div class="input_all_div">
            <label>{!! Form::label('city',  trans('cms::cms.city').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('city', null, ['class' => '','placeholder'=>trans('cms::cms.city'),'required'=>'required']) !!}
            <span>{!! $errors->first('city', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="right_div">

        <div class="input_all_div">
            <label>{!! Form::label('country',trans('cms::cms.country')  , ['class' => 'control-label']) !!}</label>
            {!! Form::select('country',$arrays['country'], 'Non Resident', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            <span>{!! $errors->first('country', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>


    <div class="joint_div" id="b_joint">

        <div class="clearfix"></div>
        <h4>B. {{trans('cms::cms.RESIDENTIAL ADDRESS (for Joint Account)')}}</h4>

        <div class="left_div">
            <div class="input_all_div">
                <label>{!! Form::label('street_and_number_joint',  trans('cms::cms.street_and_number_joint').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('street_and_number_joint', null, ['class' => '','placeholder'=>trans('cms::cms.street_and_number_joint'),'required'=>'required']) !!}
                <span>{!! $errors->first('street_and_number_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>

        <div class="right_div">

            <div class="input_all_div">
                <label>{!! Form::label('postal_code_joint',trans('cms::cms.postal_code_joint').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('postal_code_joint', null, ['class' => '','placeholder'=>trans('cms::cms.postal_code_joint'),'required'=>'required']) !!}
                <span>{!! $errors->first('postal_code_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>


        <div class="left_div">
            <div class="input_all_div">
                <label>{!! Form::label('city_joint',  trans('cms::cms.city_joint').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('city_joint', null, ['class' => '','placeholder'=>trans('cms::cms.city_joint'),'required'=>'required']) !!}
                <span>{!! $errors->first('city_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>

        <div class="right_div">

            <div class="input_all_div">
                <label>{!! Form::label('country_joint',trans('cms::cms.country_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('country_joint',$arrays['country'], 'Non Resident', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('country_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>

    </div>


    <div class="clearfix"></div>

    <h4>C. {{trans('cms::cms.CONTACT DETAILS')}}</h4>



    <div class="clearfix"></div>
    <div class="left_div">
        <div class="input_all_div">
            <label>{!! Form::label('main_phone',  trans('cms::cms.main_phone').' *'  , ['class' => 'control-label']) !!}</label>

            <div class="intl-tel-input">
                <input type="tel" name="main_phone" class="form-control" required="required">
            </div>
            <span>{!! $errors->first('main_phone', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('primary_email',  trans('cms::cms.primary_email').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('primary_email', null, ['class' => '','placeholder'=>trans('cms::cms.primary_email'),'required'=>'required']) !!}
            <span>{!! $errors->first('primary_email', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('fax',  trans('cms::cms.fax')  , ['class' => 'control-label']) !!}</label>

            <div class="intl-tel-input">
                <input type="tel" name="fax" class="form-control" required="required">
            </div>
            <span>{!! $errors->first('fax', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="right_div">
        <div class="input_all_div">
            <label>{!! Form::label('secondary_phone',trans('cms::cms.secondary_phone')  , ['class' => 'control-label']) !!}</label>

            <div class="intl-tel-input">
                <input type="tel" name="secondary_phone" class="form-control">
            </div>
            <span>{!! $errors->first('secondary_phone', '<p class="help-block">:message</p>') !!}</span>
        </div>


        <div class="input_all_div">
            <label>{!! Form::label('secondary_email',trans('cms::cms.secondary_email')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('secondary_email', null, ['class' => '','placeholder'=>trans('cms::cms.secondary_email')]) !!}
            <span>{!! $errors->first('secondary_email', '<p class="help-block">:message</p>') !!}</span>
        </div>

    </div>

    <div class="joint_div" id="c_joint">

        <div class="clearfix"></div>
        <h4>C. {{trans('cms::cms.CONTACT DETAILS (for Joint Account)')}}</h4>

        <div class="left_div">
            <div class="input_all_div">
                <label>{!! Form::label('main_phone_joint',  trans('cms::cms.main_phone_joint').' *'  , ['class' => 'control-label']) !!}</label>

                <div class="intl-tel-input">
                    <input type="tel" name="main_phone_joint" class="form-control" required="required">
                </div>
                <span>{!! $errors->first('main_phone_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('primary_email_joint',  trans('cms::cms.primary_email_joint').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('primary_email_joint', null, ['class' => '','placeholder'=>trans('cms::cms.primary_email_joint'),'required'=>'required']) !!}
                <span>{!! $errors->first('primary_email_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('fax_joint',  trans('cms::cms.fax_joint').' *'  , ['class' => 'control-label']) !!}</label>
                <div class="intl-tel-input">
                    <input type="tel" name="fax_joint" class="form-control" required="required">
                </div>
                <span>{!! $errors->first('fax_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>


        <div class="right_div">
            <div class="input_all_div">
                <label>{!! Form::label('secondary_phone_joint',trans('cms::cms.secondary_phone_joint')  , ['class' => 'control-label']) !!}</label>

                <div class="intl-tel-input">
                    <input type="tel" name="secondary_phone_joint" class="form-control">
                </div>
                <span>{!! $errors->first('secondary_phone_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>


            <div class="input_all_div">
                <label>{!! Form::label('secondary_email_joint',trans('cms::cms.secondary_email_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('secondary_email_joint', null, ['class' => '','placeholder'=>trans('cms::cms.secondary_email_joint')]) !!}
                <span>{!! $errors->first('secondary_email_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>

    </div>
    <div class="clearfix"></div>
    <h4>D. {{trans('cms::cms.POSTAL ADDRESS (IF DIFFERENTFROM RESIDENTIAL ADDRESS)')}}</h4>

    <div class="left_div">

        <div class="input_all_div">
            <label>{!! Form::label('postal_street_and_number',  trans('cms::cms.postal_street_and_number')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('postal_street_and_number', null, ['class' => '','placeholder'=>trans('cms::cms.postal_street_and_number')]) !!}
            <span>{!! $errors->first('postal_street_and_number', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('postal_city',  trans('cms::cms.postal_city')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('postal_city', null, ['class' => '','placeholder'=>trans('cms::cms.postal_city')]) !!}
            <span>{!! $errors->first('postal_city', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="right_div">


        <div class="input_all_div">
            <label>{!! Form::label('postal_post_code',trans('cms::cms.postal_post_code')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('postal_post_code', null, ['class' => '','placeholder'=>trans('cms::cms.postal_post_code')]) !!}
            <span>{!! $errors->first('postal_post_code', '<p class="help-block">:message</p>') !!}</span>
        </div>


        <div class="input_all_div">
            <label>{!! Form::label('postal_country',trans('cms::cms.postal_country')  , ['class' => 'control-label']) !!}</label>
            {!! Form::select('postal_country',$arrays['country'], 'Non Resident', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            <span>{!! $errors->first('postal_country', '<p class="help-block">:message</p>') !!}</span>
        </div>


        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
    <div class="joint_div" id="d_joint">
        <div class="clearfix"></div>
        <h4>D. {{trans('cms::cms.POSTAL ADDRESS (IF DIFFERENTFROM RESIDENTIAL ADDRESS) (for Joint Account)')}}</h4>

        <div class="left_div">
            <div class="input_all_div">
                <label>{!! Form::label('postal_street_and_number_joint',  trans('cms::cms.postal_street_and_number_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('postal_street_and_number_joint', null, ['class' => '','placeholder'=>trans('cms::cms.postal_street_and_number_joint')]) !!}
                <span>{!! $errors->first('postal_street_and_number_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('postal_city_joint',  trans('cms::cms.postal_city_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('postal_city_joint', null, ['class' => '','placeholder'=>trans('cms::cms.postal_city_joint')]) !!}
                <span>{!! $errors->first('postal_city_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="right_div">

            <div class="input_all_div">
                <label>{!! Form::label('postal_post_code_joint',trans('cms::cms.postal_post_code_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('postal_post_code_joint', null, ['class' => '','placeholder'=>trans('cms::cms.postal_post_code_joint')]) !!}
                <span>{!! $errors->first('postal_post_code_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>


            <div class="input_all_div">
                <label>{!! Form::label('postal_country_joint',trans('cms::cms.postal_country_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('postal_country_joint',$arrays['country'], 'Non Resident', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('postal_country_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>
    <h3>4. {{trans('cms::cms.FINANCIAL INFORMATION')}}</h3>

    <div class="clearfix"></div>
    <h4>A. {{trans('cms::cms.FINANCIAL BACKGROUND')}}</h4>

    <div class="full_width_div">
        <div class="input_all_div">
            <label>{!! Form::label('financial_instrument_portfolio',trans('cms::cms.financial_instrument_portfolio')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('financial_instrument_portfolio', null, ['class' => '','placeholder'=>trans('cms::cms.financial_instrument_portfolio')]) !!}
            <span>{!! $errors->first('financial_instrument_portfolio', '<p class="help-block">:message</p>') !!}</span>
        </div>

    </div>
    <div class="joint_div" id="4_a_joint">
        <h4>A. {{trans('cms::cms.FINANCIAL BACKGROUND (for Joint Account)')}}</h4>

        <div class="full_width_div">
            <div class="input_all_div">
                <label>{!! Form::label('financial_instrument_portfolio_joint',trans('cms::cms.financial_instrument_portfolio_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('financial_instrument_portfolio_joint', null, ['class' => '','placeholder'=>trans('cms::cms.financial_instrument_portfolio_joint')]) !!}
                <span>{!! $errors->first('financial_instrument_portfolio_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>

        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
    <h4>B. {{trans('cms::cms.SOURCE OF FUNDS DEPOSITED WITH HOUSE OF BORSE (IF YOU SELECT“OTHER” PLEASE SPECIFY)')}}</h4>

    <div class="left_div">
        <div class="input_all_div">
            <label>{!! Form::label('source_funds_deposited',trans('cms::cms.source_funds_deposited')  , ['class' => 'control-label']) !!}</label>
            {!! Form::select('source_funds_deposited',$arrays['source_funds_deposited'], 'Employment inheritance investment', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
            <span>{!! $errors->first('source_funds_deposited', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="right_div">
        <div class="input_all_div">
            <label>{!! Form::label('other_source_funds_deposited',trans('cms::cms.other_source_funds_deposited')  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('other_source_funds_deposited', null, ['class' => '','placeholder'=>trans('cms::cms.other_source_funds_deposited')]) !!}
            <span>{!! $errors->first('other_source_funds_deposited', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="clear:fix"></div>
    <div class="joint_div" id="4_b_joint">
        <div class="clearfix"></div>
        <h4>B. {{trans('cms::cms.SOURCE OF FUNDS DEPOSITED WITH HOUSE OF BORSE (IF YOU SELECT“OTHER” PLEASE SPECIFY) (for JointAccount)')}}</h4>

        <div class="left_div">

            <div class="input_all_div">
                <label>{!! Form::label('source_funds_deposited_joint',trans('cms::cms.source_funds_deposited_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('source_funds_deposited_joint',$arrays['source_funds_deposited_joint'], 'Employment', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('source_funds_deposited_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="right_div">
            <div class="input_all_div">
                <label>{!! Form::label('other_source_funds_deposited_joint',trans('cms::cms.other_source_funds_deposited_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('other_source_funds_deposited_joint', null, ['class' => '','placeholder'=>trans('cms::cms.other_source_funds_deposited_joint')]) !!}
                <span>{!! $errors->first('other_source_funds_deposited_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>
    <h3>5. {{trans('cms::cms.TRADING EXPERIENCE')}}</h3>


    <h4>B. {{trans('cms::cms.FINANCIAL MARKETS EXPERIENCE')}}</h4>

    <div class="full_width_div">
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_years_cfd',trans('cms::cms.number_of_years_cfd').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_years_cfd',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                <span>{!! $errors->first('number_of_years_cfd', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_transactions_cfd',trans('cms::cms.number_of_transactions_cfd')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_transactions_cfd',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('number_of_transactions_cfd', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('average_trading_cfd',trans('cms::cms.average_trading_cfd')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('average_trading_cfd',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('average_trading_cfd', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
    </div>


    <div class="full_width_div">
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_years_commodities',trans('cms::cms.number_of_years_commodities').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_years_commodities',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                <span>{!! $errors->first('number_of_years_commodities', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_transactions_commodities',trans('cms::cms.number_of_transactions_commodities')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_transactions_commodities',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('number_of_transactions_commodities', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('average_trading_commodities',trans('cms::cms.average_trading_commodities')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('average_trading_commodities',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('average_trading_commodities', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
    </div>


    <div class="full_width_div">
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_years_forex',trans('cms::cms.number_of_years_forex').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_years_forex',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                <span>{!! $errors->first('number_of_years_forex', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_transactions_forex',trans('cms::cms.number_of_transactions_forex')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_transactions_forex',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('number_of_transactions_forex', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('average_trading_forex',trans('cms::cms.average_trading_forex')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('average_trading_forex',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('average_trading_forex', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
    </div>


    <div class="full_width_div">
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_years_futures',trans('cms::cms.number_of_years_futures').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_years_futures',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                <span>{!! $errors->first('number_of_years_futures', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_transactions_futures',trans('cms::cms.number_of_transactions_futures')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_transactions_futures',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('number_of_transactions_futures', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('average_trading_futures',trans('cms::cms.average_trading_futures')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('average_trading_futures',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('average_trading_futures', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
    </div>


    <div class="full_width_div">
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_years_options',trans('cms::cms.number_of_years_options').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_years_options',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                <span>{!! $errors->first('number_of_years_options', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_transactions_options',trans('cms::cms.number_of_transactions_options')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_transactions_options',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('number_of_transactions_options', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('average_trading_options',trans('cms::cms.average_trading_options')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('average_trading_options',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('average_trading_options', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
    </div>


    <div class="full_width_div">
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_years_securities',trans('cms::cms.number_of_years_securities').' *'  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_years_securities',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                <span>{!! $errors->first('number_of_years_securities', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('number_of_transactions_securities',trans('cms::cms.number_of_transactions_securities')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('number_of_transactions_securities',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('number_of_transactions_securities', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="input_all_div">
                <label>{!! Form::label('average_trading_securities',trans('cms::cms.average_trading_securities')  , ['class' => 'control-label']) !!}</label>
                {!! Form::select('average_trading_securities',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                <span>{!! $errors->first('average_trading_securities', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
    </div>


    <div class="joint_div" id="5_joint">

        <div class="clearfix"></div>
        <h3>5. {{trans('cms::cms.TRADING EXPERIENCE ( for Joint Account)')}} </h3>

        <div class="full_width_div">
            <h4>B. {{trans('cms::cms.FINANCIAL MARKETS EXPERIENCE (for Joint Account)')}}</h4>
        </div>

        <div class="full_width_div">
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_years_cfd_joint',trans('cms::cms.number_of_years_cfd_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_years_cfd_joint',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                    <span>{!! $errors->first('number_of_years_cfd_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_transactions_cfd_joint',trans('cms::cms.number_of_transactions_cfd_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_transactions_cfd_joint',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('number_of_transactions_cfd_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('average_trading_cfd_joint',trans('cms::cms.average_trading_cfd_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('average_trading_cfd_joint',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('average_trading_cfd_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
        </div>

        <div class="full_width_div">
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_years_commodities_joint',trans('cms::cms.number_of_years_commodities_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_years_commodities_joint',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                    <span>{!! $errors->first('number_of_years_commodities_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_transactions_commodities_joint',trans('cms::cms.number_of_transactions_commodities_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_transactions_commodities_joint',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('number_of_transactions_commodities_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('average_trading_commodities_joint',trans('cms::cms.average_trading_commodities_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('average_trading_commodities_joint',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('average_trading_commodities_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
        </div>


        <div class="full_width_div">
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_years_forex_joint',trans('cms::cms.number_of_years_forex_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_years_forex_joint',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                    <span>{!! $errors->first('number_of_years_forex_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_transactions_forex_joint',trans('cms::cms.number_of_transactions_forex_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_transactions_forex_joint',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('number_of_transactions_forex_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('average_trading_forex_joint',trans('cms::cms.average_trading_forex_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('average_trading_forex_joint',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('average_trading_forex_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
        </div>



        <div class="full_width_div">
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_years_futures_joint',trans('cms::cms.number_of_years_futures_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_years_futures_joint',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                    <span>{!! $errors->first('number_of_years_futures_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_transactions_futures_joint',trans('cms::cms.number_of_transactions_futures_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_transactions_futures_joint',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('number_of_transactions_futures_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('average_trading_futures_joint',trans('cms::cms.average_trading_futures_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('average_trading_futures_joint',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('average_trading_futures_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
        </div>


        <div class="full_width_div">
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_years_options_joint',trans('cms::cms.number_of_years_options_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_years_options_joint',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                    <span>{!! $errors->first('number_of_years_options_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_transactions_options_joint',trans('cms::cms.number_of_transactions_options_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_transactions_options_joint',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('number_of_transactions_options_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('average_trading_options_joint',trans('cms::cms.average_trading_options_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('average_trading_options_joint',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('average_trading_options_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
        </div>


        <div class="full_width_div">
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_years_securities_joint',trans('cms::cms.number_of_years_securities_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_years_securities_joint',$arrays['number_of_years'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
                    <span>{!! $errors->first('number_of_years_securities_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('number_of_transactions_securities_joint',trans('cms::cms.number_of_transactions_securities_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('number_of_transactions_securities_joint',$arrays['number_of_transactions'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('number_of_transactions_securities_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input_all_div">
                    <label>{!! Form::label('average_trading_securities_joint',trans('cms::cms.average_trading_securities_joint')  , ['class' => 'control-label']) !!}</label>
                    {!! Form::select('average_trading_securities_joint',$arrays['average_trading'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
                    <span>{!! $errors->first('average_trading_securities_joint', '<p class="help-block">:message</p>') !!}</span>
                </div>
            </div>
        </div>


    </div>

    <div class="clearfix"></div>
    <h4>I. {{trans('cms::cms.UNDERSTANDING OF THE MARKETS')}}</h4>

    <div class="col-sm-4">
        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.Understand market cfd').' *'  }}</label><br>
            {!! Form::radio('understand_market_cfd',0, false, ['class' => '','id'=>'understand_market_cfd_0','required'=>'required']) !!}
            <label for="understand_market_cfd_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_market_cfd',1, false, ['class' => '','id'=>'understand_market_cfd_1','required'=>'required']) !!}
            <label for="understand_market_cfd_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_market_cfd', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('understand_market_years_cfd',trans('cms::cms.understand_market_years_cfd').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('understand_market_years_cfd', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_cfd'),'required'=>'required']) !!}
            <span>{!! $errors->first('understand_market_years_cfd', '<p class="help-block">:message</p>') !!}</span>
        </div>




        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.Understand market futures').' *'  }}</label><br>
            {!! Form::radio('understand_market_futures',0, false, ['class' => '','id'=>'understand_market_futures_0','required'=>'required']) !!}
            <label for="understand_market_futures_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_market_futures',1, false, ['class' => '','id'=>'understand_market_futures_1','required'=>'required']) !!}
            <label for="understand_market_futures_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_market_futures', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('understand_market_years_futures',trans('cms::cms.understand_market_years_futures').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('understand_market_years_futures', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_futures'),'required'=>'required']) !!}
            <span>{!! $errors->first('understand_market_years_futures', '<p class="help-block">:message</p>') !!}</span>
        </div>

    </div>

    <div class="col-sm-4">
        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.Understand market commodities').' *' }}</label><br>
            {!! Form::radio('understand_market_commodities',0, false, ['class' => '','id'=>'understand_market_commodities_0','required'=>'required']) !!}
            <label for="understand_market_commodities_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_market_commodities',1, false, ['class' => '','id'=>'understand_market_commodities_1','required'=>'required']) !!}
            <label for="understand_market_commodities_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_market_commodities', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('understand_market_years_commodities',trans('cms::cms.understand_market_years_commodities').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('understand_market_years_commodities', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_commodities'),'required'=>'required']) !!}
            <span>{!! $errors->first('understand_market_years_commodities', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.Understand market options').' *'  }}</label><br>
            {!! Form::radio('understand_market_options',0, false, ['class' => '','id'=>'understand_market_options_0','required'=>'required']) !!}
            <label for="understand_market_options_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_market_options',1, false, ['class' => '','id'=>'understand_market_options_1','required'=>'required']) !!}
            <label for="understand_market_options_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_market_options', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('understand_market_years_options',trans('cms::cms.understand_market_years_options').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('understand_market_years_options', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_options'),'required'=>'required']) !!}
            <span>{!! $errors->first('understand_market_years_options', '<p class="help-block">:message</p>') !!}</span>
        </div>

    </div>

    <div class="col-sm-4">

        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.Understand market forex').' *'  }}</label><br>
            {!! Form::radio('understand_market_forex',0, false, ['class' => '','id'=>'understand_market_forex_0','required'=>'required']) !!}
            <label for="understand_market_forex_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_market_forex',1, false, ['class' => '','id'=>'understand_market_forex_1','required'=>'required']) !!}
            <label for="understand_market_forex_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_market_forex', '<p class="help-block">:message</p>') !!}</span>
        </div>


        <div class="input_all_div">
            <label>{!! Form::label('understand_market_years_forex',trans('cms::cms.understand_market_years_forex').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('understand_market_years_forex', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_forex'),'required'=>'required']) !!}
            <span>{!! $errors->first('understand_market_years_forex', '<p class="help-block">:message</p>') !!}</span>
        </div>


        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.Understand market securities').' *'  }}</label><br>
            {!! Form::radio('understand_market_securities',0, false, ['class' => '','id'=>'understand_market_securities_0','required'=>'required']) !!}
            <label for="understand_market_securities_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_market_securities',1, false, ['class' => '','id'=>'understand_market_securities_1','required'=>'required']) !!}
            <label for="understand_market_securities_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_market_securities', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('understand_market_years_securities',trans('cms::cms.understand_market_years_securities').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::text('understand_market_years_securities', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_securities'),'required'=>'required']) !!}
            <span>{!! $errors->first('understand_market_years_securities', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="joint_div" id="i_joint">

        <div class="clearfix"></div>
        <h4>I. {{trans('cms::cms.UNDERSTANDING OF THE MARKETS (for Joint Account)')}}</h4>

        <div class="col-sm-4">
            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.Understand market cfd') }}</label><br>
                {!! Form::radio('understand_market_cfd_joint',0, false, ['class' => '','id'=>'understand_market_cfd_joint_0']) !!}
                <label for="understand_market_cfd_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_market_cfd_joint',1, false, ['class' => '','id'=>'understand_market_cfd_joint_1']) !!}
                <label for="understand_market_cfd_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_market_joint_cfd', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('understand_market_years_cfd_joint',trans('cms::cms.understand_market_years_cfd_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('understand_market_years_cfd_joint', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_cfd_joint')]) !!}
                <span>{!! $errors->first('understand_market_years_cfd_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.Understand market futures')}}</label><br>
                {!! Form::radio('understand_market_futures_joint',0, false, ['class' => '','id'=>'understand_market_futures_joint_0']) !!}
                <label for="understand_market_futures_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_market_futures_joint',1, false, ['class' => '','id'=>'understand_market_futures_joint_1']) !!}
                <label for="understand_market_futures_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_market_futures_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('understand_market_years_futures_joint',trans('cms::cms.understand_market_years_futures_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('understand_market_years_futures_joint', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_futures_joint')]) !!}
                <span>{!! $errors->first('understand_market_years_futures_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>

        <div class="col-sm-4">

            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.Understand market commodities') }}</label><br>
                {!! Form::radio('understand_market_commodities_joint',0, false, ['class' => '','id'=>'understand_market_commodities_joint_0']) !!}
                <label for="understand_market_commodities_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_market_commodities_joint',1, false, ['class' => '','id'=>'understand_market_commodities_joint_1']) !!}
                <label for="understand_market_commodities_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_market_commodities_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('understand_market_years_commodities_joint',trans('cms::cms.understand_market_years_commodities_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('understand_market_years_commodities_joint', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_commodities_joint')]) !!}
                <span>{!! $errors->first('understand_market_years_commodities_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.Understand market options') }}</label><br>
                {!! Form::radio('understand_market_options_joint',0, false, ['class' => '','id'=>'understand_market_options_joint_0']) !!}
                <label for="understand_market_options_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_market_options_joint',1, false, ['class' => '','id'=>'understand_market_options_joint_1']) !!}
                <label for="understand_market_options_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_market_options_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('understand_market_years_options_joint',trans('cms::cms.understand_market_years_options_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('understand_market_years_options_joint', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_options_joint')]) !!}
                <span>{!! $errors->first('understand_market_years_options_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.Understand market forex') }}</label><br>
                {!! Form::radio('understand_market_forex_joint',0, false, ['class' => '','id'=>'understand_market_forex_joint_0']) !!}
                <label for="understand_market_forex_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_market_forex_joint',1, false, ['class' => '','id'=>'understand_market_forex_joint_1']) !!}
                <label for="understand_market_forex_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_market_forex_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('understand_market_years_forex_joint',trans('cms::cms.understand_market_years_forex_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('understand_market_years_forex_joint', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_forex_joint')]) !!}
                <span>{!! $errors->first('understand_market_years_forex_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>


            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.Understand market securities')}}</label><br>
                {!! Form::radio('understand_market_securities_joint',0, false, ['class' => '','id'=>'understand_market_securities_joint_0']) !!}
                <label for="understand_market_securities_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_market_securities_joint',1, false, ['class' => '','id'=>'understand_market_securities_joint_1']) !!}
                <label for="understand_market_securities_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_market_securities_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

            <div class="input_all_div">
                <label>{!! Form::label('understand_market_years_securities_joint',trans('cms::cms.understand_market_years_securities_joint')  , ['class' => 'control-label']) !!}</label>
                {!! Form::text('understand_market_years_securities_joint', null, ['class' => '','placeholder'=>trans('cms::cms.understand_market_years_securities_joint')]) !!}
                <span>{!! $errors->first('understand_market_years_securities_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>

        </div>

    </div>

    <div class="clearfix"></div>
    <h3>6. {{trans('cms::cms.Pearsonal Files')}}</h3>

    <div class="left_div">
        <div class="input_all_div">
            <label>{!! Form::label('id_type',trans('cms::cms.id_type').' *'   , ['class' => 'control-label']) !!}</label>
            {!! Form::select('id_type',$arrays['id_type'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
            <span>{!! $errors->first('id_type', '<p class="help-block">:message</p>') !!}</span>
        </div>

        <div class="input_all_div">
            <label>{!! Form::label('proof_of_residence',trans('cms::cms.proof_of_residence').' *'  , ['class' => 'control-label']) !!}</label>
            {!! Form::select('proof_of_residence',$arrays['proof_of_residence'], 'Select One', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform','required'=>'required']) !!}
            <span>{!! $errors->first('proof_of_residence', '<p class="help-block">:message</p>') !!}</span>
        </div>

    </div>

    <div class="right_div">

        <div class="input_all_div file">
            {!! Form::label('document_id', trans('document_id')) !!}
            <div class="country_list">
                {!! Form::text('document_id', null, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('document_id', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="input_all_div file">
            {!! Form::label('document_por', trans('document_por')) !!}
            <div class="country_list">
                {!! Form::text('document_por', null, ['class' => 'form-control']) !!}
            </div>
            {!! $errors->first('document_por', '<p class="help-block">:message</p>') !!}
        </div>


    </div>


    <div class="clearfix"></div>
    <h4>A. {{trans('cms::cms.Understand risks')}}</h4>
    {{trans('cms::cms.Margin_trading')}} <a href="path('showPage',{'id':1225,'parentid':2,'slug':'risk-disclosure'})">
        {{trans('cms::cms.Risk Disclosure')}}</a>  {{trans('cms::cms.and')}}
    <a href="path('showPage',{'id':1198,'parentid':2,'slug':'privacy-policy'})">{{trans('cms::cms.Privacy Policy')}}</a>
    {{trans('cms::cms.Statement')}}.
    <div class="full_width_div">
        <div class="input_all_div">
            <label class="required">{{ trans('cms::cms.understand_risks').' *' }}</label><br>
            {!! Form::radio('understand_risks',0, false, ['class' => '','id'=>'understand_risks_0','required'=>'required']) !!}
            <label for="understand_risks_0">{{ trans('cms::cms.yes') }}</label>

            {!! Form::radio('understand_risks',1, false, ['class' => '','id'=>'understand_risks_1','required'=>'required']) !!}
            <label for="understand_risks_1">{{ trans('cms::cms.no') }}</label>
            <span>{!! $errors->first('understand_risks', '<p class="help-block">:message</p>') !!}</span>
        </div>


    </div>

    <div class="joint_div" id="resk_joint">
        <div class="clearfix"></div>
        <h4>A. {{trans('cms::cms.Understand risks (for Joint Account)')}}</h4>
        {{trans('cms::cms.Margin_trading')}} <a href="path('showPage',{'id':1225,'parentid':2,'slug':'risk-disclosure'})">
            {{trans('cms::cms.Risk Disclosure')}}</a>  {{trans('cms::cms.and')}}
        <a href="path('showPage',{'id':1198,'parentid':2,'slug':'privacy-policy'})">{{trans('cms::cms.Privacy Policy')}}</a>
        {{trans('cms::cms.Statement')}}.
        <div class="full_width_div">
            <div class="input_all_div">
                <label class="required">{{ trans('cms::cms.understand_risks') }}</label><br>
                {!! Form::radio('understand_risks_joint',0, false, ['class' => '','id'=>'understand_risks_joint_0']) !!}
                <label for="understand_risks_joint_0">{{ trans('cms::cms.yes') }}</label>

                {!! Form::radio('understand_risks_joint',1, false, ['class' => '','id'=>'understand_risks_joint_1']) !!}
                <label for="understand_risks_joint_1">{{ trans('cms::cms.no') }}</label>
                <span>{!! $errors->first('understand_risks_joint', '<p class="help-block">:message</p>') !!}</span>
            </div>
        </div>
    </div>

    <div class="full_width_div">

        <div class="clearfix"></div>
        <h3>7.  {{trans('cms::cms.SIGNATURE AND CONSENT')}}</h3>
        <h4>I/  {{trans('cms::cms.WE, THE UNDERSIGNED, HEREBY CERTIFY THAT')}}:</h4>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_1', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_1').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_2', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_2').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_3', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_3').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_4', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_4') }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_5', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_5').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_6', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_6').' *' }}</span>
                </label>
            </div>
        </div>


        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_7', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_7').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_8', 1,false ,['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_8').' *' }}</span>
                </label>
            </div>
        </div>



        <h4>{{trans('cms::cms.Personal information submitted by me/us to House of Borse may')}}:</h4>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_9', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_9').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_10', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_10').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_11', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_11').' *' }}</span>
                </label>
            </div>
        </div>

        <div class="nav-input-div">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('agreem_check_12', 1,false, ['class'=>'px','id'=>'exactLogin','required'=>'required']) !!}
                    <span class="lbl">{{ trans('cms::cms.agreem_check_12').' *' }}</span>
                </label>
            </div>
        </div>


    </div>


    <div class="clearfix">
    </div>
    <div class="col-xs-6">
    </div>

    <div id="submit_bottom_buttons_div">
        <button type="reset" class="reset form-control btn btn-grey "><i class="fa fa-refresh"></i>
            {%trans%}Reset{%endtrans%}
        </button>

        <button type="submit" class="next form-control btn btn-golden "
                onclick="$(this).parents('form:first').submit();">{%trans%}Submit{%endtrans%} <i
                    class="fa fa-arrow-right"></i></button>
    </div>
    <div class="clearfix"></div>

</div>


</form>
</div><!--.box-row-->
</section><!--.content-box-->


<script type="text/javascript">

    function add_joint_validation() {
        $('.joint_div input').attr('required', 'true');
        $('.select2-input,.select2-search input,.select2-focusser,.select2-offscreen,#forex_corebundle_portalusers_secondary_phone_joint,#forex_corebundle_portalusers_secondary_email_joint,#d_joint input,#i_joint input[type="text"],#4_a_joint input,#forex_corebundle_portalusers_other_source_funds_deposited_joint').removeAttr('required');
    }
    function remove_joint_validation() {
        $('.joint_div input').removeAttr('required');
    }


    $(document).ready(function () {
        $('select[name="country"]').change(function () {
            $("input[name='main_phone'],input[name='secondary_phone'],input[name='fax']").intlTelInput("selectCountry", $(this).val().toLowerCase());
        });
        $('select[name="country_joint"]').change(function () {
            $("input[name='main_phone_joint'],input[name='secondary_phone_joint'],input[name='fax_joint']").intlTelInput("selectCountry", $(this).val().toLowerCase());
        });




        $('select[name="number_of_years_cfd"],select[name="number_of_years_commodities"],select[name="number_of_years_forex"],select[name="number_of_years_futures"],select[name="number_of_years_options"],select[name="number_of_years_securities"]').change(function () {
            if ($(this).val() == 0) {
                $(this).parent().parent().parent().next().find('select').attr('disabled', 'disabled');
                $(this).parent().parent().parent().next().next().find('select').attr('disabled', 'disabled');
            } else {
                $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
                $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

            }
        });
        if ($(this).val() == 0) {
            $(this).parent().parent().parent().next().find('select').attr('disabled', 'disabled');
            $(this).parent().parent().parent().next().next().find('select').attr('disabled', 'disabled');
        } else {
            $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
            $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

        }


        $('#forex_corebundle_portalusers_number_of_years_cfd_joint,#forex_corebundle_portalusers_number_of_years_commodities_joint,#forex_corebundle_portalusers_number_of_years_forex_joint,#forex_corebundle_portalusers_number_of_years_futures_joint,#forex_corebundle_portalusers_number_of_years_options_joint,#forex_corebundle_portalusers_number_of_years_securities_joint').change(function () {
            if ($(this).val() == 0) {
                $(this).parent().parent().parent().next().find('select').attr('disabled', 'disabled');
                $(this).parent().parent().parent().next().next().find('select').attr('disabled', 'disabled');
            } else {
                $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
                $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

            }
        });


        if ($(this).val() == 0) {
            $(this).parent().parent().parent().next().find('select').attr('disabled', 'disabled');
            $(this).parent().parent().parent().next().next().find('select').attr('disabled', 'disabled');
        } else {
            $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
            $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

        }

        $('#forex_corebundle_portalusers_sole_joint_account input').change(function () {
            var radio_value = $('#forex_corebundle_portalusers_sole_joint_account input:checked').val();
            if (radio_value == 'Sole personal account') {
                $('.joint_div').hide();
                remove_joint_validation();
            } else {
                $('.joint_div').show();
                add_joint_validation();
            }
        });

        var radio_value = $('#forex_corebundle_portalusers_sole_joint_account input:checked').val();
        if (radio_value == 'Sole personal account') {
            $('.joint_div').hide();
            remove_joint_validation();
        } else {
            $('.joint_div').show();
            add_joint_validation();
        }

    });

    $(".file_input_div div").attr('data-content', 'Choose file');
    $(".file_input_div input").change(function () {
        $(this).parent().attr('data-content', $(this).val());
    });
    /*
     $(document).ready(function() {
     $("#real_form select").select2({
     width: 280,
     height: 60,
     dropdownCss: 'padding:  40px;'
     });
     });
     */
</script>


<script>

    function upload_file(file_input,resultInputName){

// var formData = new FormData($('form')[0]);
        var formData = new FormData();
        //   formData.append("upload_files",true);
        var fileInput = file_input;


        for(var i = 0; i < fileInput.files.length; i ++ ){
            formData.append('upload', fileInput.files[i]);
        }// for each file in th array


        $.ajax({
            url: '{{route('uploadFile').'?_token='.csrf_token()}}' ,  //Server script to process data
            type: 'post',
            xhr: function() {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // Check if upload property exists
                    //  myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
                }
                return myXhr;
            },
            //Ajax events
            beforeSend:  function(){},
            success:  function(data){
                var dataArray=data.split('|');
                if(dataArray[0].trim() == 'success'){
                    $(file_input).parent().attr('data-content',dataArray[1]);
                    // $(file_input).parent().data('content',data);
                    $('input[name="'+resultInputName+'"]').val(dataArray[1]);
                }else{
                    alert(dataArray[1]);
                }
            },
            error: function(){},
            complete:function(){},
            // Form data
            data: formData,
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        });//ajax
    }//upload_file(file_input)

    $(".file input").each(function(){
        var uploadHtml='<div class="file_input_div"><div class="country_list" data-content="Choose file">'+
                '<i class="fa fa-upload"></i><input type="file" onchange="upload_file(this,\''+$(this).attr('name')+'\')"> </div></div>';
        $(this).parent().prepend(uploadHtml);
        $(this).attr('type','hidden');

    });

</script>
</div>
{!! Form::close() !!}

@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif