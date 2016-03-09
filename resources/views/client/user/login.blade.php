@extends('client.layouts.login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))
@section('content')
	<div class="signin-container">

		<div class="signin-info">
			<a href="" class="logo">
			<!-- TODO Change the style -->
				{!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}&nbsp;
				<style type="text/css">
					.theme-default.page-signin .signin-info{
						background: rgb(113, 153, 179);
					}
				</style>
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

			@foreach(config('app.language')  as $locale=>$name)
				<a href="?locale={{$locale}}">  {{ $name }}  </a>|
			@endforeach

			<br><hr>
			@include('client.partials.messages')
			{!! Form::open(['id'=>'signin-form_id']) !!}
				<div class="signin-text">
					<span>{{ Lang::get('user.SignInText') }}</span>
				</div>
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
					<a href="{{ route('client.auth.recover') }}" class="forgot-password">{{ Lang::get('user.ForgotYourPassword') }}?</a>


				</div>
			{!! Form::close() !!}

			<div class="signin-with">
				<a href="{{ route('client.facebook.login') }}" class="signin-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">
					{{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.Facebook') }}</span>
				</a>
				<a href="{{ route('client.google.login') }}" class="signin-with-btn" style="background:#4285F4;background:rgba(66, 133, 244, .8);">
					{{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.google') }}</span>
				</a>
				<a href="{{ route('client.linkedin.login') }}" class="signin-with-btn" style="background:#0077B5;background:rgba(0, 119, 181, .8);">
					{{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.linkedin') }}</span>
				</a>
				<a href="{{ route('client.twitter.login') }}" class="signin-with-btn" style=" display: none;background:#0077B5;background:rgba(0, 119, 181, .8);">
					{{ Lang::get('user.SignInWith') }} <span>{{ Lang::get('user.twitter') }}</span>
				</a>
			</div>
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