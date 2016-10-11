@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.assignAgents'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('accounts::accounts.assignAccountManager') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('accounts::accounts.assignAccountManager').' (  '. trans('accounts::accounts.currentAccountManager').' '.$userInfo['login'].' '.trans('accounts::accounts.liveUsre').' )  '}}</span>
        </div>

        <div class="panel-body">


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.Login') }}</label>
                        {!! Form::text('login',$userInfo['login'],['class'=>'form-control']) !!}
                    </div>
                </div>

                <!-- col-sm-6 -->
            </div>
            <!-- row -->
        </div>

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        <div class="panel-footer text-right">
            {!! Form::hidden('account_id',$userInfo['account_id']) !!}
            <button type="submit" class="btn btn-primary" name="edit_id">{{ trans('accounts::accounts.assign') }}</button>
        </div>
    </div>
        </div>
    {!! Form::close() !!}
@stop

