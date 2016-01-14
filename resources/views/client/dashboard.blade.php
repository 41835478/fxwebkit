@extends('client.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')


    <div class="page-header">
        <h1>{{ trans('general.dashboard') }}</h1>
    </div>

    <div class="panel">
        <div class="panel-heading">

            <span class="panel-title">{{ trans('general.performance') }}</span>
            {!! Form::open(['method'=>'get','class'=>'col-xs-3','id'=>'select_login_form','style'=>'float:right;margin:0px;']) !!}
            {!! Form::select('login',$aLogin,$login,['class'=>'form-control','onChange'=>'$("#select_login_form").submit();']) !!}
            {!! Form::close() !!}
            <div class="clearfix"></div>

        </div>
        <div class="panel-body">
            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li class="active">
                    <a href="/client?login={{ $login }}">{{ trans('general.growth') }}</a>
                </li>
                <li class="">
                    <a href="{{route('client.balanceChart') }}?login={{ $login }}">{{ trans('general.balance') }}</a>
                </li>

            </ul>

        </div>

        <section id="chart_section">
            <div id="growth_chart_all_div"></div>
        </section>
    </div>

    <section id="statistics_section">


        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.statistics') }}</span>
               
            </div>

            <table id='statistics_table'>
                <tbody>
                <tr> <th>{{ trans('general.trades') }}</th><td>{{ $statistics['trades'] }}</td><th>{{ trans('general.recovery_factor') }}</th><td>{{ $statistics['recovery_factor'] }}</td></tr>
                <tr> <th>{{ trans('general.profit_trades') }}</th><td >{!! $statistics['profit_trades'] !!} </td><th>{{ trans('general.long_trades') }}</th><td>{{ $statistics['long_trades'] }}</td></tr>
                <tr> <th>{{ trans('general.loss_trade') }}</th><td>{!! $statistics['loss_trade'] !!}</td><th>{{ trans('general.short_trades') }}</th><td>{{ $statistics['short_trades'] }}</td></tr>
                <tr> <th>{{ trans('general.best_trade') }}</th><td>{!! $statistics['best_trade'] !!}</td><th>{{ trans('general.profits_factor') }}</th><td>{{ $statistics['profits_factor'] }}</td></tr>
                <tr> <th>{{ trans('general.worst_trade') }}</th><td>{!! $statistics['worst_trade'] !!}</td><th>{{ trans('general.expected_payoff') }}</th><td>{{ $statistics['expected_payoff'] }}</td></tr>
                <tr> <th>{{ trans('general.gross_profit') }}</th><td>{!! $statistics['gross_profit'] !!}</td><th>{{ trans('general.average_profit') }}</th><td>{{ $statistics['average_profit'] }}</td></tr>
                <tr> <th>{{ trans('general.gross_loss') }}</th><td>{!! $statistics['gross_loss'] !!}</td><th>{{ trans('general.average_loss') }}</th><td>{{ $statistics['average_loss'] }}</td></tr>
                <tr> <th>{{ trans('general.maximal_consecutive_profit') }}</th><td>{{ $statistics['maximal_consecutive_profit'] }}</td><th>{{ trans('general.maximal_consecutive_loss') }}</th><td>{{ $statistics['maximal_consecutive_loss'] }}</td></tr>
                <tr> <th>{{ trans('general.sharpe_ratio') }}</th><td>{{ $statistics['sharpe_ratio'] }}</td><th>{{ trans('general.monthly_grouth') }}</th><td>{{ $statistics['monthly_grouth'] }}</td></tr>
                <tr> <td colspan="2"></td><th>{{ trans('general.annual_farecast') }}</th><td>{{ $statistics['annual_farecast'] }}</td></tr>
                </tbody>

            </table>



            <style type="text/css">
                #statistics_section{
                    margin:20px 0px;
                    width:100%;
                    border-top:1px solid #ccc;}
                #statistics_table{
                    margin:20px 0px;
                    width:100%;

                }

                #statistics_table td, #statistics_table th{ padding: 5px 10px;width:25%;font-size: 10px;}
                #statistics_table td{text-align: right;border-right:1px solid #ccc;}
                #statistics_table td:nth-child(4){border-right:1px solid transparent;}

                #statistics_table th{text-align: left; font-weight: normal;}
                #statistics_table th:after{content:':';}
               
                .blue_font{ color:#1D89CF;}
                .red_font{ color:#f00;}
            </style>
    </section>


    <section id="chart_section_2">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.tradePopulation') }}</span>
            </div>
            <div class="panel-body">
                <div id="bar_negative_stack_all_div" class="col-xs-6"></div>
                <div id="symbols_pie_chart_all_div" class="col-xs-6"></div>
            </div>
        </div>
    </section>

@stop
@section('script')
    @parent

    {!! HTML::script('assets/js/highcharts.js') !!}
    <script>

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
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: 'Growth %',
                    data: {!! json_encode($growth_array)!!},
                    color:'blue'
                }]
            });
        });



        $(function () {
            $('#symbols_pie_chart_all_div').highcharts({

                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
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
                            enabled: true
                        },
                        showInLegend: false
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data:{!! json_encode($symbols_pie_array)!!}
                }]
            });
        });





        $(function () {
            // Age categories
            var categories = {!! json_encode($sell_buy_horizontal_line_numbers)!!};
            $(document).ready(function () {
                $('#bar_negative_stack_all_div').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: [{
                        categories: categories,
                        reversed: false,
                        labels: {
                            step: 1
                        }
                    }, { // mirror axis on right side
                        opposite: true,
                        reversed: false,
                        categories: categories,
                        linkedTo: 0,
                        labels: {
                            step: 1
                        }
                    }],
                    yAxis: {
                        title: {
                            text: null
                        },
                        labels: {
                            formatter: function () {
                                return Math.abs(this.value) + '%';
                            }
                        }
                    },

                    plotOptions: {
                        series: {
                            stacking: 'normal'
                        }
                    },

                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + ', age ' + this.point.category + '</b><br/>' +
                                    'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                        }
                    },

                    series: [{
                        name: 'Sell',
                        data: {!! json_encode($sell_array)!!}
                    }, {
                        name: 'Buy',
                        data: {!! json_encode($buy_array)!!}
                    }]
                });
            });

        });

        function remove_copyrights(){
            $('svg text').each(function(){if($(this).text() == 'Highcharts.com'){$(this).remove();} });
        }
        setTimeout('remove_copyrights()',1000);
    </script>
@stop

