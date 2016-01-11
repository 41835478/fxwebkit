@extends('client.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')
<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Balance</span>
        {!! Form::open(['method'=>'get','class'=>'col-xs-3','id'=>'select_login_form','style'=>'float:right;margin:0px;']) !!}
        {!! Form::select('login',$aLogin,$login,['class'=>'form-control','onChange'=>'$("#select_login_form").submit();']) !!}
        {!! Form::close() !!}
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
            <li >
               <a href="/client">Growth</a>
            </li>
            <li class="active">
                 <a href="{{route('client.balanceChart') }}"> Balance</a>
            </li>

            <li >
                <a href="{{route('client.symbolsChart') }}"> Symbols</a>
            </li>
        </ul>

    </div>
        <section id="chart_section">
            <div id="growth_chart_all_div"></div>
        </section>



<section id="statistics_section">
 
   <table id='statistics_table'>
        <tbody>
            <tr> <th>Trades</th><td>{{ $statistics['trades'] }}</td><th>Recovery Factor</th><td>{{ $statistics['recovery_factor'] }}</td></tr>
            <tr> <th>Profit Trades</th><td>{{ $statistics['profit_trades'] }}</td><th>Long Trades</th><td>{{ $statistics['long_trades'] }}</td></tr>
            <tr> <th>Loss Trade</th><td>{{ $statistics['loss_trade'] }}</td><th>Short Trades</th><td>{{ $statistics['short_trades'] }}</td></tr>
            <tr> <th>Best Trade</th><td>{{ $statistics['best_trade'] }}</td><th>Profits Factor</th><td>{{ $statistics['profits_factor'] }}</td></tr>
            <tr> <th>Worst Trade</th><td>{{ $statistics['worst_trade'] }}</td><th>Expected Payoff</th><td>{{ $statistics['expected_payoff'] }}</td></tr>
            <tr> <th>Gross Profit</th><td>{{ $statistics['gross_profit'] }}</td><th>Average Profit</th><td>{{ $statistics['average_profit'] }}</td></tr>
            <tr> <th>Gross Loss</th><td>{{ $statistics['gross_loss'] }}</td><th>Average Loss</th><td>{{ $statistics['average_loss'] }}</td></tr>
            <tr> <th>Maximal Consecutive Profit</th><td>{{ $statistics['maximal_consecutive_profit'] }}</td><th>Maximal Consecutive Loss</th><td>{{ $statistics['maximal_consecutive_loss'] }}</td></tr>
            <tr> <th>Sharpe Ratio</th><td>{{ $statistics['sharpe_ratio'] }}</td><th>Monthly Grouth</th><td>{{ $statistics['monthly_grouth'] }}</td></tr>
            <tr> <th></th><td></td><th>Annual Farecast</th><td>{{ $statistics['annual_farecast'] }}</td></tr>

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
    </style>
</section>



    <section id="chart_section_2">
        <div id="bar_negative_stack_all_div" class="col-xs-6"></div>
        <div id="symbols_pie_chart_all_div" class="col-xs-6"></div>

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
            name: 'Balance',
                    data: {!! json_encode($balance_array)!!},
                    color:'blue'
            }]
    });
    });




    $(function () {
        $('#symbols_pie_chart_all_div').highcharts({
            colors: ["#B5A97D", "#434348", "#B5A87C", "#F8A354", "#7F82EC", "#F9D6A3", "#E5D548",
                "#7F82EB", "#8F4653", "#8BE7E1", "#aaeeee"],
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
        var categories = {!! json_encode($horizontal_line_numbers)!!};
        $(document).ready(function () {
            $('#bar_negative_stack_all_div').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Trade Population'
                },
                subtitle: {
                    text: 'Sell Buy'
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
</script>
@stop