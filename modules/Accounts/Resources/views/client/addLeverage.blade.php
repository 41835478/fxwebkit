@extends('client.layouts.main')
@section('title', trans('accounts::accounts.user_details'))
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
                    <li class="active">
                        <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                @endif
                @if($showMt4ChangePassword)
                    <li>
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
                            <br>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong></strong>  {{config('accounts.changeLeverageWarning') }}<br>
                            </div>

                            <label class="label label-primary label-tag">{{ trans('accounts::accounts.currentLeverage') }}: <b>{{ $currentLeverage[1] }}</b> </label> <br>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                                    {!! Form::select('leverage',$Result,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!-- col-sm-6 -->
                            @if($Pssword==true)
                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.mt4AccountPassword') }}</label>
                                        {!! Form::password("password",["class"=>"form-control","value"=>$changeleverage['oldPassword']]) !!}

                                    </div>
                                </div><!-- col-sm-6 -->
                                @endif<!-- col-sm-6 -->

                        </div>

                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                        <div class="panel-footer text-right">
                            {!! Form::hidden('login',$login)!!}
                            {!! Form::hidden('server_id',$server_id)!!}
                            {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
                        </div>



                    {!! Form::close() !!}
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('request::request.login'), 'login', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('request::request.server'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('request::request.leverage'), 'leverage', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('request::request.comment'), 'comment', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('request::request.reason'), 'reason', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('request::request.status'), 'status', $oResults) !!}</th>
                            </tr>
                            </thead>
                            <tbody>



                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                    <tr>
                                        <td>{{ $oResult->login }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->leverage }}  </td>
                                        <td>{{ $oResult->comment }}</td>
                                        <td>{{ $oResult->reason }}</td>
                                        <td>{{ $aRequestStatus[$oResult->status] }}</td>
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
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel">

        <div class="panel-heading">
            <span class="panel-title">{{ trans('accounts::accounts.user_details') }}</span>
        </div>

        <div class="panel-body">
            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li>
                    <a href="{{ route('clients.accounts.mt4UserDetails').'?login='.$login.'&server_id='.$server_id}}&from_date=&to_date=&search=Search&sort=asc&order=login">{{ trans('accounts::accounts.summry') }}</a>
                </li>
                @if($showMt4Leverage)
                    <li class="active">
                        <a href="{{ route('clients.accounts.mt4Leverage').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.leverage') }}</a>
                    </li>
                @endif
                @if($showMt4ChangePassword)
                    <li>
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
               <br>
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong></strong>  {{config('accounts.changeLeverageWarning') }}<br>
                </div>

               <label class="label label-primary label-tag">{{ trans('accounts::accounts.currentLeverage') }}: <b>{{ $currentLeverage[1] }}</b> </label> <br>
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('accounts::accounts.leverage') }}</label>
                        {!! Form::select('leverage',$Result,'',['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
                @if($Pssword==true)
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.mt4AccountPassword') }}</label>
                            {!! Form::password("password",["class"=>"form-control","value"=>$changeleverage['oldPassword']]) !!}

                        </div>
                    </div><!-- col-sm-6 -->
                    @endif<!-- col-sm-6 -->
            </div>


            <!-- col-sm-6 -->


            <div class="panel-footer text-right">
                {!! Form::hidden('login',$login)!!}
                {!! Form::hidden('server_id',$server_id)!!}
                {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
            </div>
        </div>

        <div class="table-light">
            <div class="table-header">
                <div class="table-caption">

                    {{ trans('request::request.changeLeverage') }}

                </div>
            </div>

            <div class="primary_table_div info" >
                <div class="table">

                    <div class="thead">
                        <div class="tr">


                            <div class="th">{!! th_sort(trans('request::request.login'), 'login', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('request::request.server'), 'server_id', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('request::request.leverage'), 'leverage', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('request::request.comment'), 'comment', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('request::request.reason'), 'reason', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('request::request.status'), 'status', $oResults) !!}</div>

                        </div>
                    </div>


                    <div class="tbody">

                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <div class="tr {{ $class }}">

                                    <div class="td"><label>{!! trans('request::request.login') !!} : </label><p>{{ $oResult->login }}</p></div>
                                    <div class="td"><label>{!! trans('request::request.server') !!} : </label><p>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</p></div>
                                    <div class="td"><label>{!! trans('request::request.leverage') !!} : </label><p>1:{{ $oResult->leverage }}</p></div>
                                    <div class="td"><label>{!! trans('request::request.comment') !!} : </label><p>{{ $oResult->comment }}</p></div>
                                    <div class="td"><label>{!! trans('request::request.reason') !!} : </label><p>{{ $oResult->reason }}</p></div>
                                    <div class="td"><label>{!! trans('request::request.status') !!} : </label><p>{{ $aRequestStatus[$oResult->status] }}</p></div>

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="tableFooter">
                </div>
            </div>

            <div class="table-footer">


                @if (count($oResults))

                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                    @if($oResults->total()>25)

                        <div class="DT-lf-right change_page_all_div">

                            {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('request::request.page'),'class'=>'form-control input-sm']) !!}

                            {!! Form::submit(trans('request::request.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                        </div>
                    @endif

                    <div class="col-sm-3">
                        <span class="text-xs">{{trans('request::request.showing')}} {{ $oResults->firstItem() }} {{trans('request::request.to')}} {{ $oResults->lastItem() }} {{trans('request::request.of')}} {{ $oResults->total() }} {{trans('request::request.entries')}}</span>
                    </div>
                @endif
            </div>
        </div>


        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        </div>
        {!! Form::close() !!}
        @stop

        @section("script")
            @parent
            <script>
/*

                $('#jq-validation-select2').select2({
                    allowClear: true,
                    placeholder: 'Select a country...'
                }).change(function () {
                    $(this).valid();
                });*/

            </script>
@stop