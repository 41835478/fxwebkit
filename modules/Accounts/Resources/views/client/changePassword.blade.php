@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

    <div id="content-wrapper">

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
                    <a href="{{ route('clients.accounts.mt4UserDetails').'?login='.$login.'&server_id='.$server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login">{{ trans('accounts::accounts.summry') }}</a>
                </li>
                @if($showMt4Leverage)
                    <li>
                        <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                @endif
                @if($showMt4ChangePassword)
                    <li class="active">
                        <a href="{{ route('clients.accounts.mt4ChangePassword').'?login='.$login.'&server_id='.$server_id}} ">{{ trans('accounts::accounts.changePassword') }}</a>
                    </li>
                @endif
                @if($showMt4Transfer)
                    <li>
                        <a href="{{ route('clients.accounts.mt4InternalTransfer').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.internalTransfer') }}</a>
                    </li>
                @endif
                @if($showWithDrawal)
                    <li >
                        <a href="{{ route('client.accounts.withDrawal').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.withDrawal') }}</a>
                    </li>
                @endif
            </ul>




            <div class="row">
                @if($Password==true)
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.oldPassword') }}</label>
                            {!! Form::password("oldPassword",["class"=>"form-control","value"=>$changePassword['oldPassword']]) !!}
                        </div>
                    </div><!-- col-sm-6 -->
                    @endif
                <!-- col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">{{ trans('accounts::accounts.newPassword') }}</label>
                                {!! Form::password("newPassword",["class"=>"form-control","value"=>$changePassword['newPassword']]) !!}
                            </div>
                        </div><!-- col-sm-6 -->

                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.newPassword') }}</label>
                            {{--{!! Form::password("type",$aType,$changePassword['type'],["class"=>"form-control"]) !!}--}}
                            {!! Form::select('passwordType',$loginPasswordType,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                        </div>
                    </div><!-- col-sm-6 -->
            </div>







        <div class="panel-footer text-right">
            {!! Form::hidden('login',$login)!!}
            {!! Form::hidden('server_id',$server_id)!!}
            {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
        </div>
        </div>

    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    </div>
        </div>
    {!! Form::close() !!}


@stop