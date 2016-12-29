@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.agent_plan') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.agent_plan') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>

                        <div class="col-xs-12 col-lg-4">

                            <div class="stat-panel">
                                <div class="stat-row">
                                    <!-- Info background, without padding, horizontally centered text, super large text -->
                                    <div class="stat-cell bg-info no-padding text-center text-slg">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div> <!-- /.stat-row -->
                                <div class="stat-row">
                                    <!-- Bordered, without top border, horizontally centered text, large text -->
                                    <div class="stat-cell bordered no-border-t text-center text-lg">
                                        <strong>{{ $statistics['users_number'] }}</strong>
                                        <small><small>{{ trans('ibportal::ibportal.user') }}</small></small>
                                    </div>
                                </div> <!-- /.stat-row -->
                            </div>

                            <div class="clearFix"></div>
                        </div>


                        <div class="col-xs-12 col-lg-4">
                            <div class="stat-panel">
                                <div class="stat-row">
                                    <!-- Info background, without padding, horizontally centered text, super large text -->
                                    <div class="stat-cell bg-info no-padding text-center text-slg">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div> <!-- /.stat-row -->
                                <div class="stat-row">
                                    <!-- Bordered, without top border, horizontally centered text, large text -->
                                    <div class="stat-cell bordered no-border-t text-center text-lg">
                                        <strong>{{ $statistics['mt4_users_number'] }}</strong>
                                        <small><small>{{ trans('ibportal::ibportal.mt4_users') }}</small></small>
                                    </div>
                                </div> <!-- /.stat-row -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-4">
                            <div class="stat-panel">
                                <div class="stat-row">
                                    <!-- Info background, without padding, horizontally centered text, super large text -->
                                    <div class="stat-cell bg-info no-padding text-center text-slg">
                                        <i class="fa fa-certificate"></i>
                                    </div>
                                </div> <!-- /.stat-row -->
                                <div class="stat-row">
                                    <!-- Bordered, without top border, horizontally centered text, large text -->
                                    <div class="stat-cell bordered no-border-t text-center text-lg">
                                        <strong>{{ $statistics['planes_number'] }}</strong>
                                        <small><small>{{ trans('ibportal::ibportal.plan') }}</small></small>
                                    </div>
                                </div> <!-- /.stat-row -->
                            </div>
                        </div>


                        <div class="clearFix" style="clear:both;"></div>


                        <div class="panel clearFix">
                            <div class="panel-heading">

                                <span class="panel-title">{{ trans('ibportal::ibportal.Commission') }}</span>

                                <div class="clearfix"></div>

                            </div>
                            <div class="panel-body">





                                <section id="chart_section">
                                    @if(count($balance_array))
                                        <div id="growth_chart_all_div" class="col-xs-12"></div>

                                        <div id="chartContainer" class="col-xs-12"></div>
                                    @else
                                        <div  class="col-xs-12 col-sm-8">{{ trans('ibportal::ibportal.no_account_available') }}</div>
                                    @endif

                                </section><div class="clearFix"></div>

                            </div>
                        </div>
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
@section('script')
    @parent

    {!! HTML::script('assets/'.config('fxweb.layoutAssetsFolder').'/js/highcharts.js') !!}
    <script>

        init.push(function () {
            $('.tooltip_number').tooltip();
        });

        $(function () {
            $('#growth_chart_all_div').highcharts({
                title: {
                    text: '',
                    x: - 20 //center
                },
                subtitle: {
                    text: '',
                    x: - 20
                },
                xAxis: {
                    categories:{!! json_encode($commission_horizontal_line_numbers)!!}
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'bottom',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Balance',
                    data: {!! json_encode($commission_array)!!},
                    color:'#1d89cf'
                }]
            });
        });


        function remove_copyrights(){
            $('svg text').each(function(){if($(this).text() == 'Highcharts.com'){$(this).remove();} });
        }
        setTimeout('remove_copyrights()',1000);


        $(function () {
            $('#chartContainer').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories:{!! json_encode($horizontal_line_numbers)!!},
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{point.y:.1f}'
                },
                series: [{
                    name: 'Population',
                    data:{!! json_encode($balance_array)!!},
                    dataLabels: {
                        enabled: false,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });
        });
    </script>
