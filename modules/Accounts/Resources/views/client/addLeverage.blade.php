@extends('client.layouts.main')
@section('title', trans('accounts::accounts.user_details'))
@section('content')

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
                @if($showWithDrawal)
                    <li >
                        <a href="{{ route('client.accounts.withDrawal').'?login='.$login.'&server_id='.$server_id}}">{{ trans('accounts::accounts.withDrawal') }}</a>
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
                            <div class="th">{!! th_sort(trans('request::request.liveDemo'), 'server_id', $oResults) !!}</div>
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
                                    <div class="td"><label>{!! trans('request::request.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
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