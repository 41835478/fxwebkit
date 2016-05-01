@extends('client.layouts.login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))
@section('content')
    <div class="signin-container">


        <div class="signin-form">

            <a href="" class="logo">

                {!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
                &nbsp;
            </a>

            <div class="panel-heading-controls ">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-language"></i> {{ trans('user.language') }}</a>
                    <ul class="dropdown-menu">
                        @foreach(config('app.language')  as $locale=>$name)
                            <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                        @endforeach
                    </ul>
                </div>
            </div>


            {!! Form::open(['id'=>'signin-form_id']) !!}
            <div class="signin-text">
                <span>{{ Lang::get('user.SignInText') }}</span>
            </div>
            @include('client.partials.messages')
            <div class="form-group w-icon">
                {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.email')]) !!}
                <span class="fa fa-user signin-form-icon"></span>
            </div>
            <div class="form-group w-icon">
                {!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.password')]) !!}
                <span class="fa fa-lock signin-form-icon"></span>
            </div>
            <div class="form-actions">

                {!! Form::submit(Lang::get('user.SignIn'), ['class'=>'signin-btn bg-primary']) !!}
                <a href="{{ route('client.auth.recover') }}"
                   class="forgot-password">{{ Lang::get('user.ForgotYourPassword') }}</a>


            </div>
            {!! Form::close() !!}

            <div class="signin-with">
{{--*/ $socialNumber=config('fxweb.EnableFacebookRegister')+ config('fxweb.EnableGoogleRegister')+config('fxweb.EnableLinkedinRegister');
$width=($socialNumber>0)? 94/$socialNumber:0;
/*--}}
                @if(config('fxweb.EnableFacebookRegister'))
                    <a href="{{ route('client.facebook.login') }}" class="signin-with-btn"
                       style="background:#4f6faa;background:rgba(79, 111, 170, .8); width:{{$width}}% !important;">
                        {{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.Facebook') }}</span>
                    </a>
                @endif
                @if(config('fxweb.EnableGoogleRegister'))
                    <a href="{{ route('client.google.login') }}" class="signin-with-btn"
                       style="background:#4285F4;background:rgba(66, 133, 244, .8); width:{{$width}}% !important;">
                        {{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.google') }}</span>
                    </a>
                @endif
                @if(config('fxweb.EnableLinkedinRegister'))
                    <a href="{{ route('client.linkedin.login') }}" class="signin-with-btn"
                       style="background:#0077B5;background:rgba(0, 119, 181, .8); width:{{$width}}% !important;">
                        {{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.linkedin') }}</span>
                    </a>
                @endif


                <div class="text-center">
                    <div class="clearfix"></div>
                    {{ Lang::get('user.not_a_member') }}
                    <a href="{{ route('client.auth.register') }}">{{ Lang::get('user.sign_up_now') }}</a>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>

    </div>



@stop