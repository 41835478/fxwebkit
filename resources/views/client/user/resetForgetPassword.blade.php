@extends('client.layouts.login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))
@section('content')
	<div class="signin-container">

		<div class="signin-info">
			<a href="" class="logo">
				{!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px']) !!}&nbsp;
				{{ app_name() }}
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
			@include('client.partials.messages')
			{!! Form::open(['id'=>'signin-form_id']) !!}
				<div class="signin-text">
					<span>{{ Lang::get('user.resetPassword') }}</span>
				</div>
			<div class="form-group w-icon">
				{!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.password')]) !!}
				<span class="fa fa-lock signin-form-icon"></span>
			</div>
				<div class="form-group w-icon">
					{!! Form::password('confirmPassword', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.confirmPassword')]) !!}
					<span class="fa fa-lock signin-form-icon"></span>
				</div>
				<div class="form-actions">
					{!! Form::submit(Lang::get('user.reset'), ['class'=>'signin-btn bg-primary']) !!}
					<a href="{{ route('client.auth.recover') }}" class="forgot-password">{{ Lang::get('user.ForgotYourPassword') }}?</a>
				</div>
			{!! Form::close() !!}


		</div>
	</div>

	<div class="not-a-member">
		Not a member? <a href="{{ route('client.auth.register') }}">Sign up now</a>
	</div>
<style type="text/css">
    .page-signin .signin-with-btn {
    border-radius: 2px;
    width: 32%;
    color: #fff;
    display: block;
    font-weight: 300;
    padding: 10px 0;
    text-align: center;
    -webkit-transition: all .3s;
    transition: all .3s;
    float: left;
    margin-top: 0px !important;
    margin-left: 1%;
}
</style>
@stop