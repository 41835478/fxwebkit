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


			<div class="form-actions">
				{!! Form::open(['id'=>'signin-form_id']) !!}
				{!! Form::submit(Lang::get('user.resend'), ['class'=>'signin-btn bg-primary col-xs-12','style'=>'width:100%']) !!}
				{!! Form::close() !!}
			</div>

		</div>
	</div>


	{{----}}
	{{--<div class="signin-container">--}}

		{{--<div class="signin-form">--}}

				{{--{!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}--}}



		{{--</div>--}}

		{{--<div class="signin-form">--}}
			{{--@include('client.partials.messages')--}}
			{{--{!! Form::open(['id'=>'signin-form_id']) !!}--}}

				{{--<div class="form-actions">--}}
					{{--{!! Form::submit(Lang::get('user.resend'), ['class'=>'signin-btn bg-primary']) !!}--}}
					{{--</div>--}}
			{{--{!! Form::close() !!}--}}


		{{--</div>--}}
	{{--</div>--}}
	{{----}}

@stop