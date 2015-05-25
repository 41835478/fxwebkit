@extends('client.layouts.login', array('class' => 'page-signup'))
@section('title', Lang::get('user.PageTitleSignUp'))
@section('content')
	<div class="signup-container">
		<div class="signup-header">
			<a href="" class="logo">
				{!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px']) !!}&nbsp;
				{{ app_name() }}
			</a>
			<div class="slogan">
				{{ Lang::get('user.Slogan') }}
			</div>
		</div>
		<div class="signup-form">
			@include('client.partials.messages')
			{!! Form::open(['id'=>'signup-form_id']) !!}
				<div class="signup-text">
					<span>{{ Lang::get('user.SignUpText') }}</span>
				</div>

				<div class="form-group w-icon">
					{!! Form::text('first_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.FirstName')]) !!}
					<span class="fa fa-info signup-form-icon"></span>
				</div>

				<div class="form-group w-icon">
					{!! Form::text('last_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.LastName')]) !!}
					<span class="fa fa-user signup-form-icon"></span>
				</div>

				<div class="form-group w-icon">
					{!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Email')]) !!}
					<span class="fa fa-envelope signup-form-icon"></span>
				</div>

				<div class="form-group w-icon">
					{!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Password')]) !!}
					<span class="fa fa-lock signup-form-icon"></span>
				</div>

				<div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
					<label class="checkbox-inline">
						{!! Form::checkbox('agreement', 1, false, ['class'=>'px']) !!}
						<span class="lbl">{{ Lang::get('user.IAgreeWithThe') }} <a href="#" data-toggle="modal" data-target="#terms-and-conditions-modal">{{ Lang::get('user.TermsAndConditions') }}</a></span>
					</label>
				</div>

				<div class="form-actions">
					{!! Form::submit(Lang::get('user.SignUp'), ['class'=>'signup-btn bg-primary']) !!}
				</div>
			</form>
			<div class="signup-with">
				<a href="{{ route('client.auth.register') }}" class="signup-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">
					{{ Lang::get('user.SignUpWith') }} <span>{{ Lang::get('user.Facebook') }}</span>
				</a>
			</div>
		</div>
	</div>
	<div class="have-account">
		{{ Lang::get('user.AlreadyHaveAnAccount') }}? <a href="{{ route('client.auth.login') }}">Sign In</a>
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