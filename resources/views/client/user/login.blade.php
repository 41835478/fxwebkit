@extends('client.layouts.login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))
@section('content')
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

            <h3 class="box-title m-b-20">{{ trans('user.SignInText') }}</h3>

            @include('client.partials.messages')

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>trans('user.email')]) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    {!! Form::password('password', ['class'=>'form-control','placeholder'=>trans('user.password')]) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary pull-left p-t-0" style="display: none;">
                        <input id="checkbox-signup" type="checkbox">
                        <label for="checkbox-signup"> Remember me </label>
                    </div>
                    <a href="{{ route('client.auth.recover') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>{{ Lang::get('user.ForgotYourPassword') }}</a> </div>

            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{trans('user.SignIn')}}</button>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social">


                        @if(config('fxweb.EnableFacebookRegister'))
                            <a href="{{ route('client.facebook.login') }}" class="btn  btn-facebook"  data-toggle="tooltip"  title="{{ Lang::get('user.Facebook') }}">
                                <i aria-hidden="true" class="fa fa-facebook"></i>
                            </a>
                        @endif
                        @if(config('fxweb.EnableGoogleRegister'))
                            <a href="{{ route('client.google.login') }}" class="btn btn-googleplus" data-toggle="tooltip"  title="{{ Lang::get('user.google') }}">
                                <i aria-hidden="true" class="fa fa-google-plus"></i>
                            </a>
                        @endif
                        @if(config('fxweb.EnableLinkedinRegister'))
                            <a aria-hidden="true"  href="{{ route('client.linkedin.login') }}" class="btn  btn-facebook"  data-toggle="tooltip"  title="{{ Lang::get('user.linkedin') }}">
                                <i aria-hidden="true" class="fa fa-linkedin"></i>
                            </a>
                        @endif

                    </div>

                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>
                        {{ Lang::get('user.not_a_member') }}

                        <a href="{{ route('client.auth.register') }}" class="text-primary m-l-5">{{ Lang::get('user.sign_up_now') }}</a>
                        <br>
                        or
                        <br>

                        <a href="{{ route('client.auth.mt4Signup') }}" class="text-primary m-l-5">{{ Lang::get('user.sign_up_with_mt4') }}</a>
                        </p>
                </div>
            </div>
            </form>

        </div>
    </div>
@stop