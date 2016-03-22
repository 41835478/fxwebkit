@extends('client.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')


    <div class="page-header">
        <h1>{{ trans('general.dashboard') }}</h1>
    </div>

    <div class="panel">
        <div class="panel-heading">

            <span class="panel-title">{{ trans('general.performance') }}</span>

            <div class="clearfix"></div>

        </div>
        <div class="panel-body">
            <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li class="">
                    <a href="/client?login={{ $login.'&server_id='.$server_id  }}">{{ trans('general.growth') }}</a>
                </li>
                <li class="active">
                    <a href="{{route('client.balanceChart') }}?login={{ $login.'&server_id='.$server_id  }}">{{ trans('general.balance') }}</a>
                </li>

            </ul>

        </div>


        <section id="chart_section">
            @if(count($balance_array))
                <div id="growth_chart_all_div" class="col-xs-12 col-sm-8"></div>
            @else
                <div class="col-xs-12 col-sm-8">{{ trans('user.no_account_available') }}</div>
            @endif
            <div class="col-xs-12 col-sm-4" style="height:400px; overflow-y: auto;">

                @foreach($aLogin as $oneLogin)
                    <a href="?login={{$oneLogin[0].'&server_id='.$oneLogin[1]}}"
                       class="stat-cell @if($oneLogin[0].$oneLogin[1] ==$login.$server_id ) bg-info @else bg-default @endif  valign-middle col-xs-12 ">
                        <!-- Stat panel bg icon -->
                        <i class="fa fa-user bg-icon"></i>
                        <!-- Extra large text -->
                        <span class="text-xlg"><span
                                    class="text-lg text-slim"></span><strong> {{$oneLogin[0]}} </strong>/@if($oneLogin[1]==0){{config('fxweb.liveServerName')}}@else {{config('fxweb.demoServerName')}}@endif</span><br>
                        <!-- Big text -->
                        <span class="text-bg">{{ trans('user.balance') }} @if($oneLogin[0].$oneLogin[1] ==$login.$server_id ) {{ $balance }}  @else
                                Click here  @endif % </span><br> <!-- Big text -->
                        <span class="text-bg">{{ trans('user.profit') }} @if($oneLogin[0].$oneLogin[1] ==$login.$server_id ){{$statistics['profit']}} @else
                                Click here @endif </span><br>
                        <!-- Small text -->
                        <span class="text-sm"></span>
                    </a> <!-- /.stat-cell -->
                @endforeach


            </div>
            <div class="clearfix"></div>

        </section>
    </div>

    <section id="statistics_section">


        <div class="panel">


                <div class="panel-heading">
                    <span class="panel-title">{{ trans('general.statistics') }}</span>
                </div>

            <div id='statistics_table'>

                 <div class="tooltip_number" data-original-title="{{ trans('general.trades_tooltip') }}">{{ trans('general.trades') }}<div>{!! $statistics['trades'] !!}</div></div><div class="tooltip_number" data-original-title="{{ trans('general.recovery_factor_tooltip') }}">{{ trans('general.recovery_factor') }}<div>{!! $statistics['recovery_factor'] !!}</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.profit_trades_tooltip') }}">{{ trans('general.profit_trades') }}<div><span class="@if( $statistics['profit_trades_number']< 0)  red_font @else blue_font @endif">{{$statistics['profit_trades_number']}}</span> ({!! $statistics['profit_trades'] !!} )</div></div><div class="tooltip_number" data-original-title="{{ trans('general.long_trades_tooltip') }}">{{ trans('general.long_trades') }}<div>{!! $statistics['long_trades'] !!}</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.loss_trade_tooltip') }}">{{ trans('general.loss_trade') }}<div><span class="@if( $statistics['loss_trade_number']< 0)  red_font @else blue_font @endif">{{$statistics['loss_trade_number']}}</span> ({!! $statistics['loss_trade'] !!} )</div></div><div class="tooltip_number" data-original-title="{{ trans('general.short_trades_tooltip') }}">{{ trans('general.short_trades') }}<div>{!! $statistics['short_trades'] !!}</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.best_trade_tooltip') }}">{{ trans('general.best_trade') }}<div><span class="@if($statistics['best_trade']<0)  red_font @else blue_font @endif">{!! $statistics['best_trade'] !!}</span></div></div><div class="tooltip_number" data-original-title="{{ trans('general.profits_factor_tooltip') }}">{{ trans('general.profits_factor') }}<div>{!! $statistics['profits_factor'] !!}</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.worst_trade_tooltip') }}">{{ trans('general.worst_trade') }}<div><span class="@if( $statistics['worst_trade']< 0)  red_font @else blue_font @endif">{!! $statistics['worst_trade'] !!}</span></div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.gross_profit_tooltip') }}">{{ trans('general.gross_profit') }}<div><span class="@if( $statistics['gross_profit']< 0)  red_font @else blue_font @endif">{!! $statistics['gross_profit'] !!}</span></div></div><div class="tooltip_number" data-original-title="{{ trans('general.average_profit_tooltip') }}">{{ trans('general.average_profit') }}<div>{!! $statistics['average_profit'] !!}</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.gross_loss_tooltip') }}">{{ trans('general.gross_loss') }}<div><span class="@if( $statistics['gross_loss']< 0)  red_font @else blue_font @endif">{!! $statistics['gross_loss'] !!}</span></div></div><div class="tooltip_number" data-original-title="{{ trans('general.average_loss_tooltip') }}">{{ trans('general.average_loss') }}<div>{!! $statistics['average_loss'] !!}</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.maximum_consecutive_wins_tooltip') }}">{{ trans('general.maximum_consecutive_wins') }}<div>{!! $statistics['maximum_consecutive_wins_number'] !!}(<span class="blue_font">{{$statistics['maximum_consecutive_wins']}}</span>)</div></div><div class="tooltip_number" data-original-title="{{ trans('general.maximum_consecutive_losses_tooltip') }}">{{ trans('general.maximum_consecutive_losses') }}<div>{!! $statistics['maximum_consecutive_losses_number'] !!}(<span class="red_font">{!! $statistics['maximum_consecutive_losses'] !!}</span>)</div></div>
                 <div class="tooltip_number" data-original-title="{{ trans('general.maximal_consecutive_profit_tooltip') }}">{{ trans('general.maximal_consecutive_profit') }}<div><span class="blue_font">{!! $statistics['maximal_consecutive_profit'].' ( '. $statistics['maximal_consecutive_profit_number'].' ) '!!}</span></div></div><div class="tooltip_number" data-original-title="{{ trans('general.maximal_consecutive_loss_tooltip') }}">{{ trans('general.maximal_consecutive_loss') }}<div><span class="red_font">{!! $statistics['maximal_consecutive_loss'] !!}</span> ({{$statistics['maximal_consecutive_loss_number']}})</div></div>

                <div class="clearfix"></div>
            </div>


            <style type="text/css">
                #statistics_section {
                    margin: 20px 0px;
                    width: 100%;
                    border-top: 1px solid #ccc;
                }

                #statistics_table {
                    margin: 20px 0px;
                    width: 100%;

                }

                #statistics_table td, #statistics_table th {
                    padding: 5px 10px;
                    width: 25%;
                    font-size: 10px;
                }
                #statistics_table>div{
                    border-right: 1px solid #ccc;
                    padding: 5px;
                    font-weight: bold;
                }
                #statistics_table div div {
                    text-align: right;
                    float: right;
                    font-weight: normal;

                }

                #statistics_table td:nth-child(4) {
                    border-right: 1px solid transparent;
                }

                #statistics_table th {
                    text-align: left;
                    font-weight: normal;
                }

                #statistics_table th:after {
                    content: ':';
                }

                .blue_font {
                    color: #1D89CF;
                }

                .red_font {
                    color: #f00;
                }

                .tooltip_number {
                    cursor: pointer;
                    display: block !important;
                    float: left;
                    width: 50%;
                }

                g.highcharts-legend {
                    display: none;
                }

                .stat-cell {
                    display: block !important;
                    margin: 5px 0px;
                }

                .stat-cell.bg-info {
                    border-bottom: 3px solid #25BAE6;
                }

                .stat-cell.bg-default {
                    border-bottom: 3px solid #cfcece;
                }

                .buttonsScrollDiv{position: relative;overflow: hidden;padding:20px 0px;}
                .buttonsScrollDiv .scrollBody{}
                .buttonsScrollDiv .scrollUp,.buttonsScrollDiv .scrollDown{
                    position:absolute;
                    width:100%;
                    text-align:center;
                    padding:5px 0px;
                    background-color: #1D89CF;
                    color:#ffffff;
                    z-index: 2;
                    left:0px;
                    opacity: 0.3;

                }
                .buttonsScrollDiv:hover .scrollUp,.buttonsScrollDiv:hover .scrollDown{ opacity:1;}
                .buttonsScrollDiv .scrollUp{
                    top:0px;
                }
                .buttonsScrollDiv .scrollDown{
                    bottom:0px;

                }
            </style>
            </div>

    </section>


    <section id="chart_section_2">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.tradePopulation') }}</span>
            </div>
            @if(count($symbols_pie_array))
                <div class="panel-body">
                    <div id="bar_negative_stack_all_div" class="col-xs-6"></div>
                    <div id="symbols_pie_chart_all_div" class="col-xs-6"></div>
                </div>
            @else
                <div class="text-center">{{ trans('user.no_account_available') }}</div>
            @endif
        </div>
    </section>

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
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
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
                    color: '#1d89cf'
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
        function remove_copyrights() {
            $('svg text').each(function () {
                if ($(this).text() == 'Highcharts.com') {
                    $(this).remove();
                }
            });
        }
        setTimeout('remove_copyrights()', 1000);
    </script>
@stop