@stop

@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.summary') }}</h1>
    </div>




    <div class="col-xs-12 col-lg-4">

        <div class="stat-panel">
            <div class="stat-row">
                <!-- Info background, without padding, horizontally centered text, super large text -->
                <div class="stat-cell bg-info no-padding text-center text-slg">
                    <i class="fa fa-user"></i>
                </div>
            </div> <!-- /.stat-row -->
            <div class="stat-row">
                <!-- Bordered, without top border, horizontally centered text, large text -->
                <div class="stat-cell bordered no-border-t text-center text-lg">
                    <strong>{{ $statistics['users_number'] }}</strong>
                    <small><small>{{ trans('ibportal::ibportal.user') }}</small></small>
                </div>
            </div> <!-- /.stat-row -->
        </div>

        <div class="clearFix"></div>
    </div>


    <div class="col-xs-12 col-lg-4">
        <div class="stat-panel">
            <div class="stat-row">
                <!-- Info background, without padding, horizontally centered text, super large text -->
                <div class="stat-cell bg-info no-padding text-center text-slg">
                    <i class="fa fa-users"></i>
                </div>
            </div> <!-- /.stat-row -->
            <div class="stat-row">
                <!-- Bordered, without top border, horizontally centered text, large text -->
                <div class="stat-cell bordered no-border-t text-center text-lg">
                    <strong>{{ $statistics['mt4_users_number'] }}</strong>
                    <small><small>{{ trans('ibportal::ibportal.mt4_users') }}</small></small>
                </div>
            </div> <!-- /.stat-row -->
        </div>
    </div>


    <div class="col-xs-12 col-lg-4">
        <div class="stat-panel">
            <div class="stat-row">
                <!-- Info background, without padding, horizontally centered text, super large text -->
                <div class="stat-cell bg-info no-padding text-center text-slg">
                    <i class="fa fa-certificate"></i>
                </div>
            </div> <!-- /.stat-row -->
            <div class="stat-row">
                <!-- Bordered, without top border, horizontally centered text, large text -->
                <div class="stat-cell bordered no-border-t text-center text-lg">
                    <strong>{{ $statistics['planes_number'] }}</strong>
                    <small><small>{{ trans('ibportal::ibportal.plan') }}</small></small>
                </div>
            </div> <!-- /.stat-row -->
        </div>
    </div>


    <div class="clearFix" style="clear:both;"></div>


    <div class="panel clearFix">
        <div class="panel-heading">

            <span class="panel-title">{{ trans('ibportal::ibportal.Commission') }}</span>

            <div class="clearfix"></div>

        </div>
        <div class="panel-body">





            <section id="chart_section">
                @if(count($balance_array))
                    <div id="growth_chart_all_div" class="col-xs-12"></div>

                    <div id="chartContainer" class="col-xs-12"></div>
                @else
                    <div  class="col-xs-12 col-sm-8">{{ trans('ibportal::ibportal.no_account_available') }}</div>
                @endif

            </section><div class="clearFix"></div>

        </div>
    </div>



</div>


@stop
@section('script')
    @parent

    {!! HTML::script('assets/'.config('fxweb.layoutAssetsFolder').'/js/highcharts.js') !!}
    <script>

        init.push(function () {
            $('.tooltip_number').tooltip();
        });

        $(function () {
            $('#growth_chart_all_div').highcharts({
                title: {
                    text: '',
                    x: - 20 //center
                },
                subtitle: {
                    text: '',
                    x: - 20
                },
                xAxis: {
                    categories:{!! json_encode($commission_horizontal_line_numbers)!!}
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'bottom',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Balance',
                    data: {!! json_encode($commission_array)!!},
                    color:'#1d89cf'
                }]
            });
        });


        function remove_copyrights(){
            $('svg text').each(function(){if($(this).text() == 'Highcharts.com'){$(this).remove();} });
        }
        setTimeout('remove_copyrights()',1000);


        $(function () {
            $('#chartContainer').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories:{!! json_encode($horizontal_line_numbers)!!},
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{point.y:.1f}'
                },
                series: [{
                    name: 'Population',
                    data:{!! json_encode($balance_array)!!},
                    dataLabels: {
                        enabled: false,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });
        });
    </script>
@stop
