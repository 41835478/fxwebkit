@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

<div class="page-header">
    <h1>{{ trans('accounts::accounts.internalTransfer') }}</h1>
</div>
{!! Form::open(['class'=>'panel form-horizontal']) !!}

<div class="panel-body">
    
     <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.logIn1') }}</label>
            {!! Form::password("password",["class"=>"form-control","value"=>'123']) !!}
        </div>
    </div><!-- col-sm-6 -->
    
     <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.logIn2') }}</label>
            {!! Form::password("password",["class"=>"form-control","value"=>'123']) !!}
        </div>
    </div><!-- col-sm-6 -->
    
    @if($oPssword==true)
    <div class="col-sm-6">
        <div class="form-group no-margin-hr">
            <label class="control-label">{{ trans('accounts::accounts.Password') }}</label>
            {!! Form::password("password",["class"=>"form-control","value"=>'123']) !!}
        </div>
    </div><!-- col-sm-6 -->


   
    @endif
</div>

<div class="panel-footer text-right">
    <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('accounts::accounts.save') }}</button>
</div>

{!! Form::close() !!}
@stop