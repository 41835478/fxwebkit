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
                <a href="/client">{{ trans('general.growth') }}</a>
            </li>
            <li class="">
                <a href="{{route('client.balanceChart') }}">{{ trans('general.balance') }}</a>
            </li>
        </ul>

    </div>

    <section id="chart_section">
        <div id="growth_chart_all_div"></div>
    </section>

 
    <section id="statistics_section">

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.statistics') }}</span>
            </div>

            <table id='statistics_table'>
                 <tbody>
                    <tr> <th>{{ trans('general.trades') }}</th><td>{{ $statistics['trades'] }}</td><th>{{ trans('general.recovery_factor') }}</th><td>{{ $statistics['recovery_factor'] }}</td></tr>
                    <tr> <th>{{ trans('general.profit_trades') }}</th><td>{{ $statistics['profit_trades'] }}</td><th>{{ trans('general.long_trades') }}</th><td>{{ $statistics['long_trades'] }}</td></tr>
                    <tr> <th>{{ trans('general.loss_trade') }}</th><td>{{ $statistics['loss_trade'] }}</td><th>{{ trans('general.short_trades') }}</th><td>{{ $statistics['short_trades'] }}</td></tr>
                    <tr> <th>{{ trans('general.best_trade') }}</th><td>{{ $statistics['best_trade'] }}</td><th>{{ trans('general.profits_factor') }}</th><td>{{ $statistics['profits_factor'] }}</td></tr>
                    <tr> <th>{{ trans('general.worst_trade') }}</th><td>{{ $statistics['worst_trade'] }}</td><th>{{ trans('general.expected_payoff') }}</th><td>{{ $statistics['expected_payoff'] }}</td></tr>
                    <tr> <th>{{ trans('general.gross_profit') }}</th><td>{{ $statistics['gross_profit'] }}</td><th>{{ trans('general.average_profit') }}</th><td>{{ $statistics['average_profit'] }}</td></tr>
                    <tr> <th>{{ trans('general.gross_loss') }}</th><td>{{ $statistics['gross_loss'] }}</td><th>{{ trans('general.average_loss') }}</th><td>{{ $statistics['average_loss'] }}</td></tr>
                    <tr> <th>{{ trans('general.maximum_consecutive_wins') }}</th><td>{{ $statistics['maximum_consecutive_wins'] }}</td><th>{{ trans('general.maximum_consecutive_losses') }}</th><td>{{ $statistics['maximum_consecutive_losses'] }}</td></tr>
                    <tr> <th>{{ trans('general.maximal_consecutive_profit') }}</th><td>{{ $statistics['maximal_consecutive_profit'] }}</td><th>{{ trans('general.maximal_consecutive_loss') }}</th><td>{{ $statistics['maximal_consecutive_loss'] }}</td></tr>
                    <tr> <th>{{ trans('general.sharpe_ratio') }}</th><td>{{ $statistics['sharpe_ratio'] }}</td><th>{{ trans('general.monthly_grouth') }}</th><td>{{ $statistics['monthly_grouth'] }}</td></tr>
                    <tr> <th></th><td></td><th>{{ trans('general.annual_farecast') }}</th><td>{{ $statistics['annual_farecast'] }}</td></tr>
                </tbody>

            </table>

        </div>
        
        </div>
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
                }, {
                name: 'Average',
                        data: {!! json_encode($averages_array)!!},
                        color:'red'

                }]
        });
        });
    </script>
    @stop
