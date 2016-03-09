@extends('admin.layouts.login', array('class' => 'page-signin'))
@section('title', trans('user.PageTitleSignIn'))
@section('content')
<div class="signin-container">



    <div class="signin-form">

        <a href="" class="logo">

            {!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
            &nbsp;
        </a>

        <div class="panel-heading-controls">
            @foreach(config('app.language')  as $locale=>$name)
                <a href="?locale={{$locale}}"> | {{ $name }}  </a>
            @endforeach
        </div>
        @include('admin.partials.messages')
        {!! Form::open(['id'=>'signin-form_id']) !!}
        <div class="signin-text">
            <span>{{ trans('user.SignInText') }}</span>
        </div>
        <div class="form-group w-icon">
            {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>trans('user.email')]) !!}
            <span class="fa fa-user signin-form-icon"></span>
        </div>
        <div class="form-group w-icon">
            {!! Form::password('password', ['class'=>'form-control input-lg','placeholder'=>trans('user.password')]) !!}
            <span class="fa fa-lock signin-form-icon"></span>
        </div>
        <div class="form-actions">
            {!! Form::submit(trans('user.SignIn'), ['class'=>'signin-btn bg-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection