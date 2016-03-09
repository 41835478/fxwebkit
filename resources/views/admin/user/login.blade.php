@extends('admin.layouts.login', array('class' => 'page-signin'))
@section('title', trans('user.PageTitleSignIn'))
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
            {{ trans('user.Slogan') }}
        </div>
        <ul>
            <li><i class="fa fa-sitemap signin-icon"></i> {{ trans('user.Feature1') }}</li>
            <li><i class="fa fa-file-text-o signin-icon"></i> {{ trans('user.Feature2') }}</li>
            <li><i class="fa fa-outdent signin-icon"></i> {{ trans('user.Feature3') }}</li>
            <li><i class="fa fa-heart signin-icon"></i> {{ trans('user.Feature4') }}</li>
        </ul>
    </div>

    <div class="signin-form">
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