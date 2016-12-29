@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.agentwithDrawal'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.agentwithDrawal') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.agentwithDrawal') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('clients.ibportal.agentMoney').'?login='.$login}}"><i class="fa fa-money"></i>{{ trans('ibportal::ibportal.agentMoney') }}</a>
                </li>

                <li >
                    <a href="{{ route('clients.ibportal.agentInternalTransfer').'?login='.$login}}"><i class="fa fa-retweet"></i>{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                </li>

                <li class="active">
                    <a href="{{ route('client.ibportal.agentwithDrawal').'?login='.$login}}"><i class="fa fa-external-link"></i>{{ trans('ibportal::ibportal.agentwithDrawal') }}</a>
                </li>

            </ul>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>

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

                    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
@stop

@section('hidden')

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
                    <a href="{{ route('clients.ibportal.agentMoney').'?login='.$login}}"><i class="fa fa-money"></i>{{ trans('ibportal::ibportal.agentMoney') }}</a>
                </li>

                <li >
                    <a href="{{ route('clients.ibportal.agentInternalTransfer').'?login='.$login}}"><i class="fa fa-retweet"></i>{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                </li>

                <li class="active">
                    <a href="{{ route('client.ibportal.agentwithDrawal').'?login='.$login}}"><i class="fa fa-external-link"></i>{{ trans('ibportal::ibportal.agentwithDrawal') }}</a>
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

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    </div>

    </div>

    {!! Form::close() !!}
@stop