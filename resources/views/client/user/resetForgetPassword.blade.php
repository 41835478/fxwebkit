@extends('client.layouts.login', array('class' => 'page-signin'))
@section('title', Lang::get('user.PageTitleSignIn'))
@section('content')
	<div class="signin-container">



		<div class="signin-form">

			<a href="{{ route('client.auth.login') }}" class="logo">

				{!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
				&nbsp;
			</a>

			<div class="panel-heading-controls ">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i>
						{{ trans('user.language') }}</a>
					<ul class="dropdown-menu">
						@foreach(config('app.language')  as $locale=>$name)
							<li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

						@endforeach
					</ul>
				</div>
			</div>


			{!! Form::open(['id'=>'signin-form_id']) !!}
			<div class="signin-text">
				<div style="clear:both; height: 20px;"></div>
				<span>{{ trans('user.resetPasswordText') }}</span>
			</div>
			@include('admin.partials.messages')
			<div class="form-group w-icon">
				{!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.newpassword')]) !!}
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

@stop