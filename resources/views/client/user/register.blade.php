@extends('client.layouts.login', array('class' => 'page-signup'))
@section('title', Lang::get('user.PageTitleSignUp'))
@section('hidden')

@section('content')
    <style type="text/css">
        section#wrapper.login-register{
            overflow: auto;
        }
    </style>
    <div class="login-box">
        <div class="white-box">
            {!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/images/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}

            {!! Form::open(['id'=>'loginform' , 'class'=>'form-horizontal form-material']) !!}
            <div class="dropdown" style="float:right;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> Language</a>
                <ul class="dropdown-menu">
                    @foreach(config('app.language')  as $locale=>$name)
                        <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                    @endforeach
                </ul>
            </div>

            <h3 class="box-title m-b-20">{{ Lang::get('user.SignUpText') }}</h3>

            @include('client.partials.messages')



            <div class="form-group w-icon">
                {!! Form::text('first_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.FirstName')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('last_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.LastName')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.email')]) !!}

            </div>


            <div class="form-group w-icon">
                {!! Form::password('password',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.password')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::password('password_confirmation',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.confirmPassword')]) !!}

            </div>
            <div class="form-group w-icon">
                {!! Form::text('nickname',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Nickname')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('address', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.address')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('birthday', $default_birthday, ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Birthday')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('phone',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Phone')]) !!}

            </div>

            <div class="form-group">
                    {!! Form::select('country',$country_array,'',['id'=>'jq-validation-select2','class'=>'form-control input-lg','placeholder'=>Lang::get('user.Country')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('city',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.City')]) !!}

            </div>

            <div class="form-group w-icon">
                {!! Form::text('zip_code',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.ZipCode')]) !!}

            </div>

            <div class="form-group">
                <div class=" col-xs-6">

                    <div class="radio radio-info">

                        {!! Form::radio('gender', 0,true,['id'=>'radio15','class'=>'px']) !!}
                        <label for="radio15"> {{ trans('user.male') }} </label>
                    </div>
                </div>
                <div class=" col-xs-6">

                    <div class="radio radio-info">
                        {!! Form::radio('gender', 1,false,['id'=>'radio16','class'=>'px']) !!}
                        <label for="radio16"> {{ trans('user.female') }}  </label>
                    </div>
                </div>


            </div>


            <div class="form-group"  >

                <div class="col-xs-12">
                <label class="">
                    {!! Form::checkbox('agreement', 1, false, ['class'=>'px']) !!}
                    <span class="lbl">{{ Lang::get('user.IAgreeWithThe') }}</span>
                </label>
                    </div>
            </div>

            <div class="form-group" >

                <div class="col-xs-12">
                <label class="checkbox-inline">
                    {!! Recaptcha::render() !!}
                </label>
                    </div>
            </div>











            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    {!! Form::hidden('ibid',$ibid) !!}
                    {!! Form::hidden('planId',$planId) !!}
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{Lang::get('user.SignUp')}}</button>

                </div>
            </div>


            </form>

        </div>
    </div>
@stop
<div class="signup-container">



    <div class="signup-form">

        <a href="" class="logo">

            {!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
            &nbsp;
        </a>

        <div class="panel-heading-controls ">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> {{ trans('user.language') }}</a>
                <ul class="dropdown-menu">
                    @foreach(config('app.language')  as $locale=>$name)
                        <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                    @endforeach
                </ul></div>
        </div>


        {!! Form::open(['id'=>'signup-form_id']) !!}
        <div class="signup-text">
            <span>{{ Lang::get('user.SignUpText') }}</span>

        </div>
        @include('client.partials.messages')
        <div class="form-group w-icon">
            {!! Form::text('first_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.FirstName')]) !!}
            <span class="fa fa-info signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('last_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.LastName')]) !!}
            <span class="fa fa-user signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.email')]) !!}
            <span class="fa fa-envelope signup-form-icon"></span>
        </div>


        <div class="form-group w-icon">
            {!! Form::password('password',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.password')]) !!}
            <span class="fa fa-lock signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::password('password_confirmation',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.confirmPassword')]) !!}
            <span class="fa fa-lock signup-form-icon"></span>
        </div>
        <div class="form-group w-icon">
            {!! Form::text('nickname',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Nickname')]) !!}
            <span class="fa fa-info signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('address', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.address')]) !!}
            <span class="fa fa-location-arrow signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('birthday', $default_birthday, ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Birthday')]) !!}
                 <span class="fa fa-calendar signup-form-icon"></span>  
        </div>

        <div class="form-group w-icon">
            {!! Form::text('phone',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Phone')]) !!}
            <span class="fa fa-phone signup-form-icon"></span>
        </div>

        <div class="form-group">
            <label for="jq-validation-select2" class="col-sm-3 control-label"></label>
            <div class="form-group w-icon">
                {!! Form::select('country',$country_array,'',['id'=>'jq-validation-select2','class'=>'form-control input-lg','placeholder'=>Lang::get('user.Country')]) !!}
            </div>

        </div>

        <div class="form-group w-icon">
            {!! Form::text('city',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.City')]) !!}
            <span class="fa fa-compass signup-form-icon"></span>
        </div>
        
        <div class="form-group w-icon">
            {!! Form::text('zip_code',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.ZipCode')]) !!}
            <span class="fa fa-compass signup-form-icon"></span>
        </div>

        <div class="form-group">
                <div class=" col-xs-3">
                    <label class='radio gender_radio_0'>
                        {!! Form::radio('gender', 0,true,['id'=>'gender_radio_0','class'=>'px']) !!}
                        <span class="lbl">{{ trans('user.male') }}</span>
                    </label>
                </div>
                <div class=" col-xs-3">
                    <label class='radio gender_radio_1'>
                        {!! Form::radio('gender', 1,false,['id'=>'gender_radio_1','class'=>'px']) !!}
                        <span class="lbl">{{ trans('user.female') }}</span>
                    </label>
                </div>
            </div>


        <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
            <label class="checkbox-inline">
                {!! Form::checkbox('agreement', 1, false, ['class'=>'px']) !!}
                <span class="lbl">{{ Lang::get('user.IAgreeWithThe') }}</span>
            </label>
        </div>

        <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
            <label class="checkbox-inline">
                {!! Recaptcha::render() !!}
              </label>
        </div>

        <div class="form-actions">
            {!! Form::hidden('ibid',$ibid) !!}
            {!! Form::hidden('planId',$planId) !!}
            {!! Form::submit(Lang::get('user.SignUp'), ['class'=>'signup-btn bg-primary']) !!}
        </div>
        </form>

        <div class="signup-with">
            <a href="{{ route('client.auth.login') }}" class="signup-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">
                <span>{{ Lang::get('user.AlreadyHaveAnAccount') }}</span>    {{ trans('user.PageTitleSignIn') }}
            </a>
        </div>
    </div>

    <div id="terms-and-conditions-modal" class="modal fade modal-blur" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">{{ Lang::get('user.TermsAndConditions') }}</h4>
                </div>
                <div class="modal-body">
                    @include('client.partials.termsAndConditions')
                </div>
            </div>
        </div>
    </div>


    @stop






