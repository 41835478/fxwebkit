@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

    <div class="page-header">
        <h1>{{ trans('accounts::accounts.user_details') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('accounts::accounts.user_details') }}</span>
        </div>

        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('accounts.mt4UserDetails').'?login='.$login}}&from_date=&to_date=&search=Search&sort=asc&order=login">{{ trans('accounts::accounts.summry') }}</a>
                </li>
                <li>

                    <a href="{{ route('accounts.mt4Leverage').'?login='.$login}}">{{ trans('accounts::accounts.leverage') }}</a>
                </li>
                <li class="active">
                    <a href="{{ route('accounts.mt4ChangePassword').'?login='.$login}} ">{{ trans('accounts::accounts.changePassword') }}</a>
                </li>
                <li>
                    <a href="{{ route('accounts.mt4InternalTransfer').'?login='.$login}}">{{ trans('accounts::accounts.internalTransfer') }}</a>
                </li>
            </ul>
        </div>
        @if($Password==true)
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('accounts::accounts.oldPassword') }}</label>
                    {!! Form::password("oldPassword",["class"=>"form-control","value"=>$changePassword['oldPassword']]) !!}
                </div>
            </div><!-- col-sm-6 -->


            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('accounts::accounts.newPassword') }}</label>
                    {!! Form::password("newPassword",["class"=>"form-control","value"=>$changePassword['newPassword']]) !!}
                </div>
            </div><!-- col-sm-6 -->
        @endif


        <div class="panel-footer text-right">
            {!! Form::hidden('login',$login)!!}
            {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach

            </div>
    @endif

    {!! Form::close() !!}


@stop