@extends('admin.layouts.main')
@section('title', trans('reports::reports.accountant'))
@section('content')

<!-- ______________________________________-->
<style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px !important;height: auto; overflow:visible !important ;}
    .nav-input-div{padding:7px;}
    .mail-container-header{
        border-bottom: 1px solid #ccc;
        margin-bottom: 7px;
        padding: 5px !important;
    }
    .theme-default .page-mail{ overflow: visible;height: auto; min-height: 800px;}
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections" >
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('reports::reports.search') }} </a></li>
                <li>
                    <div class="   nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                <span class="lbl">{{ trans('reports::reports.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">

                        <div class="input-group date datepicker-warpper">
                            {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div></li>


                <li><div  class=" nav-input-div  ">
                        <div class="input-group date datepicker-warpper">
                            {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                    </div></li>

                <li><div  class=" nav-input-div  ">{!! Form::select('type', $aTradeTypes, $aFilterParams['type'], ['class'=>'form-control  input-sm']) !!}</div></li>




                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    <!-- ___________________END___________________-->


    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('reports::reports.accountant') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')


            <div id="total_accountant_chart"></div>

            <!-- _______________________table_____________________-->
            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.accountant') }}

                        @if (count($oResults[0]))
                        <div class="panel-heading-controls">
                            <div class="btn-group btn-group-xs">
                                <button data-toggle="dropdown" type="button" class="btn btn-success dropdown-toggle">
                                    <span class="fa fa-cog"></span>&nbsp;
                                    <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{{ Request::fullUrl() }}&export=xls">
                                            <i class="dropdown-icon fa fa-camera-retro"></i>
                                            {{ trans('reports::reports.export') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.order#'), 'TICKET', $oResults[0]) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.login'), 'LOGIN', $oResults[0]) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults[0]) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.type'), 'CMD', $oResults[0]) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.total'), 'PROFIT', $oResults[0]) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('reports::reports.close_time'), 'CLOSE_TIME', $oResults[0]) !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oResults[0]))
                        {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                        @foreach($oResults[0] as $oResult)
                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                        <tr class='{{ $class }}'> 
                            <td>{{ $oResult->TICKET }}</td>
                            <td>{{ $oResult->LOGIN }}</td>
                            <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                            <td>{{ $oResult->TYPE }}</td>
                            <td>{{ $oResult->PROFIT }}</td>
                            <td>{{ $oResult->CLOSE_TIME }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="table-footer text-right">
                    @if (count($oResults[0]))
                    {!! str_replace('/?', '?', $oResults[0]->appends(Input::except('page'))->render()) !!}

                    @if($oResults[0]->total()>25)
                    <div class="DT-lf-right change_page_all_div" >
                        {!! Form::text('page',$oResults[0]->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}
                        {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn', 'name' => 'search']) !!}
                    </div>
                    @endif

                    <div class="col-sm-3  padding-xs-vr">
                        <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults[0]->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults[0]->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults[0]->total() }} {{trans('reports::reports.entries')}}</span>
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
{!! HTML::script('assets/js/highcharts.js') !!}




<script >
    function buildHighCharts(){
    $('#total_accountant_chart').highcharts({
    chart: {
    type: 'bar'
    },
            title: {
            text: 'Accountant Total'
            },
            xAxis: {
            /*
             trans('general.Deposits') 
             trans('general.Withdraws') 
             trans('general.CreditIn')  
             trans('general.CreditOut') 
             *  {{ $oResults[1]['deposits']+$oResults[1]['withdraws']+$oResults[1]['creditIn']+ $oResults[1]['creditOut'] }}
             */
            categories: ['{!!  trans('reports::reports.ACCOUNTANT_TYPE_6_DEPOSITS') !!}', '{!!  trans('reports::reports.ACCOUNTANT_TYPE_7_CREDIT') !!}']
            },
            yAxis: {
            min: 0,
                    title: {
                    text: 'Total'
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
            name: ['{!!  trans('reports::reports.deposits') !!}'],
                    data: [{!! $oResults[1]['deposits'] + $oResults[1]['withdraws'] !!}, 0]
            }, {
            name: ['{!! trans('reports::reports.credit_in') !!}'],
                    data: [0, {!! $oResults[1]['creditIn'] + $oResults[1]['creditOut'] !!}]
            }, {
            name: ['{!!  trans('reports::reports.withdraws') !!}'],
                    data: [{!! $oResults[1]['withdraws'] * - 1 !!}, 0]
            }, {
            name: ['{!! trans('reports::reports.credit_out') !!}'],
                    data: [0, {!! $oResults[1]['creditOut'] * - 1 !!}]
            }]
    });
    }
    buildHighCharts();
            $(".highcharts-legend-item").attr('onclick', 'return false;');
</script>
@stop