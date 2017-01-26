@extends('client.layouts.main')
@section('title', trans('reports::reports.commission'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('reports::reports.commission') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('reports::reports.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('reports::reports.commission') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('reports::reports.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        @include('admin.partials.messages')
                        @if (count($oResults[0]))
                            <div class="stat-panel no-margin-b">
                                <div class="stat-row">
                                    <div class="stat-counters bg-panel no-padding text-center">
                                        <div class="stat-cell col-xs-4 padding-xs-vr">
                                            <span class="text-xs">{{ trans('reports::reports.total_commission') }}{{ round($oResults[1], 2) }}</span>
                                        </div>
                                        <div class="stat-cell col-xs-4 padding-xs-vr">
                                            <span class="text-xs">{{ trans('reports::reports.total_lots') }} {{ round($oResults[2], 2) }}</span>
                                        </div>

                                    </div>
                                </div>


                                <div class="clear:both;"></div>
                                <div id="container" style="width:50%; float:left; overflow: auto;"></div>
                                <div id="container2" style="width:50%; float:left; overflow: auto;"></div>
                                <div class="clear:both;"></div>


                            </div>


                            <div class="padding-xs-vr"></div>
                        @endif


                        <h3 class="box-title m-b-0">{{ trans('reports::reports.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('reports::reports.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oResults[0]) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @if (count($oResults[0]))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults[0] as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class='{{ $class }}'>
                                        <td>{{ $oResult->SYMBOL }}</td>
                                        <td>{{ round($oResult->COMMISSION, 2) }}</td>
                                        <td>{{ $oResult->VOLUME }}</td>
                                        <td><a href="{{ route('clients.reports.closedOrders').'?search=1&symbol='.$oResult->SYMBOL.'&order=TICKET&sort=desc'}}"><span class="label label-info"> {{trans('reports::reports.details')}}</span></a></td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if (count($oResults[0]))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults[0]->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults[0]->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults[0]->total() }} {{trans('reports::reports.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults[0]->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>

        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('reports::reports.search') }}</h3>

                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-success">
                            {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                            <label for="exactLogin">{{ trans('reports::reports.ExactLogin') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="from_login_li">
                    <div class="col-md-12">
                        {!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group" id="to_login_li">
                    <div class="col-md-12">
                        {!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group" id="login_li">
                    <div class="col-md-12">
                        {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('from_date', $aFilterParams['from_date'], ['placeholder'=>trans('reports::reports.FromDate'),'class'=>'form-control input-sm mydatepicker']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('to_date', $aFilterParams['to_date'], ['placeholder'=>trans('reports::reports.ToDate'),'class'=>'form-control input-sm mydatepicker']) !!}
                        <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}
                {!! Form::close()!!}
            </div>
        </div>
        @stop
        @section('script')
            @parent

            {!! HTML::script('assets/'.config('fxweb.layoutAssetsFolder').'/js/highcharts.js') !!}
            <script>
//                init.push(function () {
//                    var options = {
//                        todayBtn: "linked",
//                        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',
//                        format: "yyyy-mm-dd"
//                    }
//                    $('.datepicker-warpper').datepicker(options);
//
//                    $('#all-groups-chx').change(function () {
//                        if ($('#all-groups-chx').prop('checked')) {
//                            $('#all-groups-slc').attr('disabled', 'disabled');
//                        } else {
//                            $('#all-groups-slc').removeAttr('disabled');
//                        }
//                    });
//
//                    $('#all-symbols-chx').change(function () {
//                        if ($('#all-symbols-chx').prop('checked')) {
//                            $('#all-symbols-slc').attr('disabled', 'disabled');
//                        } else {
//                            $('#all-symbols-slc').removeAttr('disabled');
//                        }
//                    });
//
//                    if ($('#all-groups-chx').prop('checked')) {
//                        $('#all-groups-slc').attr('disabled', 'disabled');
//                    } else {
//                        $('#all-groups-slc').removeAttr('disabled');
//                    }
//
//                    if ($('#all-symbols-chx').prop('checked')) {
//                        $('#all-symbols-slc').attr('disabled', 'disabled');
//                    } else {
//                        $('#all-symbols-slc').removeAttr('disabled');
//                    }
//
//
//                    $('#exactLogin').change(function () {
//                        if ($('#exactLogin').prop('checked')) {
//                            $("#from_login_li,#to_login_li").hide();
//                            $("#login_li").show();
//                        } else {
//                            $("#from_login_li,#to_login_li").show();
//                            $("#login_li").hide();
//                        }
//                    });
//
//                    if ($('#exactLogin').prop('checked')) {
//                        $("#from_login_li,#to_login_li").hide();
//                        $("#login_li").show();
//                    } else {
//                        $("#from_login_li,#to_login_li").show();
//                        $("#login_li").hide();
//                    }
//                });




                $(function () {
                    $('#container').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: ''
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: {!! json_encode($chartData)!!}
            }]
                    });
                });





                $(function () {
                    $('#container2').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: ''
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: {!! json_encode($chartData2)!!}
            }]
                    });
                });


            </script>
        @stop
        @section('hidden')


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
            {{ trans('reports::reports.commission') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')


            @if (count($oResults[0]))
                <div class="stat-panel no-margin-b">
                    <div class="stat-row">
                        <div class="stat-counters bg-panel no-padding text-center">
                            <div class="stat-cell col-xs-4 padding-xs-vr">
                                <span class="text-xs">{{ trans('reports::reports.total_commission') }}{{ round($oResults[1], 2) }}</span>
                            </div>
                            <div class="stat-cell col-xs-4 padding-xs-vr">
                                <span class="text-xs">{{ trans('reports::reports.total_lots') }} {{ round($oResults[2], 2) }}</span>
                            </div>

                        </div>
                    </div>



                    <div class="clear:both;"></div>
                    <div id="container" style="width:50%; float:left; overflow: auto;"></div>
                    <div id="container2" style="width:50%; float:left; overflow: auto;"></div>
                    <div class="clear:both;"></div>



                </div>
                <div class="padding-xs-vr"></div>
            @endif

            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.commission') }}



                    </div>
                </div>


                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">





                                <div class="th">{!! th_sort(trans('reports::reports.symbol'), 'SYMBOL', $oResults[0]) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Commission'), 'COMMISSION', $oResults[0]) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.lots'), 'VOLUME', $oResults[0]) !!}</div>



                            </div>
                        </div>


                        <div class="tbody">




                            @if (count($oResults[0]))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults[0] as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <div class="tr {{ $class }}">








                                        <div class="td"><label>{!! trans('reports::reports.symbol') !!} : </label><p>{{ $oResult->SYMBOL }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Commission') !!} : </label><p>{{ round($oResult->COMMISSION, 2) }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.lots') !!} : </label><p>{{ $oResult->VOLUME }}</p></div>


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

                            <div class="DT-lf-right change_page_all_div" >
                                {!! Form::text('page',$oResults[0]->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}
                                {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        @endif

                        <div class="col-xs-12 col-lg-3">

                            <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults[0]->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults[0]->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults[0]->total() }} {{trans('reports::reports.entries')}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@stop
@section('script')
    @parent

    {!! HTML::script('assets/'.config('fxweb.layoutAssetsFolder').'/js/highcharts.js') !!}
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


    $(function () {
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: {!! json_encode($chartData)!!}
            }]
        });
    });





    $(function () {
        $('#container2').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: {!! json_encode($chartData2)!!}
            }]
        });
    });


</script>
@stop