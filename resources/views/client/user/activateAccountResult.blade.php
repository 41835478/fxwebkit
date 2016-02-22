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

				<div class="form-actions">
					{!! Form::submit(Lang::get('user.resend'), ['class'=>'signin-btn bg-primary']) !!}
					</div>
			{!! Form::close() !!}


		</div>
	</div>

	<div class="not-a-member">
		Not a member? <a href="{{ route('client.auth.register') }}">Sign up now</a>
	</div>

@stop