@extends('client.layouts.login')
@section('title', Lang::get('user.SignIn'))
@section('content')
	<div class="signin-container">

		<div class="signin-info">
			<a href="" class="logo">
				{!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px']) !!}&nbsp;
				{{ Config::get('fxweb.app_name') }}
			</a>
			<div class="slogan">
				{{ Lang::get('user.Slogan') }}
			</div>
			<ul>
				<li><i class="fa fa-sitemap signin-icon"></i> {{ Lang::get('user.Feature1') }}</li>
				<li><i class="fa fa-file-text-o signin-icon"></i> {{ Lang::get('user.Feature2') }}</li>
				<li><i class="fa fa-outdent signin-icon"></i> {{ Lang::get('user.Feature3') }}</li>
				<li><i class="fa fa-heart signin-icon"></i> {{ Lang::get('user.Feature4') }}</li>
			</ul>
		</div>

		<div class="signin-form">
			{!! Form::open(['id'=>'signin-form_id']) !!}
				<div class="signin-text">
					<span>{{ Lang::get('user.SignInText') }}</span>
				</div>
				<div class="form-group w-icon">
					{!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Email')]) !!}
					<span class="fa fa-user signin-form-icon"></span>
				</div>
				<div class="form-group w-icon">
					{!! Form::text('password', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Password')]) !!}
					<span class="fa fa-lock signin-form-icon"></span>
				</div>
				<div class="form-actions">
					{!! Form::submit(Lang::get('user.SignIn'), ['class'=>'signin-btn bg-primary']) !!}
					<a href="{{ route('client.auth.recover') }}" class="forgot-password">{{ Lang::get('user.ForgotYourPassword') }}?</a>
				</div>
			{!! Form::close() !!}
			<div class="signin-with">
				<a href="{{ route('client.auth.register') }}" class="signin-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">
					{{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.Facebook') }}</span>
				</a>
			</div>
		</div>
	</div>

	<div class="not-a-member">
		Not a member? <a href="{{ route('client.auth.register') }}">Sign up now</a>
	</div>
@stop