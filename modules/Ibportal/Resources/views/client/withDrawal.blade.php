@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.agentwithDrawal'))
@section('content')

    <div id="content-wrapper">
        <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.agentwithDrawal') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.agentwithDrawal') }}</span>
        </div>


        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('clients.ibportal.agentMoney').'?login='.$login}}">{{ trans('ibportal::ibportal.agentMoney') }}</a>
                </li>

                <li >
                    <a href="{{ route('clients.ibportal.agentInternalTransfer').'?login='.$login}}">{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                </li>

                <li class="active">
                    <a href="{{ route('client.ibportal.agentwithDrawal').'?login='.$login}}">{{ trans('ibportal::ibportal.agentwithDrawal') }}</a>
                </li>

            </ul>



            <div class="row">
<br><br>
                <label class="label label-primary label-tag">{{ trans('ibportal::ibportal.Balance') }} : <b>{{ $oCurrentAgentwithDrawal['BALANCE'] }}</b> </label>
                <label class="label label-primary label-tag">{{ trans('ibportal::ibportal.MarginFree') }} : <b>{{ $oCurrentAgentwithDrawal['MARGIN_FREE'] }}</b> </label>
                <label class="label label-primary label-tag">{{ trans('ibportal::ibportal.equity :') }} <b>{{ $oCurrentAgentwithDrawal['EQUITY'] }}</b> </label>

                <div class="clearfix"></div>
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('ibportal::ibportal.amount') }}</label>
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

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach
            </div>
    </div>

    </div>


    @endif

    {!! Form::close() !!}
@stop