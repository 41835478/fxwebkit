@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.agentMoney'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.agentMoney') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.agentMoney') }}</li>
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
                <li  class="active">
                    <a href="{{ route('clients.ibportal.agentMoney')}}"><i class="fa fa-money"></i>{{ trans('ibportal::ibportal.agentMoney') }}</a>
                </li>

                <li >
                    <a href="{{ route('clients.ibportal.agentInternalTransfer').'?login='.$aFilterParams['login']}}"><i class="fa fa-retweet"></i>{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                </li>


                <li>
                    <a href="{{ route('client.ibportal.agentwithdrawal').'?login='.$aFilterParams['login']}}"><i class="fa fa-external-link"></i>{{ trans('ibportal::ibportal.agentwithdrawal') }}</a>
                </li>

            </ul>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('ibportal::ibportal.order#'), 'TICKET', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('ibportal::ibportal.login'), 'LOGIN', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('ibportal::ibportal.comment'), 'COMMENT', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('ibportal::ibportal.Commission'), 'PROFIT', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('ibportal::ibportal.close_time'), 'CLOSE_TIME', $oResults[0]) !!}</th>

                            </tr>
                            </thead>
                            <tbody>



                            @if (count($oResults[0]))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults[0] as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}


                                    <tr>


                                        <td>{{ $oResult->TICKET }}</td>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ $oResult->COMMENT }}</td>
                                        <td>{{ $oResult->PROFIT }}</td>
                                        <td>{{ $oResult->CLOSE_TIME }}</td>

                                    </tr>



                                @endforeach
                            @endif

                            </tbody>
                        </table>


                        @if (count($oResults[0]))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults[0]->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults[0]->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults[0]->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults[0]->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
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

    <div class="right-side-panel">
        <div class="scrollable-right container">
            <!-- .Theme settings -->
            <h3 class="title-heading">{{ trans('user.Search') }}</h3>
            {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('ibportal::ibportal.Login'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('ibportal::ibportal.FromDate'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12"></label>
                <div class="col-md-12">
                    {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                </div>
            </div>

            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close( ) !!}


        </div>
    </div>
@stop

@section('hidden')


    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('ibportal::ibportal.search') }} </a></li>

                    <li id="login_li">
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('ibportal::ibportal.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">

                            <div class="input-group date datepicker-warpper">
                                {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('ibportal::ibportal.FromDate'),'class'=>'form-control input-sm']) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class=" nav-input-div  ">
                            <div class="input-group date datepicker-warpper">
                                {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">{!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}</div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close() !!}

            </div>
        </div>
        <!-- ___________________END___________________-->


        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('ibportal::ibportal.agentMoney') }}
            </div>

            <div class="center_page_all_div">

                <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                    <li  class="active">
                        <a href="{{ route('clients.ibportal.agentMoney')}}"><i class="fa fa-money"></i>{{ trans('ibportal::ibportal.agentMoney') }}</a>
                    </li>

                    <li >
                        <a href="{{ route('clients.ibportal.agentInternalTransfer').'?login='.$aFilterParams['login']}}"><i class="fa fa-retweet"></i>{{ trans('ibportal::ibportal.agentInternalTransfer') }}</a>
                    </li>


                    <li>
                        <a href="{{ route('client.ibportal.agentwithdrawal').'?login='.$aFilterParams['login']}}"><i class="fa fa-external-link"></i>{{ trans('ibportal::ibportal.agentwithdrawal') }}</a>
                    </li>

                </ul>
                @include('admin.partials.messages')

                @if (count($oResults[0]))
                    <div id="total_accountant_chart"></div>
                    @endif
                            <!-- _______________________table_____________________-->
                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('ibportal::ibportal.agentMoney') }}


                            </div>
                        </div>




                        <div class="primary_table_div info" >
                            <div class="table">


                                <div class="thead">
                                    <div class="tr">





                                    <div class="th">{!! th_sort(trans('ibportal::ibportal.order#'), 'TICKET', $oResults[0]) !!}</div>
                                    <div class="th">{!! th_sort(trans('ibportal::ibportal.login'), 'LOGIN', $oResults[0]) !!}</div>
                                    <div class="th">{!! th_sort(trans('ibportal::ibportal.comment'), 'COMMENT', $oResults[0]) !!}</div>
                                    <div class="th">{!! th_sort(trans('ibportal::ibportal.Commission'), 'PROFIT', $oResults[0]) !!}</div>
                                    <div class="th">{!! th_sort(trans('ibportal::ibportal.close_time'), 'CLOSE_TIME', $oResults[0]) !!}</div>



                                    </div>
                                </div>
                                <div class="tbody">

                                    @if (count($oResults[0]))
                                        {{-- */$i=0;/* --}}
                                        {{-- */$class='';/* --}}
                                        @foreach($oResults[0] as $oResult)
                                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                            <div class="tr {{ $class }}">




                                            <div class="td"><label>{!! trans('ibportal::ibportal.order#') !!} : </label><p>{{ $oResult->TICKET }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.comment') !!} : </label><p>{{ $oResult->COMMENT }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.Commission') !!} : </label><p>{{ $oResult->PROFIT }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.close_time') !!} : </label><p>{{ $oResult->CLOSE_TIME }}   </p></div>



                                            </div>
                                        @endforeach
                                    @endif




                                </div>







                            </div>

                            <div class="tableFooter">

                            </div>
                        </div>






                        <div class="table-footer text-right">
                            @if (count($oResults[0]))
                                {!! str_replace('/?', '?', $oResults[0]->appends(Input::except('page'))->render()) !!}

                                @if($oResults[0]->total()>25)
                                    <div class="DT-lf-right change_page_all_div">
                                        {!! Form::text('page',$oResults[0]->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}
                                        {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                                    </div>
                                @endif

                                <div class="col-xs-12 col-lg-3">
                                    <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults[0]->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults[0]->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults[0]->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                                </div>

                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        init.push(function () {
            var options = {
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',
                format: "yyyy-mm-dd"
            }
            $('.datepicker-warpper').datepicker(options);

            $('#all-groups-chx').change(function () {
                if ($('#all-groups-chx').prop('checked')) {
                    $('#all-groups-slc').attr('disabled', 'disabled');
                } else {
                    $('#all-groups-slc').removeAttr('disabled');
                }
            });

            $('#all-symbols-chx').change(function () {
                if ($('#all-symbols-chx').prop('checked')) {
                    $('#all-symbols-slc').attr('disabled', 'disabled');
                } else {
                    $('#all-symbols-slc').removeAttr('disabled');
                }
            });

            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }

            if ($('#all-symbols-chx').prop('checked')) {
                $('#all-symbols-slc').attr('disabled', 'disabled');
            } else {
                $('#all-symbols-slc').removeAttr('disabled');
            }


            $('#exactLogin').change(function () {
                if ($('#exactLogin').prop('checked')) {
                    $("#from_login_li,#to_login_li").hide();
                    $("#login_li").show();
                } else {
                    $("#from_login_li,#to_login_li").show();
                    $("#login_li").hide();
                }
            });

            if ($('#exactLogin').prop('checked')) {
                $("#from_login_li,#to_login_li").hide();
                $("#login_li").show();
            } else {
                $("#from_login_li,#to_login_li").show();
                $("#login_li").hide();
            }
        });
    </script>
@stop


@section('script')
    @parent
    {!! HTML::script('assets/'.config('fxweb.layoutAssetsFolder').'/js/highcharts.js') !!}





    <script>
        function buildHighCharts() {
            $('#total_accountant_chart').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: '{!! trans('ibportal::ibportal.commissions') !!}'
                },
                xAxis: {
                    /*
                     trans('general.Deposits')
                     trans('general.Withdrawal')
                     trans('general.CreditIn')
                     trans('general.CreditOut')
                     *  {{ $oResults[1]['deposits']+$oResults[1]['Withdrawal']}}
             */
                    categories: ['{!! trans('ibportal::ibportal.commissions') !!}', '{!!   trans('ibportal::ibportal.Withdrawal') !!}']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '{!! trans('ibportal::ibportal.total') !!}'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                series: [{
                    name: ['{!!  trans('ibportal::ibportal.deposits') !!}'],
                    data: [{!! $oResults[1]['deposits']  !!}, 0]
                }, {
                    name: ['{!!  trans('ibportal::ibportal.Withdrawal') !!}'],
                    data: [0, {!! $oResults[1]['Withdrawal'] * - 1 !!}]
                }]
            });
        }
        buildHighCharts();
        $(".highcharts-legend-item").attr('onclick', 'return false;');
    </script>
@stop