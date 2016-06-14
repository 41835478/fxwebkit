@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.agentInternalTransfer'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.agentInternalTransfer') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.agentInternalTransfer') }}</span>
        </div>


        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">

                <li>
                    <a href="{{ route('clients.ibportal.agentMoney').'?login='.$login}}">{{ trans('ibportal::ibportal.agentMoney') }}</a>
                </li>

                <li class="active">
                    <a href="{{ route('clients.ibportal.agentInternalTransfer').'?login='.$login}}">{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                </li>

                    <li >
                        <a href="{{ route('client.ibportal.agentwithDrawal').'?login='.$login}}">{{ trans('ibportal::ibportal.agentwithDrawal') }}</a>
                    </li>


            </ul>



        <div class="row">
            <br><br>
            <label class="label label-primary label-tag">{{ trans('ibportal::ibportal.Balance') }} : <b>{{ $oCurrentInternalTransfer['BALANCE'] }}</b> </label>
            <label class="label label-primary label-tag">{{ trans('ibportal::ibportal.MarginFree') }} : <b>{{ $oCurrentInternalTransfer['MARGIN_FREE'] }}</b> </label>
            <label class="label label-primary label-tag">{{ trans('ibportal::ibportal.equity :') }} <b>{{ $oCurrentInternalTransfer['EQUITY'] }}</b> </label>

            <div class="clearfix"></div>

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('ibportal::ibportal.toMt4Account') }}</label>
                    {!! Form::text("login2",$internalTransfer['login2'],["class"=>"form-control"]) !!}
                </div>
            </div>
            <!-- col-sm-6 -->
                        <!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('ibportal::ibportal.transferAmount') }}</label>
                    {!! Form::text('amount',$internalTransfer['amount'],['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->
        </div>

        <div class="row">
            @if($Pssword==true)
                <div class="col-sm-6">

                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('ibportal::ibportal.currentMt4Password') }}</label>
                        {!! Form::password("oldPassword",["class"=>"form-control","value"=>$internalTransfer['oldPassword']]) !!}
                    </div>
                </div><!-- col-sm-6 -->
                <div class="clearfix"></div>

            @endif
        </div>

        <div class="panel-footer text-right">
            {!! Form::hidden('login',$login)!!}
            {!! Form::submit(trans('ibportal::ibportal.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
        </div>
        </div>

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}

    </div>



</div>
    {!! Form::close() !!}
@stop