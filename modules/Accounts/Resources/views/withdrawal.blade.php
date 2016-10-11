@extends('admin.layouts.main')
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
                    <a href="{{ route('accounts.mt4UserDetails').'?login='.$login.'&server_id='.$server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login"><i class="fa fa-file-text"></i>{{ trans('accounts::accounts.summry') }}</a>
                </li>
                <li>

                    <a href="{{ route('accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-level-up"></i> {{ trans('accounts::accounts.leverage') }}</a>
                </li>
                <li  >
                    <a href="{{ route('accounts.mt4ChangePassword').'?login='.$login.'&server_id='.$server_id}} "><i class="fa fa-users"></i>{{ trans('accounts::accounts.changePassword') }}</a>
                </li>
                <li>
                    <a href="{{ route('accounts.mt4InternalTransfer').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-retweet tooltip_number"></i></i>{{ trans('accounts::accounts.internalTransfer') }}</a>
                </li>
                <li  class="active">
                    <a href="{{ route('accounts.withDrawal').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-external-link"></i></i>{{ trans('accounts::accounts.withDrawal') }}</a>
                </li>

                <li class="">
                    <a href="{{ route('accounts.mt4AssignedUsers').'?login='.$login.'&server_id='.$server_id}}"><i class="fa fa-link"></i>{{ trans('accounts::accounts.assignedUsers') }}</a>
                </li>

            </ul>


            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.amount') }}</label>
                        {!! Form::text('amount',$internalTransfer['amount'],['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>

            <div class="row">
                @if($Pssword==true)
                    <div class="col-sm-6">

                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.currentMt4Password') }}</label>
                            {!! Form::password("oldPassword",["class"=>"form-control","value"=>$internalTransfer['oldPassword']]) !!}
                        </div>
                    </div><!-- col-sm-6 -->
                    <div class="clearfix"></div>

                @endif
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