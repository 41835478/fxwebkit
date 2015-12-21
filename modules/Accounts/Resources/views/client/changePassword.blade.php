@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
    <h1>{{ trans('accounts::accounts.changePasswrd') }}</h1>
</div>
{!! Form::open(['class'=>'panel form-horizontal']) !!}

<div class="panel-body">
    @if($oPssword==true)
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
</div>

<div class="panel-footer text-right">
    {!! Form::hidden('login',$login)!!}
    {!! Form::submit(trans('accounts::accounts.save'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
</div>

{!! Form::close() !!}


@stop