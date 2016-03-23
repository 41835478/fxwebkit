@extends('admin.layouts.login', array('class' => 'page-signin'))
@section('title', trans('user.PageTitleSignIn'))
@section('content')
    <div class="signin-container">

        <div class="signin-form">

            @include('admin.partials.messages')
            {!! Form::open(['id'=>'signin-form_id']) !!}
            <div class="signin-text">

                <div class="panel-heading-controls ">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> Language</a>
                        <ul class="dropdown-menu">
                            @foreach(config('app.language')  as $locale=>$name)
                                <li><a href="?locale={{$locale}}">{{ $name }}</a></li>

                            @endforeach
                        </ul></div>
                </div>

                <div style="clear:both; height: 20px;"></div>
                <span>{{ trans('user.resetPasswordText') }}</span>
            </div>
            <div class="form-group w-icon">
                {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>trans('user.email')]) !!}
                <span class="fa fa-user signin-form-icon"></span>
            </div>
            <div class="form-actions">
                {!! Form::submit(trans('user.sendRestEmeail'), ['class'=>'signin-btn bg-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection