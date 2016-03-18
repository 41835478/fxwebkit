@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')


    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.summary') }}</h1>
    </div>




    <div class="col-xs-4">

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


    <div class="col-xs-4">
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


    <div class="col-xs-4">
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
                @else
                    <div  class="col-xs-12 col-sm-8">{{ trans('ibportal::ibportal.no_account_available') }}</div>
                @endif

            </section><div class="clearFix"></div>

        </div>
    </div>


    <style type="text/css">


        g.highcharts-legend{display:none;}
    </style>



@stop
@section('script')
    @parent

    {!! HTML::script('assets/js/highcharts.js') !!}
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
                    categories:{!! json_encode($horizontal_line_numbers)!!}
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
                    data: {!! json_encode($balance_array)!!},
                    color:'#1d89cf'
                }]
            });
        });


        function remove_copyrights(){
            $('svg text').each(function(){if($(this).text() == 'Highcharts.com'){$(this).remove();} });
        }
        setTimeout('remove_copyrights()',1000);
    </script>
@stop
