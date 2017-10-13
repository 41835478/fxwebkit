@extends('admin.layouts.login', array('class' => 'page-signin'))
@section('title', trans('user.PageTitleSignIn'))
@section('content')
    <div class="login-box">
        <div class="white-box">

            {!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/images/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}


            {!! Form::open(['id'=>'loginform' , 'class'=>'form-horizontal form-material']) !!}
                <div class="dropdown" style="float:right;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> Language</a>
                    <ul class="dropdown-menu">
                        @foreach(config('app.language')  as $locale=>$name)
                            <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                        @endforeach
                    </ul>
                </div>

                <h3 class="box-title m-b-20">{{ trans('user.SignInText') }}</h3>

            @include('client.partials.messages')

                <div class="form-group ">
                    <div class="col-xs-12">
                        {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>trans('user.email')]) !!}

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        {!! Form::password('password', ['class'=>'form-control','placeholder'=>trans('user.password')]) !!}

                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{trans('user.SignIn')}}</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
    @stop
@section('hidden')

<div class="signin-container">



    <div class="signin-form">

        <a href="" class="logo">

            {!! HTML::image('assets/'.config('fxweb.layoutAssetsFolder').'/img/logo.png', '', ['style' => 'margin-top: -5px;width:90px;height:28px;']) !!}
            &nbsp;
        </a>

        <div class="panel-heading-controls ">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> Language</a>
                <ul class="dropdown-menu">
                    @foreach(config('app.language')  as $locale=>$name)
                        <li><a href="?locale={{$locale}}">{{ trans('general.'.$name) }}</a></li>

                    @endforeach
                </ul></div>
        </div>




        {!! Form::open(['id'=>'signin-form_id']) !!}
        <div class="signin-text">
            <span>{{ trans('user.SignInText') }}</span>
        </div>
        @include('admin.partials.messages')
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