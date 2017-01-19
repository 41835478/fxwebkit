@extends('client.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.accounts') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.accounts') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

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
                @if($showWithdrawal)
                    <li >
                        <a href="{{ route('client.accounts.withdrawal').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.withdrawal') }}</a>
                    </li>
                @endif
            </ul>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>

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
                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                {!! Form::close() !!}

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('request::request.login'), 'login', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('request::request.liveDemo'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('request::request.newPassword'), 'newPassword', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('request::request.password_type'), 'password_type', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('request::request.comment'), 'comment', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('request::request.reason'), 'reason', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('request::request.status'), 'status', $oResults) !!}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{{ $oResult->login }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->newPassword }}</td>
                                        <td>{{ $oResult->password_type }}</td>
                                        <td>{{ $oResult->comment }}</td>
                                        <td>{{ $oResult->reason }}</td>
                                        <td>{{(array_key_exists($oResult->status,$aRequestStatus))? $aRequestStatus[$oResult->status]:''}}</td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>


                        @if (count($oResults))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif


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
                @if($showWithdrawal)
                    <li >
                        <a href="{{ route('client.accounts.withdrawal').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.withdrawal') }}</a>
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